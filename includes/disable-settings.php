<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Ultimate WP Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

//disable feed funtionality
if( isset($options['rm_meta_feed_disable_cb']) && ($options['rm_meta_feed_disable_cb'] == 1) ) {
	function rm_disable_feed_meta() {
       wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
       //wp_safe_redirect( home_url() ); exit;
    }
    add_action('do_feed', 'rm_disable_feed_meta', 1);
    add_action('do_feed_rdf', 'rm_disable_feed_meta', 1);
    add_action('do_feed_rss', 'rm_disable_feed_meta', 1);
    add_action('do_feed_rss2', 'rm_disable_feed_meta', 1);
    add_action('do_feed_atom', 'rm_disable_feed_meta', 1);
    add_action('do_feed_rss2_comments', 'rm_disable_feed_meta', 1);
    add_action('do_feed_atom_comments', 'rm_disable_feed_meta', 1);
}

//disable auto dns prefetch
if( isset($options['rm_disable_auto_dns_cb']) && ($options['rm_disable_auto_dns_cb'] == 1) ) {
    function rm_remove_dns_prefetch( $hints, $relation_type ) {
        if ( 'dns-prefetch' === $relation_type ) {
            return array_diff( wp_dependencies_unique_hosts(), $hints );
        }
        return $hints;
    }
    add_filter( 'wp_resource_hints', 'rm_remove_dns_prefetch', 10, 2 );    
}

//XML-RPC disable
if( isset($options['rm_meta_xml_rpc_cb']) && ($options['rm_meta_xml_rpc_cb'] == 1) ) {
    add_filter( 'xmlrpc_enabled', '__return_false' );
    // Disable X-Pingback HTTP Header.
    add_filter('wp_headers', function($headers, $wp_query){
        if(isset($headers['X-Pingback'])){
            // Drop X-Pingback
            unset($headers['X-Pingback']);
        }
        return $headers;
    }, 11, 2);

    // Hijack pingback_url for get_bloginfo (<link rel="pingback" />).
	add_filter('bloginfo_url', function($output, $property){
        error_log("====property=" . $property);
        return ($property == 'pingback_url') ? null : $output;
        }, 11, 2);
}

//disable REST API info from head and headers
if( isset($options['rm_disable_wpjson_restapi_cb']) && ($options['rm_disable_wpjson_restapi_cb'] == 1) ) {
    // Filters for WP-API version 1.x
    add_filter( 'json_enabled', '__return_false' );
    add_filter( 'json_jsonp_enabled', '__return_false' );

    // Filters for WP-API version 2.x
    add_filter( 'rest_enabled', '__return_false' );
    add_filter( 'rest_jsonp_enabled', '__return_false' );

    // Remove REST API info from head and headers
    remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'template_redirect', 'rest_output_link_header', 11 );
    remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
    remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
    remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
    remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
    remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
    remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
    
    // Switching off Embeds mixed up with REST API
    remove_action( 'rest_api_init', 'wp_oembed_register_route');
    remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

}

//disable yoast seo schema output
if( isset($options['rm_yoast_schema_output_cb']) && ($options['rm_yoast_schema_output_cb'] == 1) ) {
    add_filter('wpseo_json_ld_output', '__return_false');    
}

?>