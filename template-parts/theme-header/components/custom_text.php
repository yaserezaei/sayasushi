<?php if( ! defined('ABSPATH') ){ return; }
/**
 * HEADER - CUSTOM TEXT
 */

if(!function_exists('dannys_header_custom_text')):
	/**
	 * Function to display Header text defined in header options
	 */
	function dannys_header_custom_text(){
		if ( $custom_text = zget_option( 'header_custom-text', 'general_options' ) ) {
			echo '<div class="sh-component dn-headerText '. zget_option( 'header_custom-text_hidexs', 'general_options', false, 'hidden-xs' ) .'">' . do_shortcode( $custom_text ) . '</div>';
		}
	}
endif;