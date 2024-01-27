<?php if(! defined('ABSPATH')){ return; }

/**
 * Logo
 */

if ( ! function_exists( 'dannys_header_display_logo' ) ) {
	/**
	* Function to display the logo container
	* @return html
	*/
	function dannys_header_display_logo(){
		if( zget_option( 'head_show_logo', 'general_options', false, 'yes' ) == 'yes' ){
			echo dannys_logo();
		}
	}
}


if ( ! function_exists( 'dannys_logo' ) ) {
	/**
	 * Function to show logo markup
	 * @param  string $logo  Custom logo path
	 * @param  string $tag   Pass a custom logo tag
	 * @param  string $class Custom css class
	 * @return string        Html
	 */
	function dannys_logo( $logo = null , $tag = 'div' , $class = null ) {

		// Apply filter if you want a custom logo tag.
		$tag = apply_filters('zn_logo_tag', $tag);

		if( zget_option('wrap_h1', 'general_options', false, 'no') == 'yes' && is_front_page() ){
			$tag = 'h1';
		}

		$logo_size = zget_option( 'logo_size', 'general_options', false, 'contain' );

		$class .= 'dn-logoSize--'. $logo_size;

		$logo_markup = '<'.$tag.' class="dn-logoImg-wrapper '.$class.' " id="dn-logo">';
			$logo_markup .= '<a href="'.esc_url( home_url( '/' ) ).'" class="dn-logoImg-anch">';

		if ( $logo || $logo = zget_option( 'logo_upload', 'general_options' ) ) {

			$logo_attributes = ' alt="'.get_bloginfo('name').'" title="'.get_bloginfo('description').'" '.zn_schema_markup('logo').' ';

			// Mobile logo
			if( $logoMobile = zget_option('logo_upload_mobile', 'general_options') ){
				$logo_markup .= '<img class="dn-logoImg dn-logoMobile" src="'.set_url_scheme( $logoMobile ).'" ' . $logo_attributes . ' />';
			}

			// Sticky logo only when available and Sticky Header enabled
			if( zget_option( 'header_sticky', 'general_options' , false, 'no' ) == 'sticky' ) {
				if( $logoSticky = zget_option('logo_sticky', 'general_options') ){
					$logo_markup .= '<img class="dn-logoImg dn-logoSticky" src="'.set_url_scheme( $logoSticky ).'" ' . $logo_attributes . ' />';
				}
			}

			// Check if logo size has Custom size
			if( $logo_size == 'custom' ){
				$logo_sizes = zget_option( 'logo_manual_size', 'general_options' );
				$logo_attributes .= image_hwstring( $logo_sizes['width'], $logo_sizes['height'] );
			}

			// Logo
			$logo_markup .= '<img class="dn-logoImg dn-logoMain" src="'.set_url_scheme( $logo ).'" ' . $logo_attributes . ' />';

		}
		else{
			// THIS IS JUST FOR TEXT
			$logo_markup .= get_bloginfo( 'name' );
		}

			$logo_markup .= '</a>';
		$logo_markup .= '</'.$tag.'>';

		return $logo_markup;
	}
}