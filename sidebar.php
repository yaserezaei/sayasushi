<?php if(! defined('ABSPATH')){ return; }

	// Bail if sidebar disabled
	if( dannys_sidebar_position() == 'no' ) return;

	// Bail if no widget is active
	if ( ! is_active_sidebar( dannys_sidebar_source() ) ) {
		return;
	}
?>

<aside class="dn-mainSidebar" <?php echo zn_schema_markup('sidebar'); ?>>
	<div class="dn-sidebar">

		<?php dynamic_sidebar( dannys_sidebar_source() ); ?>

	</div>
</aside>