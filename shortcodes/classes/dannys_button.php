<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	Buttons
	@use: [dannys_button style="btn-primary" url="" size="" block="false" target="_self"] BUTTON TEXT [/dannys_button]
--------------------------------------------------------------------------------------------------*/
class dannys_button extends HG_Shortcode{
	public function getTag(){
		return 'dannys_button';
	}

	public function render( $atts, $content = null ){
		$url = $size = $style = $block = $target = '';
		extract( shortcode_atts( array( "style" => '',
			"size" => '',
			"block" => '',
			"url" => '',
			"target" => '' ), $atts ) );
		return ' <a href="' . $url . '" class="btn ' . $size . ' ' . $style . ' ' . $block . '" target="' . $target . '">' . $content . '</a>';

	}
}
