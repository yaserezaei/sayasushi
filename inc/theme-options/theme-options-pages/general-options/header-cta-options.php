<?php

if ( ! defined( 'ABSPATH' )) {
	return;
}

$admin_options[] = array(
	'slug'        => 'cta_options',
	'parent'      => 'general_options',
	"name"        => __( 'HEADER\'S CALL TO ACTION BUTTON OPTIONS', 'dannys-restaurant' ),
	"description" => __( 'These options below are related to site\'s call to action button in header.', 'dannys-restaurant' ),
	"id"          => "info_title6",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-toptabs-margin",
);

$zn_get_link_targets  = function_exists( 'zn_get_link_targets') ? zn_get_link_targets() : [];
$zn_get_button_styles = function_exists( 'zn_get_button_styles') ? zn_get_button_styles() : [];

$admin_options[] = array(
	'slug'          => 'cta_options',
	'parent'        => 'general_options',
	"name"          => __( "Buttons", 'dannys-restaurant' ),
	"description"   => __( "Here you can add up to <strong>3 Buttons</strong>.", 'dannys-restaurant' ),
	"id"            => "cta_custom",
	"std"           => "",
	"type"          => "group",
	"max_items"     => 3,
	"element_title" => "cta_text",
	"add_text"      => __( "Button", 'dannys-restaurant' ),
	"remove_text"   => __( "Button", 'dannys-restaurant' ),
	"subelements"   => array(
		array(
			"name"        => __( "Text", 'dannys-restaurant' ),
			"description" => __( "Text inside the button", 'dannys-restaurant' ),
			"id"          => "cta_text",
			"std"         => "",
			"type"        => "text",
			"class"       => "zn_input_xl",
		),

		array(
			"name"        => __( "Link", 'dannys-restaurant' ),
			"description" => __( "Attach a link to the button", 'dannys-restaurant' ),
			"id"          => "cta_link",
			"std"         => "",
			"type"        => "link",
			"options"     => $zn_get_link_targets,
		),
		array(
			"name"        => __( "Style", 'dannys-restaurant' ),
			"description" => __( "Select a style for the button", 'dannys-restaurant' ),
			"id"          => "cta_style",
			"std"         => "btn-fullcolor",
			"type"        => "smart_select",
			"options"     => $zn_get_button_styles,
		),
		// array (
		// 	"name"        => __( "Button Custom Color", 'dannys-restaurant' ),
		// 	"description" => __( "Select button custom color.", 'dannys-restaurant' ),
		// 	"id"          => "cta_custom_color",
		// 	"std"         => "#000",
		// 	"alpha"     => true,
		// 	"type"        => "colorpicker",
		// 	"dependency"  => array( 'element' => 'cta_style' , 'value'=> array('btn-primary btn-custom-color', 'btn-default btn-custom-color') )
		// ),

		// array (
		// 	"name"        => __( "Button Custom Color HOVER", 'dannys-restaurant' ),
		// 	"description" => __( "Select button custom color on hover. If not specified, the normal state color will be used with a 20% color adjustment in brightness.", 'dannys-restaurant' ),
		// 	"id"          => "cta_custom_color_hov",
		// 	"std"         => "",
		// 	"alpha"     => true,
		// 	"type"        => "colorpicker",
		// 	"dependency"  => array( 'element' => 'cta_style' , 'value'=> array('btn-primary btn-custom-color', 'btn-default btn-custom-color') )
		// ),

		array(
			"name"        => __( "Background-Color", 'dannys-restaurant' ),
			"description" => __( "Select button custom color.", 'dannys-restaurant' ),
			"id"          => "bg_custom_color",
			"std"         => "",
			"alpha"       => true,
			"type"        => "colorpicker",
			// "dependency"  => array( 'element' => 'cta_style' , 'value'=> array('btn-primary') )
		),

		array(
			"name"        => __( "Background-Color HOVER", 'dannys-restaurant' ),
			"description" => __( "Select button custom color on hover. If not specified, the normal state color will be used with a 20% color adjustment in brightness.", 'dannys-restaurant' ),
			"id"          => "bg_custom_color_hover",
			"std"         => "",
			"alpha"       => true,
			"type"        => "colorpicker",
			// "dependency"  => array( 'element' => 'cta_style' , 'value'=> array('btn-primary') )
		),

		array(
			"name"        => __( "Text-Color", 'dannys-restaurant' ),
			"description" => __( "Select button custom text color.", 'dannys-restaurant' ),
			"id"          => "text_custom_color",
			"std"         => "",
			"alpha"       => true,
			"type"        => "colorpicker",
		),

		array(
			"name"        => __( "Text-Color HOVER", 'dannys-restaurant' ),
			"description" => __( "Select button custom text color on hover. If not specified, the normal state color will be used with a 20% color adjustment in brightness.", 'dannys-restaurant' ),
			"id"          => "text_custom_color_hover",
			"std"         => "",
			"alpha"       => true,
			"type"        => "colorpicker",
		),

		array(
			"name"        => __( "Border-Color", 'dannys-restaurant' ),
			"description" => __( "Select button custom border color.", 'dannys-restaurant' ),
			"id"          => "border_custom_color",
			"std"         => "",
			"alpha"       => true,
			"type"        => "colorpicker",
		),

		array(
			"name"        => __( "Border-Color HOVER", 'dannys-restaurant' ),
			"description" => __( "Select button custom border color on hover. If not specified, the normal state color will be used with a 20% color adjustment in brightness.", 'dannys-restaurant' ),
			"id"          => "border_custom_color_hover",
			"std"         => "",
			"alpha"       => true,
			"type"        => "colorpicker",
		),

		array(
			"name"        => __( "Size", 'dannys-restaurant' ),
			"description" => __( "Select a size for the button", 'dannys-restaurant' ),
			"id"          => "cta_size",
			"std"         => "",
			"type"        => "select",
			"options"     => array(
				''       => __( "Default", 'dannys-restaurant' ),
				'btn-lg' => __( "Large", 'dannys-restaurant' ),
				'btn-md' => __( "Medium", 'dannys-restaurant' ),
				'btn-sm' => __( "Small", 'dannys-restaurant' ),
				'btn-xs' => __( "Extra small", 'dannys-restaurant' ),
			),
		),

		array(
			"name"        => __( "Button Corners", 'dannys-restaurant' ),
			"description" => __( "Select the button corners type for this button", 'dannys-restaurant' ),
			"id"          => "cta_corners",
			"std"         => "btn--square",
			"type"        => "select",
			"options"     => array(
				'btn--rounded' => __( "Smooth rounded corner", 'dannys-restaurant' ),
				'btn--round'   => __( "Round corners", 'dannys-restaurant' ),
				'btn--square'  => __( "Square corners", 'dannys-restaurant' ),
			),
		),

		array(
			"name"        => __( "Button text Options", 'dannys-restaurant' ),
			"description" => __( "Specify the typography properties for the button.", 'dannys-restaurant' ),
			"id"          => "button_typo",
			"std"         => '',
			'supports'    => array( 'size', 'font', 'style', 'line', 'weight', 'spacing', 'case' ),
			"type"        => "font",
		),

		array(
			"name"        => __( "Add icon?", 'dannys-restaurant' ),
			"description" => __( "Add an icon to the button?", 'dannys-restaurant' ),
			"id"          => "cta_icon_enable",
			"std"         => "no",
			'type'        => 'zn_radio',
			'options'     => array(
				'1'  => __( "Yes", 'dannys-restaurant' ),
				'no' => __( "No", 'dannys-restaurant' ),
			),
			'class' => 'zn_radio--yesno',
		),
		array(
			"name"        => __( "Icon position", 'dannys-restaurant' ),
			"description" => __( "Select the position of the icon", 'dannys-restaurant' ),
			"id"          => "cta_icon_pos",
			"std"         => "before",
			"type"        => "select",
			"options"     => array(
				'before' => __( "Before text", 'dannys-restaurant' ),
				'after'  => __( "After text", 'dannys-restaurant' ),
			),
			"dependency" => array( 'element' => 'cta_icon_enable', 'value' => array('1') ),
		),

		array(
			"name"        => __( "Select icon", 'dannys-restaurant' ),
			"description" => __( "Select an icon to add to the button", 'dannys-restaurant' ),
			"id"          => "cta_icon",
			"std"         => "0",
			"type"        => "icon_list",
			'class'       => 'zn_icon_list',
			'compact'     => true,
			"dependency"  => array( 'element' => 'cta_icon_enable', 'value' => array('1') ),
		),

		array(
			"name"        => __( "Button display permissions", 'dannys-restaurant' ),
			"description" => __( "Using this option you can show/hide the button for different type of visitors.", 'dannys-restaurant' ),
			"id"          => "cta_perm",
			"std"         => "all",
			"type"        => "select",
			"options"     => array(
				"all"      => __( "Show for all", 'dannys-restaurant' ),
				"loggedin" => __( "Show only for logged in users", 'dannys-restaurant' ),
				"visitor"  => __( "Show only for visitors ( not logged in )", 'dannys-restaurant' ),
			),
		),

		array(
			"name"        => __( "Hide button on mobiles?", 'dannys-restaurant' ),
			"description" => __( "Do you want to hide this button on mobile screens (-767px and below)", 'dannys-restaurant' ),
			"id"          => "cta_hide_xs",
			"std"         => "0",
			"value"       => "hidden-xs",
			"type"        => "toggle2",
		),

	),
);

$admin_options[] = array(
	'slug'        => 'cta_options',
	'parent'      => 'general_options',
	"name"        => __( "Hide on breakpoints", 'dannys-restaurant' ),
	"description" => __( "Choose to hide this component on either desktop, mobile or tablets.", 'dannys-restaurant' ),
	"id"          => "cta_breakpoint",
	"std"         => array(),
	"type"        => "checkbox",
	"supports"    => array( 'zn_radio' ),
	"options"     => array(
		"lg" => '',
		"md" => '',
		"sm" => '',
		"xs" => '',
	),
	'class' => 'zn_breakpoints_classic zn--minimal',
);
