<?php
//silence is Golden
?>

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