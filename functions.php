<?php if(! defined('ABSPATH')){ return; }

// Setup config for theme framework
add_filter( 'znhgtfw_config', 'dannys_theme_config' );
/**
 * Configures the theme framework with the current theme data
 * @param  array $config The current theme config data
 * @return array         The current theme config
 */
function dannys_theme_config( $config ){
	$dannys_theme_config = array(
		'theme_db_id' => 'dannys_theme_options',
		'theme_id' => 'dannys_restaurant',
		'server_url' => 'http://my.hogash.com/hg_api/',
		'api_version' => '3',
		'themeLogoUrl' => get_template_directory_uri().'/assets/img/admin/admin_logo.png',
		//@since v4.15.6
		'api_assets_url' => 'https://api.my.hogash.com/',
		//@since v4.15.6 - Config data to Theme Options > Sample data
		'dash_config' => array(
			'sample_data' => array(
				'title' => __( 'In order to install %s you need to register this WordPress Theme.', 'dannys-restaurant' ),

				'btn_view_text' => __( 'View demos', 'dannys-restaurant' ),
				'btn_view_url' => 'https://kallyas.net',
				'btn_view_title' => __( 'Will open in a new window/tab', 'dannys-restaurant' ),
				'btn_view_target' => '_blank',

				'btn_register_text' => __( 'Register', 'dannys-restaurant'),
				'btn_register_url' => admin_url( 'admin.php?page=zn-about#zn-about-tab-registration-dashboard' ),
				'btn_register_target' => '_self',
				'btn_register_title' => '',

				'bg_image' => get_template_directory_uri() . '/images/admin/dannys-dash-demos.png',
			),
		),
	);

	return array_merge( $config, $dannys_theme_config );
}

add_filter( 'hg_dash_get_local_demos', 'dannys_add_local_demos' );
function dannys_add_local_demos ($local_demos) {
	$local_demos['main_demo'] = [
		'private' => false,
		'desc' => __( 'Main demo for Danny\'s Restaurant', 'dannys-restaurant'),
		'demo_url' => 'asdasd',
		'title' => __( 'Main Demo', 'dannys-restaurant'),
		'image' => get_template_directory_uri().'/assets/img/admin/dannys_main_demo_thumb.jpg',
		'archive_url' => get_template_directory().'/assets/demo-data/main.zip',
		'local' => true,
		'plugins' => [
			'zion-builder',
			'hogash-mailchimp',
			'breadcrumb-trail',
			'revslider',
			'woocommerce',
			'wordpress-popular-posts',
			'restaurant-reservations',
			'dannys-child',
		]
	];

	return $local_demos;
}

//#! Verify that Zion Builder plugin exists and is activated
function dannys_isZionBuilderEnabled() {
	return class_exists( 'ZionBuilder' );
}


// Load theme Framework
require get_template_directory().'/inc/hg-theme-framework/hg-theme-framework.php';
require get_template_directory().'/inc/helpers/general-helpers.php';
require get_template_directory().'/inc/pagebuilder/pagebuilder-integration.php';
require get_template_directory().'/inc/addons/theme-addons.php';

// Shortcodes
require get_template_directory().'/inc/shortcodes/shortcodes.php';

require get_template_directory().'/theme-functions.php';
require get_template_directory().'/functions_post_formats.php';

// Load theme options pages
require get_template_directory().'/inc/theme-options/theme-pages.php';
// Load theme options
require get_template_directory().'/inc/theme-options/theme-options.php';

add_action( 'after_setup_theme', 'dannys_on_after_setup_theme' );
function dannys_on_after_setup_theme()
{
	load_theme_textdomain( 'dannys-restaurant', get_template_directory() . '/languages' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'nav-menus' );
	add_theme_support( 'title-tag' );

	// Set content Width
	if ( ! isset( $content_width ) ) $content_width = 1400;

	// Add support for post formats
	add_theme_support( 'post-formats', array( 'video', 'quote', 'audio', 'link', 'gallery', 'status' ) );

	// Add image sizes
	add_image_size( 'container_width', 1400, 788 );

	set_post_thumbnail_size( 480, 360, true );

	// LOAD WOOCOMMERCE CONFIG FILE
	if ( znfw_is_woocommerce_active() ) {
		require get_template_directory() . '/woocommerce/dannys-woocommerce-init.php';
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	add_theme_support( 'breadcrumb-trail' );
}

// Add custom image size in image list sizes
add_filter( 'image_size_names_choose', 'dannys_image_sizes_choose' );
function dannys_image_sizes_choose( $sizes ) {
	$custom_sizes = array(
		'container_width' => 'Container Width'
	);
	return array_merge( $sizes, $custom_sizes );
}

/**
 *	Enqueue theme scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'dannys_enqueue_scripts' );
function dannys_enqueue_scripts(){

	$min = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'ZNHGFW_DEBUG' ) && ZNHGFW_DEBUG )  ? '' : '.min';

	// Enqueue scripts
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	{
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'dannys_js_slick', get_template_directory_uri() . '/assets/js-vendors/slick/slick.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'dannys_vendors_js', get_template_directory_uri() . '/assets/js/vendors.min.js', array('jquery'), true, true );
	wp_enqueue_script( 'dannys_js', get_template_directory_uri() . '/assets/js/app' . $min . '.js', array('jquery', 'dannys_vendors_js'), true, true );


	wp_localize_script( 'dannys_js', 'dnThemeAjax', array(
		'ajaxurl' => admin_url( 'admin-ajax.php', 'relative' ),
	) );

	wp_localize_script( 'dannys_js', 'dnMobileMenu', array(
		'trigger' => zget_option( 'header_res_width', 'general_options', false, 992 )
	) );

	// Smooth Scroll
	$sm_scroll = zget_option( 'smooth_scroll', 'general_options', false, 'no' );
	if ( $sm_scroll != 'no' )
	{
		wp_enqueue_script( 'smooth_scroll', get_template_directory_uri() . '/assets/js-vendors/smooth-scroll/SmoothScroll.js', array( 'jquery' ), true, true );
		wp_localize_script( 'dannys_js', 'ZnSmoothScroll', array(
			'type' => $sm_scroll,
			'touchpadSupport' => zget_option( 'smooth_scroll_osx', 'general_options', false, 'no' ),
		) );
	}
}

add_action( 'wp_enqueue_scripts', 'dannys_enqueue_styles' );
function dannys_enqueue_styles(){

	// Enqueue styles
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css-vendors/bootstrap.min.css' );
	wp_enqueue_style( 'dannys_css', get_template_directory_uri() . '/style.css' );

	// Load WooCommerceCSS

	wp_enqueue_style( 'dannys_woocommerce_css', get_template_directory_uri() . '/woocommerce.min.css', array('woocommerce-general', 'woocommerce-layout') );

	//Load slick slider default style
	wp_enqueue_style( 'dannys_slick_css', get_template_directory_uri() . '/assets/css-vendors/slick.css' );
	wp_enqueue_style( 'dannys_slick_theme_css', get_template_directory_uri() . '/assets/css-vendors/slick-theme.css' );

}

add_action( 'wp_enqueue_scripts', 'dannys_register_scripts' );
function dannys_register_scripts(){
	wp_register_script( 'slick', get_template_directory_uri() . '/assets/js-vendors/slick/slick.min.js', array( 'jquery' ), true, true );
}

/**
 * Remove Zion Builder's built in Bootstrap CSS
 */
add_action( 'wp_enqueue_scripts', 'dannys_remove_hgfw_bootstrap_css', 99 );
function dannys_remove_hgfw_bootstrap_css() {
	wp_dequeue_style('bootstrap-styles');
}

/**
 * Assign the dynamic CSS path location
 */
add_filter('zn_dynamic_css_location', 'dannys_theme_dynamic_css_location');
if(!function_exists('dannys_theme_dynamic_css_location')){
	function dannys_theme_dynamic_css_location($path){
		return ZNHGTFW()->getThemePath( 'assets/' );
	}
}
