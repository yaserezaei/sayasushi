<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options  > Logo options
 */
$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( 'LOGO OPTIONS', 'dannys-restaurant' ),
    "description" => __( 'These options below are related to site\'s logo.', 'dannys-restaurant' ),
    "id"          => "info_title3",
    "type"        => "zn_title",
    "class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);

// Show LOGO In header
$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Show LOGO in header", 'dannys-restaurant' ),
    "description" => __( "Please choose if you want to display the logo or not.", 'dannys-restaurant' ),
    "id"          => "head_show_logo",
    "std"         => "yes",
    "type"        => "zn_radio",
    "options"     => array (
        "yes" => __( "Show", 'dannys-restaurant' ),
        "no"  => __( "Hide", 'dannys-restaurant' )
    ),
    "class"        => "zn_radio--yesno",
);

// Logo Upload
$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Logo Upload", 'dannys-restaurant' ),
    "description" => __( 'Upload your logo.', 'dannys-restaurant' ),
    "id"          => "logo_upload",
    "std"         => '',
    "type"        => "media"
);

// Logo auto size ?
$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Logo Size:", 'dannys-restaurant' ),
    "description" => __( "Choose the sizing method of the logo.", 'dannys-restaurant' ),
    "id"          => "logo_size",
    "std"         => "contain",
    "type"        => "zn_radio",
    "options"     => array (
        "contain" => array(
            'title' =>  __( "Contain", 'dannys-restaurant' ),
            'tip' =>  __( "Will contain itself to the Header.", 'dannys-restaurant' ),
        ),
        "custom" => array(
            'title' =>  __( "Custom", 'dannys-restaurant' ),
            'tip' =>  __( "Customize the width and height.", 'dannys-restaurant' ),
        ),
        "auto" => array(
            'title' =>  __( "Auto", 'dannys-restaurant' ),
            'tip' =>  __( "Automatically use the image dimensions.", 'dannys-restaurant' ),
        ),
    ),
);

// Logo Dimensions
$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Logo manual sizes", 'dannys-restaurant' ),
    "description" => __( 'Please insert your desired logo size in pixels ( for example "35" )', 'dannys-restaurant' ),
    "id"          => "logo_manual_size",
    "std"         => array (
            'height' => '55',
            'width'  => '125'
        ),
    "type"        => "image_size",
    'dependency'  => array ( 'element' => 'logo_size', 'value' => array ( 'custom' ) ),
);


$admin_options[] = array (
                'slug'        => 'logo_options',
                'parent'      => 'general_options',
                "name"        => __( 'Mobile Logo', 'dannys-restaurant' ),
                // "description" => __( "These options are dedicated to the logo's display in Headre.", 'dannys-restaurant' ),
                "id"          => "hd_title3",
                "type"        => "zn_title",
                "class"       => "zn_full zn-custom-title-large zn-top-separator"
);

// Logo Upload
$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Logo on Mobile", 'dannys-restaurant' ),
    "description" => __( "Upload your logo for displaying on viewports smaller than 767px (smartphones, phablets).", 'dannys-restaurant' ),
    "id"          => "logo_upload_mobile",
    "std"         => '',
    "type"        => "media"
);

$admin_options[] = array (
                'slug'        => 'logo_options',
                'parent'      => 'general_options',
                "name"        => __( 'Text Logo', 'dannys-restaurant' ),
                "id"          => "hd_title3",
                "type"        => "zn_title",
                "class"       => "zn_full zn-custom-title-large zn-top-separator"
);

// Logo typography for link

$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Logo TEXT Link Options", 'dannys-restaurant' ),
    "description" => __( "Specify the logo typography properties. Will only work if you don't upload a logo image.", 'dannys-restaurant' ),
    "id"          => "logo_font",
    "std"         => array (
        'font-size'   => '36px',
        'font-family'   => 'Open Sans',
        'font-style'  => 'normal',
        'color'  => '#000',
        'line-height' => '40px'
    ),
    'supports'   => array( 'size', 'font', 'style', 'color', 'line', 'weight' ),
    "type"        => "font"
);

// Logo Hover Typography

$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Logo TEXT Link Hover Color", 'dannys-restaurant' ),
    "description" => __( "Specify the logo hover color. Will only work if you don't upload a logo image. ", 'dannys-restaurant' ),
    "id"          => "logo_hover",
    "std"         => array (
        'color' => '#CD2122',
        'font-family'  => 'Open Sans'
    ),
    'supports'   => array( 'font', 'color' ),
    "type"        => "font"
);

$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Logo Background", 'dannys-restaurant' ),
    "description" => __( "Choose the logo container background color.", 'dannys-restaurant' ),
    "id"          => "logo_bg",
    "std"         => "",
    "type"        => "colorpicker",
    "alpha"       => "true",
    "dependency"  => array( 'element' => 'zn_header_layout' , 'value'=> array('style14') ),
);


$admin_options[] = array (
                'slug'        => 'logo_options',
                'parent'      => 'general_options',
                "name"        => __( 'Miscellaneous', 'dannys-restaurant' ),
                "id"          => "hd_title3",
                "type"        => "zn_title",
                "class"       => "zn_full zn-custom-title-large zn-top-separator"
);

$admin_options[] = array (
    'slug'        => 'logo_options',
    'parent'      => 'general_options',
    "name"        => __( "Wrap logo into a H1 tag on homepage?", 'dannys-restaurant' ),
    "description" => __( "Choose if you want to wrap the logo into a H1 tag, ONLY on homepage. Make sure to avoid H1 duplicates into the homepage.", 'dannys-restaurant' ),
    "id"          => "wrap_h1",
    "std"         => "no",
    'type'        => 'zn_radio',
    'options'        => array(
        'yes' => __( "Yes", 'dannys-restaurant' ),
        'no' => __( "No", 'dannys-restaurant' ),
    ),
    'class'        => 'zn_radio--yesno',
);
