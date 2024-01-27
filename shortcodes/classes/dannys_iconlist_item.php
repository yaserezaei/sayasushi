<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	Icon List
	@use: [iconlist theme="dark" class="" size="20px"] icons here [/iconlist]
	@use: [iconlist_item color="#000" icon="facebook" url="#" title="Just an icon here"]
--------------------------------------------------------------------------------------------------*/
class dannys_iconlist_item extends HG_Shortcode{
	public function getTag(){
		return 'dannys_iconlist_item';
	}

	public function render( $atts, $content = null ){
		extract( shortcode_atts( array(
			"color" => '',
			"icon" => '',
			"url" => '',
			"target" => '_blank',
			"title" => '',
		), $atts ) );

		$style = '';
		if( $color ){
			$style = 'style="color:'.$color.'"';
		}

		$link_start = '<span class="dn-iconList-item" '.$style.'>';
		$link_end = '</span>';

		if( !empty($url) ){
			$link_start = '<a class="dn-iconList-item" href="' . esc_url( $url ) . '" title="'. esc_attr($title) .'" target="'. esc_attr($target) .'" '.$style.'>';
			$link_end = '</a>';
		}

		$output = '<li>';
		$output .= $link_start;

		if( $icon ){
			$output .= dannys_get_svg( array( 'icon' => $icon, 'title' => $title ) );
		}

		$output .= $link_end;
		$output .= '</li>';

		return $output;
	}
}
