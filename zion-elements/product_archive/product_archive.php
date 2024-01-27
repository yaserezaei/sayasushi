<?php if(! defined('ABSPATH')){ return; }

class ZNB_ProductArchive extends ZionElement
{
/**
	 * This method is used to retrieve the configurable options of the element.
	 * @return array The list of options that compose the element and then passed as the argument for the render() function
	 */
	function options()
	{
		$uid = $this->data['uid'];

		$options = array(
			'has_tabs'  => true,
			'general' => array(
				'title' => 'General options',
				'options' => array(
					array(
						"name" => __("Number of columns", 'dannys-restaurant'),
						"description" => __("Please choose how many columns you want to use.", 'dannys-restaurant'),
						"id" => "num_columns",
						"std" => "3",
						"options" => array(
							'1' => __('1', 'dannys-restaurant'),
							'2' => __('2', 'dannys-restaurant'),
							'3' => __('3', 'dannys-restaurant'),
							'4' => __('4', 'dannys-restaurant'),
							'5' => __('5', 'dannys-restaurant'),
							'6' => __('6', 'dannys-restaurant'),
						),
						"type" => "select",
					),
					array(
						'id'          => 'posts_per_page',
						'name'        => __('Number of items per page', 'dannys-restaurant'),
						'description' => __('Please choose the desired number of items that will be shown on a page.', 'dannys-restaurant'),
						'type'        => 'slider',
						'std'		  => '10',
						'class'		  => 'zn_full',
						'helpers'	  => array(
							'min' => '1',
							'max' => '50',
							'step' => '1'
						),
					),

					array (
						"name"        => __( "Shop Category", 'dannys-restaurant' ),
						"description" => __( "Select the shop category to show items. Please note that this won't work on the selected shop page.", 'dannys-restaurant' ),
						"id"          => "woo_categories",
						"multiple"    => true,
						"std"         => "0",
						"type"        => "select",
						"options"     => dannys_get_shop_categories()
					),

					array(
						"name" => __("Show page title ?", 'dannys-restaurant'),
						"description" => __("Choose if you want to show the page title. Please note that if you select to only show products from specific categories, the title will show the first category name.", 'dannys-restaurant'),
						"id" => "show_page_title",
						"std" => "yes",
						"type" => "toggle2",
						"value" => "yes",
					),

					array(
						"name" => __("Show loop info?", 'dannys-restaurant'),
						"description" => __("Enable if you want to display the product count and ordering select list, from above the product loop.", 'dannys-restaurant'),
						"id" => "show_loop_info",
						"std" => "yes",
						"value" => "yes",
						"type" => "toggle2",
					),

					array(
						"name" => __("Ajaxify archive?", 'dannys-restaurant'),
						"description" => __("By enabling this options, you will be able to change the archive element page without refreshing the page. Please note that this option may cause problems when using plugins that adds functionality to WooCommerce archive/products.", 'dannys-restaurant'),
						"id" => "ajaxify",
						"std" => "yes",
						"value" => "yes",
						"type" => "toggle2",
					),
				),
			),


			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#a6Cr0PG3TFQ',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),

		);
		return $options;
	}

	function js(){

		// Don't proceed if ajax loading is not active
		if( $this->opt( 'ajaxify', 'no' ) == 'yes' ){
			$uid = $this->data['uid'];
			$uid = $this->opt('custom_id', $uid);
			$args = json_encode(array(
				'poststPerPage' => $this->opt( 'posts_per_page', 10 ),
				'numberOfColumns' => $this->opt( 'num_columns', 3 ),
				'category' => $this->opt( 'woo_categories' ),
				'showPageTitle' => $this->opt( 'show_page_title' ),
				'showLoopInfo' => $this->opt( 'show_loop_info' )
			));

			return array( 'product_archive'.$uid => "
				$.themejs.enableWooCommerceAjax( '#{$uid}', {$args} );
			");
		}

	}


	/**
	 * This method is used to display the output of the element.
	 * @return void
	 */
	function element()
	{

		$options = $this->data['options'];

		// Check if this is a normal page or the Shop archive page
		if( ! is_shop()  ){

			global $paged;

			$wc_query = new WC_Query();
			$categories = $this->opt('woo_categories', false);

			// Get the proper page - this resolves the pagination on static frontpage
			if( get_query_var('paged') ){ $paged = get_query_var('paged'); }
			elseif( get_query_var('page') ){ $paged = get_query_var('page'); }
			else{ $paged = 1; }

			$ordering = $wc_query->get_catalog_ordering_args();

			$queryArgs = array(
				'post_type' => 'product',
				'paged' => $paged,
				'orderby' => $ordering['orderby'],
				'order' => $ordering['order'],
			);

			// How many products to display per page
			$posts_per_page = $this->opt('posts_per_page');
			if( ! empty( $posts_per_page ) ){
				$queryArgs['posts_per_page'] = ( int )$posts_per_page;
			}

			if( ! empty( $categories ) ){
				$queryArgs['tax_query'] = array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'id',
						'terms' => $categories
					),
				);
			}


			if ( isset( $ordering['meta_key'] ) ) {
				$queryArgs['meta_key'] = $ordering['meta_key'];
			}

			query_posts($queryArgs);
		}

		$classes = $attributes = array();
		$uid = $this->data['uid'];

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'woocommerce';
		$classes[] = 'zn-wcArchiveEl';

		if( $this->opt( 'ajaxify', 'no' ) == 'yes' ){
			$classes[] = 'zn-wcArchive-ajax';
		}

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));
		$attributes[] = 'class="'.zn_join_spaces($classes).'"';

		echo '<div '. zn_join_spaces($attributes ) .'>';

			global $shopLoopArgs;
			$shopLoopArgs = array(
				'poststPerPage' => $this->opt( 'posts_per_page', 10 ),
				'numberOfColumns' => $this->opt( 'num_columns', 3 ),
				'category' => $this->opt( 'woo_categories' ),
				'showPageTitle' => $this->opt( 'show_page_title' ),
				'showLoopInfo' => $this->opt( 'show_loop_info' )
			);
			get_template_part( 'template-parts/shop/shop', 'loop' );

			wp_reset_postdata();
			wp_reset_query();

		echo '</div>';
	}

	 /**
	  * This method is used to display the output of the element.
	  * @return void
	  */
	 function element_edit()
	 {
		 echo '<div class="zn-pb-notification">This element will be rendered only in View Page Mode and not in PageBuilder Edit Mode.</div>';
	 }

	 /**
	  * If the dependencies for this element are met
	  */
	 function canLoad(){
		 return class_exists( 'WooCommerce' );
	 }
}

ZNB()->elements_manager->registerElement( new ZNB_ProductArchive( array(
	'id' => 'DnWcArchive',
	'name' => __( 'WooCommerce Archive', 'dannys-restaurant' ),
	'description' => __( 'Display a WooCommerce archive.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Content',
	'legacy' => false,
	'keywords' => array( 'shop', 'category', 'store' ),
) ) );
