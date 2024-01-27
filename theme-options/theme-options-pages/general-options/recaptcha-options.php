<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options  > ReCaptcha options
 */

$recaptcha_url = esc_url( 'http://www.google.com/recaptcha' );

$admin_options[] = array (
	'slug'        => 'recaptcha_options',
	'parent'      => 'general_options',
	"name"        => __( 'RECAPTCHA OPTIONS', 'dannys-restaurant' ),
	"description" => sprintf( __( 'The options below are related to <a href="%s" target="_blank">Google ReCaptcha</a> security integration into forms. ', 'dannys-restaurant' ), $recaptcha_url ),
	"id"          => "info_title13",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);


$admin_options[] = array (
	'slug'        => 'recaptcha_options',
	'parent'      => 'general_options',
	"name"        => __( "Recaptcha style", 'dannys-restaurant' ),
	"description" => __( "Choose the desired recapthca style.", 'dannys-restaurant' ),
	"id"          => "rec_theme",
	"std"         => "red",
	"type"        => "select",
	"options"     => array (
		"light"      => __( "Light theme", 'dannys-restaurant' ),
		"dark" => __( "Dark theme", 'dannys-restaurant' ),
	)
);

$admin_options[] = array (
	'slug'        => 'recaptcha_options',
	'parent'      => 'general_options',
	"name"        => __( "reCaptcha Site Key", 'dannys-restaurant' ),
	"description" => __( "Please enter the Site Key you've got from ", 'dannys-restaurant' ) . $recaptcha_url,
	"id"          => "rec_pub_key",
	"std"         => "",
	"type"        => "textarea"
);

$admin_options[] = array (
	'slug'        => 'recaptcha_options',
	'parent'      => 'general_options',
	"name"        => __( "reCaptcha Secret Key", 'dannys-restaurant' ),
	"description" => __( "Please enter the Secret Key you've got from ", 'dannys-restaurant' ) . $recaptcha_url,
	"id"          => "rec_priv_key",
	"std"         => "",
	"type"        => "textarea"
);

//@since v4.11
$recaptcha_url = esc_url( 'https://developers.google.com/recaptcha/docs/language' );
$admin_options[] = array (
	'slug'        => 'recaptcha_options',
	'parent'      => 'general_options',
	"name"        => __( "ReCaptcha language", 'dannys-restaurant' ),
	"description" => sprintf( __( 'Please specify the language to display the ReCaptcha in. You can get it from  <a href="%s" target="_blank">here</a>', 'dannys-restaurant' ), $recaptcha_url ),
	"id"          => "recaptcha_lang",
	"std"         => 'en',
	"type"        => "text",
);
