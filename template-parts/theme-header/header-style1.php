<?php if(! defined('ABSPATH')){ return; }
/**
 * Displays the header style1 markup and default settings
*/


/**
 * CUSTOM PER STYLE
 */

// TOP LEFT
add_action( 'dannys_head__top_left', 'dannys_wpml_language_switcher' );
add_action( 'dannys_head__top_left', 'dannys_header_custom_text' );


// TOP RIGHT
add_action( 'dannys_head__top_right', 'dannys_topbar_navigation' );
add_action( 'dannys_head__top_right', 'dannys_header_social_icons' );


/**** MAIN LEFT */

add_action( 'dannys_head__main_left', 'dannys_header_display_logo' ); // LOGO MARKUP


/**** MAIN CENTER */

add_action( 'dannys_head__main_center', 'dannys_header_main_menu' ); // MAIN NAVIGATION


/**** MAIN RIGHT */

add_action( 'dannys_head__main_right', 'dannys_resmenu_wrapper' );
add_action( 'dannys_head__main_right', 'dannys_header_search' ); // HEADER SEARCH

if(znfw_is_woocommerce_active()){
	add_action( 'dannys_head__main_right', 'dannys_woocomerce_cart' ); // ADD CART PANEL
}

add_action( 'dannys_head__main_right', 'dannys_header_calltoaction' ); // CALL TO ACTION BUTTON


$flexbox_scheme = array(
    'main' => array(
        'left' => array(
            'stretch' => 'fxb-basis-50 fxb-xs-basis-auto fxb-xl-forth',
        ),
        'center' => array(
            'stretch' => 'fxb-basis-auto fxb-shrink-0',
        ),
        'right' => array(
            'stretch' => 'fxb-basis-50 fxb-lg-basis-auto fxb-lg-shrink-0',
        ),
    ),
);

/**
 * 	GENERAL
 */

if( zget_option('topbar_dark_text', 'general_options', false, 'no') == 'yes'){
	$top_row_class[] = 'dn-textScheme--dark';
}

// DEFAULT FLEXBOX SCHEME
$inner = array(
	'left' => array(
		'alignment_x' => 'fxb-start-x',
		'alignment_y' => 'fxb-center-y',
		'stretch' => 'fxb-basis-auto',
	),
	'center' => array(
		'alignment_x' => 'fxb-center-x',
		'alignment_y' => 'fxb-center-y',
		'stretch' => 'fxb-basis-auto',
	),
	'right' => array(
		'alignment_x' => 'fxb-end-x',
		'alignment_y' => 'fxb-center-y',
		'stretch' => 'fxb-basis-auto',
	),
);
$flexbox_scheme_defaults = array(
	'top' => $inner,
	'main' => $inner
);

// Extend Flexbox scheme defaults
$flexbox_scheme = zn_wp_parse_args( $flexbox_scheme, $flexbox_scheme_defaults );

?>

<header id="site-header" class="dn-siteHeader <?php echo implode( ' ', $header_class ); ?>" <?php echo $header_attributes;?>>

	<div class="dn-siteHeader-wrapper">

		<?php if( zget_option('show_topbar', 'general_options', false, 'no') == 'yes' ): ?>

		<div class="dn-siteHeader-top">
			<div class="container dn-siteHeader-container">
				<div class="fxb-row dn-siteHeader-row dn-siteHeader-topRow <?php echo implode( ' ', $top_row_class ) ?>">

					<?php
						$top_left_classes = 'dn-siteHeader-topLeft fxb-col fxb ' . zn_getFlexboxScheme( $flexbox_scheme, 'top', 'left' );
					?>
					<div class="<?php echo esc_attr( $top_left_classes ); ?>"><?php do_action( 'dannys_head__top_left' ); ?></div>

					<?php
						$top_right_classes = 'dn-siteHeader-topRight fxb-col fxb ' . zn_getFlexboxScheme( $flexbox_scheme, 'top', 'right' );
					?>
					<div class="<?php echo esc_attr( $top_right_classes ); ?>"><?php do_action( 'dannys_head__top_right' ); ?></div>

				</div>
			</div>
		</div>

		<?php endif; ?>

		<div class="dn-siteHeader-main">
			<div class="container dn-siteHeader-container">
				<div class="fxb-row fxb-row-col-sm dn-siteHeader-row dn-siteHeader-mainRow ">

					<?php
						$main_left_classes = 'dn-siteHeader-mainLeft fxb-col fxb fxb-sm-center-x ' . zn_getFlexboxScheme($flexbox_scheme, 'main', 'left');
					?>
					<div class="<?php echo esc_attr( $main_left_classes ); ?>"><?php do_action( 'dannys_head__main_left' ); ?></div>

					<?php
						$main_center_classes = 'dn-siteHeader-mainCenter fxb-col fxb ' . zn_getFlexboxScheme($flexbox_scheme, 'main', 'center');
					?>
					<div class="<?php echo esc_attr( $main_center_classes ); ?>"><?php do_action('dannys_head__main_center'); ?></div>

					<?php
						$main_right_classes = 'dn-siteHeader-mainRight fxb-col fxb fxb-sm-center-x ' . zn_getFlexboxScheme($flexbox_scheme, 'main', 'right');
					?>
					<div class="<?php echo esc_attr( $main_right_classes ); ?>"><?php do_action('dannys_head__main_right'); ?></div>

				</div>
			</div>
		</div>

	</div>
</header>