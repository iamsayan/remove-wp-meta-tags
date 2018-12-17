<?php

/**
 * Plugin tools options
 *
 * @package   WP Header & Meta Tags
 * @author    Sayan Datta
 * @license   http://www.gnu.org/licenses/gpl.html
 */

/**
 * Process a settings export that generates a .json file of the shop settings
 */
function rm_process_settings_export() {
	if( empty( $_POST['rm_export_action'] ) || 'rm_export_settings' != $_POST['rm_export_action'] )
		return;
	if( ! wp_verify_nonce( $_POST['rm_export_nonce'], 'rm_export_nonce' ) )
		return;
	if( ! current_user_can( 'manage_options' ) )
		return;
	$settings = get_option( 'rm_plugin_global_settings' );
	$url = get_site_url();
    $find = array( 'http://', 'https://' );
    $replace = '';
    $output = str_replace( $find, $replace, $url );
	ignore_user_abort( true );
	nocache_headers();
	header( 'Content-Type: application/json; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=' . $output . '-rm-export-' . date( 'm-d-Y' ) . '.json' );
	header( "Expires: 0" );
	echo json_encode( $settings );
	exit;
}
add_action( 'admin_init', 'rm_process_settings_export' );

/**
 * Process a settings import from a json file
 */
function rm_process_settings_import() {
	if( empty( $_POST['rm_import_action'] ) || 'rm_import_settings' != $_POST['rm_import_action'] )
		return;
	if( ! wp_verify_nonce( $_POST['rm_import_nonce'], 'rm_import_nonce' ) )
		return;
	if( ! current_user_can( 'manage_options' ) )
		return;
    $extension = explode( '.', $_FILES['import_file']['name'] );
    $file_extension = end($extension);
	if( $file_extension != 'json' ) {
		wp_die( __( '<strong>Settings import failed:</strong> Please upload a valid .json file to import settings in this website.', 'ultimate-facebook-comments' ) );
	}
	$import_file = $_FILES['import_file']['tmp_name'];
	if( empty( $import_file ) ) {
		wp_die( __( '<strong>Settings import failed:</strong> Please upload a file to import.', 'ultimate-facebook-comments' ) );
	}
	// Retrieve the settings from the file and convert the json object to an array.
	$settings = (array) json_decode( file_get_contents( $import_file ) );
    update_option( 'rm_plugin_global_settings', $settings );
    //wp_safe_redirect( admin_url( 'options-general.php?page=ultimate-facebook-comments' ) ); exit;
    function rm_import_success_notice(){
        echo '<div class="notice notice-success is-dismissible">
                 <p><strong>' . __( 'Success! Plugin Settings has been imported successfully.', 'ultimate-facebook-comments' ) . '</strong></p>
             </div>';
    }
    add_action('admin_notices', 'rm_import_success_notice'); 
}
add_action( 'admin_init', 'rm_process_settings_import' );

/**
 * Process reset plugin settings
 */
function rm_remove_plugin_settings() {
	if( empty( $_POST['rm_reset_action'] ) || 'rm_reset_settings' != $_POST['rm_reset_action'] )
		return;
	if( ! wp_verify_nonce( $_POST['rm_reset_nonce'], 'rm_reset_nonce' ) )
		return;
	if( ! current_user_can( 'manage_options' ) )
		return;
    $plugin_settings = 'rm_plugin_global_settings';
    delete_option( $plugin_settings );

    function rm_settings_reset_success_notice(){
        echo '<div class="notice notice-success is-dismissible">
                 <p><strong>' . __( 'Success! Plugin Settings reset successfully.', 'ultimate-facebook-comments' ) . '</strong></p>
             </div>';
    }
    add_action('admin_notices', 'rm_settings_reset_success_notice'); 
}
add_action( 'admin_init', 'rm_remove_plugin_settings' );


?>