<?php if(! defined('ABSPATH')){ return; } ?>

<form id="searchform" class="dn-searchForm" action="<?php echo home_url( '/' ); ?>" method="get">
	<input id="s" name="s" value="<?php echo get_search_query() ?>" class="dn-searchForm-text" type="text" placeholder="<?php esc_attr_e('SEARCH ...','dannys-restaurant'); ?>" />
	<button type="submit" id="searchsubmit" value="go" class="dn-searchForm-submit">
		<?php echo dannys_get_svg( array( 'icon' => 'search') ) ?>
	</button>
	<?php if( zget_option( 'woo_site_search_type', 'zn_woocommerce_options', false, 'wp' ) == 'wc' && znfw_is_woocommerce_active() ){ ?>
        <input type="hidden" name="post_type" value="product">
    <?php } ?>
</form>