<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Ultimate WP Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

//WP generator meta tag removal
if( isset($options['rm_meta_generator_cb']) && ($options['rm_meta_generator_cb'] == 1) ) {
	function rm_remove_version_meta() {
        return '';
    }
    add_filter('the_generator', 'rm_remove_version_meta');

    function rm_override_vc_generator() {
        // trigger if visuaal composer is enabled
        if ( class_exists( 'Vc_Manager' ) ) {
            remove_action('wp_head', array(visual_composer(), 'addMetaData'));
        }
    }
    add_action('wp_head', 'rm_override_vc_generator', 1);

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if ( is_plugin_active( 'LayerSlider/layerslider.php' ) ) {
        add_filter('ls_meta_generator', function() {
            return '';
        });
    }

    if ( !empty ( $GLOBALS['sitepress'] ) ) {
        function rm_remove_wpml_generator() {
            remove_action(
                current_filter(),
                array ( $GLOBALS['sitepress'], 'meta_generator_tag' )
            );
        }
        add_action( 'wp_head', 'rm_remove_wpml_generator', 0 );
    }
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

//Remove jquery migrate
if( isset($options['rm_jquery_migrate_cb']) && ($options['rm_jquery_migrate_cb'] == 1) ) {
    function rm_remove_jquery_migrate( $scripts ) {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];
			
			if ( $script->deps ) { // Check whether the script has any dependencies
				$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
			}
		}
	}
	add_action( 'wp_default_scripts', 'rm_remove_jquery_migrate' );
}

//Remove viewport meta
if( isset($options['rm_meta_viewport_cb']) && ($options['rm_meta_viewport_cb'] == 1) ) {
    function rm_html_output_callback($viewport) {
        $viewport = preg_replace(array('/<meta name="viewport" content="(.|s)*?">/', '/<meta name="viewport" content="(.|s)*?" \/>/'), '', $viewport);
        return $viewport;
    }
    function rm_viewport_meta_start() {
        ob_start('rm_html_output_callback');
    }
    if ( !is_admin() ) {
        add_action('get_header', 'rm_viewport_meta_start');
    }
}

//Remove html comments
if( isset($options['rm_remove_html_comments_cb']) && ($options['rm_remove_html_comments_cb'] == 1) ) {
    function rm_html_callback($buffer) {
        $buffer = preg_replace('/<!--(.|s)*?-->/', '', $buffer);
        return $buffer;
    }
    function rm_buffer_start() {
        ob_start('rm_html_callback');
    }
    function rm_buffer_end() {
        ob_end_flush();
    }
    add_action('get_header', 'rm_buffer_start');
    add_action('wp_footer', 'rm_buffer_end');
}

?>