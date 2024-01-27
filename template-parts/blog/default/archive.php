<?php if(! defined('ABSPATH')){ return; }

$masonryOpt = array(
	'columnWidth' => '.dn-blogArchive-listItem.dn-blogArchive-listItem--normal',
);
?>
<div class="dn-blogArchive dn-blogArchive--default" <?php echo zn_schema_markup('blog'); ?>>

	<div class="dn-blogArchive-list js-isMasonry" data-dn-masonry='<?php echo json_encode($masonryOpt); ?>'>
		<?php
			if ( have_posts() ) :

				while ( have_posts() ) {
					the_post();

					?>
					<div class="dn-blogArchive-listItem js-masonryItem dn-blogArchive-listItem--<?php echo is_sticky() && !is_search() ? 'sticky' : 'normal'; ?>">
						<?php
							get_template_part( 'template-parts/blog/default/content-loop', get_post_format() );
						?>
					</div>
					<?php
				}

			endif;
			?>
		<div class="clearfix"></div>
	</div>

	<div class="dn-pagination dn-blogArchive-pagination">
		<?php zn_pagination(); ?>
	</div>
</div>