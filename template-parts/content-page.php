<?php if(! defined('ABSPATH')){ return; }
/**
 * Template part for displaying page content in page.php
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('dn-page'); ?>>

	<header class="dn-pageHeader">
		<?php the_title( '<h1 class="dn-pageTitle h1">', '</h1>' ); ?>
	</header>

	<div class="dn-pageContent">
		<?php

			the_content();

			wp_link_pages( array(
				'before'      => '<div class="dn-pageLinks">' . __( 'Pages:', 'dannys-restaurant' ),
				'after'       => '</div>',
			) );
		?>
	</div>
</article><!-- #post-## -->