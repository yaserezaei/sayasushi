<?php if(! defined('ABSPATH')){ return; }

/* FILTERS */
add_filter( 'zn_theme_pages', 'zn_woocommerce_pages' );
add_filter( 'zn_theme_options', 'zn_woocommerce_options' );

function zn_woocommerce_pages( $admin_pages ){
	$admin_pages['zn_woocommerce_options'] = array(
			'title' =>  'WooCommerce',
			'submenus' => 	array(
					array(
						'slug' => 'zn_woocommerce_options',
						'title' =>  __( "General options", 'dannys-restaurant' )
					),
					// array(
					// 	'slug' => 'woo_category_options',
					// 	'title' =>  __( "Categories page", 'dannys-restaurant' ),
					// ),
				)
		);
	$admin_pages['general_options']['submenus'][] = array(
		'slug' => 'header_minicart',
		'title' =>  __( "Header - Mini Cart", 'dannys-restaurant' )
	);

	return $admin_pages;
}

function zn_woocommerce_options( $admin_options ){

	/**
	 * ====================================================
	 * GENERAL OPTIONS
	 * ====================================================
	 */

	$admin_options[] = array (
					'slug'        => 'zn_woocommerce_options',
					'parent'      => 'zn_woocommerce_options',
					"name"        => __( 'General options', 'dannys-restaurant' ),
					"description" => __( 'These options are generally applied for the WooCommerce integration in this theme.', 'dannys-restaurant' ),
					"id"          => "hd_title1",
					"type"        => "zn_title",
					"class"       => "zn_full zn-custom-title-large zn-top-separator"
	);

	$admin_options[] = array (
		'slug'        => 'zn_woocommerce_options',
		'parent'      => 'zn_woocommerce_options',
		"name"        => __( "Enable Catalog Mode?", 'dannys-restaurant' ),
		"description" => __( "Choose yes if you want to turn your shop in a catalog mode shop ( all the purchase buttons will be removed. )", 'dannys-restaurant' ),
		"id"          => "woo_catalog_mode",
		"std"         => "no",
		"type"        => "zn_radio",
		"options"     => array (
			"yes" => __( "Yes", 'dannys-restaurant' ),
			"no"  => __( "No", 'dannys-restaurant' )
		),
		"class"        => "zn_radio--yesno",
	);

	$admin_options[] = array (
		'slug'        => 'zn_woocommerce_options',
		'parent'      => 'zn_woocommerce_options',
		"name"        => __( "Show cart to visitors?", 'dannys-restaurant' ),
		"description" => __( "Choose no if you want to hide the add to cart buttons for guest visitors (non-registered / logged-out).", 'dannys-restaurant' ),
		"id"          => "show_cart_to_visitors",
		"std"         => "yes",
		"type"        => "zn_radio",
		"options"     => array (
			"yes" => __( "Yes", 'dannys-restaurant' ),
			"no"  => __( "No", 'dannys-restaurant' )
		),
		"class"        => "zn_radio--yesno",
	);

	$admin_options[] = array (
		'slug'        => 'zn_woocommerce_options',
		'parent'      => 'zn_woocommerce_options',
		"name"        => __( "Search Type - <strong>General site search form</strong>", 'dannys-restaurant' ),
		"description" => __( "Select the type of search functionality should the searchbox in general site search-forms to have. By default it performs a WordPress default search with it's results however you can switch to WooCommerce product search.", 'dannys-restaurant' ),
		"id"          => "woo_site_search_type",
		"std"         => "wp",
		"type"        => "select",
		"options"     => array (
			"wp" => __( "Default WordPress results", 'dannys-restaurant' ),
			"wc"  => __( "WooCommerce products search results", 'dannys-restaurant' )
		),
	);


	/**
	 * ====================================================
	 * PRODUCTS LISTINGS
	 * ====================================================
	 */

	$admin_options[] = array (
					'slug'        => 'zn_woocommerce_options',
					'parent'      => 'zn_woocommerce_options',
					"name"        => __( 'Product listing options', 'dannys-restaurant' ),
					"description" => __( 'These options are applied for products in listings.', 'dannys-restaurant' ),
					"id"          => "hd_title1",
					"type"        => "zn_title",
					"class"       => "zn_full zn-custom-title-large zn-top-separator"
	);

	$admin_options[] = array (
		'slug'        => 'zn_woocommerce_options',
		'parent'      => 'zn_woocommerce_options',
		"name"        => __( "Use Fancy Pagination?", 'dannys-restaurant' ),
		"description" => __( "This option will display a fancy navigation right inside the products list.
			<br><br>
			Keep in mind that in order to be displayed properly, you should make sure you chose a custom number of products,for example: <br>
			- for a 3 column layout, the number of products per page should be 2, 5, 8, 12, 15, 18, 21, 24, 27 etc.; <br>
			- for a 4 columns layout, you should choose 3, 7, 11, 15, 19, 23, 27, 31, 35 etc.;
		", 'dannys-restaurant' ),
		"id"          => "woo_fancynav",
		"std"         => "yes",
		"type"        => "zn_radio",
		"options"     => array (
			"yes" => __( "Yes", 'dannys-restaurant' ),
			"no"  => __( "No", 'dannys-restaurant' )
		),
		"class"        => "zn_radio--yesno",
	);

	$admin_options[] = array (
		'slug'        => 'zn_woocommerce_options',
		'parent'      => 'zn_woocommerce_options',
		"name"        => __( "Products per page", 'dannys-restaurant' ),
		"description" => __( "Enter the desired number of products to be displayed per page.", 'dannys-restaurant' ),
		"id"          => "woo_show_products_per_page",
		"std"         => "11",
		"type"        => "text",
		"numeric"     => true,
		"class"       => "zn_input_xs"
	);

	$admin_options[] = array (
		'slug'        => 'zn_woocommerce_options',
		'parent'      => 'zn_woocommerce_options',
		"name"        => __( "Number of columns", 'dannys-restaurant' ),
		"description" => __("Using this option you can choose how many columns to use on the shop archive pages.", 'dannys-restaurant'),
		"id" => "woo_num_columns",
		"std" => "3",
		"options" => array(
			'' => __('Use default', 'dannys-restaurant'),
			'2' => __('2', 'dannys-restaurant'),
			'3' => __('3', 'dannys-restaurant'),
			'4' => __('4', 'dannys-restaurant'),
			'5' => __('5', 'dannys-restaurant'),
			'6' => __('6', 'dannys-restaurant'),
		),
		"type" => "select",
	);


	$admin_options[] = array (
		'slug'        => 'zn_woocommerce_options',
		'parent'      => 'zn_woocommerce_options',
		"name"        => __( "Force -1 Column if Sidebar Active", 'dannys-restaurant' ),
		"description" => __("If you have a sidebar active, you can force -1 column. For example if 4 columns is default, when Sidebar is active, 3 columns will be set.", 'dannys-restaurant'),
		"id" => "woo_num_columns_sidebar",
		"std" => "no",
		"options" => array(
			'yes' => __('Yes', 'dannys-restaurant'),
			'no' => __('No', 'dannys-restaurant'),
		),
		"type" => "zn_radio",
		"class" => "zn_radio--yesno",
	);


	/*** sidebar settings ***/

	$sidebar_supports = array(
		'default_sidebar' => 'defaultsidebar',
		'sidebar_options' => array(
			'right' => 'Right sidebar' ,
			'left' => 'Left sidebar' ,
			'no' => 'No sidebar'
		)
	);
	$sidebar_std = array (
		'layout' => 'right',
		'sidebar' => 'defaultsidebar',
	);

	$admin_options[] = array(
		'slug'        => 'sidebar_settings',
		'parent'      => 'unlimited_sidebars',
		'id'          => 'woo_archive_sidebar',
		'name'        => 'Sidebar on Shop archive pages',
		'description' => 'Please choose the sidebar position for the shop archive pages.',
		'type'        => 'sidebar',
		'class'     => 'zn_full',
		'std'       => $sidebar_std,
		'supports'  => $sidebar_supports,
	);

	$admin_options[] = array(
		'slug'        => 'sidebar_settings',
		'parent'      => 'unlimited_sidebars',
		'id'          => 'woo_single_sidebar',
		'name'        => 'Sidebar on Shop product page',
		'description' => 'Please choose the sidebar position for the shop product pages.',
		'type'        => 'sidebar',
		'class'     => 'zn_full',
		'std'       => $sidebar_std,
		'supports'  => $sidebar_supports,
	);


	/**
	 * ====================================================
	 * HEADER MINI-CART
	 * Theme options > General options > Header - MiniCart
	 * ====================================================
	 */
	$admin_options[] = array (
					'slug'        => 'header_minicart',
					'parent'      => 'general_options',
					"name"        => __( 'Header Mini-Cart', 'dannys-restaurant' ),
					"description" => __( 'These options are applied to the mini-cart in header.', 'dannys-restaurant' ),
					"id"          => "hd_title1",
					"type"        => "zn_title",
					"class"       => "zn_full zn-custom-title-large zn-top-separator"
	);
	$admin_options[] = array (
		'slug'        => 'header_minicart',
		'parent'      => 'general_options',
		"name"        => __( "Show CART in header", 'dannys-restaurant' ),
		"description" => __( "Choose yes if you want to show a link to MY CART and the total value of the cart in
								the header", 'dannys-restaurant' ),
		"id"          => "woo_show_cart",
		"std"         =>  "yes",
		"type"        => "zn_radio",
		"options"     => array (
			"yes" => __( "Show", 'dannys-restaurant' ),
			"no" => __( "Hide", 'dannys-restaurant' )
		),
		"class"        => "zn_radio--yesno",
	);

	$admin_options[] = array (
		'slug'        => 'header_minicart',
		'parent'      => 'general_options',
		"name"        => __( "Hide on breakpoints", 'dannys-restaurant' ),
		"description" => __( "Choose to hide this component on either desktop, mobile or tablets.", 'dannys-restaurant' ),
		"id"          => "header_cart_hidexs",
		"std"         => array(),
		"type"        => "checkbox",
		"supports"	  => array( 'zn_radio' ),
		"options"     => array (
			"lg" => '',
			"md"  => '',
			"sm"  => '',
			"xs"  => ''
		),
		'class' => 'zn_breakpoints_classic zn--minimal',
		"dependency"  => array( 'element' => 'woo_show_cart' , 'value'=> array('yes') ),
	);

	$admin_options[] = array (
		'slug'        => 'header_minicart',
		'parent'      => 'general_options',
		"name"        => __( "Mini Cart Theme Color", 'dannys-restaurant' ),
		"description" => __( "Choose the cart's theme color", 'dannys-restaurant' ),
		"id"          => "woo_cart_theme",
		"std"         =>  "dark",
		"type"        => "zn_radio",
		"options"     => array (
			"dark" => __( "Dark", 'dannys-restaurant' ),
			"light" => __( "Light", 'dannys-restaurant' )
		),
		"class"        => "zn_radio--yesno",
		"dependency"  => array( 'element' => 'woo_show_cart' , 'value'=> array('yes') ),
	);


	return $admin_options;

}
