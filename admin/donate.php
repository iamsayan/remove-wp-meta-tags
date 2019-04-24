<?php

/**
 * The admin-facing functionality of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Admin
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

add_action( 'admin_notices', 'ehf_donate_admin_notice' );
add_action( 'admin_init', 'ehf_dismiss_donate_admin_notice' );

function ehf_donate_admin_notice() {
    // Show notice after 240 hours (10 days) from installed time.
    if ( ehf_plugin_installed_time_donate() > strtotime( '-360 hours' )
        || '1' === get_option( 'ehf_plugin_dismiss_donate_notice' )
        || ! current_user_can( 'manage_options' )
        || apply_filters( 'ehf_plugin_show_sticky_donate_notice', false ) ) {
        return;
    }

    $dismiss = wp_nonce_url( add_query_arg( 'ehf_donate_notice_action', 'dismiss_donate_true' ), 'ehf_dismiss_donate_true' ); 
    $no_thanks = wp_nonce_url( add_query_arg( 'ehf_donate_notice_action', 'no_thanks_donate_true' ), 'ehf_no_thanks_donate_true' ); ?>
    
    <div class="notice notice-success">
        <p><?php _e( 'Hey, I noticed you\'ve been using Easy Header Footer for more than 2 week – that’s awesome! If you like Easy Header Footer and you are satisfied with the plugin, isn’t that worth a coffee or two? Please consider donating. Donations help me to continue support and development of this free plugin! Thank you very much!', 'remove-wp-meta-tags' ); ?></p>
        <p><a href="https://www.paypal.me/iamsayan" target="_blank" class="button button-secondary"><?php _e( 'Donate Now', 'remove-wp-meta-tags' ); ?></a>&nbsp;
        <a href="<?php echo $dismiss; ?>" class="already-did"><strong><?php _e( 'I already donated', 'remove-wp-meta-tags' ); ?></strong></a>&nbsp;<strong>|</strong>
        <a href="<?php echo $no_thanks; ?>" class="later"><strong><?php _e( 'Nope&#44; maybe later', 'remove-wp-meta-tags' ); ?></strong></a></p>
    </div>
<?php
}

function ehf_dismiss_donate_admin_notice() {

    if( get_option( 'ehf_plugin_no_thanks_donate_notice' ) === '1' ) {
        if ( get_option( 'ehf_plugin_dismissed_time_donate' ) > strtotime( '-360 hours' ) ) {
            return;
        }
        delete_option( 'ehf_plugin_dismiss_donate_notice' );
        delete_option( 'ehf_plugin_no_thanks_donate_notice' );
    }

    if ( ! isset( $_GET['ehf_donate_notice_action'] ) ) {
        return;
    }

    if ( 'dismiss_donate_true' === $_GET['ehf_donate_notice_action'] ) {
        check_admin_referer( 'ehf_dismiss_donate_true' );
        update_option( 'ehf_plugin_dismiss_donate_notice', '1' );
    }

    if ( 'no_thanks_donate_true' === $_GET['ehf_donate_notice_action'] ) {
        check_admin_referer( 'ehf_no_thanks_donate_true' );
        update_option( 'ehf_plugin_no_thanks_donate_notice', '1' );
        update_option( 'ehf_plugin_dismiss_donate_notice', '1' );
        update_option( 'ehf_plugin_dismissed_time_donate', time() );
    }

    wp_redirect( remove_query_arg( 'ehf_donate_notice_action' ) );
    exit;
}

function ehf_plugin_installed_time_donate() {
    $installed_time = get_option( 'ehf_plugin_installed_time_donate' );
    if ( ! $installed_time ) {
        $installed_time = time();
        update_option( 'ehf_plugin_installed_time_donate', $installed_time );
    }
    return $installed_time;
}