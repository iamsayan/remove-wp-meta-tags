<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Ultimate WP Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

if( !empty( $options['rm_custom_header_ta'] ) ) {

    if(!empty($options['rm_header_code_priority'])) {
        $header_prio = get_option('rm_plugin_global_settings')['rm_header_code_priority'];
    } else {
        $header_prio = '10';
    }
    add_action( 'wp_head', 'rm_custom_header_code', $header_prio );
}

function rm_custom_header_code() {

    $options = get_option('rm_plugin_global_settings');
    $site_head_code = get_option('rm_plugin_global_settings')['rm_custom_header_ta'];
    $meta_head_code = get_post_meta( get_the_ID(), '_rm_header_code', true );
    $cur_post_type = get_post_type();

    if ( isset( $options['rm_meta_box_position'] ) && in_array( $cur_post_type, $options['rm_meta_box_position'] ) ) {
        if ( get_post_meta( get_the_ID(), '_rm_header_disable', true ) == 'yes'  ) {
            echo $meta_head_code ."\n";
        } else {
            echo $site_head_code ."\n" . $meta_head_code . "\n";
        }
    } else {
        echo $site_head_code ."\n";
    }
}

if( !empty( $options['rm_custom_footer_ta'] ) ) {

    if(!empty($options['rm_footer_code_priority'])) {
        $footer_prio = get_option('rm_plugin_global_settings')['rm_footer_code_priority'];
    } else {
        $footer_prio = '10';
    }
    add_action( 'wp_footer', 'rm_custom_footer_code', $footer_prio );
}

function rm_custom_footer_code() {

    $options = get_option('rm_plugin_global_settings');
    $site_footer_code = get_option('rm_plugin_global_settings')['rm_custom_footer_ta'];
    $meta_footer_code = get_post_meta( get_the_ID(), '_rm_footer_code', true );
    $cur_post_type = get_post_type();

    if ( isset( $options['rm_meta_box_position'] ) && in_array( $cur_post_type, $options['rm_meta_box_position'] ) ) {
        if ( get_post_meta( get_the_ID(), '_rm_footer_disable', true ) == 'yes'  ) {
            echo $meta_footer_code ."\n";
        } else {
            echo $site_footer_code . "\n" . $meta_footer_code ."\n";
        }
    } else {
        echo $site_footer_code . "\n";
    }
}

?>