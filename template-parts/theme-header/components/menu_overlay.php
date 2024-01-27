<?php if(! defined('ABSPATH')){ return; }


$nav_classes = array();

// Menu Theme Color
$nav_classes[] = 'dnNavOvr--theme-' . zget_option( 'hovrl_menu_theme', 'general_options', false, 'light' );


/**
 * Logo
 */
$logo_output = '';
if( $logo = zget_option( 'hovrl_logo', 'general_options', false, '' ) ):
$logo_output .= '<div class="dnNavOvr-logo dnNavOvr-opEffect">';
	$logo_output .= '<a href="'. esc_url( home_url( '/' ) ) .'">';
		$logo_output .= '<img src="'. $logo.'" alt="'. get_bloginfo('name').'" title="'. get_bloginfo('description').'">';
	$logo_output .= '</a>';
$logo_output .= '</div>';
endif;

/**
 * Menu
 */
$menu_output = '<div class="dnNavOvr-menuWrapper"></div>';

/**
 * Footer Text
 */
$footer_text_output = '';
if( $footer_text = zget_option( 'hovrl_footertext', 'general_options', false, '' ) ):
	$footer_text_output .= '<div class="dnNavOvr-copyText-wrapper dnNavOvr-opEffect">';
		$footer_text_output .= '<div class="dnNavOvr-copyText">';
		$footer_text_output .= do_shortcode( $footer_text );
		$footer_text_output .= '</div>';
	$footer_text_output .= '</div>';
endif;

/**
 * Custom Text
 */
$custom_text_output = '';
if( $custom_text = zget_option( 'hovrl_ctext', 'general_options', false, '' ) ):
	$custom_text_output .= '<div class="dnNavOvr-customText-wrapper dnNavOvr-opEffect">';
		$custom_text_output .= '<div class="dnNavOvr-customText">';
		$custom_text_output .= do_shortcode( $custom_text );
		$custom_text_output .= '</div>';
	$custom_text_output .= '</div>';
endif;


/**
 * Social Icons
 */
$sicons_output = '';
if (
	zget_option( 'hovrl_social', 'general_options', false, 'no' ) == 'yes' &&
	$header_social_icons = zget_option( 'header_social_icons', 'general_options', false, array() )
):
	$sicons_output .= '<div class="dnNavOvr-socialIcons-wrapper dnNavOvr-opEffect">';
		$sicons_output .= '<ul class="dnNavOvr-socialIcons">';

		foreach ( $header_social_icons as $key => $icon ):

			$attr = array();
			$attr[] = !empty( $icon['icon'] ) ? zn_generate_icon( $icon['icon'] ) : '';
			$attr[] = 'title="' . $icon['title'] . '"';
			// Colors
			$style = !empty($icon['color']) ? 'color:'.$icon['color'].';' : '';
			$style .= !empty($icon['bgcolor']) ? 'background-color:'.$icon['bgcolor'].';' : '';
			$attr[] = 'style="' . $style . '"';

			$link = zn_extract_link( $icon['link'], 'dn-socialIcons-item', implode(' ', $attr) );

			$sicons_output .= '<li>';
			$sicons_output .= $link['start'];
			$sicons_output .= $link['end'];
			$sicons_output .= '</li>';

		endforeach;
		$sicons_output .= '</ul>';
	$sicons_output .= '</div>';
endif;

// Inner Class
$s1_inner_class = empty($footer_text_output) && empty($sicons_output) ? 'is-empty' : '';
?>

<div id="dn-nav-overlay" class="dnNavOvr <?php echo implode(' ', $nav_classes); ?>">

	<div class="dnNavOvr-inner <?php echo esc_attr( $s1_inner_class ); ?>">

		<?php

		echo $logo_output;
		echo $menu_output;
		echo $footer_text_output;
		echo $sicons_output;

		?>

	</div>

	<a href="#" class="dnNavOvr-close dnNavOvr-close--<?php echo zget_option( 'hovrl_close_pos', 'general_options', false, 'trSmall' ); ?>" id="dnNavOvr-close">
		<span></span>
		<svg x="0px" y="0px" width="54px" height="54px" viewBox="0 0 54 54">
			<circle fill="transparent" stroke="#656e79" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
		</svg>
	</a>
</div>