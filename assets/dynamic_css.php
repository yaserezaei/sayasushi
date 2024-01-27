<?php if(! defined('ABSPATH')){ return; }

/* Text Color */
if($body_def_textcolor = zget_option( 'body_def_textcolor', 'color_options', false, '' )){
	echo 'body {color:'.$body_def_textcolor.'}';
}
/* Link Color */
if($body_def_linkscolor = zget_option( 'body_def_linkscolor', 'color_options', false, '' )){
	echo 'a {color:'.$body_def_linkscolor.';}';
}
/* Link Hover Color */
if($body_def_linkscolor_hov = zget_option( 'body_def_linkscolor_hov', 'color_options', false, '' )){
	echo 'a:focus, a:hover {color:'.$body_def_linkscolor_hov.';}';
}

// Site BG Color
if ( $body_def_color = zget_option( 'body_def_color', 'color_options', false, '' ) ) {
	echo 'body {background-color:'.$body_def_color.';}';
}
// Site BG Image
$body_back_image = zget_option( 'body_back_image', 'color_options', false, array() );
if( !empty($body_back_image['image']) ){
	echo 'body {';
	if( !empty( $body_back_image['image'] ) ) { echo 'background-image:url("'.$body_back_image['image'].'");'; }
	if( !empty( $body_back_image['repeat'] ) ) { echo 'background-repeat:'.$body_back_image['repeat'].';'; }
	if( !empty( $body_back_image['position'] ) ) { echo 'background-position:'.$body_back_image['position']['x'].' '.$body_back_image['position']['y'].';'; }
	if( !empty( $body_back_image['attachment'] ) ) { echo 'background-attachment:'.$body_back_image['attachment'].';'; }
	echo '}';
}

// Custom Color
$main_color = zget_option( 'main_color', 'color_options', false, '' );
$main_color_contrast = zget_option( 'main_color_contrast', 'color_options', false, '' );

if( $main_color ){

	// BG Color
	echo '
		.dn-mainNav .menu-item.menu-item-depth-0 .main-menu-link::after,
		.btn-primary,
		/* Elements */
		.zn-mcNl--style-normal .zn-mcNl-submit,
		.zn-mcNl--style-transparent .zn-mcNl-submit,
		.zn-mcNl--style-lined_light .zn-mcNl-submit,
		.zn-mcNl--style-lined_dark .zn-mcNl-submit
		{background-color:'. $main_color .'; color:'.$main_color_contrast.'}';

	// Adjust brightness
	echo '
		.btn-primary:hover,
		.btn-primary:focus
		{background-color:'. adjustBrightness($main_color, -5) .'; color:'.$main_color_contrast.'}';

	// Text Color
	echo '
		.btn-default,
		.dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link:hover,
		.dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link:focus,
		.dn-mainNav .menu-item.menu-item-depth-0:hover > .main-menu-link,
		.dn-mainNav .menu-item.menu-item-depth-0.current-menu-item > .main-menu-link,
		.dn-blogItem .navigation.post-navigation .nav-next:hover .nav-title,
		.dn-blogItem .navigation.post-navigation .nav-previous:hover .nav-title ,
		.dn-error404-error,
		/* Elements */
		.zn-priceList-itemPrice,
		.zn-accordion-accButton
		{color:'. $main_color .'}';

	// Text Color Important
	echo '.u-text-custom {color:'. $main_color .' !important;}';

// WooCommerce
if( znfw_is_woocommerce_active() ){
	// BG Color
	echo '
		.woocommerce .dn-headerCart-contents .button.wc-forward.checkout,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button,
		.woocommerce div.product form.cart .button,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range
		{background-color:'. $main_color .'; color:'.$main_color_contrast.'}';
	// Adjust brightness
	echo '
		.woocommerce #respond input#submit:hover,
		.woocommerce #respond input#submit:focus,
		.woocommerce a.button:hover,
		.woocommerce a.button:focus,
		.woocommerce button.button:hover,
		.woocommerce button.button:focus,
		.woocommerce input.button:hover,
		.woocommerce input.button:focus,
		.woocommerce div.product form.cart .button:hover,
		.woocommerce div.product form.cart .button:focus,
		.woocommerce .dn-headerCart-contents .button.wc-forward.checkout:hover,
		.woocommerce #respond input#submit.disabled,
		.woocommerce #respond input#submit:disabled,
		.woocommerce #respond input#submit:disabled[disabled],
		.woocommerce a.button.disabled,
		.woocommerce a.button:disabled,
		.woocommerce a.button:disabled[disabled],
		.woocommerce button.button.disabled,
		.woocommerce button.button:disabled,
		.woocommerce button.button:disabled[disabled],
		.woocommerce input.button.disabled,
		.woocommerce input.button:disabled,
		.woocommerce input.button:disabled[disabled]
		{background-color:'. adjustBrightness($main_color, -5) .'; color:'.$main_color_contrast.'}';
	// Text Color
	echo '
		.dn-headerCartBtn-totalCount,
		.woocommerce .dn-headerCart-contents .woocommerce-Price-amount,
		.woocommerce ul.products li.product .price,
		.woocommerce .star-rating,
		.woocommerce div.product p.price,
		.woocommerce div.product .woocommerce-Price-amount,
		.woocommerce .dn-cartPage table.cart td.actions .coupon .button
		{color:'. $main_color .'}';
	// Box Shadow
	echo '
		.woocommerce ul.products li.product:hover {box-shadow:0 0 0 3px '.$main_color.'}
	';
}

}

/* ==========================================================================
   Call To Action Button styles for header.
   ========================================================================== */
$btn_custom = zget_option( 'cta_custom', 'general_options', false, false );

if( $btn_custom && !empty($btn_custom) ):

	foreach($btn_custom as $i => $btn):

		$button_selector = '.btn.dn-headerCta.dn-headerCta-'.$i;

		// Button Primary Custom BG
		$button_color = isset($btn['bg_custom_color']) && !empty($btn['bg_custom_color']) ? $btn['bg_custom_color'] : '';
		$button_color_hover = isset($btn['bg_custom_color_hover']) && !empty($btn['bg_custom_color_hover']) ? $btn['bg_custom_color_hover'] : adjustBrightness( $button_color, 20 );
		if( $button_color ){
			echo esc_html( $button_selector ).'{background-color:'.esc_attr( $button_color).'}';
			echo esc_html( $button_selector ).':hover,'.esc_html( $button_selector ).':focus{background-color:'.esc_attr( $button_color_hover).'}';
		}

		// Button Text Color
		$text_color = isset($btn['text_custom_color']) && !empty($btn['text_custom_color']) ? $btn['text_custom_color'] : '';
		$text_color_hover = isset($btn['text_custom_color_hover']) && !empty($btn['text_custom_color_hover']) ? $btn['text_custom_color_hover'] : adjustBrightness( $text_color, 20 );
		if( $text_color ){
			echo esc_html( $button_selector ).'{color:'. esc_attr( $text_color) .';}';
			echo esc_html( $button_selector ).':hover,'.esc_html( $button_selector ).':focus{color:'.$text_color_hover.';}';
		}

		// Button Border Color
		$border_color = isset($btn['border_custom_color']) && !empty($btn['border_custom_color']) ? $btn['border_custom_color'] : '';
		$border_color_hover = isset($btn['border_custom_color_hover']) && !empty($btn['border_custom_color_hover']) ? $btn['border_custom_color_hover'] : adjustBrightness( $border_color, 20 );
		if( $border_color ){
			echo esc_html( $button_selector ).'{border-color:'. esc_attr( $border_color) .';}';
			echo esc_html( $button_selector ).':hover,'.esc_html( $button_selector ).':focus{border-color:'.esc_attr( $border_color_hover).';}';
		}

		if( isset($btn['button_typo']) && !empty($btn['button_typo']) ){
			$typo = array();
			$typo['lg'] = $btn['button_typo'];
			if( !empty($typo) ){
				$typo['selector'] = esc_html( $button_selector );
				echo zn_typography_css( $typo );
			}
		}

	endforeach;
endif;


/* ==========================================================================
   HEADER STYLES
   ========================================================================== */

// Custom background color for header
if( $header_bg_color = zget_option( 'header_bg_color', 'general_options', false, '' ) ){
	echo ".dn-siteHeader {background-color:{$header_bg_color}}";
}

// Bg Image
$header_bg_image_css = '';
$header_bg_image = zget_option( 'header_bg_image', 'general_options', false, array() );
if( !empty( $header_bg_image['image'] ) ){
	$header_bg_image_css .= 'background-image:url("'.$header_bg_image['image'].'");';
	if(isset( $header_bg_image['repeat']) && !empty( $header_bg_image['repeat'])){
		$header_bg_image_css .= 'background-repeat:'.$header_bg_image['repeat'].';';
	}
	if(isset( $header_bg_image['position']) && !empty( $header_bg_image['position'])){
		$header_bg_image_css .= 'background-position:'.$header_bg_image['position']['x'].' '. $header_bg_image['position']['y'].';';
	}
	if(isset( $header_bg_image['attachment']) && !empty( $header_bg_image['attachment'])){
		$header_bg_image_css .= 'background-attachment:'. $header_bg_image['attachment'].';';
	}
	if(isset( $header_bg_image['size']) && !empty( $header_bg_image['size'])){
		$header_bg_image_css .= 'background-size:'. $header_bg_image['size'].';';
	}
}
if( !empty($header_bg_image_css) ){
	echo ".dn-siteHeader {{$header_bg_image_css}}";
}

// Header Width
$zn_head_width = zget_option( 'header_width' , 'general_options', false, array() );
if( !empty($zn_head_width) ){
	echo dannys_smart_slider_css( $zn_head_width, '.dn-siteHeader .dn-siteHeader-container', 'max-width' );
	if( isset($zn_head_width['lg']) && isset($zn_head_width['unit_lg']) && $zn_head_width['unit_lg'] == 'px' ){
		$head_width_px = (int) $zn_head_width['lg'];
		echo '@media (min-width: 1200px) and (max-width:'.($head_width_px-1).'px){';
		echo '.dn-siteHeader .dn-siteHeader-container{max-width:100%;}';
		echo '}';
	}
}

// Header Height
$zn_head_height = zget_option( 'header_height' , 'general_options', false, array() );
if( !empty($zn_head_height) ){
	echo dannys_smart_slider_css( $zn_head_height, '.dn-siteHeader .dn-siteHeader-mainRow', 'height' );
	echo dannys_smart_slider_css( $zn_head_height, '.dn-logoImg-wrapper.dn-logoSize--contain .dn-logoImg', 'max-height' );
	echo dannys_smart_slider_css( $zn_head_height, '.dn-breadcrumbs.dn-breadcrumbs--headerAbsolute', 'padding-top' );
}


/* ==========================================================================
   TOPBAR: Custom background color for header
   ========================================================================== */
if( $topbar_bg_color = zget_option( 'topbar_bg_color', 'general_options', false, '' ) ){
	echo ".dn-siteHeader-top {background-color:{$topbar_bg_color}}";
}


/* ==========================================================================
   LOGO
   ========================================================================== */

if( $logo_image = zget_option( 'logo_upload', 'general_options' ) ) {

	$logo_width = $logo_height = '';
	$logo_saved_size_type = zget_option( 'logo_size', 'general_options', false, 'contain' );

	if( $logo_saved_size_type == 'auto'){
		$logo_size = @getimagesize($logo_image);
		if (isset($logo_size[0]) && isset($logo_size[1])) {
			$logo_width = 'width:auto;';
			$logo_height = 'height:auto;';
		}
	}
	elseif( $logo_saved_size_type == 'custom'){

		$logo_saved_sizes = zget_option( 'logo_manual_size', 'general_options', false, false );

		if ( isset($logo_saved_sizes['width']) && !empty( $logo_saved_sizes['width'] ) ) {
			$logo_width = 'width:'.$logo_saved_sizes['width'].'px;';
		}
		if( isset($logo_saved_sizes['height']) && !empty( $logo_saved_sizes['height'] ) ) {
			$logo_height = 'height:'.$logo_saved_sizes['height'].'px;';
		}
	}
	echo ".dn-logoImg {max-width:none; {$logo_width} {$logo_height} }";
}

// Text Logo
else {
	echo '.dn-logoImg-anch {text-decoration:none;';
		$logo_font_option = zget_option( 'logo_font', 'general_options', false, array() );
		foreach ($logo_font_option as $key => $value) {
			echo esc_html( $key ) .':'. $value.';';
		}
	echo '}';
	echo '.dn-logoImg-anch:hover {';
		if ( $logo_hover_color = zget_option( 'logo_hover', 'general_options', false, array() ) ) {
			foreach ($logo_hover_color as $key => $value) {
				echo esc_html( $key ) .':'. $value.';';
			}
		}
	echo '}';
}


/* ==========================================================================
   Main Menu Font
   ========================================================================== */

$menu_font = zget_option( 'menu_font', 'general_options', false, array() );
if(!empty($menu_font)){
	$menufont_styles = dannys_typography_css_output( $menu_font );
	echo ".dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link {{$menufont_styles}}";
}

// Active menu item
if( $menu_font_active = zget_option( 'menu_font_active', 'general_options', false, false ) ){
	echo "
	.dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link:hover,
	.dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link:focus,
	.dn-mainNav .menu-item.menu-item-depth-0:hover > .main-menu-link,
	.dn-mainNav .menu-item.menu-item-depth-0.current-menu-item > .main-menu-link {color:{$menu_font_active};}";
	echo ".dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link::after {background-color:{$menu_font_active};}";
}

// Submenu Typography
$menu_font_sub = zget_option( 'menu_font_sub', 'general_options', false, array() );
if(!empty($menu_font_sub)){
	$sub_menufont_styles = dannys_typography_css_output( $menu_font_sub );
	echo ".dn-mainNav .menu-item.menu-item-has-children .sub-menu .main-menu-link {{$sub_menufont_styles}}";
}
if( isset( $menu_font_sub['color'] ) && ! empty( $menu_font_sub['color'] ) ){
	echo "
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .menu-item > .main-menu-link:hover,
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .menu-item > .main-menu-link:focus,
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .menu-item:hover > .main-menu-link,
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .menu-item.current-menu-item > .main-menu-link {color:". adjustBrightness($menu_font_sub['color'], 20) ."}";
}

// Submenu Bg
if( $submenu_bg_color = zget_option( 'submenu_bg_color', 'general_options', false, '' ) ){
	echo "
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .main-menu-link {background-color:{$submenu_bg_color}}
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .menu-item > .main-menu-link:hover,
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .menu-item > .main-menu-link:focus,
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .menu-item:hover > .main-menu-link,
	.dn-mainNav .menu-item.menu-item-has-children .sub-menu .menu-item.current-menu-item > .main-menu-link {background-color:". adjustBrightness($submenu_bg_color, -20) ."}";
}

// Hide Tobar
echo '@media (max-width: 767px) {';
	if(
		zget_option( 'topbar_menu_hidexs', 'general_options', false, 'hidden-xs' ) == 'hidden-xs' &&
		zget_option( 'header_languages_hidexs', 'general_options', false, 'hidden-xs' ) == 'hidden-xs' &&
		zget_option( 'header_social_icons_hidexs', 'general_options', false, 'hidden-xs' ) == 'hidden-xs' &&
		zget_option( 'header_custom-text_hidexs', 'general_options', false, 'hidden-xs' ) == 'hidden-xs'
	){
		echo '.dn-siteHeader-top {display: none !important}';
	}
echo '}';


$menu_trigger = zget_option( 'header_res_width', 'general_options', false, 992 );
$menu_trigger2 = $menu_trigger + 1;
echo "
@media (max-width: {$menu_trigger}px) {
	.dn-siteHeader-mainCenter { display: none !important;}
}
@media (min-width: {$menu_trigger2}px) {
	.dn-mainNavResp { display: none;}
}
";


/* Burger Colors */
if( $burger_color_custom = zget_option( 'burger_color_custom', 'general_options', false, '' ) ){
	echo '.dn-menuBurger span{background:'.$burger_color_custom.'}';
}

/* ==========================================================================
   MENU OVERLAY
   ========================================================================== */
if( $bg_color = zget_option( 'hovrl_bgcolor', 'general_options', false, '' ) ){
	echo '.znNavOvr {background-color:'.$bg_color.'}';
}
// Typography
$typo = array();
$typo['lg'] = zget_option( 'hovrl_typo', 'general_options', false, '' );
$typo['md'] = zget_option( 'hovrl_typo_md', 'general_options', false, '' );
$typo['sm'] = zget_option( 'hovrl_typo_sm', 'general_options', false, '' );
$typo['xs'] = zget_option( 'hovrl_typo_xs', 'general_options', false, '' );
if( !empty($typo) ){
	$typo['selector'] = '.znNavOvr .znNavOvr-menu';
	echo zn_typography_css( $typo );
}
// SubMenus Typography
$submenu_typo = array();
$submenu_typo['lg'] = zget_option( 'hovrl_typo_submenu', 'general_options', false, '' );
if( !empty($submenu_typo) ){
	$submenu_typo['selector'] = '.znNavOvr .znNavOvr-menu ul.sub-menu, .znNavOvr .znNavOvr-menu .zn_mega_container';
	echo zn_typography_css( $submenu_typo );
}
// Custom Text
$ctext_typo = array();
$ctext_typo['lg'] = zget_option( 'hovrl_ctext_typo', 'general_options', false, array('font-size' => '10px', 'letter-spacing' => '2px') );
if( !empty($ctext_typo) ){
	$ctext_typo['selector'] = '.znNavOvr-customText';
	echo zn_typography_css( $ctext_typo );
}

/* ==========================================================================
   BREADCRUMBS
   ========================================================================== */

// // Breadcrumbs Height
// $sub_header_height = zget_option( 'sub_header_height' , 'general_options', false, array() );
// if( !empty($sub_header_height) ){
// 	echo dannys_smart_slider_css( $sub_header_height, '.dn-pageSubheader', 'height' );
// }


/* ==========================================================================
   FONT SETUP
   ========================================================================== */

$typography = apply_filters('dannys_global_typography_options', array(
	'body' => array(
		'lg' => zget_option( 'body_font', 'font_options', false, array() ),
		'selector' => 'body'
	),
	'h1' => array(
		'lg' => zget_option( 'h1_typo', 'font_options', false, array() ),
		'selector' => 'h1, .h1',
	),
	'h2' => array(
		'lg' => zget_option( 'h2_typo', 'font_options', false, array() ),
		'selector' => 'h2, .h2',
	),
	'h3' => array(
		'lg' => zget_option( 'h3_typo', 'font_options', false, array() ),
		'selector' => 'h3, .h3',
	),
	'h4' => array(
		'lg' => zget_option( 'h4_typo', 'font_options', false, array() ),
		'selector' => 'h4, .h4',
	),
	'h5' => array(
		'lg' => zget_option( 'h5_typo', 'font_options', false, array() ),
		'selector' => 'h5, .h5',
	),
	'h6' => array(
		'lg' => zget_option( 'h6_typo', 'font_options', false, array() ),
		'selector' => 'h6, .h6',
	),
) );

foreach( $typography as $k => $v){
	if( !empty($v) ){
		echo zn_typography_css( $v );
	}
}
