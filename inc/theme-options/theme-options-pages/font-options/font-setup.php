<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > Font Options  > General Font Options
 */

// Google fonts
$url = esc_url( __('//www.google.com/fonts', 'dannys-restaurant'));
$admin_options[] = array(
    'slug'        => 'gfont_setup',
    'parent'      => 'google_font_options',
    'id'          => 'zn_google_fonts_setup',
    'name'        => 'Google Fonts Setup',
    'description' => 'Here you can setup the <a href="'.$url.'" target="blank">Google web fonts</a> that you want to use in your site.',
    'type'        => 'zn_google_fonts_setup',
    'std'         => array (
                    'Poppins' => array (
                        'font_family' => 'Poppins',
                        'font_variants' => array (
                            0 => 'regular',
                            1 => '300',
                            2 => '700',
                            3 => '900',
                        ),
                    ),
                ),
    'class'       => 'zn_full'
);

// General fonts subset
$admin_options[] = array(
    'slug'        => 'gfont_setup',
    'parent'      => 'google_font_options',
    'id'          => 'zn_google_fonts_subsets',
    'name'        => 'Google Fonts Subset',
    'description' => 'Select which subsets you want to load for the Google fonts.',
    'type'        => 'checkbox',
    'options'     => array(
            'latin' => 'Latin',
            'latin-ext' => 'Latin Ext',
            'greek' => 'Greek',
            'cyrillic' => 'Cyrillic',
            'cyrillic-ext' => 'Cyrillic Ext',
            'khmer' => 'Khmer',
            'greek-ext' => 'Greek Ext',
            'vietnamese' => 'Vietnamese'
        ),
    'std'         => '',
    'class'       => 'zn_full'
);


// Custom fonts subset
$admin_options[] = array(
    'slug'        => 'custom_font_setup',
    'parent'      => 'google_font_options',
    'id'          => 'zn_custom_fonts',
    'name'        => 'Custom Fonts Setup',
    'description' => 'Using this option you can add your own custom fonts to the theme.',
    'type'        => 'group',
    "element_title" => "cf_name",
    'subelements' => array (
        array (
            "name"        => __( "Font Name", 'dannys-restaurant' ),
            "description" => __( "Here you can type the font name that will be used.", 'dannys-restaurant' ),
            "id"          => "cf_name",
            "std"         => '',
            "type"        => "text",
        ),
        array (
            "name"        => __( "Font Weight", 'dannys-restaurant' ),
            "description" => __( "Assign a font weight to this font.", 'dannys-restaurant' ),
            "id"          => "cf_fontweight",
            "std"         => '400',
            "type"        => "select",
            "options"       => array(
                "100"   => "100",
                "200"   => "200",
                "300"   => "300",
                "400"   => "400",
                "500"   => "500",
                "600"   => "600",
                "700"   => "700",
                "800"   => "800",
                "900"   => "900",
            )
        ),
        array (
            "name"        => __( "Custom font .woff", 'dannys-restaurant' ),
            "description" => __( "Upload the .woff font file.", 'dannys-restaurant' ),
            "id"          => "cf_woff",
            "std"         => '',
            "type"        => "zn_media",
            'data'        => array(
                'button_title' => 'Add .woff font',
                'media_type' => 'media_field_upload', // The text that will appear on the inser button from the media manager
                'insert_title' => 'Select font', // The text that will appear on the inser button from the media manager
                'title' => 'Add Custom Font', // The text that will appear as the main option button for adding images
                'type' => 'application/font-woff', // The media type : image, video, etc
                'state' => 'library', // The media manager state
                'frame' => 'select', // The media manager frame - can be select, post, manage, image, audio, video, edit-attachments
                'class' => 'zn-media-video media-frame', // A css class that will be applied to the modal
                'value_type' => 'url', // The media manager state
                'preview' => 'text'
            ),

        ),
        array (
            "name"        => __( "Custom font .ttf", 'dannys-restaurant' ),
            "description" => __( "Upload the .ttf font file.", 'dannys-restaurant' ),
            "id"          => "cf_ttf",
            "std"         => '',
            "type"        => "zn_media",
            'data'        => array(
                'button_title' => 'Add .ttf font',
                'media_type' => 'media_field_upload', // The text that will appear on the inser button from the media manager
                'insert_title' => 'Select font', // The text that will appear on the inser button from the media manager
                'title' => 'Add Custom Font', // The text that will appear as the main option button for adding images
                'type' => 'font/ttf', // The media type : image, video, etc
                'state' => 'library', // The media manager state
                'frame' => 'select', // The media manager frame - can be select, post, manage, image, audio, video, edit-attachments
                'class' => 'zn-media-video media-frame', // A css class that will be applied to the modal
                'value_type' => 'url', // The media manager state
                'preview' => 'text'
            )
        ),
        array (
            "name"        => __( "Custom font .svg", 'dannys-restaurant' ),
            "description" => __( "Upload the .svg font file.", 'dannys-restaurant' ),
            "id"          => "cf_svg",
            "std"         => '',
            "type"        => "zn_media",
            'data'        => array(
                'button_title' => 'Add .svg font',
                'media_type' => 'media_field_upload', // The text that will appear on the inser button from the media manager
                'insert_title' => 'Select font', // The text that will appear on the inser button from the media manager
                'title' => 'Add Custom Font', // The text that will appear as the main option button for adding images
                'type' => 'image/svg+xml', // The media type : image, video, etc
                'state' => 'library', // The media manager state
                'frame' => 'select', // The media manager frame - can be select, post, manage, image, audio, video, edit-attachments
                'class' => 'zn-media-video media-frame', // A css class that will be applied to the modal
                'value_type' => 'url', // The media manager state
                'preview' => 'text'
            )
        ),
        array (
            "name"        => __( "Custom font .eot", 'dannys-restaurant' ),
            "description" => __( "Upload the .eot font file.", 'dannys-restaurant' ),
            "id"          => "cf_eot",
            "std"         => '',
            "type"        => "zn_media",
            'data'        => array(
                'button_title' => 'Add .eot font',
                'media_type' => 'media_field_upload', // The text that will appear on the inser button from the media manager
                'insert_title' => 'Select font', // The text that will appear on the inser button from the media manager
                'title' => 'Add Custom Font', // The text that will appear as the main option button for adding images
                'type' => 'application/vnd.ms-fontobject', // The media type : image, video, etc
                'state' => 'library', // The media manager state
                'frame' => 'select', // The media manager frame - can be select, post, manage, image, audio, video, edit-attachments
                'class' => 'zn-media-video media-frame', // A css class that will be applied to the modal
                'value_type' => 'url', // The media manager state
                'preview' => 'text'
            )
        ),
    ),
);
