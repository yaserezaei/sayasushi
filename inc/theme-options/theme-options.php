<?php if( ! defined('ABSPATH') ){ return; }
/*--------------------------------------------------------------------------------------------------

	File: theme-options.php

	Description: This file contains all the theme's admin panel options

--------------------------------------------------------------------------------------------------*/

add_filter( 'zn_theme_options', 'dannys_theme_options' );
function dannys_theme_options( $options ){

	$admin_options = array();

	include( dirname(__file__). '/theme-options-pages/general-options/general-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/header-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/header-logo-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/header-nav-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/header-cta-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/header-topbar-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/default-breadcrumbs-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/footer-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/google-analytics-options.php' );
	include( dirname(__file__). '/theme-options-pages/general-options/recaptcha-options.php' );

	include( dirname(__file__). '/theme-options-pages/font-options/font-setup.php' );
	include( dirname(__file__). '/theme-options-pages/font-options/typography-options.php' );

	/* Blog options */
	include( dirname(__file__). '/theme-options-pages/blog-options/archive-options.php' );
	include( dirname(__file__). '/theme-options-pages/blog-options/single-blog-item-options.php' );

	include( dirname(__file__). '/theme-options-pages/color-options.php' );
	include( dirname(__file__). '/theme-options-pages/smart-areas.php' );
	include( dirname(__file__). '/theme-options-pages/sidebar-options.php' );
	include( dirname(__file__). '/theme-options-pages/404-options.php' );

	// ADVANCED
	include( dirname(__file__). '/theme-options-pages/advanced-options.php' );

	return array_merge( $options, $admin_options );

}
