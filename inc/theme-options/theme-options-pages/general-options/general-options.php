<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options
 */


$admin_options[] = array (
	'slug'        => 'general_options',
	'parent'      => 'general_options',
	"name"        => __( 'GENERAL SETTINGS', 'dannys-restaurant' ),
	"description" => __( 'These settings below are related to theme itself.', 'dannys-restaurant' ),
	"id"          => "info_title1",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);

$admin_options[] = array (
	'slug'        => 'general_options',
	'parent'      => 'general_options',
	"name"        => __( "Use page preloader?", 'dannys-restaurant' ),
	"description" => __( "Choose yes if you want to show a page preloader.", 'dannys-restaurant' ),
	"id"          => "page_preloader",
	"std"         => 'no',
	"options"     => array (
		'no'         => __( "No", 'dannys-restaurant' ),
		'img-persp'  => __( "Custom Image & perspective animation", 'dannys-restaurant' ),
		'img-breath' => __( "Custom Image & breath animation", 'dannys-restaurant' ),
		'img'        => __( "Custom Image & no animation", 'dannys-restaurant' ),
	),
	"type"        => "select"
);

$admin_options[] = array (
	'slug'        => 'general_options',
	'parent'      => 'general_options',
	"name"        => __( "Preloader overlay background color", 'dannys-restaurant' ),
	"description" => __( "Please choose a default color for the preloader's overlay background color. Please remember, if you're using large images or too many external resources, the preloader will take longer to hide.", 'dannys-restaurant' ),
	"id"          => "page_preloader_bg",
	"alpha"       => "true",
	"std"         => "",
	"type"        => "colorpicker",
	'dependency'  => array ( 'element' => 'page_preloader', 'value' => array ( 'img-persp', 'img-breath', 'img' ) ),
);

$admin_options[] = array (
	'slug'        => 'general_options',
	'parent'      => 'general_options',
	"name"        => __( "Preloader Custom Image (.jpg, .gif, .svg)", 'dannys-restaurant' ),
	"description" => __( "Please choose image to be displayed into the preloader.", 'dannys-restaurant' ),
	"id"          => "page_preloader_img",
	"std"         => "",
	"type"        => "media",
	'dependency'  => array ( 'element' => 'page_preloader', 'value' => array ( 'img-persp', 'img-breath', 'img' ) ),
);

$scrollHijackingUrl = 'https://envato.com/blog/scroll-hijacking/';
$admin_options[] = array (
	'slug'        => 'general_options',
	'parent'      => 'general_options',
	"name"        => __( "Enable Smooth Scroll?", 'dannys-restaurant' ),
	"description" => sprintf( __( 'This option will hijack the page default scroll and add an ease effect. It\'s very appealing with parallax scrolls and general navigation. <br><br>Please know that it\'s a performance consumer and <a href="%s" target="_blank">scroll hijacking is considered Bad UX</a>.', 'dannys-restaurant' ), $scrollHijackingUrl ),
	"id"          => "smooth_scroll",
	"std"         => 'no',
	"options"     => array (
		'0.1'  => __( "Yes - Ultra Fast speed (almost disabled)", 'dannys-restaurant' ),
		'0.25' => __( "Yes - Fast speed", 'dannys-restaurant' ),
		'yes'  => __( "Yes - Moderate speed", 'dannys-restaurant' ),
		'no'   => __( "No - Disabled", 'dannys-restaurant' ),
		'0.75' => __( "Yes - Slow speed", 'dannys-restaurant' ),
		'1'    => __( "Yes - Super Slow speed", 'dannys-restaurant' ),
		'1.6'  => __( "Yes - Snail speed", 'dannys-restaurant' ),
	),
	"type"        => "select",
);
$admin_options[] = array (
	'slug'        => 'general_options',
	'parent'      => 'general_options',
	"name"        => __( "Enable Touchpad / Magic Mouse Support?", 'dannys-restaurant' ),
	"description" => __( "On *some* Macs the mouse wheel is recognized as a trackpad, because MacOS has its own acceleration system. If this option is disabled, it's likely that Smooth Scrolling won't work at all on Macs. Use carefully because you might ruin MacOS user's UX on your website.", 'dannys-restaurant' ),
	"id"          => "smooth_scroll_osx",
	"std"         => 'no',
	"options"     => array ( 'yes' => __( "Yes", 'dannys-restaurant' ), 'no' => __( "No", 'dannys-restaurant' ) ),
	"type"        => "zn_radio",
	"class"       => "zn_radio--yesno",
	'dependency'  => array ( 'element' => 'smooth_scroll', 'value' => array ( '0.1', '0.25', 'yes','0.75','1','1.6' ) ),
);
