<?php if(! defined('ABSPATH')){ return; }
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<div class="dn-contentRow ">
	<div id="mainbody" class="dn-mainBody">

		<section class="dn-error404">

			<div class="row">

				<?php
				$col_size = 12;

				if( $img_404 = zget_option( 'img_404', 'options_404' ) ): ?>
					<div class="col-sm-6">
						<img src="<?php echo esc_url( $img_404 ); ?>" class="dn-error404-img img-responsive" alt="<?php _e('Not found!', 'dannys-restaurant'); ?>">
					</div>
					<?php
					$col_size = 6;
				endif; ?>

				<div class="col-sm-<?php echo esc_attr( $col_size ); ?>">
					<header class="dn-pageHeader">
						<h3 class="dn-error404-sign"><?php _e( 'OOPS!', 'dannys-restaurant' ); ?></h3>
						<h3 class="dn-error404-error"><?php _e( 'ERROR 404', 'dannys-restaurant' ); ?></h3>
						<h1 class="dn-error404-title"><?php _e( 'That page can&rsquo;t be found.', 'dannys-restaurant' ); ?></h1>
					</header><!-- .dn-pageHeader -->
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'dannys-restaurant' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</div><!-- /.dn-mainBody -->
</div><!-- /.dn-contentRow -->

<?php get_footer();