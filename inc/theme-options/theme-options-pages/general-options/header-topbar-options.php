<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > Header Topbar Options
 */


$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( 'TOPBAR CUSTOMIZATION OPTIONS', 'dannys-restaurant' ),
	"description" => __( 'These are header advanced options for customisations.', 'dannys-restaurant' ),
	"id"          => "info_title2",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);


$admin_options[] = array (
				'slug'        => 'head_topbar_options',
				'parent'      => 'general_options',
				"name"        => __( 'Top Bar Display', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to customizing the topbar inside the menu.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( "Enable TopBar?", 'dannys-restaurant' ),
	"description" => __( "You can enable the topbar inside the header.", 'dannys-restaurant' ),
	"id"          => "show_topbar",
	"std"         => "no",
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);



// ==================================================================
//        STYLE OPTIONS
// ==================================================================

$admin_options[] = array (
				'slug'        => 'head_topbar_options',
				'parent'      => 'general_options',
				"name"        => __( 'Top Bar Styles', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to customizing the header background and text colors.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator",
				"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);

// HEADER Color
$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( "Topbar Background Color", 'dannys-restaurant' ),
	"description" => __( "Please choose your desired background color for the header", 'dannys-restaurant' ),
	"id"          => "topbar_bg_color",
	"alpha"       => true,
	"std"         => '',
	"type"        => "colorpicker",
	"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);


// HEADER TEXT COLOR
$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( "Dark Text Colors", 'dannys-restaurant' ),
	"description" => __( "This option will make the topbar's text color dark, in contrast with the topbar, if you choosed a light background color.", 'dannys-restaurant' ),
	"id"          => "topbar_dark_text",
	"std"         => 'no',
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
	"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);


// ==================================================================
//        CUSTOM TEXT IN HEADER
// ==================================================================

$admin_options[] = array (
				'slug'        => 'head_topbar_options',
				'parent'      => 'general_options',
				"name"        => __( 'Custom Text in Top Bar', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to the header text in header. Please know that this text is only available for certain types of Header layouts', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator",
				"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),

);

// Header custom text
$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( "Custom Text", 'dannys-restaurant' ),
	"description" => __( "Will display any text (ex: phone number).", 'dannys-restaurant' ),
	"id"          => "header_custom-text",
	"std"         => "",
	"type"        => "text",
	"class"        => 'zn_input_xl',
	"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);

$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( "Custom Text - Hide on Mobiles?", 'dannys-restaurant' ),
	"description" => __( "Enable if you want to hide this component on mobiles.", 'dannys-restaurant' ),
	"id"          => "header_custom-text_hidexs",
	"std"         => 'hidden-xs',
	"value"       => 'hidden-xs',
	'type'        => 'toggle2',
	"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);


// ==================================================================
//        LANGUAGE SELECTOR
// ==================================================================

$admin_options[] = array (
				'slug'        => 'head_topbar_options',
				'parent'      => 'general_options',
				"name"        => __( 'Language selector options', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to the language selector in header.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator",
				"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);

$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( "Show WPML languages?", 'dannys-restaurant' ),
	"description" => __( "Choose yes if you want to show WPML languages in header. Please note that you will need WPML installed.", 'dannys-restaurant' ),
	"id"          => "header_languages",
	"std"         => "no",
	"type"        => "zn_radio",
	"options"     => array (
		"yes" => __( "Show", 'dannys-restaurant' ),
		"no" => __( "Hide", 'dannys-restaurant' )
	),
	"class"        => "zn_radio--yesno",
	"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);

$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( "WPML languages - Hide on Mobiles?", 'dannys-restaurant' ),
	"description" => __( "Enable if you want to hide this component on mobiles.", 'dannys-restaurant' ),
	"id"          => "header_languages_hidexs",
	"std"         => 'hidden-xs',
	"value"       => 'hidden-xs',
	'type'        => 'toggle2',
	"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);

$admin_options[] = array (
				'slug'        => 'head_topbar_options',
				'parent'      => 'general_options',
				"name"        => __( 'Top Bar Navigation', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to the header\'s top bar menu navigation.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator",
				"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);

$admin_options[] = array (
	'slug'        => 'head_topbar_options',
	'parent'      => 'general_options',
	"name"        => __( "Top Bar Menu - Hide on Mobiles?", 'dannys-restaurant' ),
	"description" => __( "Enable if you want to hide this component on mobiles.", 'dannys-restaurant' ),
	"id"          => "topbar_menu_hidexs",
	"std"         => 'hidden-xs',
	"value"       => 'hidden-xs',
	'type'        => 'toggle2',
	"dependency"  => array( 'element' => 'show_topbar' , 'value'=> array('yes') ),
);
