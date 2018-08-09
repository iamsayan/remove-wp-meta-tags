<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Ultimate WP Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

if( isset($options['rm_ver_remove_script_exclude_css']) ) {
    $exclude_file_list = $options['rm_ver_remove_script_exclude_css'];
} else {
    $exclude_file_list = '';
}
$exclude_files_arr = array_map('trim', explode(',', $exclude_file_list));


//remove wp version param from any enqueued scripts
function rm_hide_wordpress_version_in_script( $target_url ) {
    $filename_arr = explode('?', basename($target_url));
    $filename = $filename_arr[0];
    global $exclude_files_arr, $exclude_file_list;
    // first check the list of user defined excluded CSS/JS files
    if (!in_array(trim($filename), $exclude_files_arr)) {
        /* check if "ver=" argument exists in the url or not */
        if(strpos( $target_url, 'ver=' )) {
            $target_url = remove_query_arg( 'ver', $target_url );
        }
    }
    return $target_url;
}

/**
 * Priority set to 20000. Higher numbers correspond with later execution.
 * Hook into the style loader and remove the version information.
 */
 
if( isset($options['rm_ver_remove_style_cb']) && ($options['rm_ver_remove_style_cb'] == 1) ) {
add_filter('style_loader_src', 'rm_hide_wordpress_version_in_script', 20000);
}

/**
 * Hook into the script loader and remove the version information.
 */
 
if( isset($options['rm_ver_remove_script_cb']) && ($options['rm_ver_remove_script_cb'] == 1) ) {
add_filter('script_loader_src', 'rm_hide_wordpress_version_in_script', 20000);
}


?>