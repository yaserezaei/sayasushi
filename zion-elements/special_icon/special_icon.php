<?php if(! defined('ABSPATH')){ return; }

class ZNB_SpecialIcon extends ZionElement
{
	/**
	 * This method is used to retrieve the configurable options of the element.
	 * @return array The list of options that compose the element and then passed as the argument for the render() function
	 */
	function options()
	{
		$uid = $this->data['uid'];

		$options = array (
			'has_tabs'  => true,
			'general' => array(
				'title' => 'GENERAL',
				'options' => array(

					array (
						"name"        => __( "Icon Type", 'dannys-restaurant' ),
						"description" => __( "Type of the icon.", 'dannys-restaurant' ),
						"id"          => "icon_type",
						"std"         => "circle_play",
						"type"        => "select",
						"options"     => array (
							'circle_play' => __( 'Circle Play', 'dannys-restaurant' ),
							'circle_play_anim' => __( 'Circle Play Animated', 'dannys-restaurant' ),
							'mscroll' => __( 'Mouse Scroll', 'dannys-restaurant' ),
						),
					),

					array (
						"name"        => __( "Size", 'dannys-restaurant' ),
						"description" => __( "Select the size of the play button.", 'dannys-restaurant' ),
						"id"          => "size",
						"std"         => "md",
						"type"        => "select",
						"options"		=> array(
							"xs" => "Extra Small",
							"sm" => "Small",
							"md" => "Medium",
							"lg" => "Large",
							"xl" => "Extra Large",
						),
						'live'        => array(
							'type'      => 'class',
							'css_class' => '.'.$uid,
							'val_prepend'  => 'dn-spIcon--size-',
						),
					),

					array(
						'id'          => 'color_theme',
						"name"        => __( "Color theme", 'dannys-restaurant' ),
						"description" => __( "Color theme for the special icons.", 'dannys-restaurant' ),
						'type'        => 'select',
						'std'         => 'light',
						'options'        => array(
							'light' => 'Light (default)',
							'dark' => 'Dark'
						),
						'live'        => array(
							'type'      => 'class',
							'css_class' => '.'.$uid,
							'val_prepend'  => 'dn-spIcon-theme--',
						)
					),

					array (
						"name"        => __( "Custom URL", 'dannys-restaurant' ),
						"description" => __( "Choose a custom URL", 'dannys-restaurant' ),
						"id"          => "link",
						"std"         => "",
						"type"        => "link",
						"options"     => zn_get_link_targets(),
					),

				),
			),
			'styling' => array(
				'title' => 'STYLES',
				'options' => array(

					array (
						"name"        => __( "Icon Opacity", 'dannys-restaurant' ),
						"description" => __( "Select the opacity of the icon.", 'dannys-restaurant' ),
						"id"          => "icon_opacity",
						"std"         => "1",
						'type'        => 'slider',
						"helpers"     => array (
							"step" => "0.05",
							"min" => "0.1",
							"max" => "1"
						),
						'live' => array(
							'type'      => 'css',
							'css_class' => '.'.$uid .' .zn-spIconIco',
							'css_rule'  => 'opacity',
							'unit'      => ''
						),
					),

					array (
						"name"        => __( "Icon Opacity | HOVER", 'dannys-restaurant' ),
						"description" => __( "Select the opacity of the icon when hovered.", 'dannys-restaurant' ),
						"id"          => "icon_opacity_hover",
						"std"         => "1",
						'type'        => 'slider',
						"helpers"     => array (
							"step" => "0.05",
							"min" => "0.1",
							"max" => "1"
						),
						'live' => array(
							'type'      => 'css',
							'css_class' => '.'.$uid .' .zn-spIconIco',
							'css_rule'  => 'opacity',
							'unit'      => ''
						),
					),

					array (
						"name"        => __( "Add Floating Animation", 'dannys-restaurant' ),
						"description" => __( "Enable this if you want to apply a floating up and down animation.", 'dannys-restaurant' ),
						"id"          => "floating_animation",
						"std"         => "",
						"value"       => 'zn-spIcon--animFloat',
						'type'        => 'toggle2',
						'live' => array(
							'type'        => 'class',
							'css_class' => '.'.$uid,
						),
					),
				),
			),

			'spacing' => array(
				'title' => 'SPACING',
				'options' => array(

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

	/**
	 * This method is used to display the output of the element.
	 *
	 * @return void
	 */
	function element()
	{
		$options = $this->data['options'];
		$uid = $this->data['uid'];
		$classes = $attributes = array();

		$icon_type = $this->opt('icon_type', 'circle_play');

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-spIcon';
		$classes[] = 'text-center';
		$classes[] = 'zn-spIcon--type-'.$icon_type;
		$classes[] = $this->opt('floating_animation','');

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));

		echo '<div class="'.zn_join_spaces($classes).'" '. zn_join_spaces( $attributes ) .'>';

			$link_markup['start'] = $link_markup['end'] = '';
			$link = $this->opt('link','');
			if( isset($link['url']) && !empty($link['url']) ){
				$link_markup = zn_extract_link( $link, 'zn-spIconLink' );
			}

			echo $link_markup['start'];

			if($icon_type == 'circle_play'){
				echo '<span class="zn-spIconIco zn-playVideo dn-spIcon--size-'.$this->opt('size','md').' dn-spIcon-theme--'.$this->opt('color_theme','light').'">'. dannys_get_svg( array('icon'=>'play') ) .'</span>';
			}

			elseif($icon_type == 'mscroll'){
				echo '<span class="zn-spIconIco zn-mouseAnim dn-spIcon--size-'.$this->opt('size','md').' dn-spIcon-theme--'.$this->opt('color_theme','light').'"></span>';
			}

			elseif($icon_type == 'circle_play_anim'){
				echo '
				<div class="zn-spIconIco zn-circleAnim dn-spIcon--size-'.$this->opt('size','md').' dn-spIcon-theme--'.$this->opt('color_theme','light').'">
					<div class="zn-circleAnim-inner">
						<svg height="108" width="108" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet" viewBox="0 0 108 108">
							<circle stroke-opacity="0.1" fill="#FFFFFF" stroke-width="5" cx="54" cy="54" r="48" class="zn-circleAnim__circle-back"></circle>
							<circle stroke-width="5" fill="#FFFFFF" cx="54" cy="54" r="48" class="zn-circleAnim__circle-front" transform="rotate(50 54 54) "></circle>
							<path d="M62.1556183,56.1947505 L52,62.859375 C50.6192881,63.7654672 49.5,63.1544098 49.5,61.491212 L49.5,46.508788 C49.5,44.8470803 50.6250889,44.2383396 52,45.140625 L62.1556183,51.8052495 C64.0026693,53.0173767 63.9947588,54.9878145 62.1556183,56.1947505 Z" fill="#FFFFFF"></path>
						</svg>
					</div>
				</div>';
			}

			echo $link_markup['end'];

		echo '</div>';
	}

	/**
	 * Output the inline css to head or after the element in case it is loaded via ajax
	 */
	function css(){
		$css = '';
		$uid = $this->data['uid'];

		// Icon Opacity
		$icon_opacity = $this->opt('icon_opacity','1');
		if( $icon_opacity != '1' && $icon_opacity != '' ){
			$css .= 'opacity: '.$icon_opacity.';';
		}

		// Icon Opacity Hover
		$icon_opacity_hover = $this->opt('icon_opacity_hover','1');
		if( $icon_opacity_hover != '1' && $icon_opacity_hover != '' ){
			$css .= 'opacity: '.$icon_opacity_hover.';';
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

ZNB()->elements_manager->registerElement( new ZNB_SpecialIcon( array(
	'id' => 'DnSpecialIcon',
	'name' => __( 'Special Icon', 'dannys-restaurant' ),
	'description' => __( 'This element will display a special icon.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Content, Media',
	'legacy' => false,
	'keywords' => array( 'pictogram', 'vector', 'svg' ),
) ) );
