<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > Blog Options  > Archive options
 */

$admin_options[] = array (
				'slug'        => 'blog_archive_options',
				'parent'      => 'blog_options',
				"name"        => __( 'Blog Layout and style', 'dannys-restaurant' ),
				// "description" => __( "These options are applied to the subheader in blog pages.", 'dannys-restaurant' ),
				"id"          => "hd_title1",
				"type"        => "zn_title",
				"class"       => "zn_full zn-custom-title-large zn-top-separator"
);


$admin_options[] = array (
	'slug'        => 'blog_archive_options',
	'parent'      => 'blog_options',
	"name"        => __( "Content to show", 'dannys-restaurant' ),
	"description" => __( "Choose what content you want to show.", 'dannys-restaurant' ),
	"id"          => "archive_content_type",
	"std"         => "excerpt",
	"type"        => "select",
	"options"     => array (
		'excerpt' => __( 'Excerpt', 'dannys-restaurant' ),
		'full'  => __( 'Full content', 'dannys-restaurant' ),
	),
);

$admin_options[] = array (
	'slug'        => 'blog_archive_options',
	'parent'      => 'blog_options',
	"name"           => __( "Main Archive - Page Title", 'dannys-restaurant' ),
	"description"    => __( "Enter the desired page title for the blog archive page.", 'dannys-restaurant' ),
	"id"             => "archive_page_title",
	"type"           => "text",
	"std"            => __( "", 'dannys-restaurant' ),
	"translate_name" => __( "Archive Page Title", 'dannys-restaurant' ),
	"class"          => ""
);


$admin_options[] = array (
	'slug'        => 'blog_archive_options',
	'parent'      => 'blog_options',
	"name"        => __( "Use first attached image?", 'dannys-restaurant' ),
	"description" => __( "Choose yes if you want the theme to display the first image inside a page if no featured image is present.", 'dannys-restaurant' ),
	"id"          => "use_first_image",
	"std"         => "yes",
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);


// TODO:
// excerpt limit customisation
// Hide archive title on home
// Hide "category:" from archive titles
