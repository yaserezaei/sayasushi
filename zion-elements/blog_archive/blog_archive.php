<?php if(! defined('ABSPATH')){ return; }

class ZNB_BlogArchive extends ZionElement
{
	function options() {

		$args = array(
			'type' => 'post'
		);

		$post_categories = get_categories($args);

		$option_post_cat = array();

		foreach ($post_categories as $category) {
			$option_post_cat[$category->cat_ID] = $category->cat_name;
		}

		$uid = $this->data['uid'];

		$options = array(
			'has_tabs'  => true,
			'general' => array(
				'title' => 'General options',
				'options' => array(

					array(
						'id'          => 'category',
						'name'        => __('Categories','dannys-restaurant'),
						'description' => __('Select your desired categories for post items to be displayed.','dannys-restaurant'),
						'type'        => 'select',
						'options'	  => $option_post_cat,
						'multiple'	  => true
						),

					array(
						'id'          => 'count',
						'name'        => __('Posts per page','dannys-restaurant'),
						'description' => __('Please choose the desired number of items that will be shown on a page. Please note that if you set this element on the page you use as your posts page in Settings > Reading, you will need to set the Blog pages show at most option to match the value set in this option or you will get 404 errors when using the pagination.','dannys-restaurant'),
						'type'        => 'slider',
						'std'		  => '2',
						'class'		  => 'zn_full',
						'helpers'	  => array(
							'min' => '1',
							'max' => '50',
							'step' => '1'
						),
					),

				),
			),


			'help' => znpb_get_helptab( array(
				// 'video'   => 'https://my.hogash.com/video_category/kallyas-wordpress-theme/#2dkIHxjdCG4',
				// 'docs'    => 'https://my.hogash.com/documentation/blog-archive/',
				'copy'    => $uid,
				'general' => true,
				'custom_id' => true,
			)),
		);
		return $options;
	}

	/**
	 * This method is used to display the output of the element.
	 * @return void
	 */
	function element()
	{

		global $paged;

		// Get the proper page - this resolves the pagination on static frontpage
		if( get_query_var('paged') ){ $paged = get_query_var('paged'); }
		elseif( get_query_var('page') ){ $paged = get_query_var('page'); }
		else{ $paged = 1; }

		$category = $this->opt('category') ? $this->opt('category') : '';
		$count = $this->opt('count')  ? $this->opt('count') : '4';

		$args = array(
			'posts_per_page' => ( int )$count,
			'post_status' => 'publish',
			'paged' => $paged
		);

		if( !empty( $category ) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $category
				),
			);
		}

		$options = $this->data['options'];
		$classes = $attributes = array();
		$uid = $this->data['uid'];

		$classes[] = $uid;
		$classes[] = zn_get_element_classes($options);
		$classes[] = 'zn-blogArchive';

		$attributes[] = zn_get_element_attributes($options, $this->opt('custom_id', $uid));
		$attributes[] = 'class="'.zn_join_spaces($classes).'"';

		// PERFORM THE QUERY
		add_action( 'pre_get_posts', array( $this, 'fix_sticky_posts' ) );
		query_posts( $args );
		remove_action( 'pre_get_posts', array( $this, 'fix_sticky_posts' ) );

		echo '<div '.zn_join_spaces($attributes ).'>';
			get_template_part( 'template-parts/blog/default/archive' );
		echo '</div>';

		// Reset the global $the_post as this query will have stomped on it
		wp_reset_query();
	}

	function fix_sticky_posts( $query ){
		$query->is_home = true;
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
ZNB()->elements_manager->registerElement( new ZNB_BlogArchive( array(
	'id' => 'DnBlogArchive',
	'name' => __( 'Blog Archive', 'dannys-restaurant' ),
	'description' => __( 'This element will display a category archive.', 'dannys-restaurant' ),
	'level' => 3,
	'category' => 'Content',
	'legacy' => false,
	'keywords' => array( 'category', 'news' ),
) ) );
