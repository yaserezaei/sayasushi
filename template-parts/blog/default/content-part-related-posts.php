<?php if(! defined('ABSPATH')){ return; }

// Start the query
$args = array(
	'posts_per_page' => 3,
	'category__in' => wp_get_post_categories( get_the_ID(), array('fields' => 'ids')),
	'orderby' => 'rand',
	'order'=> 'ID',
	'post__not_in' => array( get_the_ID() ),
);
$theQuery = new WP_Query( $args );

if($theQuery->have_posts()):

?>

<div class="dn-blogRelated">

	<?php if( $related_title = zget_option('related_posts_title', 'blog_options', false, 'RELATED POSTS') ): ?>
		<h3 class="dn-blogRelated-title" <?php echo zn_schema_markup('title'); ?>>
			<?php echo esc_html( $related_title ); ?>
		</h3>
	<?php endif ?>

	<div class="row">
		<?php
			while($theQuery->have_posts())
			{
				$theQuery->the_post();
				?>
				<div class="col-sm-4">
					<div class="dn-blogRelated-item">
						<?php
							if ( '' !== get_the_post_thumbnail() || dannys_can_use_first_image() ) { ?>
							<div class="dn-blogRelated-itemImg">
								<a href="<?php the_permalink(); ?>">
									<?php
									echo dannys_get_featured_or_first_img( 'post-thumbnail', array('class'=>'dn-blogItem-img') ); ?>
								</a>
							</div>
						<?php } ?>
						<h4 class="dn-blogRelated-itemTitle h4">
							<a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
						</h4>
					</div>
				</div>
			<?php

			}
			wp_reset_postdata();
		?>
	</div>
</div><!-- /.dn-blogRelated -->

<?php
endif;
