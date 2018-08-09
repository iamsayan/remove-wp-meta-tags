<?php

/**
 * @package   Ultimate WP Header Footer
 * @author    Sayan Datta
 * @since     v3.0.6
 * @license   http://www.gnu.org/licenses/gpl.html
 *
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */

function rm_add_meta_boxes( $post ) {

    // If user can't publish posts, then do not show meta box
    if ( ! current_user_can( 'publish_posts' ) ) return;

    add_meta_box( 'rm_meta_box', __( 'Custom Header & Footer Code', 'remove-wp-meta-tags' ), 'rm_meta_box_callback', null, 'normal', 'default' );
}

$options = get_option('rm_plugin_global_settings');

if( isset($options['rm_meta_box_position']) ) {
    $post_types = $options['rm_meta_box_position'];
    foreach($post_types as $item) {
        add_action( "add_meta_boxes_{$item}", "rm_add_meta_boxes" );
    }
}

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function rm_meta_box_callback( $post ) {
    // make sure the form request comes from WordPress
    wp_nonce_field( 'rm_meta_box_build_nonce', 'rm_meta_box_nonce' );
    // retrieve post id
    $checkboxMeta = get_post_meta( $post->ID );
    $header_text = isset($checkboxMeta['_rm_header_code']) ? esc_attr($checkboxMeta['_rm_header_code'][0]) : '';
    $footer_text = isset($checkboxMeta['_rm_footer_code']) ? esc_attr($checkboxMeta['_rm_footer_code'][0]) : '';
?>
    <p class="meta-options">
        <label for="rm_header_code"><?php _e( 'Header Code for this entry', 'remove-wp-meta-tags' ); ?> (Leave it blank to disable sitewide header code output):</label>
        <textarea id="rm_header_code" class="large-text" name="rm_add_head_code" rows="4"><?php echo $header_text; ?></textarea>
        <input id="rm_disable_header_status" type="checkbox" name="rm_header_status" value="yes" <?php if ( isset ( $checkboxMeta['_rm_header_disable'] ) ) checked( $checkboxMeta['_rm_header_disable'][0], 'yes' ); ?> />
        <label for="rm_disable_header_status" class="selectit"><?php _e( 'Override/Disable Sidewide Header Code on this entry', 'remove-wp-meta-tags' ); ?></label>
    </p>
    <p class="meta-options">
        <label for="rm_footer_code"><?php _e( 'Footer Code for this entry', 'remove-wp-meta-tags' ); ?> (Leave it blank to disable sitewide footer code output):</label>
        <textarea id="rm_footer_code" class="large-text" name="rm_add_footer_code" rows="4"><?php echo $footer_text; ?></textarea>
		<input id="rm_disable_footer_status" type="checkbox" name="rm_footer_status" value="yes" <?php if ( isset ( $checkboxMeta['_rm_footer_disable'] ) ) checked( $checkboxMeta['_rm_footer_disable'][0], 'yes' ); ?> />
        <label for="rm_disable_footer_status" class="selectit"><?php _e( 'Override/Disable Sidewide Footer Code on this entry', 'remove-wp-meta-tags' ); ?></label>
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

    if( isset( $_POST[ 'rm_header_status' ] ) ) {
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
	
    if( isset( $_POST[ 'rm_footer_status' ] ) ) {
        update_post_meta( $post_id, '_rm_footer_disable', 'yes' );
    } else {
        delete_post_meta( $post_id, '_rm_footer_disable' );
    } 
    
}

add_action( 'save_post', 'rm_save_meta_boxes_data', 10, 2 );

?>