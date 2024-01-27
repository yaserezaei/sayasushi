<?php if(! defined('ABSPATH')){ return; }
/**
 * The template for displaying all single posts
 */

get_header();
?>

<div class="dn-contentRow <?php echo dannys_get_sidebar_class(); ?>">
	<div id="mainbody" class="dn-mainBody" <?php echo zn_schema_markup('main'); ?>>
		<div class="dn-postContent-wrapper">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/blog/default/content-single', get_post_format() );
			endwhile;

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			?>
		</div>
	</div><!-- /.dn-mainBody -->
	<?php get_sidebar(); ?>
</div><!-- /.dn-contentRow -->

<?php get_footer();