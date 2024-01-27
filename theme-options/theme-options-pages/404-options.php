<?php if(! defined('ABSPATH')){ return; }

/*--------------------------------------------------------------------------------------------------
	404 Options
--------------------------------------------------------------------------------------------------*/

$admin_options[] = array(
	'slug'        => 'options_404',
	'parent'      => 'options_404',
	"name"        => __( "Main Image", 'dannys-restaurant' ),
	"description" => __( "Select an image to be displayed into the 404 page.", 'dannys-restaurant' ),
	"id"          => "img_404",
	"std"         => "",
	"type"        => "media",
);
