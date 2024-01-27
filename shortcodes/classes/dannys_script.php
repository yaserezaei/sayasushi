<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	Load script shortcode
	@use: [dannys_script src=""]
--------------------------------------------------------------------------------------------------*/
class dannys_script extends HG_Shortcode{
	public function getTag(){
		return 'dannys_script';
	}

	public function render( $atts, $content = null ){
		extract( shortcode_atts( array(
			"src" => '',
		), $atts ) );

		return '<script type="text/javascript" src="'.$src.'"></script>';
	}
}
