<?php
/*
Plugin Name: WP Header & Meta Tags
Plugin URI: https://wordpress.org/plugins/remove-wp-meta-tags/
Description: It is a very lightweight plugin for customize wordpress header, add custom code and enable, disable or remove the unwanted meta tags and links from the source code.
Version: 3.0.3
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
    wp_enqueue_style( 'rm-plugin-admin-style', plugins_url( 'css/admin-style.min.css', __FILE__ ) );
    wp_enqueue_style( 'rm-cb-style', plugins_url( 'css/style.min.css', __FILE__ ) );
    wp_enqueue_script( 'rm-custom-script', plugins_url( 'js/main.min.js', __FILE__ ) );
    }
}

add_action( 'admin_enqueue_scripts', 'rm_custom_admin_styles_scripts' );


function rm_plug_settings_page() {

    add_settings_section("rm_remove_section", "Meta Options<p><hr></p>", null, "rm_remove");
    
    add_settings_field("rm_meta_generator_cb", "<label for='gen'>Remove Generator Meta Tag</label>", "rm_meta_generator_cb_display", "rm_remove", "rm_remove_section");  
    add_settings_field("rm_meta_wpmanifest_cb", "<label for='manifest'>Remove WP Manifest Meta</label>", "rm_meta_wpmanifest_cb_display", "rm_remove", "rm_remove_section");
    add_settings_field("rm_meta_feed_cb", "<label for='feed'>Remove All Feed Links</label>", "rm_meta_feed_cb_display", "rm_remove", "rm_remove_section");
    add_settings_field("rm_meta_rsd_cb", "<label for='rsd'>Remove All RSD Links Meta</label>", "rm_meta_rsd_cb_display", "rm_remove", "rm_remove_section");
    add_settings_field("rm_meta_short_links_cb", "<label for='short'>Remove Shortlinks Meta</label>", "rm_meta_short_links_cb_display", "rm_remove", "rm_remove_section");
    add_settings_field("rm_posts_rel_link_wp_head_cb", "<label for='rel'>Remove Adjacent Links Meta</label>", "rm_posts_rel_link_wp_head_cb_display", "rm_remove", "rm_remove_section");
    
    
    add_settings_section("rm_disable_section", "Disable Options<p><hr></p>", null, "rm_disable");
    
    add_settings_field("rm_meta_feed_disable_cb", "<label for='feed-disable'>Disable WP Feed Fuctionality</label>", "rm_meta_feed_disable_cb_display", "rm_disable", "rm_disable_section");  
    add_settings_field("rm_meta_xml_rpc_cb", "<label for='xml-rpc'>Disable XML-RPC Fuctionality</label>", "rm_meta_xml_rpc_cb_display", "rm_disable", "rm_disable_section");  
    add_settings_field("rm_disable_wpjson_restapi_cb", "<label for='rest-api'>Disable WP JSON and Rest API</label>", "rm_disable_wpjson_restapi_cb_display", "rm_disable", "rm_disable_section");  
    add_settings_field("rm_yoast_schema_output_cb", "<label for='schema'>Disable Yoast Schema Output</label>", "rm_yoast_schema_output_cb_display", "rm_disable", "rm_disable_section");
    
    
    add_settings_section("rm_security_section", "Security Options<p><hr></p>", null, "rm_security");
    
    add_settings_field("rm_disable_user_enu_cb", "<label for='disable-enu'>Disable User Enumeration</label>", "rm_disable_user_enu_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_enable_iframe_protec_cb", "<label for='iframe'>Enable iFrame Protection</label>", "rm_enable_iframe_protec_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_enable_no_sniff_cb", "<label for='no-sniff'>Enable No-Sniff Header</label>", "rm_enable_no_sniff_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_enable_xss_cb", "<label for='xss'>Enable XSS-Protection Header</label>", "rm_enable_xss_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_enable_hsts_cb", "<label for='hsts'>Enable HSTS Header</label>", "rm_enable_hsts_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_hsts_expire_time", "<label for='ex-time'>Set HSTS Expire Time</label>", "rm_hsts_expire_time_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_enable_preload_cb", "<label for='preload'>Enable Preload</label>", "rm_enable_preload_cb_display", "rm_security", "rm_security_section");  
    add_settings_field("rm_include_subdomains_cb", "<label for='subdomain'>Include Subdomains</label>", "rm_include_subdomains_cb_display", "rm_security", "rm_security_section");  
    

    add_settings_section("rm_other_section", "Other Options<p><hr></p>", null, "rm_other");
    
    add_settings_field("rm_ver_remove_style_cb", "<label for='stylesheet-css'>Remove Version from Stylesheet</label>", "rm_ver_remove_style_cb_display", "rm_other", "rm_other_section");  
    add_settings_field("rm_ver_remove_script_cb", "<label for='script-js'>Remove Version from Script</label>", "rm_ver_remove_script_cb_display", "rm_other", "rm_other_section");  
    add_settings_field("rm_ver_remove_script_exclude_css", "<label for='exclude-css-js'>Enter Stylesheet/Script file names</label>", "rm_ver_remove_script_exclude_css_display", "rm_other", "rm_other_section");  
    

    add_settings_section("rm_header_footer_section", "Header & Footer<p><hr></p>", null, "rm_header_footer");

    add_settings_field("rm_custom_header_ta", "<label for='header-element'>Custom Code for WP Header</label>", "rm_custom_header_ta_display", "rm_header_footer", "rm_header_footer_section");  
    add_settings_field("rm_custom_footer_ta", "<label for='footer-element'>Custom Code for WP Footer</label>", "rm_custom_footer_ta_display", "rm_header_footer", "rm_header_footer_section");  
    
    
    register_setting("rm_plugin_section", "rm_plugin_global_settings");

}

/*==============================================================================
                                  meta options
=============================================================================*/
function rm_meta_generator_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="gen" name="rm_plugin_global_settings[rm_meta_generator_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_generator_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to hide your wordpress version."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_wpmanifest_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="manifest" name="rm_plugin_global_settings[rm_meta_wpmanifest_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_wpmanifest_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to hide manifest output of your wordpress website."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_feed_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="feed" name="rm_plugin_global_settings[rm_meta_feed_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_feed_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove feed output from your wordpress website. It will just remove output. To disable feed completely go to 'Disable Options' tab."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_rsd_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="rsd" name="rm_plugin_global_settings[rm_meta_rsd_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_rsd_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove really simple discovery (rsd) output in wordpress head."><span title="" class="dashicons dashicons-editor-help"></span></span>
   <?php
}

function rm_meta_short_links_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="short" name="rm_plugin_global_settings[rm_meta_short_links_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_short_links_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove all shortlinks from your wordpress website."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_posts_rel_link_wp_head_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="rel" name="rm_plugin_global_settings[rm_posts_rel_link_wp_head_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_posts_rel_link_wp_head_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove adjacent / previous and next post links from wordpress website's code."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}
/*==============================================================================
                                   disable options
=============================================================================*/
function rm_meta_feed_disable_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="feed-disable" name="rm_plugin_global_settings[rm_meta_feed_disable_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_feed_disable_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress feed functionality completely."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_xml_rpc_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="xml-rpc" name="rm_plugin_global_settings[rm_meta_xml_rpc_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_meta_xml_rpc_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress xml-rpc functionality completely."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_disable_wpjson_restapi_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="rest-api" name="rm_plugin_global_settings[rm_disable_wpjson_restapi_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_disable_wpjson_restapi_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress wpjson, restapi functionality completely. It is not recomended. If enabled, plugin like Jetpack does't work."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_yoast_schema_output_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="rel" name="rm_plugin_global_settings[rm_yoast_schema_output_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_yoast_schema_output_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable yoast seo schema output. This option comes haandy, when you are using any other schema plugin like wp schema pro."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}
/*==============================================================================
                                   security options
=============================================================================*/
function rm_disable_user_enu_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="enu" name="rm_plugin_global_settings[rm_disable_user_enu_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_disable_user_enu_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to stop users enumeration. It prevents hackers from getting wordpress usernames."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_iframe_protec_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="iframe" name="rm_plugin_global_settings[rm_enable_iframe_protec_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_enable_iframe_protec_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to stop other sites from displaying your content in a frame or iframe."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_no_sniff_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="no-sniff" name="rm_plugin_global_settings[rm_enable_no_sniff_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_enable_no_sniff_cb]'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to send the 'X-Content-Type-Options: nosniff' header to prevent Internet Explorer and Google Chrome from MIME-sniffing away from the declared Content-Type."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_xss_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="xss" name="rm_plugin_global_settings[rm_enable_xss_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_enable_xss_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to send the 'X-XSS-Protection' header to prevent Internet Explorer and Google Chrome from page loading when they detect reflected cross-site scripting (XSS) attacks."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_hsts_expire_time_display() {
    $options = get_option('rm_plugin_global_settings');
    
    if(!isset($options['rm_hsts_expire_time'])){
        $options['rm_hsts_expire_time'] = 'Not set';
    }

    $items = array("Not set", "1 month", "2 months", "3 monthss", "4 months", "5 months", "6 months", "12 months");
    echo "<select id='ex-time' name='rm_plugin_global_settings[rm_hsts_expire_time]'>";
    foreach($items as $item) {
        $selected = ($options['rm_hsts_expire_time'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$item</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="HSTS includes a “max-age” parameter which specifies the duration HSTS will continue to be cached and enforced by the web browser. This parameter generally is set at 6 months by default, however you must use a minimum of 12 months if you wish to be included in the HSTS Preload list (see below). The special value of “0” means HSTS is disabled and will no longer be cached by the client web browser. For the amount of time specified in the max-age header after a website is successfully accessed over HTTPS, the browser will enforce this HSTS policy, requiring HTTPS with correctly-configured certificates. Recommended 6 months."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_hsts_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="hsts" name="rm_plugin_global_settings[rm_enable_hsts_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_enable_hsts_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="HTTP Strict Transport Security (HSTS, RFC 6797) is a header which allows a website to specify and enforce security policy in client web browsers. This policy enforcement protects secure websites from downgrade attacks, SSL stripping, and cookie hijacking. It allows a web server to declare a policy that browsers will only connect using secure HTTPS connections, and ensures end users do not “click through” critical security warnings. HSTS is an important security mechanism for high security websites. HSTS headers are only respected when served over HTTPS connections, not HTTP."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_preload_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="preload" name="rm_plugin_global_settings[rm_enable_preload_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_enable_preload_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to preload your website over HTTPS. This flag signals to web browsers that a website’s HSTS configuration is eligible for preloading, that is, inclusion into the browser’s core configuration. Without preload, HSTS is only set after an initial successful HTTPS request, and thus if an attacker can intercept and downgrade that first request, HSTS can be bypassed. With preload, this attack is prevented."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_include_subdomains_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="subdomain" name="rm_plugin_global_settings[rm_include_subdomains_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_include_subdomains_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to enable HSTS on your website as well as all subdomains. This parameter applies the HSTS policy from a parent domain (such as example.com) to subdomains (such as www.development.example.com or api.example.com). Caution is encouraged with this header, as if any subdomains do not work with HTTPS they will become inaccessible."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}
/*==============================================================================
                                   other options
=============================================================================*/
function rm_ver_remove_style_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="stylesheet-css" name="rm_plugin_global_settings[rm_ver_remove_style_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_ver_remove_style_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want remove version from stylesheets."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_ver_remove_script_cb_display() {
    ?>  <label class="switch">
        <input type="checkbox" id="script-js" name="rm_plugin_global_settings[rm_ver_remove_script_cb]" value="1" <?php checked(1 == isset(get_option('rm_plugin_global_settings')['rm_ver_remove_script_cb'])); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove version from scripts."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_ver_remove_script_exclude_css_display() {
    ?>  <textarea id="exclude-css-js" placeholder="Enter comma separated list of file names (Stylesheet/Script files) to exclude them from version removal process. Version info will be kept for these files." name="rm_plugin_global_settings[rm_ver_remove_script_exclude_css]" rows="7" cols="60" style="width:90%;"><?php if (isset(get_option('rm_plugin_global_settings')['rm_ver_remove_script_exclude_css'])) { echo get_option('rm_plugin_global_settings')['rm_ver_remove_script_exclude_css']; } ?></textarea>
    <?php
}

/*==============================================================================
                                   Header footer
=============================================================================*/

function rm_custom_header_ta_display() {
    ?>
    <textarea id="header-element" placeholder="Write code here which you want to add in wordpress header." name="rm_plugin_global_settings[rm_custom_header_ta]" rows="10" cols="90" style="width:90%;"><?php if (isset(get_option('rm_plugin_global_settings')['rm_custom_header_ta'])) { echo get_option('rm_plugin_global_settings')['rm_custom_header_ta']; } ?></textarea>
    <br>These codes will be printed in the <code>&lt;head&gt;</code> section.
    <?php
}

function rm_custom_footer_ta_display() {
    ?>
    <textarea id="footer-element" placeholder="Write code here which you want to add in wordpress footer." name="rm_plugin_global_settings[rm_custom_footer_ta]" rows="10" cols="90" style="width:90%;"><?php if (isset(get_option('rm_plugin_global_settings')['rm_custom_footer_ta'])) { echo get_option('rm_plugin_global_settings')['rm_custom_footer_ta']; } ?></textarea>
    <br>These codes will be printed above the <code>&lt;/body&gt;</code> tag.
    <?php
}

// add settings page
add_action("admin_init", "rm_plug_settings_page");


// page elements
function rw_show_page() {
  
?>

<div class="wrap">

    <h1> WP Header & Meta Tags Settings </h1>
		<div class="rw-about-text">
        Customize WordPress header, add custom code and enable, disable or remove the unwanted meta tags and links very easily.
		</div><hr>
 
        <h2 class="nav-tab-wrapper">
            <a href="#meta" class="nav-tab" id="btn1">Meta Options</a>
            <a href="#disable" class="nav-tab" id="btn2">Disable Options</a>
            <a href="#security" class="nav-tab" id="btn3">Security Options</a>
            <a href="#other" class="nav-tab" id="btn4">Other Options</a>
            <a href="#header-footer" class="nav-tab" id="btn5">Header & Footer</a>
            <a href="#plugins" class="nav-tab" id="btn6">Other Plugins</a>
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
                ?><p><strong><font color="red">Important Note:</font></strong> <i>Use 'Enable HSTS Header' option if you have a valid SSL for the website. If you remove HTTPS before disabling HSTS your website will become inaccessible to visitors for up to the max-age you have set or until you support HTTPS again.
                <a href = "https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security" target = "_blank">Read more</a></i></p>
                <?php
                submit_button('Save All Settings');
               
            ?> </div>

            <div style="display:none" id="plugin-extra"> <?php

                do_settings_sections("rm_other");
                ?><p><strong>Note:</strong> <i>This options help to remove <code>ver=4.9.x</code> from your wordpress website's source code.</i></p>
                <?php
                submit_button('Save All Settings');
   
            ?> </div>

            <div style="display:none" id="plugin-header-footer"> <?php

                do_settings_sections("rm_header_footer");
                submit_button('Save All Settings');

            ?> </div>

            <div style="display:none" id="plugin-other"> 
            
            <div>
                <h3> My WordPress Plugins </h3><p><hr></p>
                <p><strong>Like this plugin? Check out my other WordPress plugins:</strong></p>
                <li><strong><a href = "https://wordpress.org/plugins/wp-last-modified-info/" target = "_blank">WP Last Modified Info</a></strong> - Disaplay Last modified info of posts, pages anywhere on dashboard and frontend of your site.</li>
                <li><strong><a href = "https://wordpress.org/plugins/change-wp-page-permalinks/" target = "_blank">WordPress Page Extension</a></strong> - Add any page extension like .html, .php to wordpress pages.</li>
                <li><strong><a href = "https://wordpress.org/plugins/all-in-one-wp-solution/" target = "_blank">All In One WP Solution</a></strong> - All In One Solution/customization for WordPress.</li>
                                
                <br></div>
            
            </div>
    
        </form>
        
    </div>

    </div>

   <?php

function rm_remove_footer_admin () {

    // fetch plugin version
    $rmpluginfo = get_plugin_data(__FILE__);
    $rmversion = $rmpluginfo['Version'];    
        // pring plugin version
        echo 'Thanks for using <strong>WP Header & Meta Tags v'. $rmversion .'</strong> | Developed with <span style="color: #e25555;">♥</span> by <a href="https://profiles.wordpress.org/infosatech/" target="_blank" style="font-weight: 500;">Sayan Datta</a> | <a href="https://github.com/iamsayan/remove-wp-meta-tags" target="_blank" style="font-weight: 500;">GitHub</a> | <a href="https://wordpress.org/support/plugin/remove-wp-meta-tags" target="_blank" style="font-weight: 500;">Support</a> | <a href="https://wordpress.org/support/plugin/remove-wp-meta-tags/reviews/" target="_blank" style="font-weight: 500;">Rate it</a> (&#9733;&#9733;&#9733;&#9733;&#9733;), if you like this plugin.';
}

add_filter('admin_footer_text', 'rm_remove_footer_admin');

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

    //XML-RPC disable
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

    //disable yoast seo schema output
if( isset($options['rm_yoast_schema_output_cb']) && ($options['rm_yoast_schema_output_cb'] == 1) ) {

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
            add_filter('wpseo_json_ld_output', '__return_false');
        } else {
            add_action('admin_notices', 'rw_yoast_admin_notice');
        }
}

function rw_yoast_admin_notice(){
    echo '<div class="notice notice-warning">
    <p>WP Header & Meta Tags plugin requires Yoast SEO Plugin to be activated as &#39;Disable Yoast Schema Output&#39; Option is enabled in settings.</p>
    </div>';
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

// enable hsts
if( isset($options['rm_enable_hsts_cb']) && ($options['rm_enable_hsts_cb'] == 1) ) {

    function rm_enable_hsts_header() {
    
    $options = get_option('rm_plugin_global_settings');
    if( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == 'Not set') ) {
        $expire_time = '0';
    } elseif( isset($options['rm_hsts_expire_time']) && ($options['rm_hsts_expire_time'] == '1 month') ) {
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

    if( isset($options['rm_enable_preload_cb']) && ($options['rm_enable_preload_cb'] == 1) ) {
        $enable_preload = '; preload';
    } else {
        $enable_preload = '';
    }

    if( isset($options['rm_include_subdomains_cb']) && ($options['rm_include_subdomains_cb'] == 1) ) {
        $include_subdomains = '; includeSubDomains';
    } else {
        $include_subdomains = '';
    }

    if(isset($expire_time) || isset($include_subdomains) || isset($enable_preload)) {
        header('Strict-Transport-Security: max-age=' . $expire_time . $include_subdomains . $enable_preload);
    }
}
add_action( 'send_headers', 'rm_enable_hsts_header' );
}


if(get_option('rm_plugin_global_settings')['rm_custom_header_ta']) {
    add_action('wp_head', 'rm_custom_header_code', 10);
}

function rm_custom_header_code() {
    echo get_option('rm_plugin_global_settings')['rm_custom_header_ta'];
}

if(get_option('rm_plugin_global_settings')['rm_custom_footer_ta']) {
    add_action('wp_footer', 'rm_custom_footer_code', 10);
}

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