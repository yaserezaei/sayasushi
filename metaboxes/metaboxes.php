<?php if(! defined('ABSPATH')){ return; }

$sidebar_option = dannys_get_theme_sidebars();
$page_sidebar = array_merge( $sidebar_option, array( '' => __( 'Default - Set from theme options', 'dannys-restaurant')));
$zn_meta_elements[] = array(
	'slug'			=> array( 'post_options', 'page_options' ),
	'id'         	=> 'layout_container',
	'type'        	=> 'tabbed_form',
	'class'        	=> 'zn_full',
	'save_callback' => 'dannys_save_metaboxes',
	'menu'		=> array(
		'header' => array(
			'name' => 'Header options',
			'id' => 'header',
			'options' => array(
				array (
					'slug'        => 'header_options',
					'parent'      => 'general_options',
					"name"        => __( "Header over SubHeader (or Slideshow)?", 'dannys-restaurant' ),
					"description" => __( "This will basically toggle the header's css position, from 'absolute' to 'relative'. If this option is disabled, the subheader or slideshow will go after the header. Don't foget to style the background of the header.", 'dannys-restaurant' ),
					"id"          => "head_position",
					"std"         => "",
					"type"        => "zn_radio",
					"options"     => array (
						"" => __( 'Default - Set from theme options', 'dannys-restaurant' ),
						"absolute" => __( "Yes", 'dannys-restaurant' ), // Absolute
						"relative" => __( "No", 'dannys-restaurant' )   // Relative
					),
				),

				array (
					'slug'        => 'header_options',
					'parent'      => 'general_options',
					"name"        => __( "Background Color", 'dannys-restaurant' ),
					"description" => __( "Please choose your desired background color for the header", 'dannys-restaurant' ),
					"id"          => "header_bg_color",
					"alpha"       => true,
					"std"         => '',
					"type"        => "colorpicker",
				),

				array (
					'slug'        => 'nav_options',
					'parent'      => 'general_options',
					"name"        => __( "Menu Font Options for 1st level menu items", 'dannys-restaurant' ),
					"description" => __( "Specify the typography properties for the Main Menu's first level links.", 'dannys-restaurant' ),
					"id"          => "menu_font",
					"std"         => '',
					'supports'   => array( 'size', 'line', 'color', 'weight' ),
					"type"        => "font"
				),

				array (
					'slug'        => 'nav_options',
					'parent'      => 'general_options',
					"name"        => __( "Hover / Active color for 1st level menu items", 'dannys-restaurant' ),
					"description" => __( "Specify the hover or active color of the Main Menu's first level links.", 'dannys-restaurant' ),
					"id"          => "menu_font_active",
					"std"         => '',
					'alpha'   => true,
					"type"        => "colorpicker"
				),
			)
		),
		'sidebar' => array(
			'name' => 'Sidebar options',
			'id' => 'sidebar',
			'options' => array(
				array(
					'name'        => __( 'Sidebar Position Options', 'dannys-restaurant' ),
					'description' => __( 'Select a sidebar position, or disable it.', 'dannys-restaurant' ),
					'id'          => 'dannys_sidebar_position',
					'std'         => '',
					'type'        => 'select',
					'options'     => array (
						'left'		=> __( 'Left Sidebar', 'dannys-restaurant' ),
						'right'		=> __( 'Right sidebar', 'dannys-restaurant' ),
						'no'		=> __( 'No sidebar', 'dannys-restaurant' ),
						''			=> __( 'Default - Set from theme options', 'dannys-restaurant' ),
					)
				),
				array (
					'name'        => __( 'Select sidebar', 'dannys-restaurant' ),
					'description' => __( 'Select your desired sidebar to be used on this post. <b>Please note that for the blog and shop assigned pages, the sidebar needs to be selected from the theme options panel.</b>', 'dannys-restaurant' ),
					'id'          => 'dannys_sidebar_source',
					'std'         => '',
					'type'        => 'select',
					'options'     => $page_sidebar,
				)
			)
		),
		'misc' => array(
			'name' => 'Misc options',
			'id' => 'misc',
			'options' => array(
				array (
						'name'        => __( 'Show Breadcrumbs?', 'dannys-restaurant' ),
						'description' => __( 'Chose yes if you want to show or hide the breadcrumbs. Note that this option will overwrite the option set in the theme options.', 'dannys-restaurant' ),
						'id'          => 'dannys_post_show_breadcrumbs',
						'std'         => '',
						'options'     => array ( '' => __( 'Default - Set from theme options', 'dannys-restaurant' ), 'yes' => __( 'Yes', 'dannys-restaurant' ), 'no' => __( 'No', 'dannys-restaurant' ) ),
						'type'        => 'select'
					)
			)
		),
	)
);

/**
 * Save the tabbed form option values
 * @param  int $post_id       The current post ID
 * @param  array $option_config The option config as seen above ( $zn_meta_elements )
 * @return void
 */
function dannys_save_metaboxes( $post_id, $option_config ){
	foreach ( $option_config['menu'] as $menu_id => $menu_args) {
		if( empty( $menu_args['options'] ) ) continue;
		foreach ( $menu_args['options'] as $key => $single_option) {
			if ( isset ( $_POST[$single_option['id']] ) ) {
				update_post_meta( $post_id, $single_option['id'], sanitize_text_field( $_POST[$single_option['id']] ) );
			}
		}
	}
}
