<?php
/**
 * Plugin Name: Easy Header Footer - Speedup, Security and Minify
 * Plugin URI: https://wordpress.org/plugins/remove-wp-meta-tags/
 * Description: It is a very lightweight plugin for customize wordpress header, add custom code and enable, disable or remove the unwanted meta tags and links from the source code.
 * Version: 3.2.1
 * Author: Sayan Datta
 * Author URI: https://sayandatta.com
 * License: GPLv3
 * Text Domain: remove-wp-meta-tags
 * Domain Path: /languages
 * 
 * Easy Header Footer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Easy Header Footer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Easy Header Footer. If not, see <http://www.gnu.org/licenses/>.
 *
 * @category Core
 * @package  Easy Header Footer
 * @author   Sayan Datta <hello@sayandatta.com>
 * @license  http://www.gnu.org/licenses/ GNU General Public License
 * @link     https://wordpress.org/plugins/remove-wp-meta-tags/
 */

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EHF_PLUGIN_VERSION', '3.2.1' );

// debug scripts
//define ( 'EHF_PLUGIN_ENABLE_DEBUG', 'true' );

// Internationalization
add_action( 'plugins_loaded', 'ehf_plugin_load_textdomain' );
/**
 * Load plugin textdomain.
 * 
 * @since 3.1.1
 */
function ehf_plugin_load_textdomain() {
    load_plugin_textdomain( 'remove-wp-meta-tags', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}

register_activation_hook( __FILE__, 'ehf_plugin_run_on_activation' );
register_deactivation_hook( __FILE__, 'ehf_plugin_run_on_deactivation' );

function ehf_plugin_run_on_activation() {
    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }
    set_transient( 'ehf-admin-notice-on-activation', true, 5 );
    flush_rewrite_rules();
}

function ehf_plugin_run_on_deactivation() {
    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }

    delete_option( 'ehf_plugin_dismiss_rating_notice' );
    delete_option( 'ehf_plugin_no_thanks_rating_notice' );
    delete_option( 'ehf_plugin_installed_time' );
}

function ehf_plugin_install_notice() { 
    if( get_transient( 'ehf-admin-notice-on-activation' ) ) { ?>
        <div class="notice notice-success">
            <p><strong><?php printf( __( 'Thanks for installing %1$s v%2$s plugin. Click <a href="%3$s">here</a> to configure plugin settings.', 'remove-wp-meta-tags' ), 'Easy Header Footer', EHF_PLUGIN_VERSION, admin_url( 'options-general.php?page=easy-header-footer' ) ); ?></strong></p>
        </div> <?php
        delete_transient( 'ehf-admin-notice-on-activation' );
    }
}

add_action( 'admin_notices', 'ehf_plugin_install_notice' ); 

// load admin styles
function ehf_custom_admin_styles_scripts() {
    $ver = EHF_PLUGIN_VERSION;
    if( defined( 'EHF_PLUGIN_ENABLE_DEBUG' ) ) {
        $ver = time();
    }

    $current_screen = get_current_screen();
    if ( strpos( $current_screen->base, 'easy-header-footer') !== false ) {
        wp_enqueue_style( 'ehf-admin', plugins_url( 'admin/assets/css/admin.min.css', __FILE__ ), array(), $ver );
        wp_enqueue_script( 'ehf-admin-js', plugins_url( 'admin/assets/js/admin.min.js', __FILE__ ), array(), $ver );
    }
}

add_action( 'admin_enqueue_scripts', 'ehf_custom_admin_styles_scripts' );

function ehf_ajax_save_admin_scripts() {
    if ( is_admin() ) { 
        // Embed the Script on our Plugin's Option Page Only
        if ( isset($_GET['page']) && $_GET['page'] == 'easy-header-footer' ) {
            wp_enqueue_script('jquery');
            wp_enqueue_script( 'jquery-form' );
        }
    }
}

add_action( 'admin_init', 'ehf_ajax_save_admin_scripts' );

add_action( 'wp_ajax_ehf_trigger_flush_rewrite_rules', 'ehf_trigger_flush_rewrite_rules' );

function ehf_trigger_flush_rewrite_rules() {
    flush_rewrite_rules();
}

require_once plugin_dir_path( __FILE__ ) . 'admin/loader.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/notice.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/donate.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/meta-box.php';

require_once plugin_dir_path( __FILE__ ) . 'includes/meta-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/disable-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/security-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/script-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/header-footer.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/minify-settings.php';

function ehf_add_action_links( $links ) {
    $rmlinks = array(
        '<a href="' . admin_url( 'options-general.php?page=easy-header-footer' ) . '">' . __( 'Settings', 'remove-wp-meta-tags' ) . '</a>',
    );
    return array_merge( $rmlinks, $links );
}

function ehf_plugin_meta_links( $links, $file ) {
	$plugin = plugin_basename(__FILE__);
	if ( $file == $plugin ) // only for this plugin
		return array_merge( $links, 
            array( '<a href="https://wordpress.org/support/plugin/remove-wp-meta-tags" target="_blank">' . __( 'Support', 'remove-wp-meta-tags'  ) . '</a>' ),
            array( '<a href="https://www.paypal.me/iamsayan/" target="_blank">' . __( 'Donate', 'remove-wp-meta-tags' ) . '</a>' )
		);
	return $links;
}

// add plugin action links
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ehf_add_action_links', 10, 2 );

// plugin row elements
add_filter( 'plugin_row_meta', 'ehf_plugin_meta_links', 10, 2 );

?>