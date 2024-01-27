<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options  > Default Header Options
 */

$admin_options[] = array (
	'slug'        => 'breadcrumbs_options',
	'parent'      => 'general_options',
	"name"        => __( 'BREADCRUBMS OPTIONS', 'dannys-restaurant' ),
	"description" => __( 'These options below are related to site\'s default breadcrumbs.', 'dannys-restaurant' ),
	"id"          => "info_title9",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);

// HEADER show breadcrumbs
$admin_options[]     = array (
	'slug'        => 'breadcrumbs_options',
	'parent'      => 'general_options',
	"name"        => __( "Show Breadcrumbs", 'dannys-restaurant' ),
	"description" => __( "Select if you want to show the breadcrumbs or not.", 'dannys-restaurant' ),
	"id"          => "show_breadcrumbs",
	"std"         => "yes",
	"type"        => "zn_radio",
	"options"     => array (
		'yes' => __( 'Show', 'dannys-restaurant' ),
		'no' => __( 'Hide', 'dannys-restaurant' ),
	),
	"class"        => "zn_radio--yesno",
);

	$admin_options[]     = array (
		'slug'        => 'breadcrumbs_options',
		'parent'      => 'general_options',
		"name"        => __( "Show Breadcrumbs on Homepage/Front page?", 'dannys-restaurant' ),
		"description" => __( "Select if you want to show the breadcrumbs or not on homepage.", 'dannys-restaurant' ),
		"id"          => "show_breadcrumbs_frontpage",
		"std"         => "no",
		"type"        => "zn_radio",
		"options"     => array (
			'yes' => __( 'Show', 'dannys-restaurant' ),
			'no' => __( 'Hide', 'dannys-restaurant' ),
		),
		"class"        => "zn_radio--yesno",
		"dependency"  => array( 'element' => 'show_breadcrumbs' , 'value'=> array('yes') ),
	);

	$admin_options[]     = array (
		'slug'        => 'breadcrumbs_options',
		'parent'      => 'general_options',
		"name"        => __( "Breadcrumb Text Style", 'dannys-restaurant' ),
		"description" => __( "Choose the breadcrumb's text color style", 'dannys-restaurant' ),
		"id"          => "breadcrumbs_text_style",
		"std"         => "dark",
		'type'        => 'select',
		'options'        => array(
			'light' => __( "Light color", 'dannys-restaurant' ),
			'dark' => __( "Dark color", 'dannys-restaurant' ),
		),
		"dependency"  => array( 'element' => 'show_breadcrumbs' , 'value'=> array('yes') ),
	);

	$admin_options[]     = array (
		'slug'        => 'breadcrumbs_options',
		'parent'      => 'general_options',
		"name"        => __( "Home Text", 'dannys-restaurant' ),
		"description" => __( "Choose the Home text.", 'dannys-restaurant' ),
		"id"          => "breadcrumbs_home_text",
		"std"         => "Home",
		"type"        => "text",
		"dependency"  => array( 'element' => 'show_breadcrumbs' , 'value'=> array('yes') ),
	);

	$admin_options[]     = array (
		'slug'        => 'breadcrumbs_options',
		'parent'      => 'general_options',
		"name"        => __( "Show Current?", 'dannys-restaurant' ),
		"description" => __( "Show current post/page title in breadcrumbs?", 'dannys-restaurant' ),
		"id"          => "breadcrumbs_show_current",
		"std"         => "yes",
		'type'        => 'zn_radio',
		'options'        => array(
			'yes' => __( "Yes", 'dannys-restaurant' ),
			'no' => __( "No", 'dannys-restaurant' ),
		),
		'class'        => 'zn_radio--yesno',
		"dependency"  => array( 'element' => 'show_breadcrumbs' , 'value'=> array('yes') ),
	);
