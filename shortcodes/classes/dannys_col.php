<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	Column
	@use: [dannys_col class=""] Content [/dannys_col]
--------------------------------------------------------------------------------------------------*/
class dannys_col extends HG_Shortcode{
	public function getTag(){
		return 'dannys_col';
	}

	public function render( $atts, $content = null ){
		extract( shortcode_atts(
			array(
				"size" => '12',
				"class" => '',
			),
			$atts ) );

		return '<div class="col-sm-'.$size.' '.$class.'">' . do_shortcode( $content ) . '</div>';
	}
}
