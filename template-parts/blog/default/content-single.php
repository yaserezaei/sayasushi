<?php if(! defined('ABSPATH')){ return; }

$post_format = get_post_format() ? get_post_format() : 'standard';
$current_post = zn_setup_post_data( $post_format );

// var_dump($current_post);

echo $current_post['before'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('dn-blogItem dn-blogItem--default dn-blogItem-single'); ?>>

	<?php

		// Load Post header
		get_template_part('template-parts/blog/default/content','part-header');

		// Load Share
		$socialShareConfig = zget_option('social_share_position', 'blog_options', false, array() );
		$showSocialShare = ( zget_option('show_social', 'blog_options', false, 'yes' )  == 'yes' );
		if( $showSocialShare && in_array( 'above', $socialShareConfig) ):
			get_template_part('template-parts/blog/default/content','part-share');
		endif;

		echo $current_post['media'];
	?>

	<div class="dn-blogItem-content">
		<?php

			echo $current_post['before_content'];
			echo $current_post['content'];
			echo $current_post['after_content'];

			wp_link_pages( array(
				'before'      => '<div class="dn-blogItem-pageLinks">' . __( 'Pages:', 'dannys-restaurant' ),
				'after'       => '</div>',
				'link_before' => '<span class="dn-blogItem-pageNumber">',
				'link_after'  => '</span>',
			) );

			dannys_edit_link();
		?>
	</div>

	<?php
		// Show Categories & Tags
		if(zget_option('show_tags_cats', 'blog_options', false, 'no' )  == 'yes'):
			dannys_entry_footer();
		endif;

		// Load Share
		if( $showSocialShare && in_array( 'bellow', $socialShareConfig) ):
			get_template_part('template-parts/blog/default/content','part-share');
		endif;

		// Posts Navigation
		the_post_navigation( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'dannys-restaurant' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'dannys-restaurant' ) . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'dannys-restaurant' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'dannys-restaurant' ) . '</span> <span class="nav-title">%title</span>',
		) );

		// Author bio.
		if ( zget_option('show_author_info', 'blog_options', false, 'yes' )  == 'yes' ) :
			get_template_part( 'template-parts/blog/default/author-bio' );
		endif;

		// Load Related Posts
		if( zget_option('show_related_posts', 'blog_options', false, 'yes' )  == 'yes' ):
			get_template_part('template-parts/blog/default/content','part-related-posts');
		endif;
	?>

</article><!-- #post-## -->
<?php
	echo $current_post['after']; ?>