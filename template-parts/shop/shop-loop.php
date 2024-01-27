<?php if(! defined('ABSPATH')){ return; }
	global $shopLoopArgs;

	// Notify WooCommerce we've overridden the default number of columns
	add_filter('loop_shop_columns', 'dannys_woo_loop_columns' , 999);
	add_filter('dannys_custom_shop_columns', 'dannys_woo_loop_columns' , 999);

	// Hide loop info
	if( $shopLoopArgs['showLoopInfo'] != 'yes' ){
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	}

	if ( $shopLoopArgs['showPageTitle'] == 'yes' ) : ?>
		<h1 class="dn-pageTitle h1" <?php echo zn_schema_markup('title'); ?>><?php woocommerce_page_title(); ?></h1>
	<?php endif;

	/**
	 * woocommerce_archive_description hook
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>

	<?php if ( have_posts() ) : ?>

	<?php
	/**
	 * woocommerce_before_shop_loop hook
	 *
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );
	?>

	<?php woocommerce_product_loop_start(); ?>

	<?php woocommerce_product_subcategories(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php wc_get_template_part( 'content', 'product' ); ?>

	<?php endwhile; // end of the loop. ?>

	<?php woocommerce_product_loop_end(); ?>

	<?php
	/**
	 * woocommerce_after_shop_loop hook
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
	?>

<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

	<?php wc_get_template( 'loop/no-products-found.php' ); ?>

<?php endif;
