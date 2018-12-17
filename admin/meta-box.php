<?php

/**
 * @package   Easy Header Footer
 * @author    Sayan Datta
 * @since     v3.0.6
 * @license   http://www.gnu.org/licenses/gpl.html
 *
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */

$options = get_option('rm_plugin_global_settings');

function rm_add_meta_boxes_to_post_edit_screen( $post ) {

    // If user can't publish posts, then do not show meta box
    if ( ! current_user_can( 'publish_posts' ) ) return;

    $post_types = get_post_types(array(
        'public'   => true,
    ), 'names'); 

    foreach( $post_types as $item ) {
        add_meta_box( 'rm_meta_box', __( 'Easy Header Footer', 'remove-wp-meta-tags' ), 'rm_meta_box_callback', $item, 'normal', 'default' );
    }
}

add_action( 'add_meta_boxes', 'rm_add_meta_boxes_to_post_edit_screen' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function rm_meta_box_callback( $post ) {
    // make sure the form request comes from WordPress
    wp_nonce_field( 'rm_meta_box_build_nonce', 'rm_meta_box_nonce' );
    // get post types objects
    $post_types = get_post_type_object( get_post_type( $post ) );
    // retrieve post id
    $checkboxMeta = get_post_meta( $post->ID );
    $header_text = isset($checkboxMeta['_rm_header_code']) ? esc_attr($checkboxMeta['_rm_header_code'][0]) : '';
    $footer_text = isset($checkboxMeta['_rm_footer_code']) ? esc_attr($checkboxMeta['_rm_footer_code'][0]) : '';
    ?>
    <p class="meta-options">
        <label for="rm_header_code"><?php _e( 'Custom Header Code for this ' . $post_types->capability_type, 'remove-wp-meta-tags' ); ?>
            <textarea id="rm_header_code" class="large-text" name="rm_add_head_code" rows="5"><?php echo $header_text; ?></textarea>
        </label>
        <label for="rm_disable_header_status" class="selectit">
            <input id="rm_disable_header_status" type="checkbox" name="rm_header_status" value="yes" <?php if ( isset ( $checkboxMeta['_rm_header_disable'] ) ) checked( $checkboxMeta['_rm_header_disable'][0], 'yes' ); ?> /> <?php _e( 'Override/Disable Sidewide Header Code on this ' . $post_types->capability_type, 'remove-wp-meta-tags' ); ?>
            <input id="rm_disable_hs_hidden" type="hidden" name="rm_header_status_hidden" value="yes" />
        </label>
    </p>
    <p class="meta-options">
        <label for="rm_footer_code"><?php _e( 'Custom Footer Code for this ' . $post_types->capability_type, 'remove-wp-meta-tags' ); ?>
            <textarea id="rm_footer_code" class="large-text" name="rm_add_footer_code" rows="5"><?php echo $footer_text; ?></textarea>
        </label>
        <label for="rm_disable_footer_status" class="selectit">
            <input id="rm_disable_footer_status" type="checkbox" name="rm_footer_status" value="yes" <?php if ( isset ( $checkboxMeta['_rm_footer_disable'] ) ) checked( $checkboxMeta['_rm_footer_disable'][0], 'yes' ); ?> /> <?php _e( 'Override/Disable Sidewide Footer Code on this ' . $post_types->capability_type, 'remove-wp-meta-tags' ); ?>
            <input id="rm_disable_fs_hidden" type="hidden" name="rm_footer_status_hidden" value="yes" />
        </label>
    </p>
<?php

}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 */
function rm_save_meta_boxes_data( $post_id ) {
    
    // verify taxonomies meta box nonce
	if ( ! isset( $_POST['rm_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['rm_meta_box_nonce'], 'rm_meta_box_build_nonce' ) ) {
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
    }
    // store custom fields
    if( isset( $_POST['rm_add_head_code'] ) ) {
        if( empty( $_POST['rm_add_head_code'] ) ) {
            delete_post_meta( $post_id, '_rm_header_code' );
        } else {
            update_post_meta( $post_id, '_rm_header_code', $_POST['rm_add_head_code'] );
        }
    }

    if( isset( $_POST[ 'rm_header_status' ] ) && $_POST[ 'rm_header_status' ] == 'yes' ) {
        update_post_meta( $post_id, '_rm_header_disable', 'yes' );
    } else {
        delete_post_meta( $post_id, '_rm_header_disable' );
    }
    
    if( isset( $_POST['rm_add_footer_code'] ) ) {
        if( empty( $_POST['rm_add_footer_code'] ) ) {
            delete_post_meta( $post_id, '_rm_footer_code' );
        } else {
            update_post_meta( $post_id, '_rm_footer_code', $_POST['rm_add_footer_code'] );
        }
    }
	
    if( isset( $_POST[ 'rm_footer_status' ] ) && $_POST[ 'rm_footer_status' ] == 'yes' ) {
        update_post_meta( $post_id, '_rm_footer_disable', 'yes' );
    } else {
        delete_post_meta( $post_id, '_rm_footer_disable' );
    }
    
}

add_action( 'save_post', 'rm_save_meta_boxes_data', 10, 2 );

?>