<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

add_action( 'init', 'ehf_privacy_code_output' );

function ehf_privacy_code_output() {
    $options = get_option('rm_plugin_global_settings');

    //Hook into the style loader and remove the version information.
    if( isset($options['rm_ver_remove_style_cb']) && ($options['rm_ver_remove_style_cb'] == 1) ) {
        add_filter( 'style_loader_src', 'ehf_hide_wordpress_version_in_script', 20000 );
    }
    
    // Hook into the script loader and remove the version information.
    if( isset($options['rm_ver_remove_script_cb']) && ($options['rm_ver_remove_script_cb'] == 1) ) {
        add_filter( 'script_loader_src', 'ehf_hide_wordpress_version_in_script', 20000 );
    }

    // Hook into the script loader and remove the version information.
    if( isset($options['rm_add_defer_script_cb']) && ($options['rm_add_defer_script_cb'] != 'none') ) {
        add_filter( 'script_loader_tag', 'ehf_add_defer_attribute_scripts', 10, 3 );
    }
}

function ehf_hide_wordpress_version_in_script( $target_url ) {
    $options = get_option('rm_plugin_global_settings');

    $exclude_file_list = !empty( $options['rm_ver_remove_script_exclude_css'] ) ? $options['rm_ver_remove_script_exclude_css'] : '';
    $exclude_files_arr = array_map( 'trim', explode( ',', $exclude_file_list ) );

    $filename_arr = explode( '?', basename( $target_url ) );
    $filename = $filename_arr[0];

    // first check the list of user defined excluded CSS/JS files
    if ( !is_admin() && !in_array( trim( $filename ), $exclude_files_arr ) ) {
        /* check if "ver=" argument exists in the url or not */
        if( strpos( $target_url, 'ver=' ) ) {
            $target_url = remove_query_arg( 'ver', $target_url );
        }
    }
    return $target_url;
}

function ehf_add_defer_attribute_scripts( $tag, $handle, $src ) {
    $options = get_option('rm_plugin_global_settings');

    if( is_admin() ) {
        return $tag;
    }

    $type = '';
    if( isset($options['rm_add_defer_script_cb']) && ($options['rm_add_defer_script_cb'] == 'defer') ) {
        $type = '<script defer';
    } elseif( isset($options['rm_add_defer_script_cb']) && ($options['rm_add_defer_script_cb'] == 'async') ) {
        $type = '<script async';
    } elseif( isset($options['rm_add_defer_script_cb']) && ($options['rm_add_defer_script_cb'] == 'both') ) {
        $type = '<script async defer';
    }

    // the fine names of the enqueued scripts we want to defer/async
    $exclude_files = !empty( $options['rm_add_defer_script_exclude'] ) ? array_map( 'trim', explode( ',', $options['rm_add_defer_script_exclude'] ) ) : '';

    if ( !empty( $exclude_files ) ) {
        foreach( $exclude_files as $exclude_file ) {
            if ( strpos( $tag, $exclude_file ) ) {
                return $tag;
            }
        }
    }

    return str_replace( '<script', $type, str_replace( array( 'defer ', 'async ' ), '',  $tag ) );
}

?>