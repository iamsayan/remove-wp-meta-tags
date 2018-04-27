<?php
/*
Plugin Name: WP Header & Meta Tags
Plugin URI: https://wordpress.org/plugins/remove-wp-meta-tags/
Description: It is a very lightweight plugin for customize wordpress header, add custom code and enable, disable or remove the unwanted meta tags and links from the source code.
Version: 3.0.1
Author: Sayan Datta
Author URI: https://profiles.wordpress.org/infosatech/
License: GPLv3
Text Domain: remove-wp-meta-tags
*/

/*  This plugin helps to add anything as WordPress Page Extention.

    Copyright 2018 Sayan Datta

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
*/

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// load admin styles
function rm_custom_admin_styles_scripts() {

    $current_screen = get_current_screen();

    if ( strpos($current_screen->base, 'wp-header-meta-tags') === false) {
        return;
    } else {
    wp_enqueue_style( 'rm-plugin-admin-style', plugins_url( 'css/admin-style.css', __FILE__ ) );
    wp_enqueue_style( 'rm-cb-style', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_script( 'rm-custom-script', plugins_url( 'js/main.js', __FILE__ ) );
    }
}

add_action( 'admin_enqueue_scripts', 'rm_custom_admin_styles_scripts' );


function rm_plug_settings_page() {

    add_settings_section("rm_remove_section", "Remove Settings<hr>", null, "rm_remove");
    
    add_settings_field("rm_meta_generator_cb", "<label for='gen'>Remove Generator Tag:</label>", "rm_meta_generator_cb_display", "rm_remove", "rm_remove_section");  
    add_settings_field("rm_meta_wpmanifest_cb", "<label for='manifest'>Remove WP Manifest:</label>", "rm_meta_wpmanifest_cb_display", "rm_remove", "rm_remove_section");
    add_settings_field("rm_meta_feed_cb", "<label for='feed'>Remove Feed Path:</label>", "rm_meta_feed_cb_display", "rm_remove", "rm_remove_section");
    add_settings_field("rm_meta_rsd_cb", "<label for='rsd'>Remove RSD Links:</label>", "rm_meta_rsd_cb_display", "rm_remove", "rm_remove_section");
    add_settings_field("rm_meta_short_links_cb", "<label for='short'>Remove Shortlinks:</label>", "rm_meta_short_links_cb_display", "rm_remove", "rm_remove_section");
    add_settings_field("rm_posts_rel_link_wp_head_cb", "<label for='rel'>Remove Adjacent Links:</label>", "rm_posts_rel_link_wp_head_cb_display", "rm_remove", "rm_remove_section");
    
    
    add_settings_section("rm_disable_section", "<label for='test'>Disable Settings<hr>", null, "rm_disable");
    
    add_settings_field("rm_meta_feed_disable_cb", "<label for='feed-disable'>Disable WP Feed Fuctionality:</label>", "rm_meta_feed_disable_cb_display", "rm_disable", "rm_disable_section");  
    add_settings_field("rm_meta_xml_rpc_cb", "<label for='xml-rpc'>Disable XML-RPC Fuctionality:</label>", "rm_meta_xml_rpc_cb_display", "rm_disable", "rm_disable_section");  
    add_settings_field("rm_disable_wpjson_restapi_cb", "<label for='rest-api'>Disable WP Json and Rest API:</label>", "rm_disable_wpjson_restapi_cb_display", "rm_disable", "rm_disable_section");  
    
    
    add_settings_section("rm_security_section", "Security Settings<hr>", null, "rm_security");
    
    add_settings_field("rm_disable_user_enu_cb", "<label for='disable-enu'>Disable User Enumeration:</label>", "rm_disable_user_enu_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_enable_iframe_protec_cb", "<label for='iframe'>Enable iFrame Protection:</label>", "rm_enable_iframe_protec_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_enable_no_sniff_cb", "<label for='no-sniff'>Enable No-Sniff Header:</label>", "rm_enable_no_sniff_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_enable_xss_cb", "<label for='xss'>Enable XSS-Protection Header:</label>", "rm_enable_xss_cb_display", "rm_security", "rm_security_section");  


    add_settings_section("rm_extra_section", "Extra Settings<hr>", null, "rm_extra");
    
    add_settings_field("rm_ver_remove_style_cb", "<label for='stylesheet-css'>Remove Version from Stylesheet:</label>", "rm_ver_remove_style_cb_display", "rm_extra", "rm_extra_section");  
    add_settings_field("rm_ver_remove_script_cb", "<label for='script-js'>Remove Version from Script:</label>", "rm_ver_remove_script_cb_display", "rm_extra", "rm_extra_section");  
    add_settings_field("rm_ver_remove_script_exclude_css", "<label for='exclude-css-js'>Enter Stylesheet/Script file names:</label>", "rm_ver_remove_script_exclude_css_display", "rm_extra", "rm_extra_section");  
    

    add_settings_section("rm_header_footer_section", "Header & Footer<hr>", null, "rm_header_footer");

    add_settings_field("rm_custom_header_ta", "<label for='header-element'>Enter Custom Code to Header:</label>", "rm_custom_header_ta_display", "rm_header_footer", "rm_header_footer_section");  
    add_settings_field("rm_custom_footer_ta", "<label for='footer-element'>Enter Custom Code to Footer:</label>", "rm_custom_footer_ta_display", "rm_header_footer", "rm_header_footer_section");  
    
    
    register_setting("rm_plugin_section", "rm_plugin_global_settings");

}

/*
============

remove options

============
*/

function rm_meta_generator_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="gen" name="rm_plugin_global_settings[rm_meta_generator_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_generator_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to hide your wordpress version."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}

function rm_meta_wpmanifest_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="manifest" name="rm_plugin_global_settings[rm_meta_wpmanifest_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_wpmanifest_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to hide manifest output of your wordpress website."><span title="" class="dashicons dashicons-editor-help"></span></span>
        
   <?php
}

function rm_meta_feed_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="feed" name="rm_plugin_global_settings[rm_meta_feed_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_feed_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove feed output from your wordpress website. It will just disable output. To disable feed completely go to 'Remove Settings' tab."><span title="" class="dashicons dashicons-editor-help"></span></span>
        
   <?php
}

function rm_meta_rsd_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="rsd" name="rm_plugin_global_settings[rm_meta_rsd_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_rsd_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove feed output from your wordpress website."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}

function rm_meta_short_links_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="short" name="rm_plugin_global_settings[rm_meta_short_links_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_short_links_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove all shortlinks from your wordpress website."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}

function rm_posts_rel_link_wp_head_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="rel" name="rm_plugin_global_settings[rm_posts_rel_link_wp_head_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_posts_rel_link_wp_head_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove adjacent / previous and next post links from wordpress website's code."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}
/*
============

disable options

============
*/
function rm_meta_feed_disable_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="feed-disable" name="rm_plugin_global_settings[rm_meta_feed_disable_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_feed_disable_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress feed functionality completely."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}


function rm_meta_xml_rpc_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="xml-rpc" name="rm_plugin_global_settings[rm_meta_xml_rpc_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_xml_rpc_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress xml-rpc functionality completely."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}

function rm_disable_wpjson_restapi_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="rest-api" name="rm_plugin_global_settings[rm_disable_wpjson_restapi_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_disable_wpjson_restapi_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress wpjson, restapi functionality completely. It is not recomended. If enabled, plgins like Jetpack do not work."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}

/*
============

security options

============
*/

function rm_disable_user_enu_cb_display() {
    ?>
         
         <label class="switch">
         <input type="checkbox" id="enu" name="rm_plugin_global_settings[rm_disable_user_enu_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_disable_user_enu_cb'])); ?> /> 
         <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to stop users enumeration. It prevents hackers from getting wordpress usernames."><span title="" class="dashicons dashicons-editor-help"></span></span>
 
    <?php
}

function rm_enable_iframe_protec_cb_display() {
    ?>
         
         <label class="switch">
         <input type="checkbox" id="iframe" name="rm_plugin_global_settings[rm_enable_iframe_protec_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_enable_iframe_protec_cb'])); ?> /> 
         <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to stop other sites from displaying your content in a frame or iframe."><span title="" class="dashicons dashicons-editor-help"></span></span>
 
    <?php
}

function rm_enable_no_sniff_cb_display() {
    ?>
         
         <label class="switch">
         <input type="checkbox" id="no-sniff" name="rm_plugin_global_settings[rm_enable_no_sniff_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_enable_no_sniff_cb]'])); ?> /> 
         <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to send the 'X-Content-Type-Options: nosniff' header to prevent Internet Explorer and Google Chrome from MIME-sniffing away from the declared Content-Type."><span title="" class="dashicons dashicons-editor-help"></span></span>
 
    <?php
}

 function rm_enable_xss_cb_display() {
    ?>
         
         <label class="switch">
         <input type="checkbox" id="xss" name="rm_plugin_global_settings[rm_enable_xss_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_enable_xss_cb'])); ?> /> 
         <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to send the 'X-XSS-Protection' header to prevent Internet Explorer and Google Chrome from page loading when they detect reflected cross-site scripting (XSS) attacks."><span title="" class="dashicons dashicons-editor-help"></span></span>
 
    <?php
}

/*
============

extra options

============
*/

function rm_ver_remove_style_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="stylesheet-css" name="rm_plugin_global_settings[rm_ver_remove_style_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_ver_remove_style_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want remove version from stylesheets."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}

function rm_ver_remove_script_cb_display() {
   ?>
        
        <label class="switch">
        <input type="checkbox" id="script-js" name="rm_plugin_global_settings[rm_ver_remove_script_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_ver_remove_script_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove version from scripts."><span title="" class="dashicons dashicons-editor-help"></span></span>

   <?php
}

function rm_ver_remove_script_exclude_css_display() {
    ?>
    <textarea id="exclude-css-js" placeholder="Enter comma separated list of file names (Stylesheet/Script files) to exclude them from version removal process. Version info will be kept for these files." name="rm_plugin_global_settings[rm_ver_remove_script_exclude_css]" rows="7" cols="60" style="resize:none;"><?php if (isset(get_option('rm_plugin_global_settings')['rm_ver_remove_script_exclude_css'])) { echo get_option('rm_plugin_global_settings')['rm_ver_remove_script_exclude_css']; } ?></textarea>
    &nbsp;&nbsp;<span class="tooltip" title="Enter comma separated list of file names (Stylesheet/Script files) to exclude them from version removal process. Version info will be kept for these files."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

/*
============

header and footer

============
*/

function rm_custom_header_ta_display() {
    ?>
    <textarea id="header-element" placeholder="Enter Custom Code to Header." name="rm_plugin_global_settings[rm_custom_header_ta]" rows="7" cols="90"><?php if (isset(get_option('rm_plugin_global_settings')['rm_custom_header_ta'])) { echo get_option('rm_plugin_global_settings')['rm_custom_header_ta']; } ?></textarea>
    &nbsp;&nbsp;<span class="tooltip" title="Enter Custom Code to Header."><span title="" class="dashicons dashicons-editor-help"></span></span><br>These snippets will be printed in the &lt;head&gt; section.
    <?php
}

function rm_custom_footer_ta_display() {
    ?>
    <textarea id="footer-element" placeholder="Enter Custom Code to Footer." name="rm_plugin_global_settings[rm_custom_footer_ta]" rows="7" cols="90"><?php if (isset(get_option('rm_plugin_global_settings')['rm_custom_footer_ta'])) { echo get_option('rm_plugin_global_settings')['rm_custom_footer_ta']; } ?></textarea>
    &nbsp;&nbsp;<span class="tooltip" title="Enter Custom Code to Footer."><span title="" class="dashicons dashicons-editor-help"></span></span><br>These snippets will be printed above the &lt;/body&gt; tag.
    <?php
}


// add settings page
add_action("admin_init", "rm_plug_settings_page");


// page elements
function rw_show_page() {
  
?>

<div class="wrap">

    <h1> WP Header & Meta Tags Settings </h1>
		<div class="rwmt-about-text">
        Customize wordpress header, add custom code and enable, disable or remove the unwanted meta tags and links very easily.
		</div><hr>
 
        <h2 class="nav-tab-wrapper">
            <a href="#remove" class="nav-tab" id="btn1">Remove Settings</a>
            <a href="#disable" class="nav-tab" id="btn2">Disable Settings</a>
            <a href="#security" class="nav-tab" id="btn3">Security Settings</a>
            <a href="#extra" class="nav-tab" id="btn4">Extra Settings</a>
            <a href="#header-footer" class="nav-tab" id="btn5">Header & Footer</a>
        </h2>

    <div id="form_area">

        <form id="form" method="post" action="options.php">

        <?php settings_fields("rm_plugin_section"); ?>

            <div id="plugin-remove"> <?php
            
                do_settings_sections("rm_remove");
                submit_button('Save All Settings');
            
            ?> </div>

            <div style="display:none" id="plugin-disable"> <?php
                 
                do_settings_sections("rm_disable");
                submit_button('Save All Settings');

            ?> </div>

            <div style="display:none" id="plugin-security"> <?php

                do_settings_sections("rm_security");
                submit_button('Save All Settings');
               
            ?> </div>

            <div style="display:none" id="plugin-extra"> <?php

                do_settings_sections("rm_extra");
                submit_button('Save All Settings');
   
            ?> </div>

            <div style="display:none" id="plugin-header-footer"> <?php

            do_settings_sections("rm_header_footer");
            submit_button('Save All Settings');

            ?> </div>
    
        </form>
        
    </div>

    <p>Thanks for using this plugin. If you like this plugin, please <a href="https://wordpress.org/plugins/remove-wp-meta-tags/#reviews" target="_blank">rate</a> (&#9733;&#9733;&#9733;&#9733;&#9733;) this plugin. Thank you!</p>
</div>

   <?php
}

// add menu options
function rm_menu_item() {

  add_submenu_page("options-general.php", "WP Header and Meta Tags", "Header & Meta Tags", "manage_options", "wp-header-meta-tags", "rw_show_page"); 

}
 
add_action("admin_menu", "rm_menu_item");



$options = get_option('rm_plugin_global_settings');
if( isset($options['rm_ver_remove_script_exclude_css']) ) {
    $exclude_file_list = $options['rm_ver_remove_script_exclude_css'];
} else {
    $exclude_file_list = '';
}
$exclude_files_arr = array_map('trim', explode(',', $exclude_file_list));

    //WP generator meta tag removal
if( isset($options['rm_meta_generator_cb']) && ($options['rm_meta_generator_cb'] == 1) ) {
	function rm_remove_version_meta() {
        return '';
    }
    add_filter('the_generator', 'rm_remove_version_meta');
}

    //WP manifest link removal
if( isset($options['rm_meta_wpmanifest_cb']) && ($options['rm_meta_wpmanifest_cb'] == 1) ) {
    remove_action('wp_head', 'wlwmanifest_link');
}

    //feed links removal
if( isset($options['rm_meta_feed_cb']) && ($options['rm_meta_feed_cb'] == 1) ) {
    remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
}

    //disable feed funtionality
if( isset($options['rm_meta_feed_disable_cb']) && ($options['rm_meta_feed_disable_cb'] == 1) ) {
	function rm_disable_feed_meta() {
       wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
    }
    add_action('do_feed', 'rm_disable_feed_meta', 1);
    add_action('do_feed_rdf', 'rm_disable_feed_meta', 1);
    add_action('do_feed_rss', 'rm_disable_feed_meta', 1);
    add_action('do_feed_rss2', 'rm_disable_feed_meta', 1);
    add_action('do_feed_atom', 'rm_disable_feed_meta', 1);
    add_action('do_feed_rss2_comments', 'rm_disable_feed_meta', 1);
    add_action('do_feed_atom_comments', 'rm_disable_feed_meta', 1);
}

    //XML-RPC removal
if( isset($options['rm_meta_xml_rpc_cb']) && ($options['rm_meta_xml_rpc_cb'] == 1) ) {
    add_filter( 'xmlrpc_enabled', '__return_false' );
    add_filter('wp_headers', function($headers, $wp_query){
        if (array_key_exists('X-Pingback', $headers)) {
            unset($headers['X-Pingback']);
        }
        return $headers;
        }, 11, 2);
    
	add_filter('bloginfo_url', function($output, $property){
        error_log("====property=" . $property);
        return ($property == 'pingback_url') ? null : $output;
        }, 11, 2);
}

    //rsd link removal
if( isset($options['rm_meta_rsd_cb']) && ($options['rm_meta_rsd_cb'] == 1) ) {
    add_action('wp', function(){
        remove_action('wp_head', 'rsd_link');
    }, 11);
}

    //shortlink removal
if( isset($options['rm_meta_short_links_cb']) && ($options['rm_meta_short_links_cb'] == 1) ) {
    remove_action( 'wp_head', 'wp_shortlink_wp_head');
}

    //Remove Previous and next Article Links
if( isset($options['rm_posts_rel_link_wp_head_cb']) && ($options['rm_posts_rel_link_wp_head_cb'] == 1) ) {
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
}

    //Remove REST API info from head and headers
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

    //remove wp version param from any enqueued scripts

function rm_hide_wordpress_version_in_script( $target_url ) {
    $filename_arr = explode('?', basename($target_url));
    $filename = $filename_arr[0];
    global $exclude_files_arr, $exclude_file_list;
    // first check the list of user defined excluded CSS/JS files
    if (!in_array(trim($filename), $exclude_files_arr)) {
        /* check if "ver=" argument exists in the url or not */
        if(strpos( $target_url, 'ver=' )) {
            $target_url = remove_query_arg( 'ver', $target_url );
        }
    }
    return $target_url;
}

/**
 * Priority set to 20000. Higher numbers correspond with later execution.
 * Hook into the style loader and remove the version information.
 */
 
if( isset($options['rm_ver_remove_style_cb']) && ($options['rm_ver_remove_style_cb'] == 1) ) {
add_filter('style_loader_src', 'rm_hide_wordpress_version_in_script', 20000);
}

/**
 * Hook into the script loader and remove the version information.
 */
 
if( isset($options['rm_ver_remove_script_cb']) && ($options['rm_ver_remove_script_cb'] == 1) ) {
add_filter('script_loader_src', 'rm_hide_wordpress_version_in_script', 20000);
}

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
if( isset($options['rm_enable_iframe_protec_cb']) && ($options['rm_enable_iframe_protec_cb'] == 1) ) {
    function rm_iframe_protection_header() {
    header('X-Frame-Options: SAMEORIGIN');
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


add_action('wp_head', 'rm_custom_header_code', 10);

function rm_custom_header_code() {
  echo get_option('rm_plugin_global_settings')['rm_custom_header_ta'];
}

add_action('wp_footer', 'rm_custom_footer_code', 10);

function rm_custom_footer_code() {
  echo get_option('rm_plugin_global_settings')['rm_custom_footer_ta'];
}


add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'rm_add_action_links' );

function rm_add_action_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'options-general.php?page=wp-header-meta-tags' ) . '">Settings</a>',
 );
return array_merge( $links, $mylinks );
}


?>