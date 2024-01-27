<?php if (!defined('ABSPATH')) { return; }

class ZNB_ImageGallery extends ZionElement
{

	/**
	 * This method is used to retrieve the configurable options of the element.
	 * @return array The list of options that compose the element and then passed as the argument for the render() function
	 */
	function options()
	{

		$extra_options = array(
			"name" => __("Images", 'dannys-restaurant'),
			"description" => __("Here you can add your desired images.", 'dannys-restaurant'),
			"id" => "single_photo_gallery",
			"std" => "",
			"type" => "group",
			"add_text" => __("Image", 'dannys-restaurant'),
			"remove_text" => __("Image", 'dannys-restaurant'),
			"group_title" => "",
			"group_sortable" => true,
			"element_title" => "title",
			"element_img"  => 'image',
			"class"  => 'zn_not_full',
			"dependency"  => array( 'element' => 'upload_type' , 'value'=> array('manual') ),
			"subelements" => array(

				array(
					"name" => __("Title", 'dannys-restaurant'),
					"description" => __("Please enter a title for this image.", 'dannys-restaurant'),
					"id" => "title",
					"std" => "",
					"type" => "text"
				),

				array(
					"name" => __("Image", 'dannys-restaurant'),
					"description" => __("Please select an image.", 'dannys-restaurant'),
					"id" => "image",
					"std" => "",
					"type" => "media"
				),

				array (
					"name"        => __( "Add Custom URL?", 'dannys-restaurant' ),
					"description" => __( "Enable if you want to have a custom URL.", 'dannys-restaurant' ),
					"id"          => "enable_url",
					"std"         => "",
					"value"       => "yes",
					"type"        => "toggle2",
				),

				array(
					"name" => __("Custom URL", 'dannys-restaurant'),
					"description" => __("Please enter a custom URL in case you want to link differently.", 'dannys-restaurant'),
					"id" => "custom_url",
					"std" => "",
					"type" => "text",
					"dependency"  => array( 'element' => 'enable_url' , 'value'=> array('yes') ),
				),

				array(
					"name" => __("URL Target", 'dannys-restaurant'),
					"description" => __("Select the target of the custom URL.", 'dannys-restaurant'),
					"id" => "custom_url_target",
					"std" => 'modal_iframe',
					"type"     => "select",
					"options"     => zn_get_link_targets( array('modal_inline', 'modal_inline_dyn', 'smoothscroll') ),
					"dependency"  => array( 'element' => 'enable_url' , 'value'=> array('yes') ),
				),

			)
		);

		$cols_opt = array(
			'12' => __('1 Col.', 'dannys-restaurant'),
			'6' => __('2 Cols.', 'dannys-restaurant'),
			'4' => __('3 Cols.', 'dannys-restaurant'),
			'3' => __('4 Cols.', 'dannys-restaurant'),
			'2' => __('6 Cols.', 'dannys-restaurant')
		);

		$uid = $this->data['uid'];

		$options = array(
			'has_tabs'  => true,
			'general' => array(
				'title' => 'Content',
				'options' => array(

					array (
						"name"        => __( "Images Add Type", 'dannys-restaurant' ),
						"description" => __( "Choose how to add the gallery images.", 'dannys-restaurant' ),
						"id"          => "upload_type",
						"std"         => "bulk",
						'type'        => 'zn_radio',
						'options'        => array(
							'bulk' => __( "Bulk", 'dannys-restaurant' ),
							'manual' => __( "Manual (with custom options)", 'dannys-restaurant' ),
						),
					),

					array(
						"name" => __("Add Images", 'dannys-restaurant'),
						"description" => __("Add images to the gallery.", 'dannys-restaurant'),
						"id" => "bulk_images",
						"std" => "",
						"type" => "gallery",
						"dependency"  => array( 'element' => 'upload_type' , 'value'=> array('bulk') ),
					),

					$extra_options,
				),
			),

			'style' => array(
				'title' => 'Options',
				'options' => array(

					array (
						"name"        => __( "Images Size", 'dannys-restaurant' ),
						"description" => __( "Choose the image's size", 'dannys-restaurant' ),
						"id"          => "image_size",
						"std"         => "medium",
						'type'        => 'select',
						'options'        => zn_get_image_sizes_list(),
					),

					array (
						"name"        => __( "Columns", 'dannys-restaurant' ),
						"description" => __( "Choose how many columns for each viewport size.", 'dannys-restaurant' ),
						"id"          => "cols",
						"std"          => array(
								'lg' => 3,
								'md' => 4,
								'sm' => 6,
								'xs' => 12,
							),
						"type"        => "group_select",
						"config"     => array (
							'size' => 'zn_span3',
							'options'  => array(
								array(
									'name' => __('Large','dannys-restaurant'),
									'id' => 'lg',
									'options' => $cols_opt,
								),
								array(
									'name' => __('Medium','dannys-restaurant'),
									'id' => 'md',
									'options' => $cols_opt,
								),
								array(
									'name' => __('Small','dannys-restaurant'),
									'id' => 'sm',
									'options' => $cols_opt,
								),
								array(
									'name' => __('Extra Small','dannys-restaurant'),
									'id' => 'xs',
									'options' => $cols_opt,
								),
							)
						),
					),

					array(
						"name" => __("Lazy Load images", 'dannys-restaurant'),
						"description" => __("Select if you want to lazy load the images.", 'dannys-restaurant'),
						"id" => "lazy",
						"std" => "",
						"type" => "toggle2",
						'value' => 'yes',
					),
				),
			),

			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#o4Ei4xDN71E',
				// 'docs'    => 'https://my.hogash.com/documentation/photo-gallery/',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),

		);
		return $options;
	}

	function css(){
//		$uid = $this->data['uid'];
//		$css = '';
//		return $css;
	}

	/**
	 * This method is used to display the output of the element.
	 * @return void
	 */
	function element()
	{
		$options = $this->data['options'];
		$classes = $attributes = array();
		$uid = $this->data['uid'];

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-imgGallery';

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));
		$attributes[] = 'class="'.zn_join_spaces($classes).'"';

		echo '<div '. zn_join_spaces($attributes ) .'>';

			$upload_type = $this->opt('upload_type', 'bulk');
			if( $upload_type == 'bulk' ){
				$bulk_images = explode(',', $this->opt('bulk_images', ''));
				foreach ($bulk_images as $k=>$value) {
					$images[$k]['image'] = $value;
				}
			}
			else{
				$images = $this->opt('single_photo_gallery', '');
			}

			if (!empty($images) && is_array($images)) {

				$cols = $this->opt('cols', array(
					'lg' => 3,
					'md' => 4,
					'sm' => 6,
					'xs' => 12,
				));

				$lazyLoad = ( 'yes' == $this->opt('lazy','') );

				echo '<div class="row mfp-gallery mfp-gallery--misc">';

				foreach ($images as $image) {

					echo '<div class="col-xs-'.$cols['xs'].' col-sm-'.$cols['sm'].' col-md-'.$cols['md'].' col-lg-'.$cols['lg'].'">';

					if(isset($image['image']) && !empty($image['image'])){

						$attachment_id = $image['image'];
						$attachment_size = $this->opt('image_size','medium');
						$attachment_url = wp_get_attachment_url( $attachment_id );
						$attachment_title = get_the_title($attachment_id);
						$attachment_attr = array(
							'class' => 'zn-imgGallery-img'
						);
						$img = wp_get_attachment_image( $attachment_id, $attachment_size, false, $attachment_attr );

						if( $lazyLoad ){
							$attachment_attr['class'] .= ' zn-ajax--loading';
							$sizes = zn_get_image_size($attachment_size);
							if( isset($sizes[ 'width' ]) && isset($sizes[ 'height' ]) ) {
								$img = sprintf(
									'<img data-echo="%s" title="%s" alt="%s" class="%s" %s />',
									$attachment_url,
									$attachment_title,
									get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ),
									$attachment_attr[ 'class' ],
									image_hwstring( $sizes[ 'width' ], $sizes[ 'height' ] )
								);
							}
						}

						$link_target = 'data-mfp="image"';

						// If Custom URL is enabled
						if( isset($image['enable_url']) && $image['enable_url'] == 'yes' ){
							// Override default media URL
							if( isset($image['custom_url']) && !empty($image['custom_url']) ){
								$attachment_url = $image['custom_url'];
							}
							// Custom assigned target
							if( isset($image['custom_url_target']) && !empty($image['custom_url_target']) ){
								$target = $image['custom_url_target'];
								if($target == '_blank' || $target == '_self'){
									$link_target = 'target="' . $target  . '"';
								}
								elseif($target == 'modal_image' || $target == 'modal'){
									$link_target = 'data-mfp="image"';
								}
								elseif($target == 'modal_iframe'){
									$link_target = 'data-mfp="iframe"';
								}
							}
						}

						$link_attr[] = 'class="zn-imgGallery-link"';
						$link_attr[] = $link_target;

						echo sprintf('<a href="%s" title="%s" %s >%s</a>',
							$attachment_url,
							$attachment_title,
							zn_join_spaces( $link_attr ),
							$img
						);
					}
					echo '</div>';
				}
				echo '</div>';
			}
		echo '</div>';
	}
	function js() {
		$js = '
window.onload = function(){
	echo.init({
		offset: 10,
		unload: true,
		callback: function (element, op) {
			if(op === "load") {
				element.classList.remove("zn-ajax--loading");
				element.classList.add("is-loaded");
			}
		}
	});
	
};';

		return array(
			'gallery_lazy_load'.$this->data['uid'] => $js
		);
	}
}

ZNB()->elements_manager->registerElement( new ZNB_ImageGallery( array(
	'id' => 'DnImageGallery',
	'name' => __( 'Image Gallery', 'dannys-restaurant' ),
	'description' => __( 'Will display an image gallery.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Content, Media',
	'legacy' => false,
	'keywords' => array( 'photo', 'photos', 'gallery' ),
) ) );
