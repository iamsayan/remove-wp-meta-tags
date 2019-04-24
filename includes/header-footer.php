<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

add_action( 'init', 'ehf_header_footer_code_output' );

function ehf_header_footer_code_output() {
    $options = get_option('rm_plugin_global_settings');

    $header_prio = !empty( $options['rm_header_code_priority'] ) ? $options['rm_header_code_priority'] : '10';
    $footer_prio = !empty( $options['rm_footer_code_priority'] ) ? $options['rm_footer_code_priority'] : '10';

    add_action( 'wp_head', 'ehf_add_custom_header_code', $header_prio );
    add_action( 'wp_footer', 'ehf_add_custom_footer_code', $footer_prio );
}

function ehf_add_custom_header_code() {
    // Ignore admin, feed, robots or trackbacks
	if ( is_admin() || is_feed() || is_robots() || is_trackback() ) {
		return;
    }
        
    $options = get_option('rm_plugin_global_settings');
    $site_head_code = !empty($options['rm_custom_header_ta']) ? $options['rm_custom_header_ta'] : '';
    $meta_head_code = ( is_singular() && !empty( get_post_meta( get_the_ID(), '_rm_header_code', true ) ) ) ? get_post_meta( get_the_ID(), '_rm_header_code', true ) : '';

    $code = $site_head_code . "\n" . $meta_head_code . "\n";
    if ( is_singular() && get_post_meta( get_the_ID(), '_rm_header_disable', true ) == 'yes'  ) {
        $code = $meta_head_code . "\n";
    }

    if ( !empty( $code ) ) {
        echo wp_unslash( $code );
    }
}

function ehf_add_custom_footer_code() {
    // Ignore admin, feed, robots or trackbacks
	if ( is_admin() || is_feed() || is_robots() || is_trackback() ) {
		return;
    }
    $options = get_option('rm_plugin_global_settings');
    $site_footer_code = !empty($options['rm_custom_footer_ta']) ? $options['rm_custom_footer_ta'] : '';
    $meta_footer_code = ( is_singular() && !empty( get_post_meta( get_the_ID(), '_rm_footer_code', true ) ) ) ? get_post_meta( get_the_ID(), '_rm_footer_code', true ) : '';

    $code = $site_footer_code . "\n" . $meta_footer_code . "\n";
    if ( is_singular() && get_post_meta( get_the_ID(), '_rm_footer_disable', true ) == 'yes'  ) {
        $code = $meta_footer_code . "\n";
    }

    if ( !empty( $code ) ) {
        echo wp_unslash( $code );
    }
}

?>