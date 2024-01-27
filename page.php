<?php if(! defined('ABSPATH')){ return; }
/**
 * The template for displaying pages
 */

get_header();
?>

<div class="dn-contentRow <?php echo dannys_get_sidebar_class(); ?>">
	<div id="mainbody" class="dn-mainBody" <?php echo zn_schema_markup('main'); ?>>
		<?php

		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>
	</div><!-- /.dn-mainBody -->
	<?php get_sidebar(); ?>
</div><!-- /.dn-contentRow -->

<?php get_footer();