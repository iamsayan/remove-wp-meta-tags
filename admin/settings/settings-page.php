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
    <div class="head-wrap">
        <h1 class="title">Easy Header Footer<span class="title-count"><?php echo EHF_PLUGIN_VERSION; ?></span></h1>
        <div><?php _e( 'The Easy Header Footer Plugin for WordPress. Customize WP Header and Footer very easily.', 'remove-wp-meta-tags' ); ?></div><hr>
        <div class="top-sharebar">
            <a class="share-btn rate-btn" href="https://wordpress.org/support/plugin/remove-wp-meta-tags/reviews/?filter=5#new-post" target="_blank" title="<?php _e( 'Please rate 5 stars if you like Easy Header Footer', 'remove-wp-meta-tags' ); ?>"><span class="dashicons dashicons-star-filled"></span> <?php _e( 'Rate 5 stars', 'remove-wp-meta-tags' ); ?></a>
            <a class="share-btn twitter" href="https://twitter.com/home?status=Check%20out%20Easy%20Header%20Footer,%20a%20lightweight%20plugin%20for%20customizing%20%23WordPress%20header,%20add%20custom%20code%20and%20enable,%20disable%20or%20remove%20the%20unwanted%20meta%20tags%20and%20links%20from%20the%20source%20code.%20https%3A//wordpress.org/plugins/remove-wp-meta-tags/%20via%20%40im_sayaan" target="_blank"><span class="dashicons dashicons-twitter"></span> <?php _e( 'Tweet about Easy Header Footer', 'remove-wp-meta-tags' ); ?></a>
        </div>
    </div>
    <div id="nav-container" class="nav-tab-wrapper">
        <a href="#meta" class="nav-tab active" id="btn1"><span class="dashicons dashicons-editor-removeformatting" style="padding-top: 2px;"></span> <?php _e( 'WP Meta', 'remove-wp-meta-tags' ); ?></a>
        <a href="#disable" class="nav-tab" id="btn2"><span class="dashicons dashicons-trash" style="padding-top: 2px;"></span> <?php _e( 'Disable', 'remove-wp-meta-tags' ); ?></a>
        <a href="#security" class="nav-tab" id="btn3"><span class="dashicons dashicons-lock" style="padding-top: 2px;"></span> <?php _e( 'Security', 'remove-wp-meta-tags' ); ?></a>
        <a href="#script" class="nav-tab" id="btn4"><span class="dashicons dashicons-filter" style="padding-top: 2px;"></span> <?php _e( 'Script', 'remove-wp-meta-tags' ); ?></a>
        <a href="#header-footer" class="nav-tab" id="btn5"><span class="dashicons dashicons-editor-code" style="padding-top: 2px;"></span> <?php _e( 'Header & Footer', 'remove-wp-meta-tags' ); ?></a>
        <a href="#minify" class="nav-tab" id="btn6"><span class="dashicons dashicons-screenoptions" style="padding-top: 2px;"></span> <?php _e( 'Minify', 'remove-wp-meta-tags' ); ?></a>
        <a href="#tools" class="nav-tab" id="btn7"><span class="dashicons dashicons-admin-tools" style="padding-top: 2px;"></span> <?php _e( 'Tools', 'remove-wp-meta-tags' ); ?></a>
    </div>
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
    <div id="poststuff" style="padding-top: 0;">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <form id="main-form" method="post" action="options.php">
                    <?php settings_fields( 'ehf_plugin_section' ); ?>
                    <div id="ehf-remove" class="postbox">
				        <h3 class="hndle ehf-hndle">
                            <span class="ehf-heading">
                                <?php _e( 'WP Meta Options', 'remove-wp-meta-tags' ); ?>
                            </span>
                        </h3>
				        <div class="inside ehf-inside">
                            <?php do_settings_sections( 'ehf_remove' ); ?>
                            <?php submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' ); ?>
                        </div>
                    </div>
                    <div id="ehf-disable" class="postbox" style="display: none;">
				        <h3 class="hndle ehf-hndle">
                            <span class="ehf-heading">
                                <?php _e( 'Disable Options', 'remove-wp-meta-tags' ); ?>
                            </span>
                        </h3>
				        <div class="inside ehf-inside">
                            <?php do_settings_sections( 'ehf_disable' ); ?>
                            <?php submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' ); ?>
                        </div>
                    </div>
                    <div id="ehf-security" class="postbox" style="display: none;">
				        <h3 class="hndle ehf-hndle">
                            <span class="ehf-heading">
                                <?php _e( 'Security Options', 'remove-wp-meta-tags' ); ?>
                            </span>
                        </h3>
				        <div class="inside ehf-inside">
                            <?php do_settings_sections( 'ehf_security' ); ?>
                            <?php if( ehf_check_is_ssl() ) { ?><p><strong><span style="color:red"><?php _e( 'Important Note:', 'remove-wp-meta-tags' ); ?></span></strong> <i><?php _e( 'Use \'Enable HSTS Security Policy\' option if you have a valid SSL for the website. If you remove HTTPS before disabling HSTS your website will become inaccessible to visitors for up to the max-age you have set or until you support HTTPS again.', 'remove-wp-meta-tags' ); ?>
                            <a href = "https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security" target = "_blank"><?php _e( 'Read more', 'remove-wp-meta-tags' ); ?></a></i></p><?php } ?>
                            <?php submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' ); ?>
                        </div>
                    </div>
                    <div id="ehf-script" class="postbox" style="display: none;">
				        <h3 class="hndle ehf-hndle">
                            <span class="ehf-heading">
                                <?php _e( 'Script Options', 'remove-wp-meta-tags' ); ?>
                            </span>
                        </h3>
				        <div class="inside ehf-inside">
                            <?php do_settings_sections( 'ehf_script' ); ?>
                            <?php submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' ); ?>
                        </div>
                    </div>
                    <div id="ehf-header-footer" class="postbox" style="display: none;">
				        <h3 class="hndle ehf-hndle">
                            <span class="ehf-heading">
                                <?php _e( 'Header & Footer Code', 'remove-wp-meta-tags' ); ?>
                            </span>
                        </h3>
				        <div class="inside ehf-inside">
                            <?php do_settings_sections( 'ehf_header_footer' ); ?>
                            <?php submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' ); ?>
                        </div>
                    </div>
                    <div id="ehf-minify" class="postbox" style="display: none;">
				        <h3 class="hndle ehf-hndle">
                            <span class="ehf-heading">
                                <?php _e( 'Minify Options', 'remove-wp-meta-tags' ); ?>
                            </span>
                        </h3>
				        <div class="inside ehf-inside">
                            <?php do_settings_sections( 'ehf_plugin_minify' ); ?>
                            <?php submit_button( __( 'Save Settings', 'remove-wp-meta-tags' ), 'primary save-settings' ); ?>
                        </div>
                    </div>
                    <div id="progressMessage" class="progressModal" style="display:none;">
                        <?php _e( 'Please wait...', 'remove-wp-meta-tags' ); ?>
                    </div>
                    <div id="saveMessage" class="successModal" style="display:none;">
                        <p class="ehf-success-msg">
                            <?php _e( 'Settings Saved Successfully!', 'remove-wp-meta-tags' ); ?>
                        </p>
                    </div>
                </form>
                <div id="ehf-tools" class="postbox" style="display: none;">
				    <h3 class="hndle ehf-hndle">
                        <span class="ehf-heading">
                            <?php _e( 'Plugin Tools', 'remove-wp-meta-tags' ); ?>
                        </span>
                    </h3>
				    <div class="inside ehf-inside">
                        <p><strong><?php _e( 'Export Settings', 'remove-wp-meta-tags' ); ?></strong>
		    	            <p><?php _e( 'Export the plugin settings for this site as a .json file. This allows you to easily import the configuration into another site.', 'remove-wp-meta-tags' ); ?></p>
		    	            <form method="post">
		    	    	        <p><input type="hidden" name="ehf_export_action" value="ehf_export_settings" /></p>
		    	    	        <p>
		    	    		        <?php wp_nonce_field( 'ehf_export_nonce', 'ehf_export_nonce' ); ?>
		    	    		        <?php submit_button( __( 'Export Settings', 'remove-wp-meta-tags' ), 'secondary', 'submit', false ); ?>
		    	    	        </p>
                            </form>
                        </p><hr>
                        <p><strong><?php _e( 'Import Settings', 'remove-wp-meta-tags' ); ?></strong>
		    	            <p><?php _e( 'Import the plugin settings from a .json file. This file can be obtained by exporting the settings on another site using the form above.', 'remove-wp-meta-tags' ); ?></p>
		    	            <form method="post" enctype="multipart/form-data">
		    	    	        <p><input type="file" name="import_file" accept=".json"/></p>
		    	    	        <p>
		    	    		        <input type="hidden" name="ehf_import_action" value="ehf_import_settings" />
		    	    		        <?php wp_nonce_field( 'ehf_import_nonce', 'ehf_import_nonce' ); ?>
		    	    		        <?php submit_button( __( 'Import Settings', 'remove-wp-meta-tags' ), 'secondary', 'submit', false ); ?>
		    	    	        </p>
		    	            </form>
                        </p><hr>
                        <p><strong><?php _e( 'Reset Settings', 'remove-wp-meta-tags' ); ?></strong>
		    	            <p style="color:red"><strong>WARNING: </strong><?php _e( 'Resetting will delete all custom options to the default settings of the plugin in your database.', 'remove-wp-meta-tags' ); ?></p>
		    	            <form method="post">
		    	            	<p><input type="hidden" name="ehf_reset_action" value="ehf_reset_settings" /></p>
	                            <p>
		    	            		<?php wp_nonce_field( 'ehf_reset_nonce', 'ehf_reset_nonce' ); ?>
		    	            		<?php submit_button( __( 'Reset Settings', 'remove-wp-meta-tags' ), 'secondary', 'submit', false ); ?>
		    	                </p>
                            </form>
                        </p>
                    </div>
                </div>
                <div class="coffee-box">
                    <div class="coffee-amt-wrap">
                        <p><select class="coffee-amt">
                            <option value="5usd">$5</option>
                            <option value="6usd">$6</option>
                            <option value="7usd">$7</option>
                            <option value="8usd">$8</option>
                            <option value="9usd">$9</option>
                            <option value="10usd" selected="selected">$10</option>
                            <option value="11usd">$11</option>
                            <option value="12usd">$12</option>
                            <option value="13usd">$13</option>
                            <option value="14usd">$14</option>
                            <option value="15usd">$15</option>
                            <option value=""><?php _e( 'Custom', 'remove-wp-meta-tags' ); ?></option>
                        </select></p>
                        <a class="button button-primary buy-coffee-btn" style="margin-left: 2px;" href="https://www.paypal.me/iamsayan/10usd" data-link="https://www.paypal.me/iamsayan/" target="_blank"><?php _e( 'Buy me a coffee!', 'remove-wp-meta-tags' ); ?></a>
                    </div>
                    <span class="coffee-heading"><?php _e( 'Buy me a coffee!', 'remove-wp-meta-tags' ); ?></span>
                    <p style="text-align: justify;"><?php printf( __( 'Thank you for using %s. If you found the plugin useful buy me a coffee! Your donation will motivate and make me happy for all the efforts. You can donate via PayPal.', 'remove-wp-meta-tags' ), '<strong>Easy Header Footer v' . EHF_PLUGIN_VERSION . '</strong>' ); ?></strong></p>
                    <p style="text-align: justify; font-size: 12px; font-style: italic;">Developed with <span style="color:#e25555;">♥</span> by <a href="https://sayandatta.com" target="_blank" style="font-weight: 500;">Sayan Datta</a> | <a href="https://github.com/iamsayan/remove-wp-meta-tags" target="_blank" style="font-weight: 500;">GitHub</a> | <a href="https://wordpress.org/support/plugin/remove-wp-meta-tags" target="_blank" style="font-weight: 500;">Support</a> | <a href="https://translate.wordpress.org/projects/wp-plugins/remove-wp-meta-tags/" target="_blank" style="font-weight: 500;">Translate</a> | <a href="https://wordpress.org/support/plugin/remove-wp-meta-tags/reviews/?rate=5#new-post" target="_blank" style="font-weight: 500;">Rate it</a> (<span style="color:#ffa000;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>) on WordPress.org, if you like this plugin.</p>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $('#main-form').submit(function() {
                            $('#progressMessage').show();
                            $(".save-settings").addClass("disabled");
                            $(".save-settings").val("<?php _e( 'Saving...', 'remove-wp-meta-tags' ); ?>");
                            $(this).ajaxSubmit({
                                success: function() {
                                    $('#progressMessage').fadeOut();
                                    $('#saveMessage').show().delay(4000).fadeOut();
                                    $(".save-settings").removeClass("disabled");
                                    $(".save-settings").val("<?php _e( 'Save Settings', 'remove-wp-meta-tags' ); ?>");
                                    if ($('#changetrigger').val() == 'yes') {
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                                            dataType: "json",
                                            data: {
                                                action: "ehf_trigger_flush_rewrite_rules",
                                            },
                                            success:function() {
                                                $('#changetrigger').val('no');
                                            }
                                        });
                                    }
                                }
                            });
                            return false;
                        });
                    });
                </script>
            </div>
            <div id="postbox-container-1" class="postbox-container">
                <div class="postbox">
                    <h3 class="hndle ehf-hndle" style="text-align: center;"><?php _e( 'My Other Plugins!', 'remove-wp-meta-tags' ); ?></h3>
                    <div class="inside">
                        <div class="misc-pub-section">
                            <span class="dashicons dashicons-clock"></span>
                            <label>
                                <strong><a href="https://wordpress.org/plugins/wp-last-modified-info/" target="_blank">WP Last Modified Info</a>: </strong>
                                <?php _e( 'Display last update date and time on frontend with \'dateModified\' Schema Markup.', 'remove-wp-meta-tags' ); ?>
                            </label>
                        </div>
                        <hr>
                        <div class="misc-pub-section">
                            <span class="dashicons dashicons-admin-comments"></span>
                            <label>
                                <strong><a href="https://wordpress.org/plugins/ultimate-facebook-comments/" target="_blank">Ultimate Facebook Comments</a>: </strong>
                                <?php _e( 'Ultimate Facebook Comment Solution with instant email notification for any WordPress Website.', 'remove-wp-meta-tags' ); ?>
                            </label>
                        </div>
                        <hr>
                        <div class="misc-pub-section">
                            <span class="dashicons dashicons-admin-links"></span>
                            <label>
                                <strong><a href="https://wordpress.org/plugins/change-wp-page-permalinks/" target="_blank">WP Page Permalink Extension</a>: </strong>
                                <?php _e( 'Add any page extension like .html, .php, .aspx, .htm, .asp, .shtml only to pages.', 'remove-wp-meta-tags' ); ?>
                            </label>
                        </div>
                        <hr>
                        <div class="misc-pub-section">
                            <span class="dashicons dashicons-megaphone"></span>
                            <label>
                                <strong><a href="https://wordpress.org/plugins/simple-posts-ticker/" target="_blank">Simple Posts Ticker</a>: </strong>
                                <?php _e( 'Simple Posts Ticker is a small tool that shows your most recent posts in a marquee style.', 'remove-wp-meta-tags' ); ?>
                            </label>
                        </div>
                        <hr>
                        <div class="misc-pub-section">
                            <span class="dashicons dashicons-admin-generic"></span>
                            <label>
                                <strong><a href="https://wordpress.org/plugins/fb-account-kit-login/" target="_blank">Facebook Account Kit Login</a>: </strong>
                                <?php _e( 'This plugin helps to easily login or register to wordpress by using SMS on Phone or WhatsApp or Email Verification without any password.', 'remove-wp-meta-tags' ); ?>
                            </label>
                        </div>
                        <hr>
                        <div class="misc-pub-section">
                            <span class="dashicons dashicons-update"></span>
                            <label>
                                <strong><a href="https://wordpress.org/plugins/wp-auto-republish/" target="_blank">WP Auto Republish</a>: </strong>
                                <?php _e( 'Automatically republish you old evergreen content to grab better SEO.', 'remove-wp-meta-tags' ); ?>
                            </label>
                        </div>
                    </div>
                </div>
            </diV>
        </div>
    </div>
</div>

