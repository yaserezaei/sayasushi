<?php if(! defined('ABSPATH')){ return; }

/**
 * HEADER - LANGUAGE SWITCHER (WPML)
 */

if ( ! function_exists( 'dannys_wpml_language_switcher' ) ):
	/**
	 * WPML language switcher
	 * @hooked to zn_head_right_area
	 * @see functions.php
	 */
	function dannys_wpml_language_switcher(){

		$languages = array();

		if( function_exists('zn_language_demo_data') ){
			// For demo displaying flags
			$languages = zn_language_demo_data();
		}
		else if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {

			if( ICL_SITEPRESS_VERSION < '3.2' ){
				$languages = icl_get_languages( 'skip_missing=0' );
			}
			else{
				$languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0' );
			}
		}
		else {
			return;
		}

		// Show Markup
		if ( !empty($languages) && zget_option( 'header_languages', 'general_options', false, 'no' ) == 'yes' ) {

			if ( 1 < count( $languages ) ) {

				$active = $langs = '';

				foreach ( $languages as $l ) {

					if( $l['active'] ){
						$active = '<span class="dn-topLangs-head">'.strtoupper($l['code']).'</span>';
					}

					$langs .= '<li class="'.($l['active'] ? 'is-active' : '').'">';
						$langs .= '<a href="' . $l['url'] . '" class="dn-topLangs-item">';
						$langs .= '<img src="' . $l['country_flag_url'] . '" alt="' . $l['native_name'] . '" class="dn-topLangs-itemFlag" />';
						$langs .= '<span class="dn-topLangs-itemName">' . $l['native_name'] . '</span>';
						$langs .= '</a>';
					$langs .= '</li>';
				}

				echo '<div class="sh-component dn-topLangs sh-dropDown '. zget_option( 'header_languages_hidexs', 'general_options', false, 'hidden-xs' ) .'">
						<div class="sh-dropDown-head">
							' . $active . '
						</div>
						<div class="sh-dropDown-panel">
							<ul class="dn-topLangs-list">
								' . $langs . '
							</ul>
						</div>
					</div>';
			}

		}
	}
endif;