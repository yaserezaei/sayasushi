<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options  > Google Analytics
 */

$admin_options[] = array (
    'slug'        => 'google_analytics',
    'parent'      => 'general_options',
    "name"        => __( 'GOOGLE ANALYTICS OPTIONS', 'dannys-restaurant' ),
    "description" => __( 'The options below are related to Google Analytics / Google Tag Manager integration. ', 'dannys-restaurant' ),
    "id"          => "info_title11",
    "type"        => "zn_title",
    "class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);

$admin_options[] = array (
    'slug'        => 'google_analytics',
    'parent'      => 'general_options',
    "name"        => __( "Google Analytics / Google Tag Manager Code", 'dannys-restaurant' ),
    "description" => __( "Paste your Google Analytics generated Tracking code (or Google Tag Manager code) below. Don't forget to paste the to include the wrapping &lt;script&gt; tags.", 'dannys-restaurant' ),
    "id"          => "google_analytics",
    "std"         => '',
    "type"        => "textarea",
    "class"       => "zn_full"
);
