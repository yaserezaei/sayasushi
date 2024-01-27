<?php if(! defined('ABSPATH')){ return; }

get_header();
?>

<div class="dn-contentRow <?php echo dannys_get_sidebar_class(); ?>">
	<div id="mainbody" class="dn-mainBody">

		<?php if ( have_posts() ) : ?>
			<header class="dn-pageHeader">
			<?php
				the_archive_title( '<h1 class="dn-pageTitle h1">', '</h1>' );
				the_archive_description( '<div class="dn-taxDesc">', '</div>' );
			 ?>
			</header>
		<?php endif; ?>

		<?php
			get_template_part( 'template-parts/blog/default/archive' ); ?>

		<?php
			if ( !have_posts() ) : ?>
				<div class="dn-noPosts">
					<p><?php _e( 'Sorry, no posts matched your criteria.', 'dannys-restaurant' ); ?></p>
				</div>
				<?php
			endif;
		?>

	</div><!--// .dn-mainBody -->
	<?php get_sidebar(); ?>
</div><!--// .dn-contentRow -->

<?php get_footer();