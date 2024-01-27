<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options  > Favicon options
 */


$fontelloUrl = 'http://fontello.com';
$icomoonUrl = 'https://icomoon.io/app/';
$admin_options[] = array(
	'slug'        => 'advanced_options',
	'parent'      => 'advanced_options',
	'id'          => 'font_uploader',
	'name'        => 'Icon Font Uploader',
	'description' => 'Please select a zip archive containing the font. You can <a href="#">download icon pack here</a> or generate your own using <a href="'.$fontelloUrl.'" target="_blank">Fontello</a> or <a href="'.$icomoonUrl.'" target="_blank">IcoMoon App</a>.',
	'type'        => 'upload',
	'supports'    => array
	(
		'file_extension' => 'zip',
		'file_type' => 'application/octet-stream, application/zip',
	)
);

$admin_options[] = array(
	'slug'        => 'advanced_options',
	'parent'      => 'advanced_options',
	'id'          => 'zn_refresh_pb',
	'name'        => 'Clear '.ZNHGTFW()->getThemeName().' Theme Cache',
	'description' => 'If you have made changes to the theme\'s page builder folder or files, you will need to press this button in order to refresh their css and folder structure.',
	'type'        => 'zn_ajax_call',
	'ajax_call_setup' => array(
		'action' => 'zn_refresh_pb',
		'button_text' => 'Clear Cache'
	)
);


/************** */

$admin_options[] = array(
	'slug'        => 'custom_css',
	'parent'      => 'advanced_options',
	'id'          => 'custom_css',
	'name'        => 'Custom css',
	'description' => 'Here you can enter your custom css that will be used by the theme.',
	'type'        => 'custom_css',
	'class'       => 'zn_full'
);

$admin_options[] = array(
	'slug'        => 'custom_js',
	'parent'      => 'advanced_options',
	'id'          => 'custom_js',
	'name'        => 'Custom Javascript',
	'description' => 'Here you can enter your custom javascript that will be added on all pages. <strong>Do NOT include &lt;SCRIPT&gt; tags</strong>!! ',
	'type'        => 'custom_js',
	'editor_type' => 'javascript',
	'class'       => 'zn_full'
);

$admin_options[] = array (
	'slug'        => 'custom_js',
	'parent'      => 'advanced_options',
	"name"        => __( '<span class="dashicons dashicons-editor-help"></span> HELP:', 'dannys-restaurant' ),
	"description" => __( 'Below you can find quick access to documentation, video documentation or our support forum.', 'dannys-restaurant' ),
	"id"          => "adv_js_o_title",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-md zn-top-separator zn-sep-dark"
);

$admin_options[] = array(
	'slug'        => 'theme_export_import',
	'parent'      => 'advanced_options',
	'id'          => 'theme_export_import',
	'name'        => 'Import / Export the theme options',
	'description' => 'Here you can either import or export (Backup / Restore) the theme options.',
	'type'        => 'theme_import_export',
	'class'       => 'zn_full'
);
