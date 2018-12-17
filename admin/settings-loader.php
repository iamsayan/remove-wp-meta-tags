<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Admin
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */


function rm_plug_settings_page() {

    add_settings_section('rm_remove_section', __( 'Meta Options', 'remove-wp-meta-tags' ) . '<p><hr></p>', null, 'rm_remove');
        add_settings_field('rm_meta_generator_cb', __( 'Remove WP Generator Meta Tag:', 'remove-wp-meta-tags' ), 'rm_meta_generator_cb_display', 'rm_remove', 'rm_remove_section', array( 'label_for' => 'gen' ) );  
        add_settings_field('rm_meta_wpmanifest_cb', __( 'Remove WP Manifest Meta Tag:', 'remove-wp-meta-tags' ), 'rm_meta_wpmanifest_cb_display', 'rm_remove', 'rm_remove_section', array( 'label_for' => 'manifest' ));
        add_settings_field('rm_meta_feed_cb', __( 'Remove All Feed Meta Tag Output:', 'remove-wp-meta-tags' ), 'rm_meta_feed_cb_display', 'rm_remove', 'rm_remove_section', array( 'label_for' => 'feed', 'class' => 'cl-feed' ));
        add_settings_field('rm_meta_rsd_cb', __( 'Remove All RSD Links Meta Tag:', 'remove-wp-meta-tags' ), 'rm_meta_rsd_cb_display', 'rm_remove', 'rm_remove_section', array( 'label_for' => 'rsd' ));
        add_settings_field('rm_meta_short_links_cb', __( 'Remove Shortlinks Meta Tag:', 'remove-wp-meta-tags' ), 'rm_meta_short_links_cb_display', 'rm_remove', 'rm_remove_section', array( 'label_for' => 'short' ));
        add_settings_field('rm_posts_rel_link_wp_head_cb', __( 'Remove Adjacent Links Meta Tag:', 'remove-wp-meta-tags' ), 'rm_posts_rel_link_wp_head_cb_display', 'rm_remove', 'rm_remove_section', array( 'label_for' => 'rel' ));
        add_settings_field('rm_meta_viewport_cb', __( 'Remove Viewport Meta Tag:', 'remove-wp-meta-tags' ), 'rm_meta_viewport_cb_display', 'rm_remove', 'rm_remove_section', array( 'label_for' => 'viewport' ));
        add_settings_field('rm_jquery_migrate_cb', __( 'Remove jQuery Migrate Output:', 'remove-wp-meta-tags' ), 'rm_jquery_migrate_cb_display', 'rm_remove', 'rm_remove_section', array( 'label_for' => 'jquerym' ));
        
    add_settings_section('rm_disable_section', __( 'Disable Options', 'remove-wp-meta-tags' ) . '<p><hr></p>', null, 'rm_disable');
        add_settings_field('rm_meta_feed_disable_cb', __( 'Disable WP Feed Fuctionality:', 'remove-wp-meta-tags' ), 'rm_meta_feed_disable_cb_display', 'rm_disable', 'rm_disable_section', array( 'label_for' => 'feed-disable' ));  
        add_settings_field('rm_disable_auto_dns_cb', __( 'Disable Auto DNS Prefetch:', 'remove-wp-meta-tags' ), 'rm_disable_auto_dns_cb_display', 'rm_disable', 'rm_disable_section', array( 'label_for' => 'auto-dns' ));  
        add_settings_field('rm_meta_xml_rpc_cb', __( 'Disable XML-RPC Fuctionality:', 'remove-wp-meta-tags' ), 'rm_meta_xml_rpc_cb_display', 'rm_disable', 'rm_disable_section', array( 'label_for' => 'xml-rpc' ));  
        add_settings_field('rm_disable_wpjson_restapi_cb', __( 'Disable WP JSON and Rest API:', 'remove-wp-meta-tags' ), 'rm_disable_wpjson_restapi_cb_display', 'rm_disable', 'rm_disable_section', array( 'label_for' => 'rest-api' ));  
        
    add_settings_section('rm_security_section', __( 'Security Options', 'remove-wp-meta-tags' ) . '<p><hr></p>', null, 'rm_security');
        add_settings_field('rm_disable_user_enu_cb', __( 'Disable User Enumeration:', 'remove-wp-meta-tags' ), 'rm_disable_user_enu_cb_display', 'rm_security', 'rm_security_section', array( 'label_for' => 'disable-enu' ));  
        add_settings_field('rm_enable_no_sniff_cb', __( 'Enable No-Sniff Header:', 'remove-wp-meta-tags' ), 'rm_enable_no_sniff_cb_display', 'rm_security', 'rm_security_section', array( 'label_for' => 'no-sniff' ));  
        add_settings_field('rm_enable_xss_cb', __( 'Enable XSS-Protection Header:', 'remove-wp-meta-tags' ), 'rm_enable_xss_cb_display', 'rm_security', 'rm_security_section', array( 'label_for' => 'xss' ));  
        add_settings_field('rm_disable_powered_by_cb', __( 'Unset X-Powered-by Header:', 'remove-wp-meta-tags' ), 'rm_disable_powered_by_cb_display', 'rm_security', 'rm_security_section', array( 'label_for' => 'pb' ));  
        add_settings_field('rm_enable_xframe_cb', __( 'Enable Iframe Protection Header:', 'remove-wp-meta-tags' ), 'rm_enable_xframe_cb_display', 'rm_security', 'rm_security_section', array( 'label_for' => 'enable-iframe' ));  
        add_settings_field('rm_enable_hsts_cb', __( 'Enable HSTS Header Security Policy:', 'remove-wp-meta-tags' ), 'rm_enable_hsts_cb_display', 'rm_security', 'rm_security_section', array( 'label_for' => 'hsts' ));  
        
    add_settings_section('rm_other_section', __( 'Privacy Options', 'remove-wp-meta-tags' ) . '<p><hr></p>', null, 'rm_other');
        add_settings_field('rm_ver_remove_style_cb', __( 'Remove Version from Stylesheet:', 'remove-wp-meta-tags' ), 'rm_ver_remove_style_cb_display', 'rm_other', 'rm_other_section', array( 'label_for' => 'stylesheet-css' ));  
        add_settings_field('rm_ver_remove_script_cb', __( 'Remove Version from Script:', 'remove-wp-meta-tags' ), 'rm_ver_remove_script_cb_display', 'rm_other', 'rm_other_section', array( 'label_for' => 'script-js' ));  
        add_settings_field('rm_ver_remove_script_exclude_css', __( 'Enter Stylesheet/Script file names:', 'remove-wp-meta-tags' ), 'rm_ver_remove_script_exclude_css_display', 'rm_other', 'rm_other_section', array( 'label_for' => 'exclude-css-js' ));  
        
    add_settings_section('rm_header_footer_section', __( 'Header & Footer Code', 'remove-wp-meta-tags' ) . '<p><hr></p>', null, 'rm_header_footer');
        add_settings_field('rm_custom_header_ta', __( 'Site-wide WP Header Code:', 'remove-wp-meta-tags' ), 'rm_custom_header_ta_display', 'rm_header_footer', 'rm_header_footer_section', array( 'label_for' => 'header-element' ));  
        add_settings_field('rm_header_code_priority', __( 'Site-wide Header Code Priority:', 'remove-wp-meta-tags' ), 'rm_header_code_priority_display', 'rm_header_footer', 'rm_header_footer_section', array( 'label_for' => 'header-prio' ));  
        add_settings_field('rm_custom_footer_ta', __( 'Site-wide WP Footer Code:', 'remove-wp-meta-tags' ), 'rm_custom_footer_ta_display', 'rm_header_footer', 'rm_header_footer_section', array( 'label_for' => 'footer-element' ));  
        add_settings_field('rm_footer_code_priority', __( 'Site-wide Footer Code Priority:', 'remove-wp-meta-tags' ), 'rm_footer_code_priority_display', 'rm_header_footer', 'rm_header_footer_section', array( 'label_for' => 'footer-prio' ));  
        
    add_settings_section('rm_plugin_minify_section', __( 'Minify Options', 'remove-wp-meta-tags' ) . '<p><hr></p>', null, 'rm_plugin_minify');
        add_settings_field('rm_enable_html_minify', __( 'Enable HTML Minification:', 'remove-wp-meta-tags' ), 'rm_enable_html_minify_display', 'rm_plugin_minify', 'rm_plugin_minify_section', array( 'label_for' => 'ehtml' ));
        add_settings_field('rm_enable_js_minify', __( 'Enable Inline JS Minification:', 'remove-wp-meta-tags' ), 'rm_enable_js_minify_display', 'rm_plugin_minify', 'rm_plugin_minify_section', array( 'label_for' => 'ejs' ));
        add_settings_field('rm_remove_html_js_css_comment', __( 'Remove HTML JS CSS Comments:', 'remove-wp-meta-tags' ), 'rm_remove_html_js_css_comment_display', 'rm_plugin_minify', 'rm_plugin_minify_section', array( 'label_for' => 'ecomment' ));
        add_settings_field('rm_remove_xhtml_void', __( 'Remove XHTML Closing Tags:', 'remove-wp-meta-tags' ), 'rm_remove_xhtml_void_display', 'rm_plugin_minify', 'rm_plugin_minify_section', array( 'label_for' => 'exhtml' ));
        add_settings_field('rm_remove_relative_domain_url', __( 'Remove Relative Domain from URLs:', 'remove-wp-meta-tags' ), 'rm_remove_relative_domain_url_display', 'rm_plugin_minify', 'rm_plugin_minify_section', array( 'label_for' => 'erelative' ));
        add_settings_field('rm_remove_protocol_domain_url', __( 'Remove HTTP(S) Protocols from URLs:', 'remove-wp-meta-tags' ), 'rm_remove_protocol_domain_url_display', 'rm_plugin_minify', 'rm_plugin_minify_section', array( 'label_for' => 'eprotocol', 'class' => 'protocol' ));
        add_settings_field('rm_support_multibyte_encoding', __( 'Support Multi-byte UTF-8 Encoding:', 'remove-wp-meta-tags' ), 'rm_support_multibyte_encoding_display', 'rm_plugin_minify', 'rm_plugin_minify_section', array( 'label_for' => 'utf8' ));
        add_settings_field('rm_enable_minify_liu', __( 'Enable Minification for Logged in Users:', 'remove-wp-meta-tags' ), 'rm_enable_minify_liu_display', 'rm_plugin_minify', 'rm_plugin_minify_section', array( 'label_for' => 'mliu' ));
        
    add_settings_section('rm_plugin_tools_section', __( 'Miscellaneous', 'remove-wp-meta-tags' ) . '<p><hr></p>', null, 'rm_plugin_tools');
        add_settings_field('rm_remove_plugin_data_cb', __( 'Remove Data upon Uninstallation:', 'remove-wp-meta-tags' ), 'rm_remove_plugin_data_cb_display', 'rm_plugin_tools', 'rm_plugin_tools_section', array( 'label_for' => 'remove-data' ));
    
    register_setting('rm_plugin_section', 'rm_plugin_global_settings');

}


?>