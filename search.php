<?php if(! defined('ABSPATH')){ return; }
/**
 * The template for displaying search results pages
 */

get_header();
?>

<div class="dn-contentRow <?php echo dannys_get_sidebar_class(); ?>">
	<div id="mainbody" class="dn-mainBody" <?php echo zn_schema_markup('main'); ?>>

		<header class="page-header">
			<?php if ( have_posts() ) : ?>
				<h1 class="dn-pageTitle"><?php printf( __( 'Search Results for: %s', 'dannys-restaurant' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php else : ?>
				<h1 class="dn-pageTitle"><?php _e( 'Nothing Found', 'dannys-restaurant' ); ?></h1>
			<?php endif; ?>
		</header><!-- .page-header -->

		<?php
			get_template_part( 'template-parts/blog/default/archive' ); ?>

		<?php
			if ( !have_posts() ) : ?>
				<div class="dn-noPosts">
					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dannys-restaurant' ); ?></p>
				</div>
				<?php
					get_search_form();
			endif;
		?>

	</div><!--// .dn-mainBody -->
	<?php get_sidebar(); ?>
</div><!--// .dn-contentRow -->

<?php get_footer();
?>