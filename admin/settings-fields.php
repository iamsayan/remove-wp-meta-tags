<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Ultimate WP Header Footer
 * @subpackage Admin
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

/*==============================================================================
                                  meta options
=============================================================================*/
function rm_meta_generator_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="gen" name="rm_plugin_global_settings[rm_meta_generator_cb]" value="1" <?php checked( isset($options['rm_meta_generator_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove generator meta tag (e.g. WP, LayerSlider, Visual Composer, WPML) from WP head."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_wpmanifest_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="manifest" name="rm_plugin_global_settings[rm_meta_wpmanifest_cb]" value="1" <?php checked( isset($options['rm_meta_wpmanifest_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to hide manifest output of your wordpress website."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_feed_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="feed" name="rm_plugin_global_settings[rm_meta_feed_cb]" value="1" <?php checked( isset($options['rm_meta_feed_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove feed output from your wordpress website. It will just remove output. To disable feed completely go to 'Disable Options' tab."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_rsd_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="rsd" name="rm_plugin_global_settings[rm_meta_rsd_cb]" value="1" <?php checked( isset($options['rm_meta_rsd_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove really simple discovery (rsd) output in wordpress head."><span title="" class="dashicons dashicons-editor-help"></span></span>
   <?php
}

function rm_meta_short_links_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="short" name="rm_plugin_global_settings[rm_meta_short_links_cb]" value="1" <?php checked( isset($options['rm_meta_short_links_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove all shortlinks from your wordpress website."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_posts_rel_link_wp_head_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="rel" name="rm_plugin_global_settings[rm_posts_rel_link_wp_head_cb]" value="1" <?php checked( isset($options['rm_posts_rel_link_wp_head_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove adjacent / previous and next post links from wordpress website's code."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_jquery_migrate_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="jquerym" name="rm_plugin_global_settings[rm_jquery_migrate_cb]" value="1" <?php checked( isset($options['rm_jquery_migrate_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove feed link metas from wp head."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_viewport_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="viewport" name="rm_plugin_global_settings[rm_meta_viewport_cb]" value="1" <?php checked( isset($options['rm_meta_viewport_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove viewport meta tag from wp head."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_remove_html_comments_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="html-comments" name="rm_plugin_global_settings[rm_remove_html_comments_cb]" value="1" <?php checked( isset($options['rm_remove_html_comments_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove unwanted html comments of yoast seo or other plugins from wp head."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}
/*==============================================================================
                                   disable options
=============================================================================*/
function rm_meta_feed_disable_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="feed-disable" name="rm_plugin_global_settings[rm_meta_feed_disable_cb]" value="1" <?php checked( isset($options['rm_meta_feed_disable_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress feed functionality completely."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_disable_auto_dns_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="auto-dns" name="rm_plugin_global_settings[rm_disable_auto_dns_cb]" value="1" <?php checked(isset($options['rm_disable_auto_dns_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress feed functionality completely."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_xml_rpc_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="xml-rpc" name="rm_plugin_global_settings[rm_meta_xml_rpc_cb]" value="1" <?php checked( isset($options['rm_meta_xml_rpc_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress xml-rpc functionality completely."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_disable_wpjson_restapi_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="rest-api" name="rm_plugin_global_settings[rm_disable_wpjson_restapi_cb]" value="1" <?php checked( isset($options['rm_disable_wpjson_restapi_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable wordpress wpjson, restapi functionality completely. It is not recomended. If enabled, plugin like Jetpack does't work."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_yoast_schema_output_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="rel" name="rm_plugin_global_settings[rm_yoast_schema_output_cb]" value="1" <?php checked( isset($options['rm_yoast_schema_output_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to disable yoast seo schema output. This option comes haandy, when you are using any other schema plugin like wp schema pro."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}
/*==============================================================================
                                   security options
=============================================================================*/
function rm_disable_user_enu_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="enu" name="rm_plugin_global_settings[rm_disable_user_enu_cb]" value="1" <?php checked( isset($options['rm_disable_user_enu_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to stop users enumeration. It prevents hackers from getting wordpress usernames."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_xframe_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="enable-iframe" name="rm_plugin_global_settings[rm_enable_xframe_cb]" value="1" <?php checked( isset($options['rm_enable_xframe_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>
    <span id="iframe-span" style="display:none;">&nbsp;&nbsp;<label for="iframe" style="font-size:13px;"><strong><?php _e( 'Directive:', 'remove-wp-meta-tags' ); ?></strong></label>&nbsp;&nbsp;
    <?php
    
    if(!isset($options['rm_enable_iframe_protec'])){
        $options['rm_enable_iframe_protec'] = 'SAMEORIGIN';
    }

    $items = array("SAMEORIGIN", "DENY", "ALLOW-FROM");
    echo "<select id='iframe' name='rm_plugin_global_settings[rm_enable_iframe_protec]' style='width:18%'>";
    foreach($items as $item) {
        $selected = ($options['rm_enable_iframe_protec'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$item</option>";
    }
    echo "</select>";
    ?>
    </span>
    <span id="allow-xframe-from" style="display:none;">&nbsp;&nbsp;
        <input id="iframe-allow-form" name="rm_plugin_global_settings[rm_enable_iframe_protec_allow]" type="text" size="35" style="width:35%;" placeholder="https://example.com" value="<?php if (isset($options['rm_enable_iframe_protec_allow'])) { echo $options['rm_enable_iframe_protec_allow']; } ?>" />
    </span>
    &nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to stop other sites from displaying your content in a frame or iframe."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_no_sniff_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="no-sniff" name="rm_plugin_global_settings[rm_enable_no_sniff_cb]" value="1" <?php checked( isset($options['rm_enable_no_sniff_cb]']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to send the 'X-Content-Type-Options: nosniff' header to prevent Internet Explorer and Google Chrome from MIME-sniffing away from the declared Content-Type."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_xss_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="xss" name="rm_plugin_global_settings[rm_enable_xss_cb]" value="1" <?php checked( isset($options['rm_enable_xss_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to send the 'X-XSS-Protection' header to prevent Internet Explorer and Google Chrome from page loading when they detect reflected cross-site scripting (XSS) attacks."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_disable_powered_by_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="pb" name="rm_plugin_global_settings[rm_disable_powered_by_cb]" value="1" <?php checked( isset($options['rm_disable_powered_by_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to hide and unset x-powered-by header from your website."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_hsts_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="hsts" name="rm_plugin_global_settings[rm_enable_hsts_cb]" value="1" <?php checked( isset($options['rm_enable_hsts_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>
    
    <span id="hsts-dir-span" style="display:none;">&nbsp;&nbsp;<label for="hsts-dir" style="font-size:13px;"><strong><?php _e( 'Directive:', 'remove-wp-meta-tags' ); ?></strong></label>&nbsp;&nbsp;
    <?php

    if(!isset($options['rm_enable_hsts_directive'])){
        $options['rm_enable_hsts_directive'] = 'max-age=EXPIRES_SECONDS';
    }

    $items = array("max-age=EXPIRES_SECONDS", "max-age=EXPIRES_SECONDS; preload", "max-age=EXPIRES_SECONDS; includeSubDomains", "max-age=EXPIRES_SECONDS; includeSubDomains; preload");
    echo "<select id='hsts-dir' name='rm_plugin_global_settings[rm_enable_hsts_directive]' style='width:50%'>";
    foreach($items as $item) {
        $selected = ($options['rm_enable_hsts_directive'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$item</option>";
    }
    echo "</select>";

    ?>
    </span>
    <span id="ex-time-span" style="display:none;">&nbsp;&nbsp;<label for="ex-time" style="font-size:13px;"><strong><?php _e( 'Period:', 'remove-wp-meta-tags' ); ?></strong></label>&nbsp;&nbsp;
    <?php

    if(!isset($options['rm_hsts_expire_time'])){
        $options['rm_hsts_expire_time'] = '6 months';
    }

    $items = array("1 month", "2 months", "3 months", "4 months", "5 months", "6 months", "12 months");
    echo "<select id='ex-time' name='rm_plugin_global_settings[rm_hsts_expire_time]' style='width:13%'>";
    foreach($items as $item) {
        $selected = ($options['rm_hsts_expire_time'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$item</option>";
    }
    echo "</select>";
    ?>
    </span>
    &nbsp;&nbsp;<span class="tooltip" title="HTTP Strict Transport Security (HSTS, RFC 6797) is a header which allows a website to specify and enforce security policy in client web browsers. This policy enforcement protects secure websites from downgrade attacks, SSL stripping, and cookie hijacking. It allows a web server to declare a policy that browsers will only connect using secure HTTPS connections, and ensures end users do not “click through” critical security warnings. HSTS is an important security mechanism for high security websites. HSTS headers are only respected when served over HTTPS connections, not HTTP."><span title="" class="dashicons dashicons-editor-help"></span></span>
    
    <?php
}

/*==============================================================================
                                   privacy options
=============================================================================*/
function rm_ver_remove_style_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="stylesheet-css" name="rm_plugin_global_settings[rm_ver_remove_style_cb]" value="1" <?php checked( isset($options['rm_ver_remove_style_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want remove version from stylesheets."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_ver_remove_script_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="script-js" name="rm_plugin_global_settings[rm_ver_remove_script_cb]" value="1" <?php checked( isset($options['rm_ver_remove_script_cb']), 1 ); ?> /> 
        <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to remove version from scripts."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_ver_remove_script_exclude_css_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <textarea id="exclude-css-js" placeholder="Enter comma separated list of file names (Stylesheet/Script files) to exclude them from version removal process. Version info will be kept for these files." name="rm_plugin_global_settings[rm_ver_remove_script_exclude_css]" rows="7" cols="60" style="width:90%;"><?php if (isset($options['rm_ver_remove_script_exclude_css'])) { echo $options['rm_ver_remove_script_exclude_css']; } ?></textarea>
    <?php
}

/*==============================================================================
                                   Header footer
=============================================================================*/

function rm_custom_header_ta_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>
    <textarea id="header-element" placeholder="Write code here which you want to add in wordpress header." name="rm_plugin_global_settings[rm_custom_header_ta]" rows="10" cols="90" style="width:90%;"><?php if (isset($options['rm_custom_header_ta'])) { echo $options['rm_custom_header_ta']; } ?></textarea>
    <br><small><?php _e( 'These codes will be printed in the <code>&lt;head&gt;</code> section.', 'remove-wp-meta-tags' ); ?></small>
    <?php
}

function rm_header_code_priority_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <input id="header-prio" name="rm_plugin_global_settings[rm_header_code_priority]" type="number" size="8" style="width:8%;" placeholder="10" min="1" value="<?php if (isset($options['rm_header_code_priority'])) { echo $options['rm_header_code_priority']; } ?>" />
    &nbsp;&nbsp;<small><?php _e( 'Higher number = ealier output | Lower number = later output | Default = 10', 'remove-wp-meta-tags' ); ?></small>
    <?php
}

function rm_custom_footer_ta_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>
    <textarea id="footer-element" placeholder="Write code here which you want to add in wordpress footer." name="rm_plugin_global_settings[rm_custom_footer_ta]" rows="10" cols="90" style="width:90%;"><?php if (isset($options['rm_custom_footer_ta'])) { echo $options['rm_custom_footer_ta']; } ?></textarea>
    <br><small><?php _e( 'These codes will be printed above the <code>&lt;/body&gt;</code> tag.', 'remove-wp-meta-tags' ); ?></small>
    <?php
}

function rm_footer_code_priority_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <input id="footer-prio" name="rm_plugin_global_settings[rm_footer_code_priority]" type="number" size="8" style="width:8%;" placeholder="10" min="1" value="<?php if (isset($options['rm_footer_code_priority'])) { echo $options['rm_footer_code_priority']; } ?>" />
    &nbsp;&nbsp;<small><?php _e( 'Higher number = ealier output | Lower number = later output | Default = 10', 'remove-wp-meta-tags' ); ?></small>
    <?php
}

function rm_meta_box_position_display() {
    $options = get_option('rm_plugin_global_settings');
    
    if(!isset($options['rm_meta_box_position'])){
        $options['rm_meta_box_position'][] = '';
    }

    $post_types = get_post_types(array(
        'public'   => true,
    ), 'names'); 

    echo "<select id='custom-meta-box' name='rm_plugin_global_settings[rm_meta_box_position][]' multiple='multiple' style='width:75%;'>";
    foreach($post_types as $item) {
        $selected = in_array( $item, $options['rm_meta_box_position'] ) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$item</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="Select post types where you want to show custom meta box."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

/* ==================================================================
                               Minify
===================================================================== */

function rm_enable_html_minify_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <label class="switch">
    <input id="ehtml" name="rm_plugin_global_settings[rm_enable_html_minify_cb]" type="checkbox" value="1"<?php checked( isset($options['rm_enable_html_minify_cb']), 1 ); ?> />
    <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to minify html code of your website."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_css_minify_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <label class="switch">
    <input id="ecss" name="rm_plugin_global_settings[rm_enable_css_minify_cb]" type="checkbox" value="1"<?php checked( isset($options['rm_enable_css_minify_cb']), 1 ); ?> />
    <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you also want to minify css code of your website."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_js_minify_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <label class="switch">
    <input id="ejs" name="rm_plugin_global_settings[rm_enable_js_minify_cb]" type="checkbox" value="1"<?php checked( isset($options['rm_enable_js_minify_cb']), 1 ); ?> />
    <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you also want to minify js code of your website."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_minify_allow_raw_tag_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <label class="switch">
    <input id="rraw" name="rm_plugin_global_settings[rm_minify_allow_raw_tag_cb]" type="checkbox" value="1"<?php checked( isset($options['rm_minify_allow_raw_tag_cb']), 1 ); ?> />
    <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to enable minification for raw tags i.e.<pre></pre> etc."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_minify_liu_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <label class="switch">
    <input id="mliu" name="rm_plugin_global_settings[rm_enable_minify_liu_cb]" type="checkbox" value="1"<?php checked( isset($options['rm_enable_minify_liu_cb']), 1 ); ?> />
    <div class="slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="Enable this if you want to enable minification for logged in users also."><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}


?>