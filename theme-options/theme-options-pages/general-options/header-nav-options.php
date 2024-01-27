<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options  > Navigation options
 */


$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( 'NAVIGATION OPTIONS', 'dannys-restaurant' ),
	"description" => __( 'These options below are related to site\'s navigations. For example the header contains 2 registered menus: "Main Navigation" and "Header Navigation".', 'dannys-restaurant' ),
	"id"          => "info_title7",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
				"name"        => __( 'Main Menu', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to the Main Menu navigation in Header.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Menu Font Options for 1st level menu items", 'dannys-restaurant' ),
	"description" => __( "Specify the typography properties for the Main Menu's first level links.", 'dannys-restaurant' ),
	"id"          => "menu_font",
	"std"         => '',
	'supports'   => array( 'size', 'font', 'line', 'color', 'style', 'weight', 'spacing', 'case' ),
	"type"        => "font"
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Hover / Active color for 1st level menu items", 'dannys-restaurant' ),
	"description" => __( "Specify the hover or active color of the Main Menu's first level links.", 'dannys-restaurant' ),
	"id"          => "menu_font_active",
	"std"         => '',
	'alpha'   => true,
	"type"        => "colorpicker"
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
				"name"        => __( 'Main menu - Sub-menus options', 'dannys-restaurant' ),
				"description" => __( "These options are dedicated to the main menu's submenu navigation in Header.", 'dannys-restaurant' ),
				"id"          => "hd_title3",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Sub-Menu Font Options", 'dannys-restaurant' ),
	"description" => __( "Specify the typography properties for the Main sub-menu.", 'dannys-restaurant' ),
	"id"          => "menu_font_sub",
	"std"         => '',
	'supports'   => array( 'size', 'font', 'line', 'color', 'style', 'weight', 'case' ),
	"type"        => "font"
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Submenu Background Color", 'dannys-restaurant' ),
	"description" => __( "Choose a submenu color.", 'dannys-restaurant' ),
	"id"          => "submenu_bg_color",
	"std"         => "",
	"type"        => "colorpicker",
	"alpha"       => "true",
);



$admin_options[] = array (
				'slug'        => 'nav_options',
				'parent'      => 'general_options',
				"name"        => __( 'Mobile Navigation', 'dannys-restaurant' ),
				"id"          => "hd_title3",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array(
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	'id'          => 'header_res_width',
	'name'        => __( 'Header responsive breakpoint-width', 'dannys-restaurant'),
	'description' => __( 'Choose the desired browser width (viewport) when the Mobile-menu and Hamburger-Icon should be displayed.', 'dannys-restaurant' ),
	'type'        => 'slider',
	'class'       => 'zn_full',
	'std'        => '992',
	'helpers'     => array(
		'min' => '50',
		'max' => '2561'
	)
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Hamburger-Icon - Custom Color", 'dannys-restaurant' ),
	"description" => __( "Select a color.", 'dannys-restaurant' ),
	"id"          => "burger_color_custom",
	"std"         => "",
	"type"        => "colorpicker",
	"alpha"       => "true",
);

/* ==========================================================================
   MENU OVERLAY
   ========================================================================== */

$admin_options[] = array (
			'slug'        => 'nav_options',
			'parent'      => 'general_options',
			"name"        => __( 'Menu Overlay', 'dannys-restaurant' ),
			"description" => __( 'These options are dedicated dedicated to customize the looks of the overlay navigation.', 'dannys-restaurant' ),
			"id"          => "hd_title1",
			"type"        => "zn_title",
			"class"       => "zn_full zn-custom-title-large zn-top-separator"
);


$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Close Button Position", 'dannys-restaurant' ),
	"description" => __( "Select the close button position.", 'dannys-restaurant' ),
	"id"          => "hovrl_close_pos",
	"std"         => "trSmall",
	'type'        => 'select',
	'options'        => array(
		'trSmall' => __( "Top RIGHT v1 (30px distance from edge)", 'dannys-restaurant' ),
		'trLarge' => __( "Top RIGHT v2 (80px distance from edge)", 'dannys-restaurant' ),
		'tlSmall' => __( "Top LEFT v1 (30px distance from edge)", 'dannys-restaurant' ),
		'tlLarge' => __( "Top LEFT v2 (80px distance from edge)", 'dannys-restaurant' ),
	),
);


$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Background Color", 'dannys-restaurant' ),
	"description" => __( "Select the background color", 'dannys-restaurant' ),
	"id"          => "hovrl_bgcolor",
	"std"         => "",
	"type"        => "colorpicker",
	"alpha"       => true,
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Menu Typography settings", 'dannys-restaurant' ),
	"description" => __( "Adjust the typography of the menu items links as you want on any breakpoint", 'dannys-restaurant' ),
	"id"          => "hovrl_font_breakpoints",
	"std"         => "lg",
	"tabs"        => true,
	"type"        => "zn_radio",
	"options"     => array (
		"lg"        => __( "LARGE", 'dannys-restaurant' ),
		"md"        => __( "MEDIUM", 'dannys-restaurant' ),
		"sm"        => __( "SMALL", 'dannys-restaurant' ),
		"xs"        => __( "EXTRA SMALL", 'dannys-restaurant' ),
	),
	"class"       => "zn_full zn_breakpoints"
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Menu Typography Settings", 'dannys-restaurant' ),
	"description" => __( "Specify the typography properties for the menu.", 'dannys-restaurant' ),
	"id"          => "hovrl_typo",
	"std"         => '',
	'supports'   => array( 'size', 'font', 'style', 'line', 'weight', 'spacing', 'case' ),
	"type"        => "font",
	"dependency"  => array( 'element' => 'hovrl_font_breakpoints' , 'value'=> array('lg') ),
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Menu Typography Settings (MD)", 'dannys-restaurant' ),
	"description" => __( "Specify the typography properties for the menu.", 'dannys-restaurant' ),
	"id"          => "hovrl_typo_md",
	"std"         => '',
	'supports'   => array( 'size', 'line', 'spacing' ),
	"type"        => "font",
	"dependency"  => array( 'element' => 'hovrl_font_breakpoints' , 'value'=> array('md') ),
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Menu Typography Settings (SM)", 'dannys-restaurant' ),
	"description" => __( "Specify the typography properties for the menu.", 'dannys-restaurant' ),
	"id"          => "hovrl_typo_sm",
	"std"         => '',
	'supports'   => array( 'size', 'line', 'spacing' ),
	"type"        => "font",
	"dependency"  => array( 'element' => 'hovrl_font_breakpoints' , 'value'=> array('sm') ),
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Menu Typography Settings (XS)", 'dannys-restaurant' ),
	"description" => __( "Specify the typography properties for the menu.", 'dannys-restaurant' ),
	"id"          => "hovrl_typo_xs",
	"std"         => '',
	'supports'   => array( 'size', 'line', 'spacing' ),
	"type"        => "font",
	"dependency"  => array( 'element' => 'hovrl_font_breakpoints' , 'value'=> array('xs') ),
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "SubMenus Typography Settings", 'dannys-restaurant' ),
	"description" => __( "Specify the typography properties for the submenu items. These options are not recommended unless the purpose is for overriding the menu typography options.", 'dannys-restaurant' ),
	"id"          => "hovrl_typo_submenu",
	"std"         => '',
	'supports'   => array( 'size', 'style', 'line', 'weight', 'spacing', 'case' ),
	"type"        => "font",
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Content Color Theme", 'dannys-restaurant' ),
	"description" => __( "Select the content color theme.", 'dannys-restaurant' ),
	"id"          => "hovrl_menu_theme",
	"std"         => "light",
	'type'        => 'select',
	'options'        => array(
		'light' => __( "Light", 'dannys-restaurant' ),
		'dark' => __( "Dark", 'dannys-restaurant' ),
	),
);

$admin_options[] = array (
				'slug'        => 'nav_options',
				'parent'      => 'general_options',
				"name"        => __( 'Menu Overlay - Content', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated dedicated to customize the <em>contents</em> of the overlay navigation.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Custom Logo Image", 'dannys-restaurant' ),
	"description" => __( "Add a custom logo image.", 'dannys-restaurant' ),
	"id"          => "hovrl_logo",
	"std"         => "",
	"type"        => "media",
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Display Social Icons", 'dannys-restaurant' ),
	"description" => __( "Display the social icons.", 'dannys-restaurant' ),
	"id"          => "hovrl_social",
	"std"         => "no",
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Footer Text", 'dannys-restaurant' ),
	"description" => __( "Add some custom text. Supports HTML or Shortcodes.", 'dannys-restaurant' ),
	"id"          => "hovrl_footertext",
	"std"         => "",
	"type"        => "textarea",
);



$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Custom Text", 'dannys-restaurant' ),
	"description" => __( "Add some custom text. Supports HTML or Shortcodes.", 'dannys-restaurant' ),
	"id"          => "hovrl_ctext",
	"std"         => "",
	"type"        => "textarea",
	"dependency"  => array( 'element' => 'hovrl_layout' , 'value'=> array('S2', 'S3') ),
);

$admin_options[] = array (
	'slug'        => 'nav_options',
	'parent'      => 'general_options',
	"name"        => __( "Custom Text Typography", 'dannys-restaurant' ),
	"description" => __( "Specify the typography properties for the custom text.", 'dannys-restaurant' ),
	"id"          => "hovrl_ctext_typo",
	"std"         => array(
		'font-size' => '10px',
		'letter-spacing' => '2px',
	),
	'supports'   => array( 'size', 'font', 'style', 'line', 'weight', 'spacing', 'case', 'color' ),
	"type"        => "font",
	"dependency"  => array( 'element' => 'hovrl_layout' , 'value'=> array('S2', 'S3') ),
);
