<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	Icons
	@use: [dannys_icon icon="search" color="black" ]
--------------------------------------------------------------------------------------------------*/
class dannys_icon extends HG_Shortcode{
	public function getTag(){
		return 'dannys_icon';
	}

	public function render( $atts, $content = null ){
		extract( shortcode_atts(
			array(
				"icon" => false,
				"color" => "black",
			),
			$atts ) );

		return '<span class="dn-icon dn-icon-' . $icon . ' dn-icon--' . $color . '"></span>';
	}
}
