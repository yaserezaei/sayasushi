<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	File: shortcodes.php
	Description: This is the file that contains all the shortcodes logic
	Please be careful when editing this file
--------------------------------------------------------------------------------------------------*/
add_filter( 'widget_text', 'do_shortcode' );
//add_filter( 'hgfw_show_shortcodes_button', '__return_false' );
// Load all Shortcodes
add_action('znhgfw_shortcodes_init', 'dn_register_shortcodes');
function dn_register_shortcodes($shortcodesManager){
	$files = glob( dirname(__FILE__) .'/classes/*.php' );
	if ( !empty( $files ) ) {
		foreach ( $files as $filePath ) {
			$fn = basename( $filePath, '.php' );
			require_once( $filePath );
			$shortcodesManager->registerShortcode( new $fn() );
		}
	}
}