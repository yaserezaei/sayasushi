<?php if(! defined('ABSPATH')){ return; }
/**
 * Add specific WOOCOMMERCE OPTIONS
 */
require get_template_directory() . '/woocommerce/dannys-woocommerce-options.php';

/**
 * REMOVE Actions
 */
remove_action( 'woocommerce_before_main_content',	'woocommerce_breadcrumb',					20, 0 );
remove_action( 'woocommerce_before_main_content',	'woocommerce_output_content_wrapper',		10 );
remove_action( 'woocommerce_after_main_content',	'woocommerce_output_content_wrapper_end',	10 );
remove_action( 'woocommerce_sidebar',				'woocommerce_get_sidebar',					10 );
remove_action( 'woocommerce_pagination',			'woocommerce_catalog_ordering', 			20 );
remove_action( 'woocommerce_after_shop_loop',		'woocommerce_pagination',					10 );

/**
 * ADD Actions
 */
add_action( 'woocommerce_before_main_content',		'dannys_before_content',					10 );
add_action( 'woocommerce_after_main_content',		'dannys_after_content',						10 );


// Ajax filters and pagination
add_action( 'wp_ajax_nopriv_zn_product_archive_query', 'dannys_product_archive_query' );
add_action( 'wp_ajax_zn_product_archive_query', 'dannys_product_archive_query' );
function dannys_product_archive_query(){

	global $shopLoopArgs, $paged;

	// Order by filters
	add_filter( 'woocommerce_default_catalog_orderby', 'dannys_product_archive_orderby_filter' );

	$queryArgs = array(
		'post_type'      => 'product',
		'paged'          => sanitize_text_field( $_POST[ 'page' ] ),
		'posts_per_page' => sanitize_text_field( $_POST[ 'poststPerPage' ] ),
	);

	// Sort by
	if ( ! empty( $_POST['sortBy'] ) ) {
		$shopLoopArgs['orderBy'] = sanitize_text_field( $_POST['sortBy'] );
		$ordering_args = WC()->query->get_catalog_ordering_args();
		$queryArgs['orderby'] = $ordering_args['orderby'];
		$queryArgs['order'] = $ordering_args['order'];

		if ( isset( $ordering_args['meta_key'] ) ) {
			$queryArgs['meta_key'] = $ordering_args['meta_key'];
		}
	}

	if( ! empty( $_POST[ 'category' ] ) ) {
		$queryArgs['tax_query'] = array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'id',
				'terms'    => $_POST[ 'category' ],
			),
		);
	}

	query_posts( $queryArgs );

	$shopLoopArgs = array(
		'poststPerPage'   => sanitize_text_field( $_POST[ 'poststPerPage' ] ),
		'numberOfColumns' => sanitize_text_field( $_POST[ 'numberOfColumns' ] ),
		'category'        => $_POST[ 'category' ],
		'showPageTitle'   => sanitize_text_field( $_POST[ 'showPageTitle' ] ),
		'showLoopInfo'    => sanitize_text_field( $_POST[ 'showLoopInfo' ] ),
		'orderBy'         => isset( $_POST[ 'sortBy' ] ) ? sanitize_text_field( $_POST[ 'sortBy' ] ) : 'date',
	);

	$paged = get_query_var('paged');
	get_template_part( 'template-parts/shop/shop', 'loop' );

	wp_reset_postdata();
	wp_reset_query();

}

function dannys_product_archive_orderby_filter( $orderBy ){
	global $shopLoopArgs;
	if( ! empty( $shopLoopArgs['orderBy'] ) ) {
		$orderBy = $shopLoopArgs['orderBy'];
	}
	return $orderBy;
}


/**
 * Allow us to override the number of columns
 * @return int The number of columns the archive should use
 */
function dannys_woo_loop_columns(){
	global $shopLoopArgs;
	return $shopLoopArgs['numberOfColumns'];
}

/**
 * Remove WooCommerce Styling
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );


/**
 * Header Mini Cart
 */
if( ! function_exists('dannys_cart_markup') ):
function dannys_cart_markup(){
	global $woocommerce;
	?>
	<a id="dn-cartbtn" class="dn-headerCartBtn sh-dropDown-head" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'dannys-restaurant' ); ?>">
		<span class="dn-headerCartBtn-block dn-headerCartBtn-icon">
			<?php echo dannys_get_svg( array( 'icon' => 'cart' ) ); ?>
		</span>
		<span class="dn-headerCartBtn-block dn-headerCartBtn-items">
			<span class="dn-headerCartBtn-blockTitle dn-headerCartBtn-itemsTitle"><?php _e( 'ITEM(S)', 'dannys-restaurant' ); ?></span>
			<span class="dn-headerCartBtn-itemsCount"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
		</span>
		<span class="dn-headerCartBtn-block dn-headerCartBtn-total">
			<span class="dn-headerCartBtn-blockTitle dn-headerCartBtn-totalTitle"><?php _e( 'TOTAL', 'dannys-restaurant' ); ?></span>
			<span class="dn-headerCartBtn-totalCount"><?php echo $woocommerce->cart->get_cart_total(); ?></span>
		</span>
	</a>
	<?php
}
endif;

/**
 * Header Cart dropdown
 */
if( ! function_exists('dannys_cart_dropdown_markup') ):
	function dannys_cart_dropdown_markup(){
		?>
        <div class="dn-headerCart-contents sh-dropDown-panel" id="dn-cartDropdown">
			<?php
			woocommerce_mini_cart( array('list_class' => 'dn-headerCart-contentsCart') );
			?>
        </div>
		<?php
	}
endif;
/**
 * Ensure the cart contents update when products are added to the cart via AJAX
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment_number' );
if ( ! function_exists( 'woocommerce_header_add_to_cart_fragment_number' ) ):
	/**
	 * Ensure the cart contents update when products are added to the cart via AJAX
	 * @param $fragments
	 * @hooked to woocommerce_add_to_cart_fragments
	 * @return mixed
	 */
	function woocommerce_header_add_to_cart_fragment_number( $fragments ){
		ob_start();
		dannys_cart_markup();
		$fragments['a#dn-cartbtn'] = ob_get_clean();

		ob_start();
		dannys_cart_dropdown_markup();
		$fragments['#dn-cartDropdown'] = ob_get_clean();

		// Return the new added to cart popup
		if(isset($_POST['product_id'])){
			$product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
			$product_object = WC()->product_factory->get_product( $product_id );

			// Add the new modal
			ob_start();
			?>
				<div class="dn-addedToCart">
					<div class="dn-addedToCart-container">
						<div class="dn-addedToCart-image"><?php echo $product_object->get_image(); ?></div>
						<h3 class="dn-addedToCart-title"><?php echo esc_html( $product_object->get_title() ); ?></h3>
						<div class="dn-addedToCart-desc"><?php _e( 'has been added to your cart.', 'dannys-restaurant' );?></div>
						<div class="dn-addedToCart-price"><?php echo $product_object->get_price_html(); ?></div>
						<a href="<?php echo wc_get_checkout_url(); ?>" class="dn-addedToCart-checkout btn btn-default btn-default--whover"><?php _e( 'CHECKOUT &rarr;', 'dannys-restaurant' );?></a>
						<a class="dn-addedToCart-close" title="<?php _e( 'Continue Shopping', 'dannys-restaurant' );?>"></a>
					</div>
				</div>
			<?php
			$fragments['zn_added_to_cart'] = ob_get_clean();
		}
		return $fragments;
	}
endif;

/**
 * Add WooCommerce cart link
 */
if ( ! function_exists( 'dannys_woocomerce_cart' ) ):
	function dannys_woocomerce_cart(){

		$show_cart_to_visitors = zget_option( 'show_cart_to_visitors', 'zn_woocommerce_options', false, 'yes' );

		if( $show_cart_to_visitors == 'no' && ! is_user_logged_in() ){
			return;
		}

		if ( zget_option( 'woo_show_cart', 'general_options', false, 'yes' ) == 'yes' ) {

			$classes[] = 'sh-component dn-headerCart sh-dropDown woocommerce';
			$classes[] = dannys_breakpoint_classes_output( zget_option( 'header_cart_hidexs', 'general_options' ) );
			$classes[] = 'dn-headerCart--' . zget_option( 'woo_cart_theme', 'general_options', false, 'dark' );

			?>
			<div class="<?php echo implode(' ', $classes); ?> ">
				<?php
                    dannys_cart_markup();
				    dannys_cart_dropdown_markup();
				?>
			</div>
			<?php
		}
	}
endif;



// Override WC's (max-width:768px) to 767px
add_filter('woocommerce_style_smallscreen_breakpoint','dannys_woo_custom_breakpoint');
if( ! function_exists('dannys_woo_custom_breakpoint') ):
	function dannys_woo_custom_breakpoint($px) {
		return '767px';
	}
endif;


add_filter('dannys_filter_sidebar_layout', 'dannys_woocommerce_sidebar_layout', 10);
function dannys_woocommerce_sidebar_layout($layout){

	if ( is_woocommerce() && is_single() ) {
		$layout = 'woo_single_sidebar';
	}
	elseif( is_woocommerce() && is_archive() ){
		$layout = 'woo_archive_sidebar';
	}

	return $layout;
}

/**
 * Add site content classes
 */
add_filter('dannys_filter_site_content_classes', 'dannys_woocommerce_site_content_class', 10);
function dannys_woocommerce_site_content_class($classes){

	if ( is_woocommerce() ) {
		$classes[] = 'dn-isShop';
	}
	if ( is_woocommerce() && is_single() ) {
		$classes[] = 'dn-isProductPage';
	}
	if( is_woocommerce() && is_archive() ){
		$classes[] = 'dn-isProductArchive';
	}

	return $classes;
}


add_action( 'woocommerce_after_shop_loop', 'dannys_woocommerce_pagination', 10 );
function dannys_woocommerce_pagination()
{
	$pagination = zn_pagination( array('echo'=> false) );
	if( $pagination ){
		$fancyPag = zget_option( 'woo_fancynav', 'zn_woocommerce_options', false, 'yes' ) == 'yes' ? 'dn-wooArchive-pagination--fancy hidden-lg' : '';
		echo '<div id="dn-wooArchive-pagination" class="dn-pagination dn-wooArchive-pagination '. $fancyPag .'">';
		echo $pagination;
		echo '</div>';
	}
}


/**
 * LOOP
 */

// Enable Catalogue mode
if ( zget_option( 'woo_catalog_mode', 'zn_woocommerce_options', false, 'no' ) == 'yes' ) {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}

 // Check to see if we are allowed to show the add to cart button for visitors
$show_cart_to_visitors = zget_option( 'show_cart_to_visitors', 'zn_woocommerce_options', false, 'yes' );
if( $show_cart_to_visitors == 'no' && !is_user_logged_in() ){
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}

// Remove Ratings from Loop
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Wrap Add to cart button
add_filter( 'woocommerce_loop_add_to_cart_link', 'dannys_woocommerce_loop_add_to_cart_link', 10 );
function dannys_woocommerce_loop_add_to_cart_link( $link ){
	return '<div class="dn-btnAddToCart">'.$link.'</div>';
}


add_action( 'woocommerce_shop_loop_item_title', 'dannys_woocommerce_wrap_title_price_start', 0 );
add_action( 'woocommerce_after_shop_loop_item_title', 'dannys_woocommerce_closing_div', 99 );

function dannys_woocommerce_wrap_title_price_start(){
	echo '<div class="dn-prodInfo-wrapper">';
}
function dannys_woocommerce_closing_div(){
	echo '</div>';
}
function dannys_woocommerce_closing_div_double(){
	echo '</div></div>';
}

// Wrap loop into a div and place the number of columns
add_action('woocommerce_before_shop_loop', 'dannys_wrap_productlist_start', 0);
add_action('woocommerce_after_shop_loop', 'dannys_woocommerce_closing_div', 99);

if(!function_exists('dannys_wrap_productlist_start')){
	function dannys_wrap_productlist_start(){
		$nc = apply_filters('dannys_custom_shop_columns', dannys_loop_columns());
		echo '<div class="dn-productsWrapper dn-cols-'.$nc.'">';
	}
}

// Wrap Sale Flash
add_filter('woocommerce_sale_flash', 'dannys_woocommerce_wrap_sale_flash', 5);
if(!function_exists('dannys_woocommerce_wrap_sale_flash')){
	function dannys_woocommerce_wrap_sale_flash($html){
		$html = str_replace('onsale', 'onsale dn-saleFlash', $html);
		return $html;
	}
}


/**
 * How many products per row (on desktop)
 */
add_filter('loop_shop_columns', 'dannys_loop_columns');
if (!function_exists('dannys_loop_columns')) {
	function dannys_loop_columns() {

		$cols = zget_option( 'woo_num_columns', 'zn_woocommerce_options', false, 3 );
		$cols = absint ( $cols );

		// Force -1 col if Sidebar active
		if( zget_option( 'woo_num_columns_sidebar', 'zn_woocommerce_options', false, 'no' ) == 'yes' && dannys_sidebar_position() != 'no' && is_active_sidebar( dannys_sidebar_source() ) ){
			$cols -= 1;
		}
		return $cols;
	}
}
// Remove First and Last classes
add_filter( 'post_class', 'dannys_woocommerce_remove_first_last_classes_product', 21 );
function dannys_woocommerce_remove_first_last_classes_product( $classes ) {
	if ( 'product' == get_post_type() ) {
		$classes = array_diff( $classes, array( 'first', 'last' ) );
	}
	return $classes;
}
// Remove First and Last classes (for product-category in loop)
add_filter( 'product_cat_class', 'dannys_woocommerce_remove_first_last_classes_cat', 10 );
function dannys_woocommerce_remove_first_last_classes_cat( $classes ) {
	$classes = array_diff( $classes, array( 'first', 'last' ) );
	return $classes;
}

/**
 * Filter Products per page
 */
add_filter( 'loop_shop_per_page', 'dannys_woocommerce_posts_per_page' );
function dannys_woocommerce_posts_per_page(){
	return zget_option( 'woo_show_products_per_page', 'zn_woocommerce_options', false, 11 );
}

/**
 * PRODUCT PAGE
 */

/**
 * Related product in its own section
 */
// var_dump( is_woocommerce() && is_product() );
// var_dump(is_product() && dannys_sidebar_position() == 'no');


add_action('woocommerce_after_single_product_summary', 'dannys_woocommerce_after_single_product_summary_start', 19 );
add_action('woocommerce_after_single_product_summary', 'dannys_woocommerce_after_single_product_summary_end', 21 );
// wrap related
add_action('woocommerce_after_single_product_summary', 'dannys_wrap_productlist_start', 19);
add_action('woocommerce_after_single_product_summary', 'dannys_woocommerce_closing_div', 21);

function dannys_woocommerce_after_single_product_summary_start(){
	if( is_product() && dannys_sidebar_position() == 'no' ){
		echo '</div></div></div></div>'; // dn-siteContainer / dn-contentRow / dn-mainBody / product
		echo '<div class="dn-wooRelatedProducts">';
		echo '<div class="container">';
	}
}
function dannys_woocommerce_after_single_product_summary_end(){
	if( is_product() && dannys_sidebar_position() == 'no' ){
		echo '</div></div>'; // dn-wooRelatedProducts / container
	}
}

/**
 * Check if there's a gallery, if not add class
 */
add_filter('woocommerce_single_product_image_gallery_classes', 'dannys_woocommerce_single_product_image_gallery_classes');
function dannys_woocommerce_single_product_image_gallery_classes($classes){

	global $product;
	$attachment_ids = $product->get_gallery_image_ids();

	if(count($attachment_ids) === 0){
		$classes[] = 'dn-wooProdGallery--single';
	}

	return $classes;
}

/**
 * FORMS
 */
if( !function_exists('dannys_woocommerce_form_field_args') ):
	add_filter('woocommerce_form_field_args', 'dannys_woocommerce_form_field_args', 10);
	function dannys_woocommerce_form_field_args($args){

		if(isset($args['input_class'])){
			$args['input_class'][] = 'form-control';
		}

		return $args;
	}
endif;

// Cart Page
/**
 * Wrap Cart table in custom class
 */
add_action('woocommerce_before_cart', 'dannys_woocommerce_before_cart');
add_action('woocommerce_after_cart', 'dannys_woocommerce_closing_div_double');
function dannys_woocommerce_before_cart(){
	echo '<div class="woocommerce">';
		echo '<div class="dn-cartPage">';
}

//#! THIS IS JUST FOR TESTING
add_action( 'wp_footer', '__return_false' );
