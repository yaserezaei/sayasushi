<?php if(! defined('ABSPATH')){ return; }

class ZNB_CustomMenu extends ZionElement
{

	/**
	 * This method is used to retrieve the configurable options of the element.
	 * @return array The list of options that compose the element and then passed as the argument for the render() function
	 */
	function options()
	{
		$uid = $this->data['uid'];

		// Get menus
		$menus = get_terms( 'nav_menu', array ( 'hide_empty' => false ) );
		$menusList = array();
		foreach ( $menus as $menu ) {
			$menusList[$menu->term_id] = $menu->name;
		}

		if ( ! $menus ) {
			$menu_option = array (
				"name"        => __( "Please create Menus!", 'dannys-restaurant' ),
				"description" => sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.', 'dannys-restaurant' ), admin_url( 'nav-menus.php' ) ),
				"id"          => "nomenus",
				"std"         => "",
				"type"        => "zn_title",
			);
		}
		else {
			$menu_option = array (
				"name"        => __( "Choose a menu", 'dannys-restaurant' ),
				"description" => __( "Choose a menu to display.", 'dannys-restaurant' ),
				"id"          => "menu",
				"std"         => "",
				"type"        => "select",
				"options"     => $menusList,
			);
		}

		$options = array(
			'has_tabs'  => true,
			'general' => array(
				'title' => 'General options',
				'options' => array(

					$menu_option,

					array (
						"name"        => __( "Menu Layout", 'dannys-restaurant' ),
						"description" => __( "Select the menu's layout.", 'dannys-restaurant' ),
						"id"          => "menu_layout",
						"std"         => "vertical",
						'type'        => 'select',
						'options'        => array(
							'vertical' => __( "Vertical.", 'dannys-restaurant' ),
							'horizontal' => __( "Horizontal.", 'dannys-restaurant' ),
						),
						'live'        => array(
							'type'      => 'class',
							'css_class' => '.'.$uid.' .zn-menuList',
							'val_prepend'  => 'zn-menuList--layout-',
						),
					),

					array (
						"name"        => __( "Alignment", 'dannys-restaurant' ),
						"description" => __( "Select the menu alignment.", 'dannys-restaurant' ),
						"id"          => "alignment",
						"std"         => "center",
						"type"        => "select",
						"options"     => array(
							"left" => __("Left", 'dannys-restaurant' ),
							"center" => __("Center", 'dannys-restaurant' ),
							"right" => __("Right", 'dannys-restaurant' ),
							"justify" => __("Justify", 'dannys-restaurant' ),
							"stretch" => __("Stretch", 'dannys-restaurant' ),
						),
						'live'        => array(
							'type'      => 'class',
							'css_class' => '.'.$uid.' .zn-menuList',
							'val_prepend'  => 'zn-menuList-alg-',
						),
					),

					array (
						"name"        => __( "Items Distance", 'dannys-restaurant' ),
						"description" => __( "Select the distance between items.", 'dannys-restaurant' ),
						"id"          => "distance",
						"std"         => "5",
						'type'        => 'slider',
						'helpers'     => array(
							'min' => '0',
							'max' => '200',
							'step' => '1'
						),
						'live'        => array(
							'multiple' => array(
								array(
									'type'      => 'css',
									'css_class' => '.'.$uid.' .zn-menuList--layout-vertical .menu-item',
									'css_rule'  => 'margin-top',
									'unit'      => 'px'
								),
								array(
									'type'      => 'css',
									'css_class' => '.'.$uid.' .zn-menuList--layout-vertical .menu-item',
									'css_rule'  => 'margin-bottom',
									'unit'      => 'px'
								),
								array(
									'type'      => 'css',
									'css_class' => '.'.$uid.' .zn-menuList--layout-horizontal .menu-item',
									'css_rule'  => 'margin-left',
									'unit'      => 'px'
								),
								array(
									'type'      => 'css',
									'css_class' => '.'.$uid.' .zn-menuList--layout-horizontal .menu-item',
									'css_rule'  => 'margin-right',
									'unit'      => 'px'
								),
							)
						)
					),


				),
			),

			'style' => array(
				'title' => 'Styles',
				'options' => array(

					array (
						"name"        => __( "Text Color", 'dannys-restaurant' ),
						"description" => __( "Text Color.", 'dannys-restaurant' ),
						"id"          => "color",
						"std"         => "",
						"type"        => "colorpicker",
						'live' => array(
						   'type'        => 'css',
						   'css_class' => '.'.$uid.' .menu-item > a',
						   'css_rule'    => 'color',
						   'unit'        => ''
						),
					),

					array (
						"name"        => __( "Text Color | Hover", 'dannys-restaurant' ),
						"description" => __( "Hover Color of the icon.", 'dannys-restaurant' ),
						"id"          => "color_hover",
						"std"         => "",
						"type"        => "colorpicker",
					),

					array (
						"name"        => __( "Background Color", 'dannys-restaurant' ),
						"description" => __( "The menu item's background color on normal state.", 'dannys-restaurant' ),
						"id"          => "bg_color",
						"std"         => "",
						"type"        => "colorpicker",
						'live' => array(
						   'type'        => 'css',
						   'css_class' => '.'.$uid.' .menu-item > a',
						   'css_rule'    => 'background-color',
						   'unit'        => ''
						),
					),

					array (
						"name"        => __( "Background Hover Color", 'dannys-restaurant' ),
						"description" => __( "The menu item's background color on hover.", 'dannys-restaurant' ),
						"id"          => "bg_color_hover",
						"std"         => "",
						"type"        => "colorpicker",
					),

					array(
						'id'          => 'menuitem_padding',
						'name'        => __('Menu Item Padding', 'dannys-restaurant'),
						'description' => __('Select the padding for the menu items.', 'dannys-restaurant'),
						'type'        => 'boxmodel',
						"allow-negative" => false,
						'std'	  => array(
								'top'=> '5px',
								'right'=> '5px',
								'bottom'=> '5px',
								'left'=> '5px',
								'linked'=> 1,
							),
						'placeholder' => '0px',
						'live' => array(
							'type'		=> 'boxmodel',
							'css_class' => '.'.$uid.' .menu-item > a',
							'css_rule'	=> 'padding',
						),
					),

					array (
						"name"        => __( "Border Radius", 'dannys-restaurant' ),
						"description" => __( "Choose the corner roundness of the menu item. Only works if there is a background color or border.", 'dannys-restaurant' ),
						"id"          => "corner_radius",
						"std"         => "",
						"type"        => "slider",
						"helpers"     => array (
							"step" => "1",
							"min" => "0",
							"max" => "200"
						),
						'live' => array(
							'type'      => 'css',
							'css_class' => '.'.$uid .' .menu-item > a',
							'css_rule'  => 'border-radius',
							'unit'      => 'px'
						),
						"class" => 'zn-non-dependent',
					),

				),
			),

			'font' => array(
				'title' => 'Font',
				'options' => array(
					array (
						// "name"        => __( "Title Typography settings", 'dannys-restaurant' ),
						// "description" => __( "Adjust the typography of the title as you want on any breakpoint", 'dannys-restaurant' ),
						"id"          => "font_breakpoints",
						"std"         => "lg",
						"tabs"        => true,
						"type"        => "zn_radio",
						"options"     => array (
							"lg"        => __( "LARGE", 'dannys-restaurant' ),
							"md"        => __( "MEDIUM", 'dannys-restaurant' ),
							"sm"        => __( "SMALL", 'dannys-restaurant' ),
							"xs"        => __( "EXTRA SMALL", 'dannys-restaurant' ),
						),
						"class"       => "zn_full zn_breakpoints zn_breakpoints--small"
					),

					array (
						"name"        => __( "Menu-items font settings", 'dannys-restaurant' ),
						"description" => __( "Specify the typography properties for the menu items.", 'dannys-restaurant' ),
						"id"          => "menuitem_typo",
						"std"         => '',
						'supports'   => array( 'size', 'font', 'style', 'line', 'weight', 'spacing', 'case' ),
						"type"        => "font",
						'live' => array(
							'type'      => 'font',
							'css_class' => '.'.$uid. ' .menu-item a',
						),
						"dependency"  => array( 'element' => 'font_breakpoints' , 'value'=> array('lg') ),
					),

					array (
						"name"        => __( "Menu-items font settings", 'dannys-restaurant' ),
						"description" => __( "Specify the typography properties for the menu items.", 'dannys-restaurant' ),
						"id"          => "menuitem_typo_md",
						"std"         => '',
						'supports'   => array( 'size', 'line', 'spacing' ),
						"type"        => "font",
						"dependency"  => array( 'element' => 'font_breakpoints' , 'value'=> array('md') ),
					),

					array (
						"name"        => __( "Menu-items font settings", 'dannys-restaurant' ),
						"description" => __( "Specify the typography properties for the menu items.", 'dannys-restaurant' ),
						"id"          => "menuitem_typo_sm",
						"std"         => '',
						'supports'   => array( 'size', 'line', 'spacing' ),
						"type"        => "font",
						"dependency"  => array( 'element' => 'font_breakpoints' , 'value'=> array('sm') ),
					),

					array (
						"name"        => __( "Menu-items font settings", 'dannys-restaurant' ),
						"description" => __( "Specify the typography properties for the menu items.", 'dannys-restaurant' ),
						"id"          => "menuitem_typo_xs",
						"std"         => '',
						'supports'   => array( 'size', 'line', 'spacing' ),
						"type"        => "font",
						"dependency"  => array( 'element' => 'font_breakpoints' , 'value'=> array('xs') ),
					),
				),
			),

			'spacing' => array(
				'title' => 'Spacing',
				'options' => array(

				),
			),
			'advanced' => array(
				'title' => 'Advanced',
				'options' => array(
					array (
						"name"        => __( "WooCommerce Archive AJAX link", 'dannys-restaurant' ),
						"description" => __( "Link this menu to an WooCommerce Archive element by entering the WooCommerce Archive Custom ID from the element help tab. Linked element will load the element asyncronyously if the menu contains WooCommerce categories menu items.", 'dannys-restaurant' ),
						"id"          => "woocommerce_link_id",
						"std"         => '',
						"type"        => "text",
						"placeholder" => 'eluid12345678'
					),
				),
			),
			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#F1ttWpjkKqQ',
				// 'docs'    => 'https://my.hogash.com/documentation/icon-box/',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),

		);

		$options['spacing']['options'] = array_merge($options['spacing']['options'], zn_margin_padding_options($uid) );

		return $options;
	}


	function js(){

		// Don't proceed if ajax loading is not active
		if( ! $this->opt( 'woocommerce_link_id', false ) ){
			return;
		}

		$uid = $this->data['uid'];
		$linkedElement = $this->opt( 'woocommerce_link_id', false );

		return array( 'custom_menu_link_'.$uid => "
			$.themejs.enableWooCommerceCustomMenuAjax( '#{$uid}', '#{$linkedElement}' );
		");

	}

	/**
	 * This method is used to display the output of the element.
	 *
	 * @return void
	 */
	function element()
	{
		// Whoa, no menus?
		$nav_menu = $this->opt('menu','');
		if ( ! $nav_menu ) {
			return;
		}

		$options = $this->data['options'];
		$uid = $this->data['uid'];
		$classes = $attributes = array();

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-menuEl';

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));

		// Add product category to links
		if( $this->opt( 'woocommerce_link_id', false ) ){
			add_filter( 'nav_menu_link_attributes', array( $this, 'addAjaxDataAttribubte' ), 10, 4 );
		}


		echo '<div class="'.zn_join_spaces($classes).'" '. zn_join_spaces( $attributes ) .'>';

			$menu_classes[] = 'zn-menuList';
			$menu_classes[] = 'zn-menuList-alg-'.$this->opt('alignment', 'center');
			$menu_classes[] = 'zn-menuList--layout-'.$this->opt('menu_layout', 'vertical');

			// Make Menu
			wp_nav_menu( array (
				'menu'          => $nav_menu,
				'depth'           => 1,
				'menu_class'      => zn_join_spaces($menu_classes),
				'menu_id'         => zn_uid(),
				'link_before'     => '<span>',
				'link_after'      => '</span>',
				'container'         => false
			) );

		echo '</div>';

		// Remove the filter that adds category id to links
		if( $this->opt( 'woocommerce_link_id', false ) ){
			remove_filter( 'nav_menu_link_attributes', array( $this, 'addAjaxDataAttribubte' ), 10 );
		}
	}

	function addAjaxDataAttribubte( $atts, $item, $args, $depth ){
		if( $item->object == 'product_cat' ){
			$atts['data-productcatid'] = $item->object_id;
		}

		return $atts;
	}

	/**
	 * Output the inline css to head or after the element in case it is loaded via ajax
	 */
	function css(){
		$uid = $this->data['uid'];
		$css = $m_css = $m_hov_css = '';

		$menu_layout = $this->opt('menu_layout','vertical');

		// Icon color default and on hover
		if($color = $this->opt('color', '' )){
			$m_css .= 'color:'.$color.';';
		}
		if($color_hover = $this->opt('color_hover', '' )){
			$m_hov_css .= 'color:'.$color_hover.';';
		}

		if($bg_color = $this->opt('bg_color', '')){
			$m_css .= 'background-color:'.$bg_color.';';
		}
		if($bg_color_hover = $this->opt('bg_color_hover', '')){
			$m_hov_css .= 'background-color:'.$bg_color_hover.';';
		}

		// Radius
		if( $radius = $this->opt('corner_radius','') ){
			$m_css .= 'border-radius:'.$radius.'px;';
		}

		if(!empty($m_css)){
			$css .= '.'.$uid.' .menu-item > a{'.$m_css.'} ';
		}
		if(!empty($m_hov_css)){
			$css .= '.'.$uid.' .menu-item.active > a,.'.$uid.' .menu-item:hover > a, .'.$uid.' .menu-item:focus > a {'.$m_hov_css.'} ';
		}

		// Distance
		if( $distance = $this->opt('distance','10') ){
			$dists = array(
				'vertical' => array('top', 'bottom'),
				'horizontal' => array('left', 'right'),
			);
			$css .= '.'.$uid.' .zn-menuList--layout-'. $menu_layout .' .menu-item {margin-'.$dists[ $menu_layout ][0].': '.$distance.'px; margin-'.$dists[ $menu_layout ][1].': '.$distance.'px;}';
		}

		$menu_item_padding['lg'] = $this->opt('menuitem_padding', '' );
		if( !empty($menu_item_padding) ){
			$menu_item_padding['selector'] = '.'.$uid.' .menu-item > a';
			$menu_item_padding['type'] = 'padding';
			$css .= zn_push_boxmodel_styles( $menu_item_padding );
		}

		// Title Typography
		$typo = array();
		$typo['lg'] = $this->opt('menuitem_typo', '' );
		$typo['md'] = $this->opt('menuitem_typo_md', '' );
		$typo['sm'] = $this->opt('menuitem_typo_sm', '' );
		$typo['xs'] = $this->opt('menuitem_typo_xs', '' );
		if( !empty($typo) ){
			$typo['selector'] = '.'.$uid. ' .menu-item > a';
			$css .= zn_typography_css( $typo );
		}

		// Margin
		$margins = array();
		$margins['lg'] = $this->opt('margin_lg', '' );
		$margins['md'] = $this->opt('margin_md', '' );
		$margins['sm'] = $this->opt('margin_sm', '' );
		$margins['xs'] = $this->opt('margin_xs', '' );
		if( !empty($margins) ){
			$margins['selector'] = '.'.$uid;
			$margins['type'] = 'margin';
			$css .= zn_push_boxmodel_styles( $margins );
		}

		// Padding
		$paddings = array();
		$paddings['lg'] = $this->opt('padding_lg', '' );
		$paddings['md'] = $this->opt('padding_md', '' );
		$paddings['sm'] = $this->opt('padding_sm', '' );
		$paddings['xs'] = $this->opt('padding_xs', '' );
		if( !empty($paddings) ){
			$paddings['selector'] = '.'.$uid;
			$paddings['type'] = 'padding';
			$css .= zn_push_boxmodel_styles( $paddings );
		}

		return $css;
	}

}

ZNB()->elements_manager->registerElement( new ZNB_CustomMenu( array(
	'id' => 'DnCustomMenu',
	'name' => __( 'Custom Menu', 'dannys-restaurant' ),
	'description' => __( 'Create a vertical or horizontal menu.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Content',
	'legacy' => false,
	'keywords' => array( 'ul', 'li', 'navigation' ),
) ) );
