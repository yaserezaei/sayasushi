<?php if(! defined('ABSPATH')){ return; }

class ZNB_PriceList extends ZionElement
{
	function options() {

		$uid = $this->data['uid'];

		$options = array(
			// 'css_selector' => '.',
			'has_tabs'  => true,
			'general' => array(
				'title' => 'General options',
				'options' => array(

					array(
						"id"          => "curr",
						"name"        => __("Currency",'dannys-restaurant'),
						"description" => __("Please enter the currency symbol or text.",'dannys-restaurant'),
						"std"         => "",
						"type"        => "text",
						"placeholder" => "eg: $",
					),

					array(
						"id"          => "curr_pos",
						"name"        => __("Currency Position",'dannys-restaurant'),
						"description" => __("Please enter the currency symbol or text.",'dannys-restaurant'),
						"std"         => "before",
						"type"        => "select",
						'options'     => array(
							'before' => 'Before',
							'after' => 'After'
						),
					),

					array (
						"name"        => __( "Typography settings", 'dannys-restaurant' ),
						"description" => __( "Specify the typography properties for the title and price.", 'dannys-restaurant' ),
						"id"          => "title_typo",
						"std"         => '',
						'supports'   => array( 'size', 'font', 'style', 'line', 'color', 'weight' ),
						"type"        => "font",
						'live' => array(
							'multiple' => array(
								array(
									'type'      => 'font',
									'css_class' => '.'.$uid. ' .zn-priceList-itemTitle',
								),
								array(
									'type'      => 'font',
									'css_class' => '.'.$uid. ' .zn-priceList-itemPrice',
								)
							)
						),
					),

					array (
						"name"        => __( "Description Typography settings", 'dannys-restaurant' ),
						"description" => __( "Specify the typography properties for the description.", 'dannys-restaurant' ),
						"id"          => "desc_typo",
						"std"         => '',
						'supports'   => array( 'size', 'font', 'style', 'line', 'color', 'weight' ),
						"type"        => "font",
						'live' => array(
							'type'      => 'font',
							'css_class' => '.'.$uid. ' .zn-priceList-itemDesc ',
						),
					),

					array(
						"id"          => "price_color",
						"name"        => __("Prices Color",'dannys-restaurant'),
						"description" => __("Please choose the price default color.",'dannys-restaurant'),
						"std"         => "#cd2122",
						"alpha"       => "true",
						"type"        => "colorpicker",
					),

					array(
						'id'          => 'vertical_spacing',
						'name'        => __('Vertical Spacing','dannys-restaurant'),
						'description' => __('Select the vertical spacing ( in pixels ) for the item list.','dannys-restaurant'),
						'type'        => 'slider',
						'std'         => '5',
						// 'class'       => 'zn_full',
						'helpers'     => array(
							'min' => '0',
							'max' => '100',
							'step' => '1'
						),
						'live' => array(
							'multiple' => array(
								array(
									'type'      => 'css',
									'css_class' => '.'.$uid. ' > ul > li',
									'css_rule'  => 'margin-top',
									'unit'      => 'px'
								),
								array(
									'type'      => 'css',
									'css_class' => '.'.$uid. ' > ul > li',
									'css_rule'  => 'margin-bottom',
									'unit'      => 'px'
								),
								array(
									'type'      => 'css',
									'css_class' => '.'.$uid. '.zn-priceList-dash--separator > ul > li',
									'css_rule'  => 'padding-bottom',
									'unit'      => 'px'
								),
							)
						)
					),

					array(
						'id'          => 'dotted_line',
						'name'        => __('Dotted line style','dannys-restaurant'),
						'description' => __('Select the style of the dotted line.','dannys-restaurant'),
						'type'        => 'select',
						'std'         => 'classic',
						'options'        => array(
							'classic' => 'Classic',
							'separator' => 'As item separator',
						)
					),

					array(
						"id"          => "dottedline_color",
						"name"        => __("Dotted Line Color",'dannys-restaurant'),
						"description" => __("Use this option if you want to change the dotted line color.",'dannys-restaurant'),
						"std"         => "rgba(0,0,0,0.2)",
						"alpha"       => "true",
						"type"        => "colorpicker",
					),


					array (
						"name"        => __( "Add Image Thumb?", 'dannys-restaurant' ),
						"description" => __( "Add Image thumbnail?", 'dannys-restaurant' ),
						"id"          => "show_img",
						"std"         => "yes",
						'type'        => 'zn_radio',
						'options'        => array(
							'yes' => __( "Yes", 'dannys-restaurant' ),
							'no' => __( "No", 'dannys-restaurant' ),
						),
						'class'        => 'zn_radio--yesno',
					),

					array (
						"name"        => __( "Thumbnail Image Sizes", 'dannys-restaurant' ),
						"description" => __( "Choose image sizes.", 'dannys-restaurant' ),
						"id"          => "img_sizes",
						"type"        => "image_size",
						"std"        => array(
							'width' => '38',
							'height' => '38'
						),
						"dependency"  => array( 'element' => 'show_img' , 'value'=> array('yes') ),
					),

					array (
						"name"        => __( "Show Image Tooltip", 'dannys-restaurant' ),
						"description" => __( "Show image tooltips on hover?", 'dannys-restaurant' ),
						"id"          => "img_tooltip",
						"std"         => "yes",
						'type'        => 'zn_radio',
						'options'        => array(
							'yes' => __( "Yes", 'dannys-restaurant' ),
							'no' => __( "No", 'dannys-restaurant' ),
						),
						'class'        => 'zn_radio--yesno',
					),

					array (
						"name"        => __( "Tooltip Image Sizes", 'dannys-restaurant' ),
						"description" => __( "Choose the tooltip image sizes.", 'dannys-restaurant' ),
						"id"          => "img_sizes_tooltip",
						"type"        => "image_size",
						"std"        => array(
							'width' => '275',
							'height' => '275'
						),
						"dependency"  => array( 'element' => 'img_tooltip' , 'value'=> array('yes') ),
					),

				)
			),
			'price_items' => array(
				'title' => 'Items',
				'options' => array(

					array(
						'id'            => 'price_list',
						'name'          => __('Price list items', 'dannys-restaurant'),
						'description'   => __('Here you can add price list items', 'dannys-restaurant'),
						'type'          => 'group',
						'sortable'      => true,
						'element_title' => 'Item',
						'subelements'   => array(
							array(
								"id"          => "title",
								"name"        => __("Title", 'dannys-restaurant'),
								"description" => __("Please enter the title that will appear on the left side.", 'dannys-restaurant'),
								"std"         => "",
								"type"        => "text",
								"class"        => "zn_input_xl",
							),
							array(
								"id"          => "price",
								"name"        => __("Price", 'dannys-restaurant'),
								"description" => __("Please enter the price that will appear on the right side.", 'dannys-restaurant'),
								"std"         => "",
								"type"        => "text"
							),
							array(
								"id"          => "desc",
								"name"        => __("Description", 'dannys-restaurant'),
								"description" => __("Please enter the description that will appear under the price.", 'dannys-restaurant'),
								"std"         => "",
								"type"        => "textarea"
							),

							array(
								"id"          => "title_color",
								"name"        => __("Title Color", 'dannys-restaurant'),
								"description" => __("Select if you want to override the default title color.", 'dannys-restaurant'),
								"std"         => "",
								"alpha"       => "true",
								"type"        => "colorpicker",
							),

							array(
								"id"          => "price_color",
								"name"        => __("Price Color", 'dannys-restaurant'),
								"description" => __("Select if you want to override the default price color.", 'dannys-restaurant'),
								"std"         => "",
								"alpha"       => "true",
								"type"        => "colorpicker",
							),

							array (
								"name"        => __( "Price font settings", 'dannys-restaurant' ),
								"description" => __( "Override the font options of the price.", 'dannys-restaurant' ),
								"id"          => "price_typo",
								"std"         => '',
								'supports'   => array( 'size', 'font', 'style', 'weight' ),
								"type"        => "font",
							),

							// Image Settings
							array(
								"id"          => "img",
								"name"        => __("Add image", 'dannys-restaurant'),
								"description" => __("Add image to this item.", 'dannys-restaurant'),
								"type"        => "media",
								"std"         => ""
							),

							array(
								"id"          => "featured",
								"name"        => __("Is featured?", 'dannys-restaurant'),
								"description" => __("Enable if you want this item to be featured/highlighted in the list.", 'dannys-restaurant'),
								"type"        => "toggle2",
								"std"         => "",
								"value"        => "yes"
							),
						),
					),

				),
			),


			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#O03njJEtSNQ',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),

		);

		return $options;
	}

	function element() {

		$options = $this->data['options'];
		$classes = $attributes = array();
		$uid = $this->data['uid'];

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-priceList';
		$classes[] = 'zn-priceList-dash--'.$this->opt( 'dotted_line', 'classic' );

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));
		$attributes[] = 'class="'.zn_join_spaces($classes).'"';

		echo '<div '. zn_join_spaces($attributes ) .'>';

		?>
			<ul>
				<?php

				$currency = $this->opt('curr', '');
				$currency_position = $this->opt('curr_pos', 'before');

				$priceItems    = $this->opt( 'price_list' );

				// Set some defaults for buttons
				if( empty( $priceItems ) ){
					$priceItems = array(
						array(
							'title' => 'Some title right here',
							'price' => '79.99',
							'desc' => 'Just some description, can be empty if you want.',
						),
					);
				}
				if(is_array($priceItems) && !empty($priceItems)){
					foreach ( $priceItems as $i => $entry ) {

						if($currency_position == 'before'){
							$pbefore = $currency;
							$pafter = '';
						}
						elseif($currency_position == 'after'){
							$pbefore = '';
							$pafter = $currency;
						}

						$title    = ! empty( $entry['title'] ) ? '<h4 class="zn-priceList-itemTitle" '.zn_schema_markup('title').'>'.$entry['title'].'</h4>' : '';
						$price    = ! empty( $entry['price'] ) ? '<div class="zn-priceList-itemPrice">'.$pbefore.$entry['price'].$pafter.'</div>' : '';
						$desc    = ! empty( $entry['desc'] ) ? '<div class="zn-priceList-itemDesc">'.$entry['desc'].'</div>' : '';

						$item_classes = array();
						$item_classes[] = 'zn-priceList-item-'.$i;
						$item_classes[] = isset($entry['featured']) && $entry['featured'] == 'yes' ? 'is-featured' : '';
						?>
						<li class="<?php echo implode(' ', $item_classes); ?>">

							<?php

							if( isset($entry['img']) && !empty($entry['img']) ){

								$attachment_id = attachment_url_to_postid($entry['img']);

								if( $this->opt('show_img', 'yes') == 'yes' ){
									echo '<div class="zn-priceList-itemLeft">';
										echo wp_get_attachment_image( $attachment_id, 'thumbnail', false, 'class=zn-priceList-itemThumb img-responsive' );
									echo '</div>';
								}

								if( $this->opt('img_tooltip', 'yes') == 'yes' ){
									echo '<div class="zn-priceList-imgTooltip">';
										echo '<a href="'. wp_get_attachment_url($attachment_id) .'" data-lightbox="image" title="'.get_the_title($attachment_id).'">';
										echo wp_get_attachment_image( $attachment_id, 'large', false, 'class=img-responsive' );
									echo '</a></div>';
								}
							} ?>

							<div class="zn-priceList-itemRight">
								<div class="zn-priceList-itemMain">
									<?php echo $title; ?>
									<div class="zn-priceList-dottedSeparator"></div>
									<?php echo $price; ?>
									<?php
										if($this->opt( 'dotted_line', 'classic' ) == 'separator') echo '<div class="clearfix"></div>';
									?>
								</div>
							<?php echo $desc; ?>
							</div>

							  <div class="clearfix"></div>
						</li>
					<?php
					} // end foreach
				}
				?>
			</ul>
			<div class="clearfix"></div>
		</div>
	<?php
	}

	function css(){

		$uid = $this->data['uid'];
		$css = '';

		$dotted_line = $this->opt( 'dotted_line', 'classic' );

		$vertical_spacing = $this->opt('vertical_spacing', 5);
		if( $vertical_spacing != '' && $vertical_spacing != 5 ){
			$css .= '.'.$uid.' > ul > li{margin-top:'.$vertical_spacing.'px; margin-bottom:'.$vertical_spacing.'px;}';
			if($dotted_line == 'separator'){
				$css .= '.'.$uid.'.zn-priceList-dash--separator > ul > li{padding-bottom:'.$vertical_spacing.'px;}';
			}
		}

		// Title Styles
		$title_styles = '';
		$title_typo = $this->opt('title_typo');
		if( is_array($title_typo) && !empty($title_typo) ){
			foreach ($title_typo as $key => $value) {
				if($value != '') {
					if( $key == 'font-family' ){
						$title_styles .= $key .':'. zn_convert_font($value).';';
					}
					else {
						$title_styles .= $key .':'. $value.';';
					}
				}
			}
			if(!empty($title_styles)){
				$css .= '.'.$uid.' .zn-priceList-itemTitle, .'.$uid.' .zn-priceList-itemPrice {'.$title_styles.'}';
			}
			if($dotted_line == 'classic'){
				// Make proper dotted separator
				$font_size = !empty($title_typo['font-size']) ? $title_typo['font-size'] : 14;
				$line_height = !empty($title_typo['line-height']) ? $title_typo['line-height'] : 24;
				$css .= '.'.$uid.' .zn-priceList-dottedSeparator {margin-bottom: calc(('.(int)$line_height.'px - '.(int)$font_size.'px) / 2);}';
			}
		}

		// Price Color
		$price_color = $is_featured_color = $this->opt('price_color', '#cd2122');
		if($price_color != '#cd2122'){
			$css .= '.'.$uid.' .zn-priceList-itemPrice {color:'.$price_color.'}';
		}

		// Dotted Line Color
		$dottedline_color = $this->opt('dottedline_color', 'rgba(0,0,0,0.2)');
		if($dottedline_color != 'rgba(0,0,0,0.2)'){
			if($dotted_line == 'classic'){
				$sel = '.'.$uid.'.zn-priceList-dash--classic .zn-priceList-dottedSeparator';
			} elseif($dotted_line == 'separator'){
				$sel = '.'.$uid.'.zn-priceList-dash--separator > ul > li';
			}
			$css .= $sel . '{background-image: -webkit-radial-gradient(circle closest-side, '.$dottedline_color.' 99%, transparent 1%); background-image: radial-gradient(circle closest-side, '.$dottedline_color.' 99%, transparent 1%);}';
		}

		// Subtitle styles
		$desc_styles = '';
		$desc_typo = $this->opt('desc_typo');
		if( is_array($desc_typo) && !empty($desc_typo) ){
			foreach ($desc_typo as $key => $value) {
				if($value != '') {
					if( $key == 'font-family' ){
						$desc_styles .= $key .':'. zn_convert_font($value).';';
					} else {
						$desc_styles .= $key .':'. $value.';';
					}
				}
			}
			if(!empty($desc_styles)){
				$css .= '.'.$uid.' .zn-priceList-itemDesc{'.$desc_styles.'}';
			}
		}

		// color per items
		$priceItems    = $this->opt( 'price_list' );
		if(is_array($priceItems) && !empty($priceItems)){
			foreach ( $priceItems as $i => $entry ) {
				if(isset($entry['title_color']) && !empty($entry['title_color'])){
					$css .= '.'.$uid.' .zn-priceList-item-'.$i.' .zn-priceList-itemTitle {color:'.$entry['title_color'].'}';
				}
				if(isset($entry['price_color']) && !empty($entry['price_color'])){
					$css .= '.'.$uid.' .zn-priceList-item-'.$i.' .zn-priceList-itemPrice {color:'.$entry['price_color'].'}';
					$is_featured_color = $entry['price_color'];
				}

				// Featured item color
				if(isset($entry['featured']) && $entry['featured'] == 'yes'){
					$css .= '.'.$uid.' .zn-priceList-item-'.$i.'.is-featured .zn-priceList-itemLeft {border-left-color:'.$is_featured_color.'}';
				}

				// Price Font options
				$price_font_styles = '';
				if(isset($entry['price_typo']) && is_array($entry['price_typo']) && !empty($entry['price_typo']) ){
					foreach ($entry['price_typo'] as $key => $value) {
						if($value != '') {
							if( $key == 'font-family' ){
								$price_font_styles .= $key .':'. zn_convert_font($value).';';
							} else {
								$price_font_styles .= $key .':'. $value.';';
							}
						}
					}
					if(!empty($price_font_styles)){
						$css .= '.'.$uid.' .zn-priceList-item-'.$i.' .zn-priceList-itemPrice{'.$price_font_styles.'}';
					}
				}

			}
		}

		$img_sizes = $this->opt('img_sizes', array('width'=>'38', 'height'=>'38'));
		$img_width = (int)$img_sizes['width'];
		$img_height = (int)$img_sizes['height'];

		if( $this->opt('show_img', 'yes') == 'yes' && $img_width != '38' ){
			$css .= '.'.$uid.' .zn-priceList-itemLeft {max-width:'.$img_width.'px; max-height:'.$img_height.'px}';
			$css .= '.'.$uid.' .zn-priceList-itemLeft + .zn-priceList-itemRight {width:calc(100% - '.($img_width + 20).'px);}';
		}

		$img_sizes_tooltip = $this->opt('img_sizes_tooltip', array('width'=>'275', 'height'=>'275'));
		$img_tooltip_width = (int)$img_sizes_tooltip['width'];
		$img_tooltip_height = (int)$img_sizes_tooltip['height'];

		if( $this->opt('img_tooltip', 'yes') == 'yes' && $img_tooltip_width != '275' ){
			$css .= '.'.$uid.' .zn-priceList-imgTooltip {max-width:'.$img_tooltip_width.'px; max-height:'.$img_tooltip_height.'px;}';
		}


		return $css;


	}
}

ZNB()->elements_manager->registerElement( new ZNB_PriceList(array(
	'id' => 'ZnPriceList',
	'name' => __('Price List', 'dannys-restaurant'),
	'description' => __('This element will generate a list containing prices, often used on restaurant context.', 'dannys-restaurant'),
	'level' => 3,
	'category' => 'Content',
	'legacy' => false,
	'keywords' => array('restaurant', 'menu'),
)));
