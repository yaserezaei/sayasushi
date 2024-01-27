<?php if(! defined('ABSPATH')){ return; }

class ZNB_SectionModal extends ZionElement {

	function options() {

		$uid = $this->data['uid'];
		$colorzilla_url = 'http://www.colorzilla.com/gradient-editor/';
		$helper_video = 'http://hogash.d.pr/8Dze';

		$options = array(
			'has_tabs'  => true,
			'general' => array(
				'title' => 'General options',
				'options' => array(

					array (
						"name"        => __( 'INFO', 'dannys-restaurant' ),
						"description" => __('To link to this modal section, you need to access the HELP tab and copy its ID.', 'dannys-restaurant'),
						'type'  => 'zn_message',
						'id'    => 'zn_error_notice',
						'show_blank'  => 'true',
						'supports'  => ''
					),

					array(
						'id'          => 'custom_width',
						'name'        => __( 'Width', 'dannys-restaurant'),
						'description' => __( 'Choose the desired width for this modal.', 'dannys-restaurant' ),
						'type'        => 'slider',
						'std'         => '1400',
						'helpers'     => array(
							'min' => '200',
							'max' => '1920'
						),
						'live' => array(
							'type'      => 'css',
							'css_class' => '.'.$uid,
							'css_rule'  => 'max-width',
							'unit'      => 'px'
						),
					),

					array (
						'id'          => 'section_height',
						'name'        => __('Height Type', 'dannys-restaurant'),
						'description' => __('Select the desired height for this modal.', 'dannys-restaurant'),
						'type'        => 'select',
						'std'         => 'auto',
						'options'     => array(
							'auto' => __('Auto', 'dannys-restaurant'),
							'custom' => __('Custom Height', 'dannys-restaurant'),
						),
						'live' => array(
							'type'      => 'class',
							'css_class' => '.'.$uid,
							'val_prepend'  => 'zn-modalSection--height-',
						)
					),

					array(
						'id'          => 'custom_height',
						'name'        => __( 'Custom Height', 'dannys-restaurant'),
						'description' => __( 'Choose the desired height for this section. You can choose either height or min-height as a property. Height will force a fixed size rather than just a minimum. <br>*TIP: Use 100vh to have a full-height element.', 'dannys-restaurant' ),
						'type'        => 'smart_slider',
						'std'         => '100',
						'helpers'     => array(
							'min' => '0',
							'max' => '1400'
						),
						'supports' => array('breakpoints'),
						'units' => array('px', 'vh'),
						'properties' => array('min-height','height'),
						'live' => array(
							'type'      => 'css',
							'css_class' => '.'.$uid. '.zn-modalSection--height-custom',
							'css_rule'  => 'min-height',
							'unit'      => 'px'
						),
						'dependency' => array( 'element' => 'section_height' , 'value'=> array('custom') )
					),

					array(
						'id'          => 'valign',
						'name'        => __( 'Vertical Align', 'dannys-restaurant'),
						'description' => __( 'Choose how to vertically align content.', 'dannys-restaurant' ),
						'type'        => 'select',
						'std'         => 'top',
						'options'     => array(
							'top'    => __('Top', 'dannys-restaurant'),
							'middle' => __('Middle', 'dannys-restaurant'),
							'bottom' => __('Bottom', 'dannys-restaurant'),
						),
						'live' => array(
							'type'        => 'class',
							'css_class'   => '.'.$uid,
							'val_prepend' => 'zn-modalSection--contentValign-',
						),
						'dependency' => array( 'element' => 'section_height' , 'value'=> array('custom') )
					),

					array(
						'id'          => 'gutter_size',
						'name'        => __('Gutter Size (Gaps)', 'dannys-restaurant'),
						'description' => __('Select the gutter distance between columns', 'dannys-restaurant'),
						"std"         => "",
						"type"        => "select",
						"options"     => array (
							''          => __( 'Default (20px)', 'dannys-restaurant' ),
							'gutter-xs' => __( 'Extra Small (5px)', 'dannys-restaurant' ),
							'gutter-sm' => __( 'Small (10px)', 'dannys-restaurant' ),
							'gutter-md' => __( 'Medium (25px)', 'dannys-restaurant' ),
							'gutter-lg' => __( 'Large (40px)', 'dannys-restaurant' ),
							'gutter-0'  => __( 'No distance - 0px', 'dannys-restaurant' ),
						),
						'live' => array(
							'type'      => 'class',
							'css_class' => '.'.$uid.' .zn-modalSection-MainRow'
						)
					),

					/**
					 * Margins and padding
					 */
					array (
						"name"        => __( "Edit padding & margins for each device breakpoint", 'dannys-restaurant' ),
						"description" => __( "This will enable you to have more control over the padding of the container on each device. Click to see <a href='http://hogash.d.pr/1f0nW' target='_blank'>how box-model works</a>.", 'dannys-restaurant' ),
						"id"          => "spacing_breakpoints",
						"std"         => "lg",
						"tabs"        => true,
						"type"        => "zn_radio",
						"options"     => array (
							"lg"        => __( "LARGE", 'dannys-restaurant' ),
							"md"        => __( "MEDIUM", 'dannys-restaurant' ),
							"sm"        => __( "SMALL", 'dannys-restaurant' ),
							"xs"        => __( "EXTRA SMALL", 'dannys-restaurant' ),
						),
						"class"       => "zn_full zn_breakpoints"
					),
					// MARGINS
					array(
						'id'          => 'margin_lg',
						'name'        => __('Margin (Large Breakpoints)','dannys-restaurant'),
						'description' => __('Select the margin (in percent % or px) for this container. Accepts negative margin.','dannys-restaurant'),
						'type'        => 'boxmodel',
						'std'         => array('left'=> 'auto', 'right'=> 'auto' ),
						'disable'     => array('left', 'right'),
						'placeholder' => '0px',
						"dependency"  => array( 'element' => 'spacing_breakpoints' , 'value'=> array('lg') ),
						'live' => array(
							'type'		=> 'boxmodel',
							'css_class' => '.'.$uid,
							'css_rule'	=> 'margin',
						),
					),
					array(
						'id'          => 'margin_md',
						'name'        => __('Margin (Medium Breakpoints)','dannys-restaurant'),
						'description' => __('Select the margin (in percent % or px) for this container.','dannys-restaurant'),
						'type'        => 'boxmodel',
						'std'         => array('left'=> 'auto', 'right'=> 'auto' ),
						'disable'     => array('left', 'right'),
						'placeholder' => '0px',
						"dependency"  => array( 'element' => 'spacing_breakpoints' , 'value'=> array('md') ),
					),
					array(
						'id'          => 'margin_sm',
						'name'        => __('Margin (Small Breakpoints)','dannys-restaurant'),
						'description' => __('Select the margin (in percent % or px) for this container.','dannys-restaurant'),
						'type'        => 'boxmodel',
						'std'         => array('left'=> 'auto', 'right'=> 'auto' ),
						'disable'     => array('left', 'right'),
						'placeholder' => '0px',
						"dependency"  => array( 'element' => 'spacing_breakpoints' , 'value'=> array('sm') ),
					),
					array(
						'id'          => 'margin_xs',
						'name'        => __('Margin (Extra Small Breakpoints)','dannys-restaurant'),
						'description' => __('Select the margin (in percent % or px) for this container.','dannys-restaurant'),
						'type'        => 'boxmodel',
						'std'         => array('left'=> 'auto', 'right'=> 'auto' ),
						'disable'     => array('left', 'right'),
						'placeholder' => '0px',
						"dependency"  => array( 'element' => 'spacing_breakpoints' , 'value'=> array('xs') ),
					),
					// PADDINGS
					array(
						'id'             => 'padding_lg',
						'name'           => __('Padding (Large Breakpoints)','dannys-restaurant'),
						'description'    => __('Select the padding (in percent % or px) for this container.','dannys-restaurant'),
						'type'           => 'boxmodel',
						"allow-negative" => false,
						'std'            => '',
						'placeholder'    => '0px',
						"dependency"     => array( 'element' => 'spacing_breakpoints' , 'value'=> array('lg') ),
						'live' => array(
							'type'		=> 'boxmodel',
							'css_class' => '.'.$uid,
							'css_rule'	=> 'padding',
						),
					),
					array(
						'id'             => 'padding_md',
						'name'           => __('Padding (Medium Breakpoints)','dannys-restaurant'),
						'description'    => __('Select the padding (in percent % or px) for this container.','dannys-restaurant'),
						'type'           => 'boxmodel',
						"allow-negative" => false,
						'std'            => '',
						'placeholder'    => '0px',
						"dependency"     => array( 'element' => 'spacing_breakpoints' , 'value'=> array('md') ),
					),
					array(
						'id'             => 'padding_sm',
						'name'           => __('Padding (Small Breakpoints)','dannys-restaurant'),
						'description'    => __('Select the padding (in percent % or px) for this container.','dannys-restaurant'),
						'type'           => 'boxmodel',
						"allow-negative" => false,
						'std'            => '',
						'placeholder'    => '0px',
						"dependency"     => array( 'element' => 'spacing_breakpoints' , 'value'=> array('sm') ),
					),
					array(
						'id'             => 'padding_xs',
						'name'           => __('Padding (Extra Small Breakpoints)','dannys-restaurant'),
						'description'    => __('Select the padding (in percent % or px) for this container.','dannys-restaurant'),
						'type'           => 'boxmodel',
						"allow-negative" => false,
						'std'            => '',
						'placeholder'    => '0px',
						"dependency"     => array( 'element' => 'spacing_breakpoints' , 'value'=> array('xs') ),
					),


				),
			),

			'modal' => array(
				'title' => 'Modal Options',
				'options' => array(

					array(
						'id'          => 'window_autopopup',
						'name'        => __('Auto-Popup window?','dannys-restaurant'),
						'description' => __('Select wether you want to autopopup this modal window','dannys-restaurant'),
						"std"         => "0",
						"type"        => "select",
						"options"     => array (
							''            => __( 'No', 'dannys-restaurant' ),
							'immediately' => __( 'Immediately ', 'dannys-restaurant' ),
							'delay'       => __( 'After a delay of "x" seconds', 'dannys-restaurant' ),
							'scroll'      => __( 'When user scrolls halfway down the page', 'dannys-restaurant' ),
						),
					),

					array(
						'id'          => 'autopopup_delay',
						'name'        => __('Auto-Popup delay','dannys-restaurant'),
						'description' => __('Select the autopopup delay in seconds. This option is used only if <em>"After a delay of "x" seconds"</em> option is selected in the <strong>"Auto-Popup window?"</strong> option above.', 'dannys-restaurant'),
						"std"         => "5",
						"type"        => "text",
						'dependency'  => array( 'element' => 'window_autopopup' , 'value'=> array('delay') ),
					),

					array(
						'id'          => 'autopopup_cookie',
						'name'        => __('Prevent re-opening Auto-popup', 'dannys-restaurant'),
						'description' => __('Enable this if you want the autopopup to appear only once (assigning a cookie), rather than opening each time the page is refreshed. The cookie expires after one hour.', 'dannys-restaurant'),
						"std"         => "no",
						"type"        => "select",
						"options"     => array (
							'no'       => __( 'No - Always open', 'dannys-restaurant' ),
							'halfhour' => __( 'Yes - Set cookie for 30 min', 'dannys-restaurant' ),
							'hour'     => __( 'Yes - Set cookie for 1 hour', 'dannys-restaurant' ),
							'day'      => __( 'Yes - Set cookie for 1 day', 'dannys-restaurant' ),
							'week'     => __( 'Yes - Set cookie for 1 week', 'dannys-restaurant' ),
							'2week'    => __( 'Yes - Set cookie for 2 weeks', 'dannys-restaurant' ),
							'month'    => __( 'Yes - Set cookie for 1 month', 'dannys-restaurant' ),
						),
						'dependency' => array( 'element' => 'window_autopopup' , 'value'=> array('immediately','delay','scroll') ),
					),

				),
			),

			'background' => array(
				'title' => 'Styles Options',
				'options' => array(

					array(
						'id'          => 'title1',
						'name'        => __('Background & Color Options', 'dannys-restaurant'),
						'description' => __('These are options to customize the background and colors for this section.', 'dannys-restaurant'),
						'type'        => 'zn_title',
						'class'       => 'zn_full zn-custom-title-large',
					),

					array(
						'id'          => 'background_color',
						'name'        => __('Background Color', 'dannys-restaurant'),
						'description' => __('Here you can override the background color for this section.', 'dannys-restaurant'),
						'type'        => 'colorpicker',
						'std'         => '',
						'alpha'       => true,
						'live'        => array(
							'type'		=> 'css',
							'css_class' => '.'.$uid,
							'css_rule'	=> 'background-color',
							'unit'		=> ''
						)
					),

					array(
						'id'          => 'background_image',
						'name'        => __('Background Image', 'dannys-restaurant'),
						'description' => __('Please choose a background image for this section.', 'dannys-restaurant'),
						'type'        => 'background',
						'options'     => array( "repeat" => true , "position" => true , "attachment" => true, "size" => true ),
					),

					array(
						'id'          => 'source_overlay',
						'name'        => __('Background Overlay', 'dannys-restaurant'),
						'description' => __('You can overlay the default background (color or media). Useful when you want to darken or lighten the background.', 'dannys-restaurant'),
						'type'        => 'select',
						'std'         => '0',
						"options"     => array (
							"0" => __( "Disabled", 'dannys-restaurant' ),
							"1" => __( "Normal color", 'dannys-restaurant' ),
							"2" => __( "Horizontal gradient", 'dannys-restaurant' ),
							"3" => __( "Vertical gradient", 'dannys-restaurant' ),
							"4" => __( "Custom CSS generated gradient", 'dannys-restaurant' ),
						)
					),

					array(
						'id'          => 'source_overlay_color',
						'name'        => __('Overlay Background Color', 'dannys-restaurant'),
						'description' => __('Pick a color', 'dannys-restaurant'),
						'type'        => 'colorpicker',
						'std'         => 'rgba(0,0,0,0.4)',
						'alpha'       => true,
						"dependency"  => array( 'element' => 'source_overlay' , 'value'=> array('1', '2', '3') ),
					),

					array(
						'id'          => 'source_overlay_color_gradient',
						'name'        => __('Overlay Gradient 2nd Bg. Color', 'dannys-restaurant'),
						'description' => __('Pick a color', 'dannys-restaurant'),
						'type'        => 'colorpicker',
						'std'         => 'rgba(0,0,0,0.1)',
						"dependency"  => array( 'element' => 'source_overlay' , 'value'=> array('2', '3') ),
					),

					array(
						'id'          => 'source_overlay_custom_css',
						'name'        => __('Custom CSS Gradient Overlay', 'dannys-restaurant'),
						'description' => sprintf( __( 'You can use a tool such as <a href="%s" target="_blank">%s</a> to generate a unique custom gradient. Here\'s a quick video explainer <a href="%s" target="_blank">%s</a> how to generate and paste the code here', 'dannys-restaurant' ), $colorzilla_url, $colorzilla_url, $helper_video, $helper_video ),
						'type'        => 'textarea',
						'std'         => '',
						"dependency"  => array( 'element' => 'source_overlay' , 'value'=> array('4') ),
					),


				),
			),

			'help' => znpb_get_helptab( array(
				// 'video'  => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#vcux4GW2ctg',
				// 'docs'   => 'https://my.hogash.com/documentation/section-and-columns/',
				'copy'      => $uid,
				'general'   => true,
				'custom_id' => true,
			)),
		);

		return $options;

	}

	/**
	 * Output the element
	 * IMPORTANT : The UID needs to be set on the top parent container
	 */
	function element() {

		$options = $this->data['options'];
		$uid = $this->data['uid'];
		$classes = $attributes = array();

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-modalSection';

		if(!ZNB()->utility->isActiveEditor()){
			$classes[] = 'mfp-hide';
		}

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));

		$classes[] = 'zn-modalSection--height-'.$this->opt('section_height','auto');
		$classes[] = 'zn-modalSection--contentValign-'.$this->opt('valign','top');
		$classes[] = $this->opt('window_autopopup','') != '' ? 'zn-modalSection--auto-'.$this->opt('window_autopopup','') : '';

		// Add delay
		if( $this->opt('window_autopopup','') == 'delay' ){
			$del = $this->opt('autopopup_delay','5');
			$attributes[] = 'data-auto-delay="'.esc_attr($del).'"';
		}

		if($this->opt('autopopup_cookie','no') != 'no'){
			$acook = $this->opt('autopopup_cookie','no');
			$attributes[] = 'data-autoprevent="'.esc_attr($acook).'"';
		}

		echo '<section class="'.zn_join_spaces($classes).'" '. zn_join_spaces( $attributes ) .'>';

			if( $this->opt('background_image', '') ){
				znb_background_source( array(
					'uid'                           => $uid,
					'source_type'                   => 'image',
					'source_background_image'       => $this->opt('background_image'),
					'source_overlay'                => $this->opt('source_overlay'),
					'source_overlay_color'          => $this->opt('source_overlay_color'),
					'source_overlay_color_gradient' => $this->opt('source_overlay_color_gradient'),
					'source_overlay_gloss'          => $this->opt('source_overlay_gloss',''),
					'source_overlay_custom_css'     => $this->opt('source_overlay_custom_css',''),
				) );
			}

			echo '<div class="zn-modalSectionContainer">';

				echo znb_get_element_container(array(
					'cssClasses' => 'row zn-modalSection-MainRow '. $this->opt('gutter_size','')
				));

				// Add an empty column if pb editor is active
				if (  ZNB()->utility->isActiveEditor() && empty( $this->data['content'] ) ) {
					$this->data['content'] = array ( ZNB()->frontend->addModuleToLayout( 'ZnColumn', array() , array(), 'col-sm-12' ) );
				}

				ZNB()->frontend->renderContent( $this->data['content'] );

				echo '</div>'; // row
			echo '</div>';
		echo '</section>';

		// Modal Overlay
		if( ZNB()->utility->isActiveEditor() ){
			$docUrl = 'https://my.hogash.com/documentation/section-as-modal-window/';
			?>
			<div class="zn-modalSection-modalInfo">
				<span class="zn-modalSection-modalInfo-title">MODAL WINDOW</span>
				<span class="zn-modalSection-modalInfo-tip">
					<a href="<?php echo esc_url( $docUrl ); ?>" target="_blank"><span class="dashicons dashicons-info"></span></a>
					<span class="zn-modalSection-modalInfo-bubble"><?php echo __('This section is a Modal Window. It will appear only in Page Builder mode and visible upon being triggered by a modal window target link.','dannys-restaurant'); ?></span>
				</span>
				<a href="#" class="zn-modalSection-modalInfo-toggleVisible js-toggle-class" data-target=".<?php echo esc_attr( $uid ); ?>" data-target-class="modal-overlay-hidden">
					<span class="dashicons dashicons-visibility"></span>
				</a>
			</div>
			<div class="zn-modalSection-modalOverlay"></div>
			<?php
		}

	}

	/**
	 * Output the inline css to head or after the element in case it is loaded via ajax
	 */
	function css(){

		//print_z($this);
		$uid = $this->data['uid'];
		$css = '';

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

		if ( $bg_color = $this->opt('background_color', '') )
		{
			$css .= '.'.$uid.'{background-color:'.$bg_color.';}';
		}

		$custom_width = (int)$this->opt( 'custom_width', '1400' );
		if( !empty($custom_width) ){
			$css .= '@media (min-width: '.$custom_width.'px) {.'.$uid.'.zn-modalSection {max-width:'.$custom_width.'px;} }';
			$css .= '@media (max-width: '.($custom_width-1).'px) {.'.$uid.'.zn-modalSection {max-width:100%;} }';
		}


		if( $this->opt('section_height','auto') == 'custom' ) {
			$selector = '.'.$uid.'.zn-modalSection--height-custom';
			$css .= zn_smart_slider_css( $this->opt( 'custom_height' ), $selector );
		}

		return $css;
	}

}

ZNB()->elements_manager->registerElement( new ZNB_SectionModal( array(
	'id' => 'ZnSectionModal',
	'name' => __( 'Modal Section', 'dannys-restaurant' ),
	'description' => __( 'This element will generate a section that can be used as modal with inline content.', 'dannys-restaurant' ),
	'level' => 1,
	'category' => 'Layout, Fullwidth',
	'legacy' => false,
	'keywords' => array( 'row', 'container', 'block', 'modal', 'popup' ),
) ) );

