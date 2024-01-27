<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	Icon List
	@use: [iconlist theme="dark" class="" size="20px"] icons here [/iconlist]
	@use: [iconlist_item color="#000" icon="facebook" url="#" title="Just an icon here"]
--------------------------------------------------------------------------------------------------*/
class zn_gallery extends HG_Shortcode{
	public function getTag(){
		return 'zn_gallery';
	}

	public function render( $atts, $content = null ){
		extract( shortcode_atts( array(
			'order' => 'ASC',
			'ids' => '',
			'size' => 'col-sm-9',
			'style' => 'thumbnails',
			'columns' => 3,
		), $atts ) );

		$output = '';

		$attachments = get_posts( array(
				'include' => $ids,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $order,
				'orderby' => 'post__in',
			)
		);

		if ( !empty( $attachments ) && is_array( $attachments ) )
		{
			// Load Slick
			wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js-vendors/slick/slick.min.js', array ( 'jquery' ), true, true );

			$slick_attributes = array(
				"infinite" => true,
				"slidesToShow" => 1,
				"slidesToScroll" => 1,
				"autoplay" => true,
				"autoplaySpeed" => 9000,
				"easing" => 'easeOutExpo',
				"fade" => true,
				"arrows" => true,
				"appendArrows" => '.znPostGallery-navigationPagination',
				"dots" => true,
				"appendDots" => '.znPostGallery-pagination',
			);

			$output .= '<div class="znPostGallery slick--showOnMouseover">';
			$output .= '<ul class="js-slick" data-slick=\''.json_encode($slick_attributes).'\'>';

			foreach ( $attachments as $attachment )
			{
				$imgAttr = array( 'class' => "img-responsive" );
				$img = zn_get_image( $attachment->ID, '1400', '600', $imgAttr, true );

				$output .= '<li class="u-slick-show1">';
				$output .= $img;
				$output .= '</li>';
			}

			$output .= '</ul>';

			$output .= '<div class="znPostGallery-navigationPagination znSlickNav znSlickNav--light">';
			$output .= '<div class="znPostGallery-pagination"></div>';
			$output .= '</div>';

			$output .= '</div>';

		}

		return $output;
	}
}
