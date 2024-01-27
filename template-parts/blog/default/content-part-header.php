<?php if(! defined('ABSPATH')){ return; }

$post_format = get_post_format() ? get_post_format() : 'standard';
$current_post = zn_setup_post_data( $post_format );

echo $current_post['before_head']; ?>

<header class="dn-blogItem-header">

	<?php
	echo $current_post['title'];

	if ( 'post' === get_post_type() ) :

		echo '<div class="dn-blogItem-headerMeta">';

			echo sprintf(
				'<span class="screen-reader-text">%s</span> <time class="dn-blogItem-metaDate" datetime="%s">%s</time> %s <a href="%s" class="dn-blogItem-metaAuthor vcard">%s</a> %s <div class="dn-blogItem-metaCats">%s</div>',
				__('Posted on', 'dannys-restaurant'),
				get_the_date( DATE_W3C ),
				get_the_date(),
				__(' by ', 'dannys-restaurant'),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author(),
				__(' in ', 'dannys-restaurant'),
				get_the_category_list(', ')
			);

			if( is_single() && comments_open( get_the_ID() ) ){
				echo '<span class="dn-blogItem-comments">';
					echo dannys_get_svg( array( 'icon' => 'comments' ) );
					echo '<span class="dn-blogItem-commentsCount">' . comments_number( __( 'No Comments', 'dannys-restaurant'), __( '1 Comment', 'dannys-restaurant' ), __( '% Comments', 'dannys-restaurant' ) ) . '</span>';
				echo '</span>';
			}

		echo '</div>';
	endif;

	echo $current_post['after_head'];


	?>
</header>