<?php if(! defined('ABSPATH')){ return; }
/**
 * Displays the main header
*/

// Load helper functions
include( dirname(__FILE__) . '/helper-functions.php' );

$header_attributes = '';

$show_header = true;
if( is_singular() && get_post_meta( get_the_ID() , 'show_header', true ) === 'zn_dummy_value') {
	$show_header = false;
	if( dannys_isZionBuilderEnabled() ){
		if ( ZNB()->utility->isActiveEditor() ){
			$show_header = true;
			$header_attributes .= ' style="display:none" ';
		}
	}
}
// Possibility to override
$show_header = apply_filters('zn_display_header', $show_header);

/* Should we display a template ? */
$config = zn_get_pb_template_config( 'header' );

if( $config['template'] !== 'no_template' ){
	// We have a subheader template... let's get it's possition
	$pb_data = get_post_meta( $config['template'], 'zn_page_builder_els', true );

	if( $config['location'] === 'before' ){
		echo '<div class="znpb-sArea znpb-sArea--header znpb-sArea--before" '. $header_attributes .'>';
		if( dannys_isZionBuilderEnabled() ) {
			ZNB()->frontend->renderUneditableContent( $pb_data, $config[ 'template' ] );
		}
		echo '</div>';
	}
	elseif( $config['location'] === 'replace' && $show_header ){
		echo '<div class="znpb-sArea znpb-sArea--header znpb-sArea--replace" '. $header_attributes .'>';
		if( dannys_isZionBuilderEnabled() ) {
			ZNB()->frontend->renderUneditableContent( $pb_data, $config[ 'template' ] );
		}
		echo '</div>';
		$show_header = false;
	}

}

// Bail early if we don't have to show the header
if( ! $show_header ){ return; }

$header_class = $top_row_class = array();

$header_class[] = apply_filters('zn_header_class', '');

/*
 * Header Layout
 */
$headerLayoutStyle = zn_get_header_layout();
$header_class[] = 'dn-siteHeader--' . zn_get_header_layout();

// Sticky menu
$header_class[] = 'sticky' == zget_option( 'header_sticky', 'general_options', false, 'no' ) ? 'dn-stickyHeader dn-stickyHeader--off' : 'dn-stickyHeader--disabled';

// Resize header on sticked mode. Append class;
$header_class[] = zn_resize_sticky_header() ? ' dn-stickyHeader--resize':'';

// Absolute / Relative header
$header_class[] = 'dn-siteHeader--pos-'.zget_meta_option( 'head_position', 'general_options', false, 'relative' );

// Add Schema.org
$header_attributes .= zn_schema_markup('header');

if( dannys_isZionBuilderEnabled() ) {
	if ( ZNB()->utility->isActiveEditor() ) {
		echo '<a href="#" title="' . __( 'Hide header to access the first element.', 'dannys-restaurant' ) . '" class="dn-toggleHeader js-toggle-class" data-target-class="site-header--hide"><span class="dashicons dashicons-arrow-down-alt2"></span></a>';
	}
}

// Add a hook before the header display
do_action('zn_before_siteheader');

// Load the header style
$templateFile = locate_template('template-parts/theme-header/header-'. $headerLayoutStyle .'.php');
if ( ! file_exists( $templateFile ) ){
	$templateFile = locate_template('template-parts/theme-header/header-style1.php');
}
include($templateFile);

// Smart Area - After Position
if( $config['template'] !== 'no_template' && $config['location'] === 'after' ){
	echo '<div class="znpb-sArea znpb-sArea--header znpb-sArea--after" '. $header_attributes .'>';
	if( dannys_isZionBuilderEnabled() ) {
		ZNB()->frontend->renderUneditableContent( $pb_data, $config[ 'template' ] );
	}
	echo '</div>';
}

// Add a hook after the header display
do_action('zn_after_siteheader');
