<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

add_action( 'init', 'ehf_meta_code_output' );
add_action( 'wp_default_scripts', 'ehf_remove_jquery_migrate' );

function ehf_meta_code_output() {
    $options = get_option('rm_plugin_global_settings');

    //WP generator meta tag removal
    if( isset($options['rm_meta_generator_cb']) && ($options['rm_meta_generator_cb'] == 1) ) {
        add_filter( 'the_generator', function() {
            return '';
        });
        add_action( 'wp_head', 'ehf_override_vc_generator', 1 );
        add_filter( 'ls_meta_generator', function() {
            return '';
        });
        add_action( 'wp_head', 'ehf_remove_wpml_generator', 0 );
    }

    //WP manifest link removal
    if( isset($options['rm_meta_wpmanifest_cb']) && ($options['rm_meta_wpmanifest_cb'] == 1) ) {
        remove_action( 'wp_head', 'wlwmanifest_link' );
    }
    
    //feed links removal
    if( isset($options['rm_meta_feed_cb']) && ($options['rm_meta_feed_cb'] == 1) ) {
        remove_action( 'wp_head', 'feed_links', 2 );
    	remove_action( 'wp_head', 'feed_links_extra', 3 );
    }
    
    //rsd link removal
    if( isset($options['rm_meta_rsd_cb']) && ($options['rm_meta_rsd_cb'] == 1) ) {
        add_action( 'wp', function() {
            remove_action( 'wp_head', 'rsd_link' );
        }, 11);
    }
    
    //shortlink removal
    if( isset($options['rm_meta_short_links_cb']) && ($options['rm_meta_short_links_cb'] == 1) ) {
        remove_action( 'wp_head', 'wp_shortlink_wp_head');
    }
    
    //Remove Previous and next Article Links
    if( isset($options['rm_posts_rel_link_wp_head_cb']) && ($options['rm_posts_rel_link_wp_head_cb'] == 1) ) {
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
    }

    //Remove viewport meta
    if( isset($options['rm_meta_viewport_cb']) && ($options['rm_meta_viewport_cb'] == 1) ) {
        ob_start( 'ehf_viewport_output_callback' );
    }

    //Remove html comments
    if( isset($options['rm_remove_html_comments_cb']) && ($options['rm_remove_html_comments_cb'] == 1) ) {
        ob_start( 'ehf_html_comments_callback' );
    }
}
    
function ehf_override_vc_generator() {
    // trigger if visuaal composer is enabled
    if ( class_exists( 'Vc_Manager' ) ) {
        remove_action( 'wp_head', array( visual_composer(), 'addMetaData' ) );
    }
}

function ehf_remove_wpml_generator() {
    if ( isset( $GLOBALS['sitepress'] ) && !empty( $GLOBALS['sitepress'] ) ) {
        remove_action( current_filter(), array( $GLOBALS['sitepress'], 'meta_generator_tag' ) );
    }
}

function ehf_viewport_output_callback( $buffer ) {
    $buffer = preg_replace( array('/<meta name="viewport" content="(.|s)*?">/', '/<meta name="viewport" content="(.|s)*?" \/>/'), '', $buffer );
    
    return $buffer;
}

function ehf_html_comments_callback( $buffer ) {
    $buffer = preg_replace( '/<!--(.|s)*?-->/', '', $buffer );
    
    return $buffer;
}

function ehf_remove_jquery_migrate( $scripts ) {
    $options = get_option('rm_plugin_global_settings');
    
    if( isset($options['rm_jquery_migrate_cb']) && ($options['rm_jquery_migrate_cb'] == 1) ) {
	    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
            $script = $scripts->registered['jquery'];
            
            if ( $script->deps ) { // Check whether the script has any dependencies
                $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
            }
        }
    }
}

?>