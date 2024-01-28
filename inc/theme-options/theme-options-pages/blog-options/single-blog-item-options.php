<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > Blog Options  > Single blog item options
 */
$admin_options[] = array (
	'slug'        => 'single_blog_options',
	'parent'      => 'blog_options',
	"name"        => __( "Show Author Bio ?", 'dannys-restaurant' ),
	"description" => __( "Choose if you want to show the author info section on single post item.", 'dannys-restaurant' ),
	"id" => "show_author_info",
	"std" => 'yes',
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);


$admin_options[] = array (
	'slug'        => 'single_blog_options',
	'parent'      => 'blog_options',
	"name"        => __( "Show Social Share Buttons?", 'dannys-restaurant' ),
	"description" => __( "Choose if you want to show the social share buttons before and after the post's content.", 'dannys-restaurant' ),
	"id"          => "show_social",
	"std"         => "yes",
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);

$admin_options[] = array (
	'slug'        => 'single_blog_options',
	'parent'      => 'blog_options',
	"name"        => __( "Social Share Buttons Position", 'dannys-restaurant' ),
	"description" => __( "Choose the desired position of the share buttons.", 'dannys-restaurant' ),
	"id"          => "social_share_position",
	"std"         => array('above'),
	'type'        => 'checkbox',
	'supports' => array(
		'zn_radio',
	),
	'options'        => array(
		'above' => __( "Above post content", 'dannys-restaurant' ),
		'bellow' => __( "Bellow post content", 'dannys-restaurant' ),
	),
	"dependency"  => array( 'element' => 'show_social' , 'value'=> array('yes') ),
);

$admin_options[] = array (
	'slug'        => 'single_blog_options',
	'parent'      => 'blog_options',
	"name"        => __( "Show category/tags?", 'dannys-restaurant' ),
	"description" => __( "Choose if you want to show the categories and tags of the post.", 'dannys-restaurant' ),
	"id" => "show_tags_cats",
	"std" => 'no',
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);

$admin_options[] = array (
	'slug'        => 'single_blog_options',
	'parent'      => 'blog_options',
	"name"        => __( "Show related posts?", 'dannys-restaurant' ),
	"description" => __( "Choose if you want to show related posts section.", 'dannys-restaurant' ),
	"id" => "show_related_posts",
	"std" => 'yes',
	'type'        => 'zn_radio',
	'options'        => array(
		'yes' => __( "Yes", 'dannys-restaurant' ),
		'no' => __( "No", 'dannys-restaurant' ),
	),
	'class'        => 'zn_radio--yesno',
);

$admin_options[] = array (
	'slug'        => 'single_blog_options',
	'parent'      => 'blog_options',
	"name"        => __( "Related Products Title", 'dannys-restaurant' ),
	"description" => __( "Choose a title for the Related Products block.", 'dannys-restaurant' ),
	"id"          => "related_posts_title",
	"std"         => "RELATED POSTS",
	"type"        => "text",
	"dependency"  => array( 'element' => 'show_related_posts' , 'value'=> array('yes') ),
);
