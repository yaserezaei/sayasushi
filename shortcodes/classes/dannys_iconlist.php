<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	Icon List
	@use: [iconlist theme="dark" class="" size="20px"] icons here [/iconlist]
	@use: [iconlist_item color="#000" icon="facebook" url="#" title="Just an icon here"]
--------------------------------------------------------------------------------------------------*/
class dannys_iconlist extends HG_Shortcode{
	public function getTag(){
		return 'dannys_iconlist';
	}

	public function render( $atts, $content = null ){
		extract( shortcode_atts( array(
			"theme" => 'dark',
			"size" => '20px',
			"class" => '',
		), $atts ) );

		$style = '';
		if( $size ){
			$style = 'style="font-size:'.esc_attr($size).';"';
		}

		$output = '<ul class="dn-iconList dn-iconList--'. esc_attr($theme) .' '. esc_attr($class) .'" '. $style .'>';
		$output .= do_shortcode( $content );
		$output .= '</ul>';

		return $output;
	}
}
