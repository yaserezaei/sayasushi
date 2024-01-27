<?php if(! defined('ABSPATH')){ return; }

class ZNB_CSS3Panels extends ZionElement
{

	/**
	 * This method is used to retrieve the configurable options of the element.
	 * @return array The list of options that compose the element and then passed as the argument for the render() function
	 */
	function options()
	{
		$uid = $this->data['uid'];

		$extra_options = array (
			"name"           => __( "CSS Panels", 'dannys-restaurant' ),
			"description"    => __( "Here you can create your CSS3 Panels.", 'dannys-restaurant' ),
			"id"             => "single_css_panel",
			"std"            => "",
			"type"           => "group",
			"add_text"       => __( "Panel", 'dannys-restaurant' ),
			"remove_text"    => __( "Panel", 'dannys-restaurant' ),
			"group_sortable" => true,
			"element_title" => "panel_title",
			"subelements"    => array (
				'has_tabs'  => true,
				'general' => array(
					'title' => 'General options',
					'options' => array(
						array (
							"name"        => __( "Panel image", 'dannys-restaurant' ),
							"description" => __( "Select an image for this Panel. Recommended size 1000px x 700px", 'dannys-restaurant' ),
							"id"          => "panel_image",
							"std"         => "",
							"type"        => "media"
						),

						array(
							'id'          => 'overlay_color',
							'name'        => __('Overlay Background color','dannys-restaurant'),
							'description' => __('Choose a custom color for the overlay on the image.','dannys-restaurant'),
							'type'        => 'colorpicker',
							'alpha'       => true,
							'std'         => '',
						),

						array (
							"name"        => __( "Panel title", 'dannys-restaurant' ),
							"description" => __( "Here you can enter a title that will appear on this panel.", 'dannys-restaurant' ),
							"id"          => "panel_title",
							"std"         => "",
							"type"        => "text"
						),
						array (
							"name"        => __( "Panel Text", 'dannys-restaurant' ),
							"description" => __( "Here you can enter some that will appear on this panel, under the title.", 'dannys-restaurant' ),
							"id"          => "panel_text",
							"std"         => "",
							"type"        => "textarea"
						),
						array (
							"name"        => __( "Link Panel", 'dannys-restaurant' ),
							"description" => __( "Link this panel.", 'dannys-restaurant' ),
							"id"          => "link",
							"std"         => "",
							"type"        => "link",
							"options"     => zn_get_link_targets(),
						),
					),
				),
				'style' => array(
					'title' => 'Styling options',
					'options' => array(

						array (
							"name"        => __( "Vertical Position", 'dannys-restaurant' ),
							"description" => __( "Here you can choose where the panel content will be shown.", 'dannys-restaurant' ),
							"id"          => "panel_title_position",
							"std"         => "",
							"type"        => "select",
							"options"     => array (
								'upper' => __( "Middle", 'dannys-restaurant' ),
								''      => __( "Bottom", 'dannys-restaurant' ),
							)
						),



					),
				),
			)
		);

		$options = array (
			'has_tabs'  => true,
			'general' => array(
				'title' => 'General options',
				'options' => array(

					array(
						'id'          => 'css_height',
						'name'        => __( 'Height', 'dannys-restaurant'),
						'description' => __( 'Choose the desired height for this element. You can choose either height as a property. Height will force a fixed size rather than just a minimum. <br>*TIP: Use 100vh to have a full-height element.', 'dannys-restaurant' ),
						'type'        => 'smart_slider',
						'std'         => '600',
						'helpers'     => array(
							'min' => '0',
							'max' => '1400'
						),
						'supports' => array('breakpoints'),
						'units' => array('px', 'vh'),
						'live' => array(
							'type'      => 'css',
							'css_class' => '.'.$uid. ' .zn-css3Panel',
							'css_rule'  => 'min-height',
							'unit'      => 'px'
						),
					),

					array (
						"name"        => __( "Panel Resize on hover", 'dannys-restaurant' ),
						"description" => __( "Resize the panel on hover?", 'dannys-restaurant' ),
						"id"          => "panel_resize",
						"std"         => "1",
						"type"        => "zn_radio",
						"options"     => array (
							'1' => __( "Yes", 'dannys-restaurant' ),
							'0' => __( "No", 'dannys-restaurant' )
						),
						"class"        => "zn_radio--yesno",
					),

					array (
						"name"        => __( "Resize speed", 'dannys-restaurant' ),
						"description" => __( "Select the resize speed", 'dannys-restaurant' ),
						"id"          => "panel_resize_speed",
						"std"         => "normal",
						"type"        => "select",
						"options"     => array (
							'fast' => __( "Fast", 'dannys-restaurant' ),
							'normal' => __( "Normal", 'dannys-restaurant' ),
							'slow' => __( "Slow", 'dannys-restaurant' )
						),
						"dependency"  => array( 'element' => 'panel_resize' , 'value'=> array('1') ),
					),
					array (
						"name"        => __( "Resize distance", 'dannys-restaurant' ),
						"description" => __( "Select the resize distance. Make sure the images allow such resize.", 'dannys-restaurant' ),
						"id"          => "panel_resize_distance",
						"std"         => "normal",
						"type"        => "select",
						"options"     => array (
							'short' => __( "Short (1.1x)", 'dannys-restaurant' ),
							'normal' => __( "Normal (1.3x)", 'dannys-restaurant' ),
							'large' => __( "Large (1.5x)", 'dannys-restaurant' ),
							'double'   => __( "Double (2x)", 'dannys-restaurant' ),
						),
						"dependency"  => array( 'element' => 'panel_resize' , 'value'=> array('1') ),
					),

				),
			),

			'styles' => array(
				'title' => 'Styles',
				'options' => array(

					array (
						"name"        => __( "Image CSS3 Filter", 'dannys-restaurant' ),
						"description" => __( "Select an effect for normal and hover states.", 'dannys-restaurant' ),
						"id"          => "panel_effect",
						"std"         => "",
						"type"        => "select",
						"options"     => array (
							''                              => __( "None", 'dannys-restaurant' ),
							'anim--grayscale'               => __( "Grayscale Filter", 'dannys-restaurant' ),
							'anim--blur'                    => __( "Blur filter", 'dannys-restaurant' ),
							'anim--grayscale anim--blur'    => __( "Grayscale & Blur filter", 'dannys-restaurant' ),
						)
					),

					array (
						"name"        => __( "Image Stretch", 'dannys-restaurant' ),
						"description" => __( "Should the images strect to the full width of their respective container? This usually is ok for images with different ratios. So basically if you're going to properly resize your images, you should not enable this option. So make sure your images are wide enough to be properly displayed on hover when the panel is resizing.", 'dannys-restaurant' ),
						"id"          => "image_stretch",
						"std"         => "no",
						"type"        => "zn_radio",
						"options"     => array (
							'yes' => __( "Yes", 'dannys-restaurant' ),
							'no' => __( "No", 'dannys-restaurant' )
						),
						"class"        => "zn_radio--yesno",
					),

					array (
						"name"        => __( "Skew Images (Angled effect)", 'dannys-restaurant' ),
						"description" => __( "Do you want to enable the skewed angle effect of the panels?.", 'dannys-restaurant' ),
						"id"          => "has_skew",
						"std"         => "1",
						"type"        => "zn_radio",
						"options"     => array (
							'1' => __( "Yes", 'dannys-restaurant' ),
							'0' => __( "No", 'dannys-restaurant' )
						),
						"class"        => "zn_radio--yesno",
					),

					array (
						"name"        => __( "Caption Effect", 'dannys-restaurant' ),
						"description" => __( "Specify the caption effect.", 'dannys-restaurant' ),
						"id"          => "panel_caption_effect",
						"std"         => "default",
						"type"        => "select",
						"options"     => array (
							'default'  => __( "No effect, captions always visible", 'dannys-restaurant' ),
							'fadein'   => __( "Hidden captions, fade in on hover", 'dannys-restaurant' ),
							'fadeout'  => __( "Visible captions, fade out (hide) on hover", 'dannys-restaurant' ),
							'slidein'  => __( "Hidden captions, slide in on hover", 'dannys-restaurant' ),
							'slideout' => __( "Visible captions, slide out on hover", 'dannys-restaurant' )
						)
					),

					array (
						"name"        => __( "Items Separator", 'dannys-restaurant' ),
						"description" => __( "Enable if you want the panels to be separated with a white stroke of 3-4px.", 'dannys-restaurant' ),
						"id"          => "has_border",
						"std"         => "1",
						"type"        => "select",
						"options"     => array (
							'1' => __( "Yes", 'dannys-restaurant' ),
							'2' => __( "Yes - Dark Line", 'dannys-restaurant' ),
							'0' => __( "No", 'dannys-restaurant' )
						),
					),

					// Text Typo

					array (
						"name"        => __( "Title typography", 'dannys-restaurant' ),
						"description" => __( "Specify the typography properties for the title.", 'dannys-restaurant' ),
						"id"          => "title_typo",
						"std"         => '',
						'supports'    => array( 'size', 'font', 'style', 'line', 'color', 'weight', 'spacing', 'case', 'mb', 'align' ),
						"type"        => "font",
						'live' => array(
							'type'      => 'font',
							'css_class' => '.'.$uid.' .zn-css3Panel-title',
						),
					),

					array (
						"name"        => __( "Text Typography", 'dannys-restaurant' ),
						"description" => __( "Specify the typography properties for the text.", 'dannys-restaurant' ),
						"id"          => "text_typo",
						"std"         => '',
						'supports'    => array( 'size', 'font', 'style', 'line', 'color', 'weight', 'spacing', 'case', 'mb', 'align' ),
						"type"        => "font",
						'live' => array(
							'type'      => 'font',
							'css_class' => '.'.$uid.' .zn-css3Panel-text',
						),
					),


				),
			),

			'panels' => array(
				'title' => 'CSS panels',
				'options' => array(
					$extra_options,
				),
			),


			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#t702hKJbbns',
				// 'docs'    => 'https://my.hogash.com/documentation/css3-panels/',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),

		);
		return $options;
	}



	/**
	 * This method is used to display the output of the element.
	 * @return void
	 */
	function element()
	{

		$options = $this->data['options'];

		if( empty( $options ) ) { return; }

		$classes = $attributes = array();
		$uid = $this->data['uid'];

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-css3PanelsEl';

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));
		$attributes[] = 'class="'.zn_join_spaces($classes).'"';

		echo '<div '. zn_join_spaces( $attributes ) .'>';

			$container_classes[] = 'zn-css3Panels';
			$container_classes[] = $this->opt('panel_resize',1) == 1 ? 'zn-css3Panels--resize' : '';
			$container_classes[] = 'zn-css3Panels--resize--speed-'.$this->opt('panel_resize_speed','normal');
			$container_classes[] = 'zn-css3Panels--resize--dist-'.$this->opt('panel_resize_distance','normal');

			$container_classes[] = 'zn-css3Panel-animatedCaption--'.$this->opt('panel_caption_effect','default');
			$container_classes[] = $this->opt('has_skew', 1) == 1 ? 'zn-css3Panel--hasSkew':'';

			$has_border = $this->opt('has_border', 1);
			if($has_border == 1 || $has_border == 2 ){
				$container_classes[] = 'zn-css3Panel--hasBorder '.($has_border == 2 ? 'is-dark' : '');
			}

			$single = $this->opt('single_css_panel');

			echo '<div class="'. zn_join_spaces($container_classes) .'" data-panels="'. (is_array($single) ? count( $single ) : 0) .'">';

				if ( isset ( $single ) && !empty( $single ) ) {

					foreach ( $single as $i => $panel ) {

						echo '<div class="zn-css3Panel zn-css3Panel--' . $i . '">';

							$link['start'] = $link['end'] = '';
							$link = zn_extract_link( $panel['link'] );

							echo $link['start'];

							echo '<div class="zn-css3Panel-inner">';
								echo '<div class="zn-css3Panel-mainImage-wrapper">';

								if ( isset ( $panel['panel_image'] ) && ! empty ( $panel['panel_image'] ) ) {

									$panel_img = $panel['panel_image'];
									$panelImageId = attachment_url_to_postid($panel_img);

									// img stretch
									$img_stretch = $this->opt('image_stretch', 'no') == 'yes' ? 'zn-css3Panel-mainImage--stretch':'zn-css3Panel-mainImage--noStretch';

									echo '<div class="zn-css3Panel-mainImage '.$img_stretch.'">';

										// Back image
										echo wp_get_attachment_image( $panelImageId, 'full', false, array('class'=>"zn-css3Panel-mainImage-img object-fit__cover") );

										// Front image with effect
										if( isset($options['panel_effect']) && !empty($options['panel_effect']) ){
											echo wp_get_attachment_image( $panelImageId, 'full', false, array('class'=>"zn-css3Panel-mainImage-img object-fit__cover zn-css3Panel-mainImage-effect ".$options['panel_effect'] ) );
										}

									// Check for overlay (and backwards compatible one)
									$has_overlay = '';
									if( isset($panel['panel__overlay']) && $panel['panel__overlay'] == '1' ){
										$has_overlay = zn_hex2rgba_str( $panel['panel__overlay_color'], $panel['panel__overlay_opacity'] );
									}
									elseif (isset($panel['overlay_color']) && !empty($panel['overlay_color'])){
										$has_overlay = $panel['overlay_color'];
									}
									if( !empty($has_overlay) ){
										echo '<div class="zn-css3Panel-overlay css3p--overlay-color" style="background: '.$has_overlay.'"></div>';
									}
									else {
										echo '<div class="zn-css3Panel-overlay zn-css3Panel-overlay--gradient"></div>';
									}

									echo '</div>';
								}

								echo '</div>';
							echo '</div>';


							// Panel Position
							$panel_position = isset ( $panel['panel_title_position'] ) && ! empty ( $panel['panel_title_position'] ) ? 'zn-css3Panel-caption--middle' : '';

							// Panel Content
							if (
								( isset ($panel['panel_title']) && ! empty ($panel['panel_title']) ) ||
								( isset ($panel['panel_text']) && ! empty ($panel['panel_text']) )
							) {
								echo '<div class="zn-css3Panel-caption ' . $panel_position . ' ">';

								// Panel title
								if ( isset ($panel['panel_title']) && ! empty ($panel['panel_title']) ) {
									echo '<h3 class="zn-css3Panel-title" '.zn_schema_markup('title').'>'.$panel['panel_title'].'</h3>';
								}

								// Panel text
								if ( isset ($panel['panel_text']) && ! empty ($panel['panel_text']) ) {
									echo '<div class="zn-css3Panel-text">'.$panel['panel_text'].'</div>';
								}

								echo '</div>';
							}

							echo $link['end'];

						echo '</div>';

					}
				}
				?>
			</div>
			<!-- end panels -->
			<div class="clearfix"></div>
		</div>
	<?php
	}
/**
	 * Output the inline css to head or after the element in case it is loaded via ajax
	 */
	function css(){

		$uid = $this->data['uid'];
		$css = $min_1200 = '';

		$height = $this->opt( 'css_height' );
		if(!empty($height)){
			$css .= zn_smart_slider_css( $height, '.'.$uid.' .zn-css3Panel', 'min-height' );
			// negative margins
			$css .= '@media (min-width:1200px){';
			$css .= '.'.$uid.' .zn-css3Panel--hasSkew,';
			$css .= '.'.$uid.' .zn-css3Panel--hasSkew .zn-css3Panel-mainImage-wrapper { margin-left: -'. ($height['lg']/10) . $height['unit_lg'] .'; margin-right: -'. ($height['lg']/10) . $height['unit_lg'] .'; }';
			$css .= '}';
		}

		$title_typo = array();
		$title_typo['lg'] = $this->opt('title_typo', '' );
		if( !empty($title_typo) ){
			$title_typo['selector'] = '.'.$uid. ' .zn-css3Panel-title';
			$css .= zn_typography_css( $title_typo );
		}

		$text_typo = array();
		$text_typo['lg'] = $this->opt('text_typo', '' );
		if( !empty($text_typo) ){
			$text_typo['selector'] = '.'.$uid. ' .zn-css3Panel-text';
			$css .= zn_typography_css( $text_typo );
		}

		return $css;
	}
}

ZNB()->elements_manager->registerElement( new ZNB_CSS3Panels(array(
	'id' => 'DnCss3Panels',
	'name' => __('CSS3 Panels', 'dannys-restaurant'),
	'description' => __('This element will display a horizontal accordion-like panel with multiple panes.', 'dannys-restaurant'),
	'level' => 1,
	'category' => 'headers, Fullwidth',
	'legacy' => false,
	'keywords' => array('accordion'),
)));
