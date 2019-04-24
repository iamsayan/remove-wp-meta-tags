<?php

/**
 * Plugin tools options
 *
 * @package   Easy Header Footer
 * @author    Sayan Datta
 * @license   http://www.gnu.org/licenses/gpl.html
 */

/**
 * Process a settings export that generates a .json file of the shop settings
 */
function ehf_process_settings_export() {
	if( empty( $_POST['ehf_export_action'] ) || 'ehf_export_settings' != $_POST['ehf_export_action'] )
		return;
	if( ! wp_verify_nonce( $_POST['ehf_export_nonce'], 'ehf_export_nonce' ) )
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
	header( 'Content-Disposition: attachment; filename=' . $output . '-ehf-export-' . date( 'm-d-Y' ) . '.json' );
	header( "Expires: 0" );
	echo json_encode( $settings );
	exit;
}

add_action( 'admin_init', 'ehf_process_settings_export' );

/**
 * Process a settings import from a json file
 */
function ehf_process_settings_import() {
	if( empty( $_POST['ehf_import_action'] ) || 'ehf_import_settings' != $_POST['ehf_import_action'] )
		return;
	if( ! wp_verify_nonce( $_POST['ehf_import_nonce'], 'ehf_import_nonce' ) )
		return;
	if( ! current_user_can( 'manage_options' ) )
		return;
    $extension = explode( '.', $_FILES['import_file']['name'] );
    $file_extension = end($extension);
	if( $file_extension != 'json' ) {
		wp_die( __( '<strong>Settings import failed:</strong> Please upload a valid .json file to import settings in this website.', 'remove-wp-meta-tags' ) );
	}
	$import_file = $_FILES['import_file']['tmp_name'];
	if( empty( $import_file ) ) {
		wp_die( __( '<strong>Settings import failed:</strong> Please upload a file to import.', 'remove-wp-meta-tags' ) );
	}
	// Retrieve the settings from the file and convert the json object to an array.
	$settings = (array) json_decode( file_get_contents( $import_file ) );
    update_option( 'rm_plugin_global_settings', $settings );
    function ehf_import_success_notice(){
        echo '<div class="notice notice-success is-dismissible">
                 <p><strong>' . __( 'Success! Plugin Settings has been imported successfully.', 'remove-wp-meta-tags' ) . '</strong></p>
             </div>';
    }
    add_action('admin_notices', 'ehf_import_success_notice'); 
}

add_action( 'admin_init', 'ehf_process_settings_import' );

/**
 * Process reset plugin settings
 */
function ehf_remove_plugin_settings() {
	if( empty( $_POST['ehf_reset_action'] ) || 'ehf_reset_settings' != $_POST['ehf_reset_action'] )
		return;
	if( ! wp_verify_nonce( $_POST['ehf_reset_nonce'], 'ehf_reset_nonce' ) )
		return;
	if( ! current_user_can( 'manage_options' ) )
		return;
    $plugin_settings = 'rm_plugin_global_settings';
    delete_option( $plugin_settings );

    function ehf_settings_reset_success_notice(){
        echo '<div class="notice notice-success is-dismissible">
                 <p><strong>' . __( 'Success! Plugin Settings reset successfully.', 'remove-wp-meta-tags' ) . '</strong></p>
             </div>';
    }
    add_action('admin_notices', 'ehf_settings_reset_success_notice'); 
}

add_action( 'admin_init', 'ehf_remove_plugin_settings' );

?>