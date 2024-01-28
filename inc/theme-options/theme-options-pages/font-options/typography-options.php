<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > Font Options  > Headings
 */

// Body font options
$admin_options[] = array (
    'slug'        => 'font_options',
    'parent'      => 'font_options',
    "name"        => __( "Body Font Options", 'dannys-restaurant' ),
    "description" => __( "Specify the typography properties for the site.", 'dannys-restaurant' ),
    "id"          => "body_font",
    "std"         => '',
    'supports'   => array( 'size', 'font', 'line' ),
    "type"        => "font"
);


$admin_options[] = array (
    'slug'        => 'font_options',
    'parent'      => 'font_options',
    "name"        => __( "H1 Typography", 'dannys-restaurant' ),
    "description" => __( "Specify the typography properties for H1 headings. <br><br>Should affect: Title in Single Post, Title in Single Page, Title in Single Product Page.", 'dannys-restaurant' ),
    "id"          => "h1_typo",
    "std"         => '',
    'supports'   => array( 'size', 'font', 'style', 'line', 'weight' ),
    "type"        => "font"
);

$admin_options[] = array (
    'slug'        => 'font_options',
    'parent'      => 'font_options',
    "name"        => __( "H2 Typography", 'dannys-restaurant' ),
    "description" => __( "Specify the typography properties for H2 headings. <br><br>Should affect: Post titles in Categories.", 'dannys-restaurant' ),
    "id"          => "h2_typo",
    "std"         => '',
    'supports'   => array( 'size', 'font', 'style', 'line', 'weight' ),
    "type"        => "font"
);

$admin_options[] = array (
    'slug'        => 'font_options',
    'parent'      => 'font_options',
    "name"        => __( "H3 Typography", 'dannys-restaurant' ),
    "description" => __( "Specify the typography properties for H3 headings. <br><br>Should affect: Widgets Titles.", 'dannys-restaurant' ),
    "id"          => "h3_typo",
    "std"         => '',
    'supports'   => array( 'size', 'font', 'style', 'line', 'weight' ),
    "type"        => "font"
);

$admin_options[] = array (
    'slug'        => 'font_options',
    'parent'      => 'font_options',
    "name"        => __( "H4 Typography", 'dannys-restaurant' ),
    "description" => __( "Specify the typography properties for H4 headings.", 'dannys-restaurant' ),
    "id"          => "h4_typo",
    "std"         => '',
    'supports'   => array( 'size', 'font', 'style', 'line', 'weight' ),
    "type"        => "font"
);

$admin_options[] = array (
    'slug'        => 'font_options',
    'parent'      => 'font_options',
    "name"        => __( "H5 Typography", 'dannys-restaurant' ),
    "description" => __( "Specify the typography properties for H5 headings.", 'dannys-restaurant' ),
    "id"          => "h5_typo",
    "std"         => '',
    'supports'   => array( 'size', 'font', 'style', 'line', 'weight' ),
    "type"        => "font"
);

$admin_options[] = array (
    'slug'        => 'font_options',
    'parent'      => 'font_options',
    "name"        => __( "H6 Typography", 'dannys-restaurant' ),
    "description" => __( "Specify the typography properties for H6 headings.", 'dannys-restaurant' ),
    "id"          => "h6_typo",
    "std"         => '',
    'supports'   => array( 'size', 'font', 'style', 'line', 'weight' ),
    "type"        => "font"
);

// $admin_options[] = array (
//     'slug'        => 'font_options',
//     'parent'      => 'font_options',
//     "name"        => __( '<span class="dashicons dashicons-editor-help"></span> HELP:', 'dannys-restaurant' ),
//     "description" => __( 'Below you can find quick access to documentation, video documentation or our support forum.', 'dannys-restaurant' ),
//     "id"          => "hdfo_title",
//     "type"        => "zn_title",
//     "class"       => "zn_full zn-custom-title-md zn-top-separator zn-sep-dark"
// );

// $admin_options[] = zn_options_video_link_option( 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#p-YITyC1ROU', __( "Click here to access the video tutorial for this section's options.", 'dannys-restaurant' ), array(
//     'slug'        => 'font_options',
//     'parent'      => 'font_options'
// ));

// $admin_options[] = wp_parse_args( znpb_general_help_option( 'zn-admin-helplink' ), array(
//     'slug'        => 'font_options',
//     'parent'      => 'font_options',
// ));
