<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Ultimate WP Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

// disable user enumeretion
if( isset($options['rm_disable_user_enu_cb']) && ($options['rm_disable_user_enu_cb'] == 1) ) {
    if (!is_admin()) {
        if( preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING']) ) {
            add_filter( 'query_vars', 'rm_remove_author_from_query_vars' );
        }
        add_filter('redirect_canonical', 'rm_remove_author_from_redirects', 10, 2);
    }
    function rm_remove_author_from_redirects($redirect, $request) {
        if( !is_admin() && preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING']) ) {
            add_filter( 'query_vars', 'rm_remove_author_from_query_vars' );
        }
        return $redirect;
    }
    function rm_remove_author_from_query_vars( $query_vars ) {
        if( !is_admin() ) {
            foreach( array( 'author', 'author_name' ) as $var ) {
                $key = array_search( $var, $query_vars );
                if ( false !== $key ) {
                    unset( $query_vars[$key] );
                }
            }
        }
        return $query_vars;
    }
}

// enable iframe protection
if( isset($options['rm_enable_xframe_cb']) && ($options['rm_enable_xframe_cb'] == 1) ) {
    
    function rm_iframe_protection_header() {

        $options = get_option('rm_plugin_global_settings');
        if( isset($options['rm_enable_iframe_protec']) && ($options['rm_enable_iframe_protec'] == 'SAMEORIGIN') ) {
            $header = 'SAMEORIGIN';
        } elseif( isset($options['rm_enable_iframe_protec']) && ($options['rm_enable_iframe_protec'] == 'DENY') ) {
            $header = 'DENY';
        } elseif( isset($options['rm_enable_iframe_protec']) && ($options['rm_enable_iframe_protec'] == 'ALLOW-FROM') ) {
            $header = '"ALLOW-FROM ' . get_option('rm_plugin_global_settings')['rm_enable_iframe_protec_allow'] . '"';
        }
            
        if( isset($header) ) {
            header('X-Frame-Options: ' . $header);
        }
    }
add_action( 'send_headers', 'rm_iframe_protection_header' );
}

// enable no-sniff protection
if( isset($options['rm_enable_no_sniff_cb']) && ($options['rm_enable_no_sniff_cb'] == 1) ) {
    function rm_send_nosniff_header() {
    header('X-Content-Type-Options: nosniff');
}
add_action( 'send_headers', 'rm_send_nosniff_header' );
}

// enable xss
if( isset($options['rm_enable_xss_cb']) && ($options['rm_enable_xss_cb'] == 1) ) {    
    function rm_enable_xss_res_header() {
    header('X-XSS-Protection: 1; mode=block');
}
add_action( 'send_headers', 'rm_enable_xss_res_header' );
}

// unser x powered by
if( isset($options['rm_disable_powered_by_cb']) && ($options['rm_disable_powered_by_cb'] == 1) ) {    
    function rm_xpwb_header() {
        header_remove("X-Powered-By");
    }
    add_action( 'send_headers', 'rm_xpwb_header' );
}

// enable hsts
if( isset($options['rm_enable_hsts_cb']) && ($options['rm_enable_hsts_cb'] == 1) ) {

    function rm_enable_hsts_header() {
    
        $options = get_option('rm_plugin_global_settings');

        if( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == '1 month') ) {
            $expire_time = '2592000';
        } elseif( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == '2 months') ) {
            $expire_time = '5184000';
        } elseif( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == '3 months') ) {
            $expire_time = '7776000';
        } elseif( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == '4 months') ) {
            $expire_time = '10368000';
        } elseif( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == '5 months') ) {
            $expire_time = '12960000';
        } elseif( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == '6 months') ) {
            $expire_time = '15552000';
        } elseif( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == '12 months') ) {
            $expire_time = '31536000';
        }

        if( isset($options['rm_enable_hsts_directive']) && ($options['rm_enable_hsts_directive'] == 'max-age=EXPIRES_SECONDS; preload') ) {
            $hsts_directive = '; preload';
        } elseif( isset($options['rm_enable_hsts_directive']) && ($options['rm_enable_hsts_directive'] == 'max-age=EXPIRES_SECONDS; includeSubDomains') ) {
            $hsts_directive = '; includeSubDomains';
        } elseif( isset($options['rm_enable_hsts_directive']) && ($options['rm_enable_hsts_directive'] == 'max-age=EXPIRES_SECONDS; includeSubDomains; preload') ) {
            $hsts_directive = '; includeSubDomains; preload';
        } else {
            $hsts_directive = '';
        }

        if( isset( $expire_time ) || isset( $hsts_directive ) ) {
            header('Strict-Transport-Security: max-age=' . $expire_time . $hsts_directive);
        }
    }
    
    add_action( 'send_headers', 'rm_enable_hsts_header' );
}



?>