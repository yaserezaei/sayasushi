<?php if(! defined('ABSPATH')){ return; }

class ZNB_PostContent extends ZionElement
{
	/**
	 * This method is used to display the output of the element.
	 * @return void
	 */
	function element()
	{
		$options = $this->data['options'];
		$classes = $attributes = array();
		$uid = $this->data['uid'];

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-postContentEl';

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));
		$attributes[] = 'class="'.implode(' ', $classes).'"';

		echo '<div '. zn_join_spaces( $attributes ) .'>';
			get_template_part( 'template-parts/blog/default/content-single', get_post_format() );
		echo '</div>';
	}

	function options(){

		$uid = $this->data['uid'];

		$options = array(
			'has_tabs'  => true,
			// 'general' => array(
			// 	'title' => 'General Options',
			// 	'options' => array(

			// 	),
			// ),


			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#5yfqc8O4_88',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),

		);
		return $options;
	}

	// TODO : Uncomment this if JS errors appears because of clients shortcodes/plugins
	// /**
	//  * This method is used to display the output of the element.
	//  * @return void
	//  */
	// function element_edit()
	// {
	//     echo '<div class="zn-pb-notification">This element will be rendered only in View Page Mode and not in PageBuilder Edit Mode.</div>';
	// }

}

ZNB()->elements_manager->registerElement( new ZNB_PostContent( array(
	'id' => 'DnPostContent',
	'name' => __( 'Post Content', 'dannys-restaurant' ),
	'description' => __( 'This element will render the post\'s content.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Content, post',
	'legacy' => false,
	'keywords' => array( 'blog' ),
) ) );
