<?php if(! defined('ABSPATH')){ return; }

/**
 * HEADER SOCIAL ICONS
 */

if ( ! function_exists( 'dannys_header_social_icons' ) ) {
	/**
	 * Show header social icons
	 */
	function dannys_header_social_icons(){

		if ( $header_social_icons = zget_option( 'header_social_icons', 'general_options', false, array() ) )
		{
			echo '<div class="sh-component dn-socialIcons '. zget_option( 'header_social_icons_hidexs', 'general_options', false, 'hidden-xs' ) .'">';
				foreach ( $header_social_icons as $key => $icon ) {

					$attr = array();
					$attr[] = !empty( $icon['icon'] ) ? zn_generate_icon( $icon['icon'] ) : '';
					$attr[] = 'title="' . $icon['title'] . '"';
					// Colors
					$style = !empty($icon['color']) ? 'color:'.$icon['color'].';' : '';
					$style .= !empty($icon['bgcolor']) ? 'background-color:'.$icon['bgcolor'].';' : '';
					$attr[] = 'style="' . $style . '"';

					$link = zn_extract_link( $icon['link'], 'dn-socialIcons-item', implode(' ', $attr) );

					// echo '<li>';
					echo $link['start'].$link['end'];
					// echo '</li>';
				}
			echo '</div>';
		}
	}
}