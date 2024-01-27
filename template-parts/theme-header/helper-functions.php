<?php if(! defined('ABSPATH')){ return; }

// Load Components
include( dirname(__FILE__) . '/components/custom_text.php' );
include( dirname(__FILE__) . '/components/topbar_menu.php' );
include( dirname(__FILE__) . '/components/language_switcher.php' );
include( dirname(__FILE__) . '/components/social_icons.php' );
include( dirname(__FILE__) . '/components/calltoaction.php' );
include( dirname(__FILE__) . '/components/menu.php' );
include( dirname(__FILE__) . '/components/menu_overlay.php' );
include( dirname(__FILE__) . '/components/logo.php' );
include( dirname(__FILE__) . '/components/search.php' );


function zn_get_header_layout(){
	return apply_filters('zn_custom_header_style', zget_option( 'zn_header_layout' , 'general_options', false, 'style1' ));
}

/**
 * Function to determine wether to resize the header when "sticked" mode;
 * To disable, override in child theme with return false;
 */
if( ! function_exists('zn_resize_sticky_header')){
	function zn_resize_sticky_header(){
		return true;
	}
}

/**
 * Used for Site header flexbox scheme
 * @param  array $f get flexbox scheme
 * @param  string $x horizontal
 * @param  string $y vertical
 * @return string All classes with spaces between
 */
function zn_getFlexboxScheme($f, $x, $y){
	$alignment_x = isset($f[$x][$y]['alignment_x']) && !empty($f[$x][$y]['alignment_x']) ? $f[$x][$y]['alignment_x'] : '';
	$alignment_y = isset($f[$x][$y]['alignment_y']) && !empty($f[$x][$y]['alignment_y']) ? $f[$x][$y]['alignment_y'] : '';
	$stretch = isset($f[$x][$y]['stretch']) && !empty($f[$x][$y]['stretch']) ? $f[$x][$y]['stretch'] : '';
	return implode(' ', array($alignment_x, $alignment_y, $stretch));
}