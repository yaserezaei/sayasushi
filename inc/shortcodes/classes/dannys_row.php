<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	ROW
	@use: [dannys_row class=""] Content [/dannys_row]
--------------------------------------------------------------------------------------------------*/
class dannys_row extends HG_Shortcode{
	public function getTag(){
		return 'dannys_row';
	}

	public function render( $atts, $content = null ){
		extract( shortcode_atts(
			array(
				"class" => false
			),
			$atts ) );

		return '<div class="row ' . $class . '">' . do_shortcode( $content ) . '</div>';
	}
}
