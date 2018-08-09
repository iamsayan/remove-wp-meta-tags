<?php
/**
 * Runs on Uninstall of Ultimate WP Header Footer
 *
 * @package   Ultimate WP Header Footer wordpress plugin
 * @author    Sayan Datta
 * @license   http://www.gnu.org/licenses/gpl.html
 */

// Exit if accessed directly
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;

// Make sure that we are uninstalling
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

// Leave no trail
$plugin_option = 'rm_plugin_global_settings';

if ( !is_multisite() ) {
	
    delete_option( $plugin_option );

} else { 

	// This is a multisite
	//
	// @since 3.1.0
	
    global $wpdb;
	
    $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
    $original_blog_id = get_current_blog_id();
    foreach ( $blog_ids as $blog_id ) {
		
        switch_to_blog( $blog_id );
		delete_option( $plugin_option );
    }
    switch_to_blog( $original_blog_id );
}