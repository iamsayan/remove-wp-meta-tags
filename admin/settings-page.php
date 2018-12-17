<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Admin
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

?>

<div class="wrap">
    <h1><?php _e( 'Easy Header Footer', 'remove-wp-meta-tags' ); ?> <span style="font-size:12px;"><?php _e( 'Ver', 'remove-wp-meta-tags' ); ?> <?php echo rm_print_plugin_version() ?></span></h1>
	<div class="rw-about-text"><?php _e( 'Customize WordPress header, add custom code and enable, disable or remove the unwanted meta tags and links very easily.', 'remove-wp-meta-tags' ); ?></div><hr>
    <h2 id="nav-container" class="nav-tab-wrapper">
        <a href="#meta" class="nav-tab active" id="btn1"><span class="dashicons dashicons-editor-removeformatting" style="padding-top: 2px;"></span> <?php _e( 'WP Meta', 'remove-wp-meta-tags' ); ?></a>
        <a href="#disable" class="nav-tab" id="btn2"><span class="dashicons dashicons-trash" style="padding-top: 2px;"></span> <?php _e( 'Disable', 'remove-wp-meta-tags' ); ?></a>
        <a href="#security" class="nav-tab" id="btn3"><span class="dashicons dashicons-lock" style="padding-top: 2px;"></span> <?php _e( 'Security', 'remove-wp-meta-tags' ); ?></a>
        <a href="#privacy" class="nav-tab" id="btn4"><span class="dashicons dashicons-post-status" style="padding-top: 2px;"></span> <?php _e( 'Privacy', 'remove-wp-meta-tags' ); ?></a>
        <a href="#header-footer" class="nav-tab" id="btn5"><span class="dashicons dashicons-editor-code" style="padding-top: 2px;"></span> <?php _e( 'Header & Footer', 'remove-wp-meta-tags' ); ?></a>
        <a href="#minify" class="nav-tab" id="btn6"><span class="dashicons dashicons-screenoptions" style="padding-top: 2px;"></span> <?php _e( 'Minify', 'remove-wp-meta-tags' ); ?></a>
        <a href="#misc" class="nav-tab" id="btn7"><span class="dashicons dashicons-admin-plugins" style="padding-top: 2px;"></span> <?php _e( 'Misc.', 'remove-wp-meta-tags' ); ?></a>
        <a href="#tools" class="nav-tab" id="btn8"><span class="dashicons dashicons-admin-tools" style="padding-top: 2px;"></span> <?php _e( 'Tools', 'remove-wp-meta-tags' ); ?></a>
        <button class="nav-tab donate" style="cursor: pointer;" onclick="window.open('http://bit.ly/2I0Gj60', '_blank'); return false;"><span class="dashicons dashicons-smiley" style="padding-top: 2px;"></span> <?php _e( 'Donate this plugin', 'remove-wp-meta-tags' ); ?></button>
    </h2>
    <script>
        var header = document.getElementById("nav-container");
        var btns = header.getElementsByClassName("nav-tab");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
            });
        }
    </script>
    <div id="form_area">
        <div id="main-form">
            <form id="form" method="post" action="options.php">
            <?php settings_fields("rm_plugin_section"); ?>
                <div id="plugin-remove"> <?php
                    do_settings_sections('rm_remove');
                    submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' );
                ?> </div>
                <div style="display:none;" id="plugin-disable"> <?php
                    do_settings_sections('rm_disable');
                    submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' );
                ?> </div>
                <div style="display:none;" id="plugin-security"> <?php
                    do_settings_sections('rm_security');
                    ?><p><strong><span style="color:red"><?php _e( 'Important Note:', 'remove-wp-meta-tags' ); ?></span></strong> <i><?php _e( 'Use \'Enable HSTS Header\' option if you have a valid SSL for the website. If you remove HTTPS before disabling HSTS your website will become inaccessible to visitors for up to the max-age you have set or until you support HTTPS again.', 'remove-wp-meta-tags' ); ?>
                    <a href = "https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security" target = "_blank"><?php _e( 'Read more', 'remove-wp-meta-tags' ); ?></a></i></p>
                    <?php submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' );
                ?> </div>
                <div style="display:none;" id="plugin-extra"> <?php
                    do_settings_sections('rm_other');
                    ?><p><strong><?php _e( 'Note:', 'remove-wp-meta-tags' ); ?></strong> <i><?php _e( 'This feature removes <code>ver=5.0.x</code> from your wordpress website\'s source code.', 'remove-wp-meta-tags' ); ?></i></p>
                    <?php submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' );
                ?> </div>
                <div style="display:none;" id="plugin-header-footer"> <?php
                    do_settings_sections('rm_header_footer');
                    submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' );
                ?> </div>
                <div style="display:none;" id="plugin-minify"> <?php
                    do_settings_sections('rm_plugin_minify');
                    submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' );
                ?> </div>
                <div style="display:none;" id="plugin-misc"> <?php
                    do_settings_sections('rm_plugin_tools');
                    submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' );
                ?> </div> 
                <div id="progressMessage" class="progressModal" style="display:none;"><?php _e( 'Please wait...', 'remove-wp-meta-tags' ); ?></div>
                <div id="saveMessage" class="successModal" style="display:none;"><p><?php _e( 'Settings Saved Successfully!', 'remove-wp-meta-tags' ); ?></p></div>
            </form>
            <div style="display:none;" id="plugin-tools">
                <h3><?php _e( 'Plugin Tools', 'remove-wp-meta-tags' ); ?> </h3><p><hr></p>
                    <span><strong><?php _e( 'Export Settings', 'remove-wp-meta-tags' ); ?></strong></span>
		    		<p><?php _e( 'Export the plugin settings for this site as a .json file. This allows you to easily import the configuration into another site.', 'remove-wp-meta-tags' ); ?></p>
		    		<form method="post">
		    			<p><input type="hidden" name="rm_export_action" value="rm_export_settings" /></p>
		    			<p>
		    				<?php wp_nonce_field( 'rm_export_nonce', 'rm_export_nonce' ); ?>
		    				<?php submit_button( __( 'Export Settings', 'remove-wp-meta-tags' ), 'secondary', 'submit', false ); ?>
		    			</p>
		    		</form>
                <p><hr></p>
                    <span><strong><?php _e( 'Import Settings', 'remove-wp-meta-tags' ); ?></strong></span>
		    		<p><?php _e( 'Import the plugin settings from a .json file. This file can be obtained by exporting the settings on another site using the form above.', 'remove-wp-meta-tags' ); ?></p>
		    		<form method="post" enctype="multipart/form-data">
		    			<p><input type="file" name="import_file" accept=".json"/></p>
		    			<p>
		    				<input type="hidden" name="rm_import_action" value="rm_import_settings" />
		    				<?php wp_nonce_field( 'rm_import_nonce', 'rm_import_nonce' ); ?>
		    				<?php submit_button( __( 'Import Settings', 'remove-wp-meta-tags' ), 'secondary', 'submit', false ); ?>
		    			</p>
		    		</form>
                <p><hr></p>
                    <span><strong><?php _e( 'Reset Settings', 'remove-wp-meta-tags' ); ?></strong></span>
		    		<p style="color:red"><strong>WARNING: </strong><?php _e( 'Resetting will delete all custom options to the default settings of the plugin in your database.', 'remove-wp-meta-tags' ); ?></p>
		    		<form method="post">
		    			<p><input type="hidden" name="rm_reset_action" value="rm_reset_settings" /></p>
	                    <p>
		    				<?php wp_nonce_field( 'rm_reset_nonce', 'rm_reset_nonce' ); ?>
		    				<?php submit_button( __( 'Reset Settings', 'remove-wp-meta-tags' ), 'secondary', 'submit', false ); ?>
		    		    </p>
		    		</form>
                <br>
                <h3>My WordPress Plugins</h3><p><hr></p>
                <p><strong>Like this plugin? Check out my other WordPress plugins:</strong></p>
                <li><strong><a href = "https://wordpress.org/plugins/wp-last-modified-info/" target = "_blank">WP Last Modified Info</a></strong> - Display last update date and time on pages and posts very easily with 'dateModified' Schema Markup.</li>
                <li><strong><a href = "https://wordpress.org/plugins/ultimate-facebook-comments/" target = "_blank">Ultimate Facebook Comments</a></strong> - Ultimate Facebook Comment Solution with instant email notification for any WordPress Website. Everything is customizable.</li>
                <li><strong><a href = "https://wordpress.org/plugins/change-wp-page-permalinks/" target = "_blank">WP Page Permalink Extension</a></strong> - Add any page extension like .html, .php, .aspx, .htm, .asp, .shtml only to wordpress pages very easily (tested on Yoast SEO).</li>
                <br>
            </div> 
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#form').submit(function() {
                    $('#progressMessage').show();
                    $(".save-settings").addClass("disabled");
                    $(".save-settings").val("<?php _e( 'Saving...', 'remove-wp-meta-tags' ); ?>");
                    $(this).ajaxSubmit({
                        success: function() {
                            $('#progressMessage').fadeOut();
                            $('#saveMessage').show().delay(4000).fadeOut();
                            $(".save-settings").removeClass("disabled");
                            $(".save-settings").val("<?php _e( 'Save Settings', 'remove-wp-meta-tags' ); ?>");
                        }
                    });
                    return false;
                });
            });
        </script>
    </div>
</div>

