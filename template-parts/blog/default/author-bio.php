<?php if(! defined('ABSPATH')){ return; }
/**
 * The template for displaying Author bios
 */
?>

<div class="dn-authorInfo">
	<div class="dn-authorAvatar">
		<?php
			echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'dannys_author_bio_avatar_size', 100 ) );
		?>
	</div>

	<div class="dn-authorDescription">

		<h3 class="dn-authorTitle"><?php echo get_the_author(); ?></h3>
		<p class="dn-authorURL"><a href="<?php echo get_the_author_meta( 'url' ); ?>" target="_blank"><?php echo get_the_author_meta( 'url' ); ?></a></p>

		<p class="dn-authorBio">
			<?php the_author_meta( 'description' ); ?>
			<a class="dn-authorPostsLink" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'dannys-restaurant' ), get_the_author() ); ?>
			</a>
		</p>

	</div>
</div>
