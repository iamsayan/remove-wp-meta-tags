<?php

/**
 * The admin-facing functionality of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Admin
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

require_once plugin_dir_path( __FILE__ ) . 'settings/settings-loader.php';
require_once plugin_dir_path( __FILE__ ) . 'settings/settings-fields.php';
require_once plugin_dir_path( __FILE__ ) . 'settings/tools.php';

// add settings page
add_action( 'admin_init', 'ehf_plugin_register_settings' );
if( ! is_network_admin() ) {
    add_action( 'admin_menu', 'ehf_menu_item_options' );
}

function ehf_menu_item_options() {
    add_submenu_page( 'options-general.php', __( 'Easy Header Footer', 'remove-wp-meta-tags' ), __( 'Easy Header Footer', 'remove-wp-meta-tags' ), 'manage_options', 'easy-header-footer', 'ehf_show_page' ); 
}

function ehf_show_page() {
    require_once plugin_dir_path( __FILE__ ) . 'settings/settings-page.php';
}

function ehf_check_is_ssl() {
    if ( is_ssl() || ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) ) {
        return true;
    } else {
        return false;
    }
}