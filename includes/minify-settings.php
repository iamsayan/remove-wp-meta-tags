<?php

/**
 * Runs on Admin area of the plugin.
 *
 * @package    Easy Header Footer
 * @subpackage Includes
 * @author     Sayan Datta
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 */

if( isset($options['rm_enable_html_minify']) && ($options['rm_enable_html_minify'] == 'enable' ) ) {
    add_action( 'init', 'rm_init_html_minify', 1 );
}

function rm_init_html_minify(){

    $options = get_option('rm_plugin_global_settings');
    if( isset($options['rm_enable_minify_liu']) && ($options['rm_enable_minify_liu'] == 'enable') ) {
        if( !is_admin() ) {
            ob_start( 'rm_init_html_minify_start' );
        }
    } else {
        if( !is_user_logged_in() && !is_admin() ) {
            ob_start( 'rm_init_html_minify_start' );
        }
    }
}

function rm_init_html_minify_start( $buffer ) {

    if ( substr( ltrim( $buffer ), 0, 5) == '<?xml' ) {
        return $buffer;
    }

    $options = get_option('rm_plugin_global_settings');

	$minify_javascript = isset($options['rm_enable_js_minify']) ? $options['rm_enable_js_minify'] : 'yes';
	$minify_html_comments = isset($options['rm_remove_html_js_css_comment']) ? $options['rm_remove_html_js_css_comment'] : 'yes';
    $minify_html_utf8 = isset($options['rm_support_multibyte_encoding']) ? $options['rm_support_multibyte_encoding'] : 'no';
    
	if ( $minify_html_utf8 == 'yes' && mb_detect_encoding($buffer, 'UTF-8', true) ) {
        $mod = '/u';
    } else {
        $mod = '/s';
    }

	$buffer = str_replace( array (chr(13) . chr(10), chr(9)), array (chr(10), ''), $buffer );
	$buffer = str_ireplace( array ('<script', '/script>', '<pre', '/pre>', '<textarea', '/textarea>', '<style', '/style>'), array ('M1N1FY-ST4RT<script', '/script>M1N1FY-3ND', 'M1N1FY-ST4RT<pre', '/pre>M1N1FY-3ND', 'M1N1FY-ST4RT<textarea', '/textarea>M1N1FY-3ND', 'M1N1FY-ST4RT<style', '/style>M1N1FY-3ND'), $buffer );
	$split = explode( 'M1N1FY-3ND', $buffer );
    $buffer = ''; 
    
	for ( $i=0; $i<count($split); $i++ ) {
		$ii = strpos($split[$i], 'M1N1FY-ST4RT');
		if ( $ii !== false ) {
			$process = substr($split[$i], 0, $ii);
			$asis = substr($split[$i], $ii + 12);
			if ( substr($asis, 0, 7) == '<script' ) {
				$split2 = explode(chr(10), $asis);
				$asis = '';
				for ( $iii = 0; $iii < count($split2); $iii ++ ) {
					if ( $split2[$iii] )
						$asis .= trim($split2[$iii]) . chr(10);
					if ( $minify_javascript == 'yes' )
						if (strpos($split2[$iii], '//') !== false && substr(trim($split2[$iii]), -1) == ';' )
							$asis .= chr(10);
				}
				if ( $asis ) {
                    $asis = substr($asis, 0, -1);
                }
				if ( $minify_html_comments == 'yes' ) {
                    $asis = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $asis);
                }
				if ( $minify_javascript == 'yes' ) {
					$asis = str_replace(array (';' . chr(10), '>' . chr(10), '{' . chr(10), '}' . chr(10), ',' . chr(10)), array(';', '>', '{', '}', ','), $asis);
                }
            } elseif ( substr($asis, 0, 6) == '<style' ) {
				$asis = preg_replace(array ('/\>[^\S ]+' . $mod, '/[^\S ]+\<' . $mod, '/(\s)+' . $mod), array('>', '<', '\\1'), $asis);
				if ( $minify_html_comments == 'yes' ) {
                    $asis = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $asis );
                }
				$asis = str_replace(array (chr(10), ' {', '{ ', ' }', '} ', '( ', ' )', ' :', ': ', ' ;', '; ', ' ,', ', ', ';}'), array('', '{', '{', '}', '}', '(', ')', ':', ':', ';', ';', ',', ',', '}'), $asis);
			}
		} else {
			$process = $split[$i];
			$asis = '';
		}
		$process = preg_replace( array ('/\>[^\S ]+' . $mod, '/[^\S ]+\<' . $mod, '/(\s)+' . $mod), array('>', '<', '\\1'), $process );
		if ( $minify_html_comments == 'yes' ) {
            $process = preg_replace( '/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->' . $mod, '', $process );
        }
		$buffer .= $process.$asis;
	}
	$buffer = str_replace(array (chr(10) . '<script', chr(10) . '<style', '*/' . chr(10), 'M1N1FY-ST4RT'), array('<script', '<style', '*/', ''), $buffer);
    
    $minify_html_xhtml = isset($options['rm_remove_xhtml_void']) ? $options['rm_remove_xhtml_void'] : 'yes';
	$minify_html_relative = isset($options['rm_remove_relative_domain_url']) ? $options['rm_remove_relative_domain_url'] : 'yes';
	$minify_html_scheme = isset($options['rm_remove_protocol_domain_url']) ? $options['rm_remove_protocol_domain_url'] : 'no';
    
    if ( $minify_html_xhtml == 'yes' && strtolower( substr( ltrim( $buffer ), 0, 15 ) ) == '<!doctype html>' ) {
        $buffer = str_replace( ' />', '>', $buffer );
    }
	if ( $minify_html_relative == 'yes' ) {
		$buffer = str_replace( array ( 'https://' . $_SERVER['HTTP_HOST'] . '/', 'http://' . $_SERVER['HTTP_HOST'] . '/', '//' . $_SERVER['HTTP_HOST'] . '/' ), array( '/', '/', '/' ), $buffer );
    }
    if ( $minify_html_scheme == 'yes' ) {
        $buffer = str_replace( array( 'http://', 'https://' ), '//', $buffer );
    }
	return $buffer;
}