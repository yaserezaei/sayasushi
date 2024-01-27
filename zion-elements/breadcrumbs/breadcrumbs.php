<?php if(! defined('ABSPATH')){ return; }

class ZNB_Breadcrumbs extends ZionElement
{
	function options() {

		$uid = $this->data['uid'];

		$options = array(
			'has_tabs'  => true,
			'general' => array(
				'title' => 'General options',
				'options' => array(

					array (
						"name"        => __( "Breadcrumb Text Style", 'dannys-restaurant' ),
						"description" => __( "Choose the breadcrumb's text color style", 'dannys-restaurant' ),
						"id"          => "breadcrumbs_text_style",
						"std"         => "dark",
						'type'        => 'select',
						'options'        => array(
							'light' => __( "Light color", 'dannys-restaurant' ),
							'dark' => __( "Dark color", 'dannys-restaurant' ),
						),
					),

					array (
						"name"        => __( "Home Text", 'dannys-restaurant' ),
						"description" => __( "Choose the Home text.", 'dannys-restaurant' ),
						"id"          => "breadcrumbs_home_text",
						"std"         => "Home",
						"type"        => "text",
					),

					array (
						"name"        => __( "Show Current?", 'dannys-restaurant' ),
						"description" => __( "Show current post/page title in breadcrumbs?", 'dannys-restaurant' ),
						"id"          => "breadcrumbs_show_current",
						"std"         => "yes",
						'type'        => 'zn_radio',
						'options'        => array(
							'yes' => __( "Yes", 'dannys-restaurant' ),
							'no' => __( "No", 'dannys-restaurant' ),
						),
						'class'        => 'zn_radio--yesno',
					)

				),
			),

			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#aBpgvHl6g6I',
				// 'docs'    => 'https://my.hogash.com/documentation/title-element/',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),
		);

		return $options;

	}

	function element() {

		$options = $this->data['options'];

		$classes[] = $uid = $this->data['uid'];
		$classes[] = zn_get_element_classes($options);

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));

		dannys_breadcrumb_trail(
			array(
				'text_style' => $this->opt( 'breadcrumbs_text_style', 'dark' ),
				'show_current' => $this->opt( 'breadcrumbs_show_current', 'yes' ) == 'yes' ? true : false,
				'home_label' => $this->opt( 'breadcrumbs_home_text', esc_html__( 'Home', 'dannys-restaurant' ) ),
				'class' => implode(' ',$classes),
				'attributes' => implode(' ',$attributes)
		) );
	}
}

ZNB()->elements_manager->registerElement( new ZNB_Breadcrumbs( array(
	'id' => 'DnBreadcrumbs',
	'name' => __( 'Breadcrumbs', 'dannys-restaurant' ),
	'description' => __( 'This element will generate a breadcrumb trail.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Layout, Fullwidth',
	'legacy' => false,
) ) );
