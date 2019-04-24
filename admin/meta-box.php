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

add_action( 'add_meta_boxes', 'ehf_add_meta_boxes_to_post_edit_screen' );
add_action( 'save_post', 'ehf_save_meta_boxes_data', 10, 2 );

function ehf_add_meta_boxes_to_post_edit_screen( $post ) {
    // If user can't publish posts, then do not show meta box
    if ( ! current_user_can( 'publish_posts' ) ) return;

    $post_types = get_post_types(array(
        'public' => true,
    ), 'names'); 

    foreach( $post_types as $post_type ) {
        add_meta_box( 'ehf_custom_code_meta_box', __( 'Easy Header Footer Custom Code', 'remove-wp-meta-tags' ), 'ehf_meta_box_callback', $post_type, 'normal', 'default' );
    }
}

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function ehf_meta_box_callback( $post ) {
    // make sure the form request comes from WordPress
    wp_nonce_field( 'ehf_meta_box_build_nonce', 'ehf_meta_box_nonce' );
    // get post types objects
    $post_types = get_post_type_object( get_post_type( $post ) );
    // retrieve post id
    $checkboxMeta = get_post_meta( $post->ID );
    $header_text = isset($checkboxMeta['_rm_header_code']) ? esc_attr($checkboxMeta['_rm_header_code'][0]) : '';
    $footer_text = isset($checkboxMeta['_rm_footer_code']) ? esc_attr($checkboxMeta['_rm_footer_code'][0]) : ''; ?>

    <div style="margin-bottom: -12px;">
        <p class="meta-options">
            <label id="ehf-headercode" for="ehf_header_code"><?php _e( 'Custom Header Code for this ' . $post_types->capability_type, 'remove-wp-meta-tags' ); ?>
                <textarea id="ehf_header_code" class="large-text" name="ehf_add_head_code" rows="5"><?php echo $header_text; ?></textarea>
            </label>
            <label for="ehf_disable_header_status" class="selectit">
                <input id="ehf_disable_header_status" type="checkbox" name="ehf_header_status" value="yes" <?php if ( isset ( $checkboxMeta['_rm_header_disable'] ) ) checked( $checkboxMeta['_rm_header_disable'][0], 'yes' ); ?> /> <?php _e( 'Override/Disable Sidewide Header Code on this ' . $post_types->capability_type, 'remove-wp-meta-tags' ); ?>
            </label>
        </p>
        <p class="meta-options">
            <label id="ehf-footercode" for="ehf_footer_code"><?php _e( 'Custom Footer Code for this ' . $post_types->capability_type, 'remove-wp-meta-tags' ); ?>
                <textarea id="ehf_footer_code" class="large-text" name="ehf_add_footer_code" rows="5"><?php echo $footer_text; ?></textarea>
            </label>
            <label for="ehf_disable_footer_status" class="selectit">
                <input id="ehf_disable_footer_status" type="checkbox" name="ehf_footer_status" value="yes" <?php if ( isset ( $checkboxMeta['_rm_footer_disable'] ) ) checked( $checkboxMeta['_rm_footer_disable'][0], 'yes' ); ?> /> <?php _e( 'Override/Disable Sidewide Footer Code on this ' . $post_types->capability_type, 'remove-wp-meta-tags' ); ?>
            </label>
        </p>
        <script>
            jQuery(document).ready(function($) {
                $("#ehf_disable_header_status").change(function () {
                    if ($('#ehf_disable_header_status').is(':checked')) {
                        if ($("#ehf_header_code").val() == '') {
                            $("#ehf-headercode").hide();
                        }
                    }
                    if (!$('#ehf_disable_header_status').is(':checked')) {
                        if ($("#ehf_header_code").val() == '') {
                            $("#ehf-headercode").show();
                        }
                    }
                });
                $("#ehf_disable_header_status").trigger('change');
                $("#ehf_disable_footer_status").change(function () {
                    if ($('#ehf_disable_footer_status').is(':checked')) {
                        if ($("#ehf_footer_code").val() == '') {
                            $("#ehf-footercode").hide();
                        }
                    }
                    if (!$('#ehf_disable_footer_status').is(':checked')) {
                        if ($("#ehf_footer_code").val() == '') {
                            $("#ehf-footercode").show();
                        }
                    }
                });
                $("#ehf_disable_footer_status").trigger('change');
            });
        </script>
    </div>
<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 */
function ehf_save_meta_boxes_data( $post_id ) {
    // verify taxonomies meta box nonce
	if ( ! isset( $_POST['ehf_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ehf_meta_box_nonce'], 'ehf_meta_box_build_nonce' ) ) {
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
    if( isset( $_POST['ehf_add_head_code'] ) ) {
        if( empty( $_POST['ehf_add_head_code'] ) ) {
            delete_post_meta( $post_id, '_rm_header_code' );
        } else {
            update_post_meta( $post_id, '_rm_header_code', $_POST['ehf_add_head_code'] );
        }
    }

    if( isset( $_POST[ 'ehf_header_status' ] ) && $_POST[ 'ehf_header_status' ] == 'yes' ) {
        update_post_meta( $post_id, '_rm_header_disable', 'yes' );
    } else {
        delete_post_meta( $post_id, '_rm_header_disable' );
    }
    
    if( isset( $_POST['ehf_add_footer_code'] ) ) {
        if( empty( $_POST['ehf_add_footer_code'] ) ) {
            delete_post_meta( $post_id, '_rm_footer_code' );
        } else {
            update_post_meta( $post_id, '_rm_footer_code', $_POST['ehf_add_footer_code'] );
        }
    }
	
    if( isset( $_POST[ 'ehf_footer_status' ] ) && $_POST[ 'ehf_footer_status' ] == 'yes' ) {
        update_post_meta( $post_id, '_rm_footer_disable', 'yes' );
    } else {
        delete_post_meta( $post_id, '_rm_footer_disable' );
    }
}

?>