<?php if(! defined('ABSPATH')){ return; }

$post_format = get_post_format() ? get_post_format() : 'standard';
$current_post = zn_setup_post_data( $post_format );

echo $current_post['before'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('dn-blogItem dn-blogItem--default dn-blogItem-loop'); ?>>

	<?php

	// Load Post header
	get_template_part('template-parts/blog/default/content','part-header');

	echo $current_post['media'];

	if( $current_post['before_content'] || $current_post['content'] || $current_post['after_content'] || (is_search() && the_excerpt()) ){

		echo '<div class="dn-blogItem-content">';

				if( is_search() ){
					the_excerpt();
				}
				else {
					echo $current_post['before_content'];
					echo $current_post['content'];
					echo $current_post['after_content'];
				}

		echo '</div>';
	}

	?>
</article><!-- #post-## -->
<?php
	echo $current_post['after']; ?>