<?php if(! defined('ABSPATH')){ return; }

class ZNB_PageContent extends ZionElement
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
		$classes[] = 'zn-pageContent';

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));
		$attributes[] = 'class="'.zn_join_spaces($classes).'"';

		echo '<div '. zn_join_spaces($attributes ) .'>';
			get_template_part( 'template-parts/content', 'page' );
		echo '</div>';
	}

	/**
	 * This method is used to display the output of the element.
	 * @return void
	 */
	function element_edit()
	{
		echo '<div class="zn-pb-notification">This element will be rendered only in View Page Mode and not in PageBuilder Edit Mode.</div>';
	}

	/**
	 * This method is used to retrieve the configurable options of the element.
	 * @return array The list of options that compose the element and then passed as the argument for the render() function
	 */
	function options()
	{
		$uid = $this->data['uid'];

		$options = array(
			'has_tabs'  => true,

			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#xbDEvjZH5Y8',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),

		);
		return $options;
	}
}

ZNB()->elements_manager->registerElement( new ZNB_PageContent( array(
	'id' => 'DnPageContent',
	'name' => __( 'Page Content', 'dannys-restaurant' ),
	'description' => __( 'This element will display the page\'s native content added into the backend editor.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Content, post, page',
	'legacy' => false,
	'keywords' => array( 'page' ),
) ) );
