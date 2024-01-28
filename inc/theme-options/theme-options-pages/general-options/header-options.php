<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options  > Header options
 */
$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( 'HEADER OPTIONS', 'dannys-restaurant' ),
	"description" => __( 'These options below are related to site\'s header.', 'dannys-restaurant' ),
	"id"          => "info_title2",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);

/**
 * TODO:
 * To be continued when new styles are added;
 */
// $admin_options[] = array (
// 	'slug'        => 'header_options',
// 	'parent'      => 'general_options',
// 	"name"        => __( "Header Layout", 'dannys-restaurant' ),
// 	"description" => __( "Please choose the desired header layout.", 'dannys-restaurant' ),
// 	"id"          => "zn_header_layout",
// 	"std"         => "style2",
// 	"type"        => "radio_image",
// 	"class"       => "zn_full ri-hover-line ri-5 ri-maxover",
// 	"options"     => array(
// 		array(
// 			'value' => 'style1',
// 			'name'  => __( 'Style 1.1 (#1)', 'dannys-restaurant' ),
// 			'image' => get_template_directory_uri() .'/images/admin/header-styles/style1.svg'
// 		),
// 	)
// );


// ==================================================================
//        STYLE OPTIONS
// ==================================================================

$admin_options[] = array (
				'slug'        => 'header_options',
				'parent'      => 'general_options',
				"name"        => __( 'Header Style', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to customizing the header background and text colors.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

// HEADER Color
$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( "Background Color", 'dannys-restaurant' ),
	"description" => __( "Please choose your desired background color for the header", 'dannys-restaurant' ),
	"id"          => "header_bg_color",
	"alpha"       => true,
	"std"         => '',
	"type"        => "colorpicker",
);

// HEADER IMAGE
$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( "Header Background Image", 'dannys-restaurant' ),
	"description" => __( "Please choose your desired image to be used as a background", 'dannys-restaurant' ),
	"id"          => "header_bg_image",
	"std"         => '',
	"options"     => array ( "repeat" => true, "position" => true, "attachment" => true, "size" => true ),
	"type"        => "background",
);

$admin_options[] = array (
				'slug'        => 'header_options',
				'parent'      => 'general_options',
				"name"        => __( 'Sticky Header Options', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to customizing the header when in sticky mode.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( "Enable Sticky Header on page scroll.", 'dannys-restaurant' ),
	"description" => __( "The Sticky header, upon scrolling, will fix the entire menu to top even when scrolling to the bottom.", 'dannys-restaurant' ),
	"id"          => "header_sticky",
	'type'        => 'zn_radio',
	'std'        => 'no',
	'options'        => array(
		'sticky' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);

// Logo Sticky
$admin_options[] = array (
    'slug'        => 'header_options',
    'parent'      => 'general_options',
    "name"        => __( "Sticky Logo", 'dannys-restaurant' ),
    "description" => __( "Will display a secondary logo when header is sticky and scrolling the page. <strong>ONLY</strong> available if you have Sticky Header enabled in General Options. ", 'dannys-restaurant' ),
    "id"          => "logo_sticky",
    "std"         => '',
    "type"        => "media",
    "dependency"  => array( 'element' => 'header_sticky' , 'value'=> array('sticky') ),
);


// ==================================================================
//        STYLE OPTIONS
// ==================================================================

$admin_options[] = array (
				'slug'        => 'header_options',
				'parent'      => 'general_options',
				"name"        => __( 'Header Size Options', 'dannys-restaurant' ),
				"description" => __( 'These options are dedicated to customizing the header sizes.', 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);


$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( "Header over SubHeader (or Slideshow)?", 'dannys-restaurant' ),
	"description" => __( "This will basically toggle the header's css position, from 'absolute' to 'relative'. If this option is disabled, the subheader or slideshow will go after the header. Don't foget to style the background of the header.", 'dannys-restaurant' ),
	"id"          => "head_position",
	"std"         => "relative",
	"type"        => "zn_radio",
	"options"     => array (
		"absolute" => __( "Yes", 'dannys-restaurant' ), // Absolute
		"relative" => __( "No", 'dannys-restaurant' )   // Relative
	),
);

$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	'id'          => 'header_width',
	'name'        => __( 'Header Width', 'dannys-restaurant'),
	'description' => __( 'Choose the desired width for the header\'s container. It will be applied on Large breakpoints ( 1200px );', 'dannys-restaurant' ),
	'type'        => 'smart_slider',
	'std'        => '',
	'supports' => array('breakpoints'),
	'units' => array('px','%'),
	'helpers'     => array(
		'min' => '20',
		'max' => '1900'
	),
);

$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	'id'          => 'header_height',
	'name'        => __( 'Header Height', 'dannys-restaurant'),
	'description' => __( 'Choose the desired height for the header.', 'dannys-restaurant' ),
	'type'        => 'smart_slider',
	'std'        => '',
	'supports' => array('breakpoints'),
	'units' => array('px'),
	'helpers'     => array(
		'min' => '',
		'max' => '300'
	),
);

// ==================================================================
//        SEARCH PANEL
// ==================================================================

$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( 'Header Search options', 'dannys-restaurant' ),
	"description" => __( 'These options are dedicated to the header search panel.', 'dannys-restaurant' ),
	"id"          => "hd_title2",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( "Show header search panel in header?", 'dannys-restaurant' ),
	"description" => __( "Choose if you want to show the header search panel in header", 'dannys-restaurant' ),
	"id"          => "head_show_search",
	"std"         => "no",
	"type"        => "zn_radio",
	"options"     => array (
		"yes" => __( "Yes", 'dannys-restaurant' ),
		"no" => __( "No", 'dannys-restaurant' )
	),
);

// ==================================================================
//        SOCIAL ICONS
// ==================================================================

$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( 'Social Icons in Header', 'dannys-restaurant' ),
	"description" => __( 'These options are dedicated to the social icons group in header.', 'dannys-restaurant' ),
	"id"          => "hd_title",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[]         = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( "Social Icons", 'dannys-restaurant' ),
	"description" => __( "Here you can configure what social icons to appear on the right side of the header.", 'dannys-restaurant' ),
	"id"          => "header_social_icons",
	"std"         => "",
	"type"        => "group",
	"element_title"    => "title",
	"add_text"    => __( "Social Icon", 'dannys-restaurant' ),
	"remove_text" => __( "Social Icon", 'dannys-restaurant' ),
	"subelements" => array (
		array (
			"name"        => __( "Icon title", 'dannys-restaurant' ),
			"description" => __( "Here you can enter a title for this social icon.Please note that this is just
				for your information as this text will not be visible on the site.", 'dannys-restaurant' ),
			"id"          => "title",
			"std"         => "",
			"type"        => "text"
		),
		array (
			"name"        => __( "Social-Icon link", 'dannys-restaurant' ),
			"description" => __( "Please enter your desired link for the social icon. If this field is left
				blank, the icon will not be linked.", 'dannys-restaurant' ),
			"id"          => "link",
			"std"         => "",
			"type"        => "link",
			"options"     => array (
				'_blank' => __( "New window", 'dannys-restaurant' ),
				'_self'  => __( "Same window", 'dannys-restaurant' )
			)
		),
		array (
			"name"        => __( "Social-Icon Color", 'dannys-restaurant' ),
			"description" => __( "Select a color for the icon", 'dannys-restaurant' ),
			"id"          => "color",
			"std"         => "",
			"type"        => "colorpicker"
		),
		array (
			"name"        => __( "Social-Icon Background-color", 'dannys-restaurant' ),
			"description" => __( "Select a background color for the icon.", 'dannys-restaurant' ),
			"id"          => "bgcolor",
			"std"         => "",
			"type"        => "colorpicker"
		),
		array (
			"name"        => __( "Social icon", 'dannys-restaurant' ),
			"description" => __( "Select your desired social icon.", 'dannys-restaurant' ),
			"id"          => "icon",
			"std"         => "",
			"type"        => "icon_list",
			'class'       => 'zn_full'
		)
	),
);

$admin_options[] = array (
	'slug'        => 'header_options',
	'parent'      => 'general_options',
	"name"        => __( "Social Icons - Hide on Mobiles?", 'dannys-restaurant' ),
	"description" => __( "Enable if you want to hide this component on mobiles.", 'dannys-restaurant' ),
	"id"          => "header_social_icons_hidexs",
	"std"         => 'hidden-xs',
	"value"       => 'hidden-xs',
	'type'        => 'toggle2'
);
