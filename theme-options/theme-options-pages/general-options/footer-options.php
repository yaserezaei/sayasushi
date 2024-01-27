<?php if(! defined('ABSPATH')){ return; }
/**
 * Theme options > General Options  > Footer options
 */
$admin_options[] = array (
	'slug'        => 'footer_options',
	'parent'      => 'general_options',
	"name"        => __( 'SITE FOOTER OPTIONS', 'dannys-restaurant' ),
	"description" => __( 'These options below are related to site\'s footer.', 'dannys-restaurant' ),
	"id"          => "info_title8",
	"type"        => "zn_title",
	"class"       => "zn_full zn-custom-title-large zn-toptabs-margin"
);


/**
 * Check if Footer is replaced by Smart area and show a warning notice
 */
$footer_smart_area = zget_option( 'pbtmpl_general', 'pb_layouts', false, array(
	'footer_template' => 'no_template',
	'footer_location' => '',
));

if(!empty($footer_smart_area) && isset($footer_smart_area['footer_location']) && $footer_smart_area['footer_location'] == 'replace'){
	$message = sprintf(
		'%s <a href="%s" target="_blank">%s</a> %s <a href="%s" target="_blank">%s</a>.',
		__( 'To edit the Footer, go to', 'dannys-restaurant' ),
		admin_url( 'admin.php?page=zn_tp_pb_layouts' ),
		__( ' Smart Area Options', 'dannys-restaurant' ),
		__( 'to identify the area enabled, and then, to edit and customize it, access', 'dannys-restaurant' ),
		admin_url( 'edit.php?post_type=znpb_template_mngr' ),
		__( 'Page Builder Smart Areas', 'dannys-restaurant' )
	);
	$message_type = 'warning';
	$message_title = __( 'Warning!', 'dannys-restaurant' );
}
else {
	// Footer unassigned
	$message = sprintf(
		'%s <a href="%s" target="_blank">%s</a>. %s <a href="%s" target="_blank">%s</a>.',
		__('These are basic options. To use a complex site footer, please create a', 'dannys-restaurant'),
		admin_url( 'edit.php?post_type=znpb_template_mngr' ),
		__( 'new Smart Area', 'dannys-restaurant' ),
		__( 'Afterwards assign it as Footer into', 'dannys-restaurant' ),
		admin_url( 'admin.php?page=zn_tp_pb_layouts' ),
		__( 'Smart Area Options', 'dannys-restaurant' )
	);
	$message_type = '';
	$message_title = __( 'INFO', 'dannys-restaurant' );
}

$admin_options[] = array (
	'slug'        => 'footer_options',
	'parent'      => 'general_options',
	"name"        => $message_title,
	"description" => $message,
	'type'  => 'zn_message',
	'id'    => 'zn_error_notice',
	'show_blank'  => 'true',
	'supports'  => $message_type
);

// Show Footer
$admin_options[] = array (
    'slug'        => 'footer_options',
    'parent'      => 'general_options',
    "name"        => __( "Show Footer", 'dannys-restaurant' ),
    "description" => __( "Using this option you can choose to display the footer or not.", 'dannys-restaurant' ),
    "id"          => "footer_show",
    "std"         => "yes",
    "type"        => "zn_radio",
    "options"     => array (
        "yes" => __( "Show", 'dannys-restaurant' ),
        "no"  => __( "Hide", 'dannys-restaurant' )
    ),
    "class"        => "zn_radio--yesno",
);

$admin_options[] = array (
    'slug'        => 'footer_options',
    'parent'      => 'general_options',
    "name"        => __( "Copyright text", 'dannys-restaurant' ),
    "description" => __( "Enter your desired copyright text. Please note that you can copy ' &copy; ' and place it in the text.", 'dannys-restaurant' ),
    "id"          => "copyright_text",
    "std"         => __( "&copy; 2017. All rights reserved. Buy <a href=\"https://themeforest.net/user/hogash/portfolio?ref=hogash\">Danny's Theme</a>.", 'dannys-restaurant' ),
    "type"        => "textarea"
);
