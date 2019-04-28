<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

add_action( 'init', 'ehf_disable_output_settings' );

function ehf_disable_output_settings() {
    $options = get_option('rm_plugin_global_settings');
    global $wp_rewrite;

    //disable feed funtionality
    if( isset($options['rm_meta_feed_disable_cb']) && ($options['rm_meta_feed_disable_cb'] == 1) ) {
        remove_action( 'wp_head', 'feed_links', 2 );
	    remove_action( 'wp_head', 'feed_links_extra', 3 );
    
        $wp_rewrite->feeds = array();
    }

    //disable auto dns prefetch
    if( isset($options['rm_disable_auto_dns_cb']) && ($options['rm_disable_auto_dns_cb'] == 1) ) {
        add_filter( 'wp_resource_hints', 'ehf_remove_dns_prefetch', 10, 2 );
    }

    //XML-RPC disable
    if( isset($options['rm_meta_xml_rpc_cb']) && ($options['rm_meta_xml_rpc_cb'] == 1) ) {
        add_filter( 'xmlrpc_enabled', '__return_false' );
        // Disable X-Pingback HTTP Header.
        add_filter( 'wp_headers', function( $headers, $wp_query ) {
            if( isset( $headers['X-Pingback'] ) ) {
                // Drop X-Pingback
                unset( $headers['X-Pingback'] );
            }
            return $headers;
        }, 11, 2);
    
        // Hijack pingback_url for get_bloginfo (<link rel="pingback" />).
    	add_filter( 'bloginfo_url', function( $output, $property ) {
            //error_log( "====property=" . $property );
            return ( $property == 'pingback_url' ) ? null : $output;
        }, 11, 2);
    }

    //disable REST API info from head and headers
    if( isset($options['rm_disable_wpjson_restapi_cb']) && ($options['rm_disable_wpjson_restapi_cb'] == 1) ) {
        // Remove REST API info from head and headers
        remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
        remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
        remove_action( 'template_redirect', 'rest_output_link_header', 11 );
        // WordPress 4.7+ disables the REST API via authentication short-circuit.
        if( version_compare( get_bloginfo( 'version' ), '4.7', '>=' ) ) {
	        add_filter( 'rest_authentication_errors', 'ehf_disable_wp_rest_api' );
	    } else {
	        ehf_disable_wp_rest_api_legacy();
        }
    }
}

function ehf_remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}

function ehf_disable_wp_rest_api( $access ) {
	if ( !is_user_logged_in() ) {
		$message = apply_filters( 'ehf_disable_wp_rest_api_error', __( 'REST API restricted to only authenticated users.', 'remove-wp-meta-tags' ) );
		
		return new WP_Error( 'rest_access_denied', $message, array( 'status' => rest_authorization_required_code() ) );
	}
	return $access;
}

function ehf_disable_wp_rest_api_legacy() {
    // REST API 1.x
    add_filter( 'json_enabled', '__return_false' );
    add_filter( 'json_jsonp_enabled', '__return_false' );
	
    // REST API 2.x
    add_filter( 'rest_enabled', '__return_false' );
    add_filter( 'rest_jsonp_enabled', '__return_false' );
}

?>