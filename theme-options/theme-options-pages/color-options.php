<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > COLOR OPTIONS
 */

$admin_options[] = array (
    'slug'        => 'color_options',
    'parent'      => 'color_options',
    "name"        => __( "Main Color", 'dannys-restaurant' ),
    "description" => __( "Please choose a main color for your site. This color will be used for various elements within the site, as text color (and hover) and/or background color (and hover).", 'dannys-restaurant' ),
    "id"          => "main_color",
    "std"         => "#cc9933",
    "type"        => "colorpicker"
);
$admin_options[] = array (
    'slug'        => 'color_options',
    'parent'      => 'color_options',
    "name"        => __( "Main Color (Contrast)", 'dannys-restaurant' ),
    "description" => __( "This color is used exclusively where it's over or depends on the MAIN COLOR. For example default color is Red, this White color will be over it, for example active menu item in main menu, Full-Colored button, etc. This comes in need when you're using a main color that's too bright and it becomes unreadable.", 'dannys-restaurant' ),
    "id"          => "main_color_contrast",
    "std"         => "#000",
    "type"        => "colorpicker"
);

// ********************

$admin_options[] = array (
    'slug'        => 'color_options',
    'parent'      => 'color_options',
    "name"        => __( 'Global Site Colors', 'dannys-restaurant' ),
    "description" => __( 'These are the global site color options.', 'dannys-restaurant' ),
    "id"          => "clo_title_main",
    "type"        => "zn_title",
    "class"       => "zn_full zn-custom-title-md zn-top-separator "
);

/**
 * LIGHT VERSION COLORS
 */
$admin_options[] = array (
    'slug'        => 'color_options',
    'parent'      => 'color_options',
    "name"        => __( "Text Color", 'dannys-restaurant' ),
    "description" => __( "Please choose a default color for the site's general text color.", 'dannys-restaurant' ),
    "id"          => "body_def_textcolor",
    "std"         => "",
    "type"        => "colorpicker",
);

$admin_options[] = array (
    'slug'        => 'color_options',
    'parent'      => 'color_options',
    "name"        => __( "Text Links Color", 'dannys-restaurant' ),
    "description" => __( "Please choose a default color for the site's general links color (mostly in post content)", 'dannys-restaurant' ),
    "id"          => "body_def_linkscolor",
    "std"         => "",
    "type"        => "colorpicker",
);

$admin_options[] = array (
    'slug'        => 'color_options',
    'parent'      => 'color_options',
    "name"        => __( "Text Links Color - Hover", 'dannys-restaurant' ),
    "description" => __( "Please choose a default color for the site's general hover links color (mostly in post content).", 'dannys-restaurant' ),
    "id"          => "body_def_linkscolor_hov",
    "std"         => "",
    "type"        => "colorpicker",
);


// BACKGROUND BODY COLOR
$admin_options[] = array (
    'slug'        => 'color_options',
    'parent'      => 'color_options',
    "name"        => __( "Site Background Color", 'dannys-restaurant' ),
    "description" => __( "Please choose a default color for the site's body.", 'dannys-restaurant' ),
    "id"          => "body_def_color",
    "std"         => "",
    "type"        => "colorpicker",
);

$admin_options[] = array (
    'slug'        => 'color_options',
    'parent'      => 'color_options',
    "name"        => __( "Site Background Image", 'dannys-restaurant' ),
    "description" => __( "Please choose your desired image to be used as as body background.", 'dannys-restaurant' ),
    "id"          => "body_back_image",
    "std"         => '',
    "options"     => array ( "repeat" => true, "position" => true, "attachment" => true, "size" => true ),
    "type"        => "background"
);
