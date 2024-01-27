<?php if(! defined('ABSPATH')){ return; }
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="dn-searchForm-wrapper">
	<form id="searchform" class="dn-searchForm" action="<?php echo home_url( '/' ); ?>" method="get" role="search">
		<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'dannys-restaurant' ); ?></label>
		<input id="s" name="s" value="<?php echo get_search_query() ?>" class="dn-searchForm-text" type="text" placeholder="<?php esc_attr_e('SEARCH ...','dannys-restaurant'); ?>" />
		<button type="submit" id="searchsubmit" value="go" class="dn-searchForm-submit">
			<?php echo dannys_get_svg( array( 'icon' => 'search') ) ?>
		</button>
		<input type="hidden" name="post_type" value="product">
	</form>
</div>
