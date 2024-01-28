<?php if(! defined('ABSPATH')){ return; }

if( ! function_exists('zn_options_video_link_option') ){
	function zn_options_video_link_option( $url, $desc = false, $default_args = array() ){
		$option = array (
			"name" => '<span class="dashicons dashicons-video-alt3 u-v-mid"></span> '.__( 'Video Tutorials:', 'dannys-restaurant' ).' <a href="'. esc_url( $url ) .'" target="_blank">'. $desc .'</a>',
			"id"          => "video_link",
			"std"         => "",
			"type"        => "zn_title",
			"class"       => "zn_full zn-admin-helplink zn_nomargin"
		);

		return wp_parse_args( $option, $default_args );
	}
}

function znpb_general_help_option( $css_class = null ){
	return array (
		"name"        => '<a href="'. esc_url( 'https://my.hogash.com/support/') .'" target="_blank"  class="zn-helplink zn-helplink-support">'.__( 'Support Dashboard', 'dannys-restaurant').'</a> &nbsp; | &nbsp; <a href="'.esc_url('https://my.hogash.com/docs/').'" target="_blank" class="zn-helplink zn-helplink-docs">'.__( 'Video Tutorials & Documentation', 'dannys-restaurant').'</a> &nbsp; | &nbsp; <a href="'.esc_url('https://themeforest.net/item/kallyas-responsive-multipurpose-wordpress-theme/4091658').'" target="_blank" class="zn-helplink zn-helplink-rate stars-yellow">'.sprintf( __( 'Rate %s', 'dannys-restaurant'), ZNHGTFW()->getThemeName() ).' <span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></a> <a class="zn-helplink zn-helplink-ratehelp" href="http://hogash.d.pr/11vC3" target="_blank" data-tooltip="How to rate?"><span class="dashicons dashicons-editor-help"></span></a>',
		"id"          => "otherlinks",
		"std"         => "",
		"type"        => "zn_title",
		"class"       => "zn_full zn-custom-title-sm zn_nomargin $css_class"
	);
}



/* Load PB templates for different areas */
add_action( 'template_redirect', 'znpb_load_theme_templates', 999 );

/**
 * Prepares the pagebuilder templates based on theme options
 */
function znpb_load_theme_templates(){

	if( ! function_exists( 'ZNB' ) ){
		return;
	}

	// General templates - We can extend this in the future
	$template_configs   = array();
	$template_configs[] = zn_get_pb_template_config( 'header' );
	$template_configs[] = zn_get_pb_template_config( 'footer' );

	foreach ($template_configs as $key => $value) {
		if( ! empty( $value['template'] ) ){
			// We have a smart area... let's get it's position
			// FIlter the smart area post id so that WPML can change it
			$wpml_post_id = $value['template'];
			$pb_data = get_post_meta( $wpml_post_id, 'zn_page_builder_els', true );

			if( ! empty( $pb_data ) ){
				// Notify that we're using a smart area
				if( dannys_isZionBuilderEnabled() ) {
					ZNB()->smart_area->registerSmartArea( $wpml_post_id );
					ZNB()->frontend->setupElements( $pb_data );
				}
			}

		}
	}

}

/**
 *	Returns a template configuration based on theme options
 */
function zn_get_pb_template_config( $location = 'footer' ){
	// Get the default config for all pages
	$pb_setup = zget_option( 'pbtmpl_general', 'pb_layouts');

	// Setup defaults
	$default_config = array(
		'header_template' => 'no_template',
		'header_location' => '',
		'footer_template' => 'no_template',
		'footer_location' => '',
	);
	$pb_setup = wp_parse_args( $pb_setup, $default_config );

	// Check if we have an override for the current post type/archive
	if( is_singular() ){
		$post_type = get_post_type();
		$pb_tmpl_override  = zget_option( 'pbtmpl_'.$post_type, 'pb_layouts');
	}
	elseif( znfw_is_woocommerce_active() && ( is_shop() || is_product_category() ) ){
		$pb_tmpl_override  = zget_option( 'pbtmpl_product_cat', 'pb_layouts');

		// Do overrides
		if( is_product_category() ){

			global $wp_query;
			$product_cat = $wp_query->get_queried_object()->term_id;

			$saved_taxonomy_option = get_term_meta( $product_cat, 'pbtmpl_general', true );

			if( ! empty( $saved_taxonomy_option ) ){
				$should_override = ! empty( $saved_taxonomy_option[$location . '_template'] ) ? true : false;
				if( $should_override ){
					$pb_tmpl_override = $saved_taxonomy_option;
				}
			}
		}

	}
	elseif( is_home() || is_category() || is_tag() ){
		$pb_tmpl_override  = zget_option( 'pbtmpl_category', 'pb_layouts');
	}

	// Set the template and location
	$postID = ! empty( $pb_tmpl_override[$location . '_template'] )  ? $pb_tmpl_override[$location . '_template'] : $pb_setup[$location . '_template'];
	$pb_setup_location = ! empty( $pb_tmpl_override[$location . '_location'] ) ? $pb_tmpl_override[$location . '_location'] : $pb_setup[$location . '_location'];

	if ( 'trash' == get_post_status( $postID )){
		$postID = 'no_template';
	}

	return array(
		'location' => $pb_setup_location,
		'template' => apply_filters( 'wpml_object_id', $postID, 'znpb_template_mngr' ),
	);

}

function znpb_hide_header_footer_on_template(){
	global $saved_options;
	// Hide custom templates
	if( isset( $saved_options['pb_layouts'] ) ) { $saved_options['pb_layouts'] = array(); }
}
add_action( 'znpb:templates:edit', 'znpb_hide_header_footer_on_template' );
