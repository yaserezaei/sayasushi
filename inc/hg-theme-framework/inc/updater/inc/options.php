<?php

/* ==========================================================================
   DISPLAY Options
   ========================================================================== */
$admin_options[] = array (
	'slug'        => 'theme_auto_update',
	'parent'      => 'advanced_options',
	"name"        => esc_html__( 'Auto Theme Update', 'dannys-restaurant' ),
	"description" => esc_html__( 'These options are dedicated dedicated to customize the looks of the side header.', 'dannys-restaurant' ),
	"id"          => "hd_title_atu",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array (
	'slug'        => 'theme_auto_update',
	'parent'      => 'advanced_options',
	"name"        => esc_html__( "Enable theme auto update", 'dannys-restaurant' ),
	"description" => esc_html__( "Select whether or not you want to auto auto-update the theme when a new version is released. Please understand that this feature might cause unexpected problems.", 'dannys-restaurant' ),
	"id"          => "theme_auto_update",
	"std"         => "no",
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => esc_html__( "Yes", 'dannys-restaurant' ),
		'no' => esc_html__( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);
