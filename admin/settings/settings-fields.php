<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
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
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to remove generator meta tag (e.g. WP, Layercb-slider, Visual Composer, WPML) from WP head.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_wpmanifest_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="manifest" name="rm_plugin_global_settings[rm_meta_wpmanifest_cb]" value="1" <?php checked( isset($options['rm_meta_wpmanifest_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to hide manifest output of your wordpress website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_feed_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="feed" name="rm_plugin_global_settings[rm_meta_feed_cb]" value="1" <?php checked( isset($options['rm_meta_feed_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to remove feed output from your wordpress website. It will just remove output. To disable feed completely go to \'Disable Options\' tab.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_rsd_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="rsd" name="rm_plugin_global_settings[rm_meta_rsd_cb]" value="1" <?php checked( isset($options['rm_meta_rsd_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to remove really simple discovery (rsd) output in wordpress head.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
   <?php
}

function rm_meta_short_links_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="short" name="rm_plugin_global_settings[rm_meta_short_links_cb]" value="1" <?php checked( isset($options['rm_meta_short_links_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to remove all shortlinks from your wordpress website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_posts_rel_link_wp_head_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="rel" name="rm_plugin_global_settings[rm_posts_rel_link_wp_head_cb]" value="1" <?php checked( isset($options['rm_posts_rel_link_wp_head_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to remove adjacent / previous and next post links from wordpress website\'s code.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_jquery_migrate_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="jquerym" name="rm_plugin_global_settings[rm_jquery_migrate_cb]" value="1" <?php checked( isset($options['rm_jquery_migrate_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to disable jQuery Migrate output on wp head. (not recommended)', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_viewport_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="viewport" name="rm_plugin_global_settings[rm_meta_viewport_cb]" value="1" <?php checked( isset($options['rm_meta_viewport_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to remove viewport meta tag from wp head.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_remove_html_comments_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="html-comments" name="rm_plugin_global_settings[rm_remove_html_comments_cb]" value="1" <?php checked( isset($options['rm_remove_html_comments_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to remove unwanted html comments of yoast seo or other plugins from wp head.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

/*==============================================================================
                                   disable options
=============================================================================*/

function rm_meta_feed_disable_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="feed-disable" name="rm_plugin_global_settings[rm_meta_feed_disable_cb]" value="1" <?php checked( isset($options['rm_meta_feed_disable_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to disable wordpress feed functionality completely.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_disable_auto_dns_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="auto-dns" name="rm_plugin_global_settings[rm_disable_auto_dns_cb]" value="1" <?php checked(isset($options['rm_disable_auto_dns_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to disable wordpress feed functionality completely.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_meta_xml_rpc_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="xml-rpc" name="rm_plugin_global_settings[rm_meta_xml_rpc_cb]" value="1" <?php checked( isset($options['rm_meta_xml_rpc_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to disable wordpress xml-rpc functionality completely.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_disable_wpjson_restapi_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="rest-api" name="rm_plugin_global_settings[rm_disable_wpjson_restapi_cb]" value="1" <?php checked( isset($options['rm_disable_wpjson_restapi_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to disable wordpress wpjson, restapi functionality completely. If enabled, plugins like Jetpack does\'t work.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_yoast_schema_output_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="rel" name="rm_plugin_global_settings[rm_yoast_schema_output_cb]" value="1" <?php checked( isset($options['rm_yoast_schema_output_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to disable yoast seo schema output. This option comes haandy, when you are using any other schema plugin like wp schema pro.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

/*==============================================================================
                                   security options
=============================================================================*/

function rm_disable_user_enu_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="disable-enu" name="rm_plugin_global_settings[rm_disable_user_enu_cb]" value="1" <?php checked( isset($options['rm_disable_user_enu_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to stop users enumeration. It prevents hackers from getting wordpress usernames.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_xframe_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="enable-iframe" name="rm_plugin_global_settings[rm_enable_xframe_cb]" value="1" <?php checked( isset($options['rm_enable_xframe_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>
    <span id="iframe-span" style="display:none;">&nbsp;&nbsp;<label for="iframe" style="font-size:13px;"><strong><?php _e( 'Directive:', 'remove-wp-meta-tags' ); ?></strong></label>&nbsp;&nbsp;
    <?php if( !isset($options['rm_enable_iframe_protec']) ) {
        $options['rm_enable_iframe_protec'] = 'SAMEORIGIN';
    }

    $items = array( 'SAMEORIGIN', 'DENY', 'ALLOW-FROM' );
    echo '<select id="iframe" name="rm_plugin_global_settings[rm_enable_iframe_protec]" style="width:25%">';
    foreach( $items as $item ) {
        $selected = ($options['rm_enable_iframe_protec'] == $item) ? ' selected="selected"' : '';
        echo '<option value="' . $item . '"' . $selected . '>' . $item . '</option>';
    }
    echo '</select>';
    ?> </span>
    <span id="allow-xframe-from" style="display:none;">&nbsp;&nbsp;
        <input id="iframe-allow-form" name="rm_plugin_global_settings[rm_enable_iframe_protec_allow]" type="text" size="40" style="width:40%;" placeholder="https://example.com" value="<?php if (isset($options['rm_enable_iframe_protec_allow'])) { echo $options['rm_enable_iframe_protec_allow']; } ?>" />
    </span> &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to stop other sites from displaying your content in a frame or iframe.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_no_sniff_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="no-sniff" name="rm_plugin_global_settings[rm_enable_no_sniff_cb]" value="1" <?php checked( isset($options['rm_enable_no_sniff_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to send the \'X-Content-Type-Options: nosniff\' header to prevent Internet Explorer and Google Chrome from MIME-sniffing away from the declared Content-Type.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_xss_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="xss" name="rm_plugin_global_settings[rm_enable_xss_cb]" value="1" <?php checked( isset($options['rm_enable_xss_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to send the \'X-XSS-Protection\' header to prevent Internet Explorer and Google Chrome from page loading when they detect reflected cross-site scripting (XSS) attacks.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_disable_powered_by_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="pb" name="rm_plugin_global_settings[rm_disable_powered_by_cb]" value="1" <?php checked( isset($options['rm_disable_powered_by_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to hide and unset x-powered-by header from your website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_hsts_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="hsts" name="rm_plugin_global_settings[rm_enable_hsts_cb]" value="1" <?php checked( isset($options['rm_enable_hsts_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>
        
    <span id="hsts-dir-span" style="display:none;">&nbsp;&nbsp;<label for="hsts-dir" style="font-size:13px;"><strong><?php _e( 'Directive:', 'remove-wp-meta-tags' ); ?></strong></label>&nbsp;&nbsp;
    <?php if( !isset($options['rm_enable_hsts_directive']) ) {
        $options['rm_enable_hsts_directive'] = 'default';
    }
    $directives = array(
        'default'                     => __( 'Default', 'remove-wp-meta-tags' ),
        'default_preload'             => __( 'Default + Preload', 'remove-wp-meta-tags' ),
        'default_subdomains'          => __( 'Default + Subdomains', 'remove-wp-meta-tags' ),
        'default_subdomains_preload'  => __( 'Default + Both', 'remove-wp-meta-tags' ),
    );
    echo '<select id="hsts-dir" name="rm_plugin_global_settings[rm_enable_hsts_directive]" style="width:35%">';
    foreach( $directives as $value => $label ) {
        $selected = ($options['rm_enable_hsts_directive'] == $value) ? ' selected="selected"' : '';
        echo '<option value="' . $value . '"' . $selected . '>' . $label . '</option>';
    }
    echo '</select>';
    ?> </span>
    <span id="ex-time-span" style="display:none;">&nbsp;&nbsp;<label for="ex-time" style="font-size:13px;"><strong><?php _e( 'Period:', 'remove-wp-meta-tags' ); ?></strong></label>&nbsp;&nbsp;
    <?php if( !isset($options['rm_hsts_expire_time']) ) {
        $options['rm_hsts_expire_time'] = '15552000';
    }
    $items = array(
        '2592000'   => __( '1 month', 'remove-wp-meta-tags' ),
        '5184000'   => __( '2 months', 'remove-wp-meta-tags' ),
        '7776000'   => __( '3 months', 'remove-wp-meta-tags' ),
        '10368000'  => __( '4 months', 'remove-wp-meta-tags' ),
        '12960000'  => __( '5 months', 'remove-wp-meta-tags' ),
        '15552000'  => __( '6 months', 'remove-wp-meta-tags' ),
        '31536000'  => __( '12 months', 'remove-wp-meta-tags' )
    );
    echo '<select id="ex-time" name="rm_plugin_global_settings[rm_hsts_expire_time]" style="width:18%">';
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_hsts_expire_time'] == $item) ? ' selected="selected"' : '';
        echo '<option value="' . $item . '"' . $selected . '>' . $label . '</option>';
    }
    echo '</select>';
    ?> </span>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'HTTP Strict Transport Security (HSTS, RFC 6797) is a header which allows a website to specify and enforce security policy in client web browsers. This policy enforcement protects secure websites from downgrade attacks, SSL stripping, and cookie hijacking. It allows a web server to declare a policy that browsers will only connect using secure HTTPS connections, and ensures end users do not “click through” critical security warnings. HSTS is an important security mechanism for high security websites. HSTS headers are only respected when served over HTTPS connections, not HTTP.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    
    <?php
}

/*==============================================================================
                                   privacy options
=============================================================================*/

function rm_ver_remove_style_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="stylesheet-css" name="rm_plugin_global_settings[rm_ver_remove_style_cb]" value="1" <?php checked( isset($options['rm_ver_remove_style_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want remove version from stylesheets.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_ver_remove_script_cb_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <label class="switch">
        <input type="checkbox" id="script-js" name="rm_plugin_global_settings[rm_ver_remove_script_cb]" value="1" <?php checked( isset($options['rm_ver_remove_script_cb']), 1 ); ?> /> 
        <div class="cb-slider round"></div></label>&nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you want to remove version from scripts.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_ver_remove_script_exclude_css_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <textarea id="exclude-css-js" placeholder="<?php _e( 'Enter comma separated list of file names (stylesheet/script files) to exclude them from version removal process. Version info will be kept for these files.', 'remove-wp-meta-tags' ); ?>" name="rm_plugin_global_settings[rm_ver_remove_script_exclude_css]" rows="3" cols="100" style="width:100%;"><?php if (isset($options['rm_ver_remove_script_exclude_css'])) { echo $options['rm_ver_remove_script_exclude_css']; } ?></textarea>
    <?php
}

function rm_add_defer_script_cb_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_add_defer_script_cb']) ) {
        $options['rm_add_defer_script_cb'] = 'none';
    }

    $items = array(
        'none'   => __( 'Disable', 'remove-wp-meta-tags' ),
        'async'  => __( 'Async Loading', 'remove-wp-meta-tags' ),
        'defer'  => __( 'Defer Loding', 'remove-wp-meta-tags' ),
        'both'   => __( 'Async & Defer Loading', 'remove-wp-meta-tags' )
    );
    echo "<select id='defer-js' name='rm_plugin_global_settings[rm_add_defer_script_cb]' style='width:32%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_add_defer_script_cb'] == $item) ? ' selected="selected"' : '';
        echo '<option value="' . $item . '"' . $selected . '>' . $label . '</option>';
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Select the Javascript files loading method from here. It will increase your pagespeed.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_add_defer_script_exclude_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>  <textarea id="exclude-defer-js" placeholder="<?php _e( 'Enter comma separated list of script file names to exclude them from defer. These scripts will be loaded as normal.', 'remove-wp-meta-tags' ); ?>" name="rm_plugin_global_settings[rm_add_defer_script_exclude]" rows="3" cols="100" style="width:100%;"><?php if (isset($options['rm_add_defer_script_exclude'])) { echo $options['rm_add_defer_script_exclude']; } ?></textarea>
    <?php
}

/*==============================================================================
                                   Header footer
=============================================================================*/

function rm_custom_header_ta_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>
    <textarea id="header-element" placeholder="Write code here which you want to add in wordpress header." name="rm_plugin_global_settings[rm_custom_header_ta]" rows="8" cols="100" style="width:100%;"><?php if (isset($options['rm_custom_header_ta'])) { echo $options['rm_custom_header_ta']; } ?></textarea>
    <br><small><?php _e( 'These codes will be printed in the <code>&lt;head&gt;</code> section. You can over-ride or disable above codes from individual post edit screen.', 'remove-wp-meta-tags' ); ?></small>
    <?php
}

function rm_header_code_priority_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <input id="header-prio" name="rm_plugin_global_settings[rm_header_code_priority]" type="number" size="12" style="width:12%;" placeholder="10" min="0" value="<?php if (isset($options['rm_header_code_priority'])) { echo $options['rm_header_code_priority']; } ?>" />
    &nbsp;&nbsp;<small><?php _e( 'Higher number = ealier output | Lower number = later output | Default = 10', 'remove-wp-meta-tags' ); ?></small>
    <?php
}

function rm_custom_footer_ta_display() {
    $options = get_option('rm_plugin_global_settings');
    ?>
    <textarea id="footer-element" placeholder="Write code here which you want to add in wordpress footer." name="rm_plugin_global_settings[rm_custom_footer_ta]" rows="8" cols="100" style="width:100%;"><?php if (isset($options['rm_custom_footer_ta'])) { echo $options['rm_custom_footer_ta']; } ?></textarea>
    <br><small><?php _e( 'These codes will be printed above the <code>&lt;/body&gt;</code> tag. You can over-ride or disable above codes from individual post edit screen.', 'remove-wp-meta-tags' ); ?></small>
    <?php
}

function rm_footer_code_priority_display() {
    $options = get_option('rm_plugin_global_settings');
    ?> <input id="footer-prio" name="rm_plugin_global_settings[rm_footer_code_priority]" type="number" size="12" style="width:12%;" placeholder="10" min="0" value="<?php if (isset($options['rm_footer_code_priority'])) { echo $options['rm_footer_code_priority']; } ?>" />
    &nbsp;&nbsp;<small><?php _e( 'Higher number = ealier output | Lower number = later output | Default = 10', 'remove-wp-meta-tags' ); ?></small>
    <?php
}

/* ==================================================================
                               Minify
===================================================================== */

function rm_enable_html_minify_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_enable_html_minify']) ) {
        $options['rm_enable_html_minify'] = 'disable';
    }

    $items = array(
        'enable'   => __( 'Enable', 'remove-wp-meta-tags' ),
        'disable'  => __( 'Disable', 'remove-wp-meta-tags' )
    );
    echo "<select id='mliu' name='rm_plugin_global_settings[rm_enable_html_minify]' style='width:20%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_enable_html_minify'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$label</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you also want to minify html code of your website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_js_minify_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_enable_js_minify']) ) {
        $options['rm_enable_js_minify'] = 'yes';
    }

    $items = array(
        'yes'   => __( 'Enable', 'remove-wp-meta-tags' ),
        'no'    => __( 'Disable', 'remove-wp-meta-tags' )
    );
    echo "<select id='ejs' name='rm_plugin_global_settings[rm_enable_js_minify]' style='width:20%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_enable_js_minify'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$label</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you also want to minify js code of your website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_remove_html_js_css_comment_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_remove_html_js_css_comment']) ) {
        $options['rm_remove_html_js_css_comment'] = 'yes';
    }

    $items = array(
        'yes'   => __( 'Yes', 'remove-wp-meta-tags' ),
        'no'    => __( 'No', 'remove-wp-meta-tags' )
    );
    echo "<select id='ecomment' name='rm_plugin_global_settings[rm_remove_html_js_css_comment]' style='width:20%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_remove_html_js_css_comment'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$label</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you also want to remove all html, css and js comments from your website code.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_remove_xhtml_void_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_remove_xhtml_void']) ) {
        $options['rm_remove_xhtml_void'] = 'yes';
    }

    $items = array(
        'yes'   => __( 'Yes', 'remove-wp-meta-tags' ),
        'no'    => __( 'No', 'remove-wp-meta-tags' )
    );
    echo "<select id='exhtml' name='rm_plugin_global_settings[rm_remove_xhtml_void]' style='width:20%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_remove_xhtml_void'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$label</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you also want to remove XHTML closing tags from HTML5 void elements from your website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_remove_relative_domain_url_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_remove_relative_domain_url']) ) {
        $options['rm_remove_relative_domain_url'] = 'yes';
    }

    $items = array(
        'yes'   => __( 'Yes', 'remove-wp-meta-tags' ),
        'no'    => __( 'No', 'remove-wp-meta-tags' )
    );
    echo "<select id='erelative' name='rm_plugin_global_settings[rm_remove_relative_domain_url]' style='width:20%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_remove_relative_domain_url'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$label</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you also want to remove Remove relative domain from internal URLs from your website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_remove_protocol_domain_url_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_remove_protocol_domain_url']) ) {
        $options['rm_remove_protocol_domain_url'] = 'no';
    }

    $items = array(
        'yes'   => __( 'Yes', 'remove-wp-meta-tags' ),
        'no'    => __( 'No', 'remove-wp-meta-tags' )
    );
    echo "<select id='eprotocol' name='rm_plugin_global_settings[rm_remove_protocol_domain_url]' style='width:20%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_remove_protocol_domain_url'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$label</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you also want to remove remove schemes (HTTP: and HTTPS:) from all URLs of your website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_support_multibyte_encoding_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_support_multibyte_encoding']) ) {
        $options['rm_support_multibyte_encoding'] = 'no';
    }

    $items = array(
        'yes'   => __( 'Enable', 'remove-wp-meta-tags' ),
        'no'    => __( 'Disable', 'remove-wp-meta-tags' )
    );
    echo "<select id='utf8' name='rm_plugin_global_settings[rm_support_multibyte_encoding]' style='width:20%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_support_multibyte_encoding'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$label</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable support for multi-byte UTF-8 encoding this if you see any odd characters on your website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

function rm_enable_minify_liu_display() {
    $options = get_option('rm_plugin_global_settings');

    if( !isset($options['rm_enable_minify_liu']) ) {
        $options['rm_enable_minify_liu'] = 'disable';
    }

    $items = array(
        'enable'   => __( 'Enable', 'remove-wp-meta-tags' ),
        'disable'  => __( 'Disable', 'remove-wp-meta-tags' )
    );
    echo "<select id='mliu' name='rm_plugin_global_settings[rm_enable_minify_liu]' style='width:20%'>";
    foreach( $items as $item => $label ) {
        $selected = ($options['rm_enable_minify_liu'] == $item) ? 'selected="selected"' : '';
        echo "<option value='$item' $selected>$label</option>";
    }
    echo "</select>";
    ?>
    &nbsp;&nbsp;<span class="tooltip" title="<?php _e( 'Enable this if you also want to minify code for logged in users of your website.', 'remove-wp-meta-tags' ); ?>"><span title="" class="dashicons dashicons-editor-help"></span></span>
    <?php
}

?>