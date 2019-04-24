<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

add_action( 'init', 'ehf_security_settings_output' );

function ehf_security_settings_output() {
    $options = get_option('rm_plugin_global_settings');

    // disable user enumeretion
    if( isset($options['rm_disable_user_enu_cb']) && ($options['rm_disable_user_enu_cb'] == 1) ) {
        if ( !is_user_logged_in() && !is_admin() ) {
            if( preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING']) ) {
                wp_safe_redirect( home_url(), 302 );
                exit;
            }
            add_filter( 'redirect_canonical', 'ehf_remove_author_from_redirects', 10, 2 );
        }
    }

    // enable no-sniff protection
    if( isset($options['rm_enable_no_sniff_cb']) && ($options['rm_enable_no_sniff_cb'] == 1) ) {
        add_action( 'send_headers', function() {
            header( 'X-Content-Type-Options: nosniff' );
        });
    }

    // enable xss
    if( isset($options['rm_enable_xss_cb']) && ($options['rm_enable_xss_cb'] == 1) ) {    
        add_action( 'send_headers', function() {
            header( 'X-XSS-Protection: 1; mode=block' );
        });
    }

    // unser x powered by
    if( isset($options['rm_disable_powered_by_cb']) && ($options['rm_disable_powered_by_cb'] == 1) ) {    
        add_action( 'send_headers', function() {
            header_remove( "X-Powered-By" );
        });
    }

    // enable iframe protection
    if( isset($options['rm_enable_xframe_cb']) && ($options['rm_enable_xframe_cb'] == 1) ) {
        add_action( 'send_headers', 'ehf_iframe_protection_header' );
    }

    // enable hsts
    if( isset($options['rm_enable_hsts_cb']) && ($options['rm_enable_hsts_cb'] == 1) ) {
        add_action( 'send_headers', 'ehf_enable_hsts_header' );
    }
}

function ehf_remove_author_from_redirects( $redirect, $request ) {
    if( !is_user_logged_in() && !is_admin() && preg_match( '/author=([0-9]*)/i', $request ) ) {
        wp_safe_redirect( home_url(), 302 );
        exit;
    }
    return $redirect;
}

function ehf_iframe_protection_header() {
    $options = get_option('rm_plugin_global_settings');
        
    if( isset($options['rm_enable_iframe_protec']) && ($options['rm_enable_iframe_protec'] == 'SAMEORIGIN') ) {
        $header = 'SAMEORIGIN';
    } elseif( isset($options['rm_enable_iframe_protec']) && ($options['rm_enable_iframe_protec'] == 'DENY') ) {
        $header = 'DENY';
    } elseif( isset($options['rm_enable_iframe_protec']) && ($options['rm_enable_iframe_protec'] == 'ALLOW-FROM') ) {
        $header = '"ALLOW-FROM ' . $options['rm_enable_iframe_protec_allow'] . '"';
    }
            
    if( isset( $header ) ) {
        header( 'X-Frame-Options: ' . $header );
    }
}

function ehf_enable_hsts_header() {
    $options = get_option('rm_plugin_global_settings');

    $expire_time = isset($options['rm_hsts_expire_time']) ? $options['rm_hsts_expire_time'] : '15552000';
    
    $hsts_directive = '';
    if( isset($options['rm_enable_hsts_directive']) && ($options['rm_enable_hsts_directive'] == 'default_preload') ) {
        $hsts_directive = '; preload';
    } elseif( isset($options['rm_enable_hsts_directive']) && ($options['rm_enable_hsts_directive'] == 'default_subdomains') ) {
        $hsts_directive = '; includeSubDomains';
    } elseif( isset($options['rm_enable_hsts_directive']) && ($options['rm_enable_hsts_directive'] == 'default_subdomains_preload') ) {
        $hsts_directive = '; includeSubDomains; preload';
    }
    
    if( isset( $expire_time ) || isset( $hsts_directive ) ) {
        header( 'Strict-Transport-Security: max-age=' . $expire_time . $hsts_directive );
    }
}

?>