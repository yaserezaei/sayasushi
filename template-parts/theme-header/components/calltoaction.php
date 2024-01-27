<?php if(! defined('ABSPATH')){ return; }

if ( ! function_exists( 'dannys_header_calltoaction' ) ):
	/**
	* Function to display the call to action button markup in header
	* @return html
	*/
	function dannys_header_calltoaction(){
		if( ! function_exists('ZNHGFW') ){
			return;
		}
		$btn_custom = zget_option( 'cta_custom', 'general_options', false, false );

		if( isset($btn_custom) && !empty($btn_custom) ):
			foreach($btn_custom as $i => $btn):

				// Check if we can display this button
				$cta_permissions = isset( $btn['cta_perm']) ? $btn['cta_perm'] : 'all';
				if ( $cta_permissions === 'loggedin' && ! is_user_logged_in() ){
					continue;
				}
				elseif ( $cta_permissions === 'visitor' && is_user_logged_in() ){
					continue;
				}

				//Class
				$classes = array();
				$classes[] = 'sh-component dn-headerCta dn-headerCta-'.$i.' btn';
				$classes[] = $btn['cta_style'];
				$classes[] = $btn['cta_size'];
				$classes[] = 'cta-icon--'.$btn['cta_icon_pos'];
				$classes[] = $btn['cta_corners'];

				$classes[] = dannys_breakpoint_classes_output( zget_option( 'cta_breakpoint', 'general_options', false, array() ) );

				// Icon
				$icon = isset($btn['cta_icon_enable']) && $btn['cta_icon_enable'] == 1 ? '<span '.zn_generate_icon( $btn['cta_icon'] ).'></span>':'';

				if( isset($btn['cta_text']) && !empty($btn['cta_text']) ){

					$text = '<span>'.$btn['cta_text'].'</span>';

					// Icon position
					if( $btn['cta_icon_pos'] == 'before' ){
						$text = $icon.$text;
					} else{
						$text = $text.$icon;
					}

					$cta_link_ext = zn_extract_link( $btn['cta_link'], implode(' ', $classes), 'id="dn-headerCta-'.$i.'"' );

					echo $cta_link_ext['start'] . $text . $cta_link_ext['end'];
				}

			endforeach;
		endif;
	}
endif;
