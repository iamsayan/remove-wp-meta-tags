<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Ultimate WP Header Footer
 * @subpackage Admin
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

 ?>

<div class="wrap">

    <h1><?php _e( 'Ultimate WP Header Footer', 'remove-wp-meta-tags' ); ?> <span style="font-size:12px;"><?php _e( 'Ver', 'remove-wp-meta-tags' ); ?> <?php echo rm_print_plugin_version() ?></span></h1>
		<div class="rw-about-text">
        <?php _e( 'Customize WordPress header, add custom code and enable, disable or remove the unwanted meta tags and links very easily.', 'remove-wp-meta-tags' ); ?>
		</div><hr>
 
        <h2 id="nav-container" class="nav-tab-wrapper">
            <a href="#meta" class="nav-tab active" id="btn1"><?php _e( 'Meta Options', 'remove-wp-meta-tags' ); ?></a>
            <a href="#disable" class="nav-tab" id="btn2"><?php _e( 'Disable Options', 'remove-wp-meta-tags' ); ?></a>
            <a href="#security" class="nav-tab" id="btn3"><?php _e( 'Security Options', 'remove-wp-meta-tags' ); ?></a>
            <a href="#privacy" class="nav-tab" id="btn4"><?php _e( 'Privacy Options', 'remove-wp-meta-tags' ); ?></a>
            <a href="#header-footer" class="nav-tab" id="btn5"><?php _e( 'Header & Footer', 'remove-wp-meta-tags' ); ?></a>
            <a href="#minify" class="nav-tab" id="btn6"><?php _e( 'Minify Options', 'remove-wp-meta-tags' ); ?></a>
            <a href="#tools" class="nav-tab" id="btn7"><?php _e( 'Tools', 'remove-wp-meta-tags' ); ?></a>
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

        <form id="form" method="post" action="options.php">

        <?php settings_fields("rm_plugin_section"); ?>

            <div id="plugin-remove"> <?php
            
                do_settings_sections("rm_remove");
                submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary' );
            
            ?> </div>

            <div style="display:none" id="plugin-disable"> <?php
                 
                do_settings_sections("rm_disable");
                submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary' );

            ?> </div>

            <div style="display:none" id="plugin-security"> <?php

                do_settings_sections("rm_security");
                ?><p><strong><font color="red"><?php _e( 'Important Note:', 'remove-wp-meta-tags' ); ?></font></strong> <i><?php _e( 'Use \'Enable HSTS Header\' option if you have a valid SSL for the website. If you remove HTTPS before disabling HSTS your website will become inaccessible to visitors for up to the max-age you have set or until you support HTTPS again.', 'remove-wp-meta-tags' ); ?>
                <a href = "https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security" target = "_blank"><?php _e( 'Read more', 'remove-wp-meta-tags' ); ?></a></i></p>
                <?php
                submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary' );
               
            ?> </div>

            <div style="display:none" id="plugin-extra"> <?php

                do_settings_sections("rm_other");
                ?><p><strong><?php _e( 'Note:', 'remove-wp-meta-tags' ); ?></strong> <i><?php _e( 'This options help to remove <code>ver=4.9.x</code> from your wordpress website\'s source code.', 'remove-wp-meta-tags' ); ?></i></p>
                <?php
                submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary' );
   
            ?> </div>

            <div style="display:none" id="plugin-header-footer"> <?php

                do_settings_sections("rm_header_footer");
                submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary' );

            ?> </div>

            <div style="display:none" id="plugin-minify"> <?php

                do_settings_sections("rm_plugin_minify");
                submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary' );

            ?> </div>

            <div id="progressMessage" class="progressModal" style="display:none;"><?php _e( 'Please wait...', 'remove-wp-meta-tags' ); ?></div>
            <div id="saveMessage" class="successModal" style="display:none;"><p><?php echo htmlentities(__('Settings Saved Successfully!', 'remove-wp-meta-tags' ), ENT_QUOTES); ?></p></div>
           
        </form>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#form').submit(function() {
                    $('#progressMessage').show().delay(3000).fadeOut();
                    $(this).ajaxSubmit({
                        success: function() {
                            $('#saveMessage').show().delay(3000).fadeOut();
                        }
                    });
                return false;
                });
            });
        </script>

        <div style="display:none" id="plugin-other"> 
            <div style="margin-left:22px;margin-right:22px;"> <h3><?php _e( 'Plugin Tools', 'remove-wp-meta-tags' ); ?></h3><p><hr></p>
                    <span><strong><?php _e( 'Export Settings', 'remove-wp-meta-tags' ); ?></strong></span>
					<p><?php _e( 'Export the plugin settings for this site as a .json file. This allows you to easily import the configuration into another site.', 'remove-wp-meta-tags' ); ?></p>
					<form method="post">
						<p><input type="hidden" name="rm_export_action" value="rm_export_settings" /></p>
						<p>
							<?php wp_nonce_field( 'rm_export_nonce', 'rm_export_nonce' ); ?>
							<?php submit_button( __( 'Export Settings' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
                <p><hr></p>
                    <span><strong><?php _e( 'Import Settings', 'remove-wp-meta-tags' ); ?></strong></span>
					<p><?php _e( 'Import the plugin settings from a .json file. This file can be obtained by exporting the settings on another site using the form above.', 'remove-wp-meta-tags' ); ?></p>
					<form method="post" enctype="multipart/form-data">
						<p><input type="file" name="import_file"/></p>
						<p>
							<input type="hidden" name="rm_import_action" value="rm_import_settings" />
							<?php wp_nonce_field( 'rm_import_nonce', 'rm_import_nonce' ); ?>
							<?php submit_button( __( 'Import Settings' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
                <p><hr></p>
                    <span><strong><?php _e( 'Reset Settings', 'remove-wp-meta-tags' ); ?></strong></span>
					<p style="color:red"><strong><?php _e( 'WARNING:', 'remove-wp-meta-tags' ); ?> </strong><?php _e( 'Resetting will delete all custom options to the default settings of the plugin in your database.', 'remove-wp-meta-tags' ); ?></p>
					<form method="post">
						<p><input type="hidden" name="rm_reset_action" value="rm_reset_settings" /></p>
	                    <p>
							<?php wp_nonce_field( 'rm_reset_nonce', 'rm_reset_nonce' ); ?>
							<?php submit_button( __( 'Reset Settings' ), 'secondary', 'submit', false ); ?>
					    </p>
					</form>
                <br>

                <h3>My WordPress Plugins</h3><p><hr></p>
                <p><strong>Like this plugin? Check out my other WordPress plugins:</strong></p>
                <li><strong><a href = "https://wordpress.org/plugins/wp-last-modified-info/" target = "_blank">WP Last Modified Info</a></strong> - Disaplay Last modified info of posts, pages anywhere on dashboard and frontend of your site.</li>
                <li><strong><a href = "https://wordpress.org/plugins/ultimate-facebook-comments/" target = "_blank">Ultimate Facebook Comments</a></strong> - The Ultimate Facebook Comments Plugin for any WordPress website.</li>
                <li><strong><a href = "https://wordpress.org/plugins/change-wp-page-permalinks/" target = "_blank">WP Page Permalink Extension</a></strong> - Add any page extension like .html, .php to wordpress pages.</li>
                <li><strong><a href = "https://wordpress.org/plugins/all-in-one-wp-solution/" target = "_blank">All In One WP Solution</a></strong> - All In One Solution/customization for WordPress.</li>
                                
                <br></div>
            
            </div>
        </div>
    </div>
<?php

