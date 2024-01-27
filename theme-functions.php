<?php if( ! defined('ABSPATH') ){
	exit;
}

/**
 * Implodes an array with spaces. Useful for classes or attributes.
 * @param  array $arr array
 * @return string      string united
 */
if( !function_exists('zn_join_spaces') ){
	function zn_join_spaces( $arr ){
		if(empty($arr)) return;
		return implode( ' ', array_unique( $arr ) );
	}
}

add_filter('zn_default_link_target_type', 'zn_add_link_targets');
if(!function_exists('zn_add_link_targets')):
	function zn_add_link_targets($targets){
		return array_merge($targets, array(
			'modal' 		=> __( "Modal Image", 'dannys-restaurant' ),
			'modal_iframe' 	=> __( "Modal Iframe", 'dannys-restaurant' ),
			'modal_inline' 	=> __( "Modal Inline content", 'dannys-restaurant' ),
			'smoothscroll' 	=> __( "Smooth Scroll to Anchor", 'dannys-restaurant' )
		));
	}
endif;


add_filter('zn_default_link_target_html', 'zn_get_target_html', 1, 2);
if(!function_exists('zn_get_target_html')):
	function zn_get_target_html($link_target, $target){

		if ( $target == 'modal_image' || $target == 'modal' )
		{
			$link_target = 'data-lightbox="image"';
		}
		else if ( $target == 'modal_iframe' )
		{
			$link_target = 'data-lightbox="iframe"';
		}
		else if ( $target == 'modal_inline' )
		{
			$link_target = 'data-lightbox="inline"';
		}
		else if ( $target == 'modal_inline_dyn' )
		{
			$link_target = 'data-lightbox="inline-dyn"';
		}
		else if ( $target == 'smoothscroll' )
		{
			$link_target = 'data-target="smoothscroll"';
		}

		return $link_target;
	}
endif;

add_filter( 'zn_get_button_styles', 'zn_get_button_styles' );
if ( !function_exists( 'zn_get_button_styles' ) )
{
	function zn_get_button_styles()
	{
		$path = get_template_directory_uri() . '/assets/img/admin/button_icons';
		return array(

			array(
				'value' => 'btn-primary',
				'name'  => __( 'Flat', 'dannys-restaurant' ),
				'image' => $path .'/flat.jpg'
			),
			array(
				'value' => 'btn-default',
				'name'  => __( 'Lined', 'dannys-restaurant' ),
				'image' => $path .'/lined.jpg'
			),
			array(
				'value' => 'btn-text',
				'name'  => __( 'Simple Text', 'dannys-restaurant' ),
				'image' => $path .'/simplelinktext.jpg'
			),
			array(
				'value' => 'btn-underline btn-underline--thin',
				'name'  => __( 'Simple Underline Thin', 'dannys-restaurant' ),
				'image' => $path .'/simpleunderlinethin.jpg'
			),
			array(
				'value' => 'btn-underline btn-underline--thick',
				'name'  => __( 'Simple Underline Thick', 'dannys-restaurant' ),
				'image' => $path .'/simpleunderlinethick.jpg'
			),

		);
	}
}


if ( ! function_exists( 'dannys_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dannys_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'dannys-restaurant' );

	// Get Categories for posts.
	$categories_list = get_the_category_list( $separate_meta );

	// Get Tags for posts.
	$tags_list = get_the_tag_list( '', $separate_meta );

	// We don't want to output .dn-blogItem-footer if it will be empty, so make sure its not.
	if ( ( ( dannys_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="dn-blogItem-footer">';

			if ( 'post' === get_post_type() ) {
				if ( ( $categories_list && dannys_categorized_blog() ) || $tags_list ) {
					echo '<div class="dn-footerLinks">';

						// Make sure there's more than one category before displaying.
						if ( $categories_list && dannys_categorized_blog() ) {
							echo '<div class="dn-footerLinksItem dn-footerCats"><span class="screen-reader-text">' . __( 'Categories', 'dannys-restaurant' ) . '</span>';
							echo '<span class="dn-footerLinksItem-head dn-footerCats-head">' . dannys_get_svg( array( 'icon' => 'cat' ) ) . __( 'Categories', 'dannys-restaurant' ) . '</span>';
							echo '<span class="dn-footerLinksItem-list dn-footerCats-list">' . $categories_list . '</span>';
							echo '</div>';
						}

						if ( $tags_list ) {
							echo '<div class="dn-footerLinksItem dn-footerTags"><span class="screen-reader-text">' . __( 'Tags', 'dannys-restaurant' ) . '</span>';
							echo '<span class="dn-footerLinksItem-head dn-footerTags-head">' . dannys_get_svg( array( 'icon' => 'hashtag' ) ) . __( 'Tags', 'dannys-restaurant' ) . '</span>';
							echo '<span class="dn-footerLinksItem-list dn-footerTags-list">' . $tags_list . '</span>';
							echo '</div>';
						}

					echo '</div>';
				}
			}

		echo '</footer>';
	}
}
endif;



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function dannys_categorized_blog() {
	$category_count = get_transient( 'dannys_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'dannys_categories', $category_count );
	}

	return $category_count > 1;
}


/**
 * Flush out the transients used in dannys_categorized_blog.
 */
function dannys_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'dannys_categories' );
}
add_action( 'edit_category', 'dannys_category_transient_flusher' );
add_action( 'save_post',     'dannys_category_transient_flusher' );



/**
 * Child theme customisations
 */
function dannys_excerpt_length($length) {
	// Changing excerpt length
	// words
	return $length;
}
add_filter('excerpt_length', 'dannys_excerpt_length');

function dannys_excerpt_more($more) {
	// Changing excerpt more
	return $more;
}
add_filter('excerpt_more', 'dannys_excerpt_more');



// Function to return svg arrow markup
if(!function_exists('dannys_svgArrows')):
function dannys_svgArrows($dir = 'prev'){
	$arrows = array(
		"prev" => '<span class="u-svgArrows u-svgArrows-prev">'. dannys_get_svg( array( 'icon' => 'arrow-left' ) ) .'</span>',
		"next" => '<span class="u-svgArrows u-svgArrows-next">'. dannys_get_svg( array( 'icon' => 'arrow-right' ) ) .'</span>',
	);
	return $arrows[$dir];
}
endif;


/**
 * Pagination Customisation
 */
if(!function_exists('zn_change_pagination_texts')):
	add_filter( 'zn_pagination', 'zn_change_pagination_texts' );
	function zn_change_pagination_texts( $args )
	{
		$args[ 'list_class' ] = 'dn-paginationList';
		$args[ 'previous_text' ] = dannys_svgArrows('prev');
		$args[ 'older_text' ] = dannys_svgArrows('next');
		return $args;
	}
endif;

// Add Custom class
if ( ! function_exists( 'dannys_posts_link_attributes_prev' ) ):
	add_filter('previous_posts_link_attributes', 'dannys_posts_link_attributes_prev' );
	function dannys_posts_link_attributes_prev() {
		return 'class="pagination-item-link pagination-item-prev-link" data-title="'. __('prev', 'dannys-restaurant') .'"';
	}
endif;
// Add Custom class
if ( ! function_exists( 'dannys_posts_link_attributes_next' ) ):
	add_filter('next_posts_link_attributes', 'dannys_posts_link_attributes_next' );
	function dannys_posts_link_attributes_next() {
		return 'class="pagination-item-link pagination-item-next-link" data-title="'. __('next', 'dannys-restaurant') .'"';
	}
endif;


/**
 * Get page breadcrumbs
 * @param  array  $args Arguments
 * @return string       Markup HTML
 */
function dannys_get_breadcrumbs()
{
	if(dannys_breadcrumbs_enabled()){
		dannys_breadcrumb_trail();
	}
}

/**
 * Determine if the breadcrumbs is enabled
 * @return bool
 */
function dannys_breadcrumbs_enabled(){

	if(!function_exists('breadcrumb_trail')) return;

	$breadcrumbs = zget_option('show_breadcrumbs', 'general_options', false, 'yes');

	if ( is_singular() )
	{
		$id = zn_get_the_id();
		$page_breadcrumbs = get_post_meta( $id, 'dannys_post_show_breadcrumbs', true );

		if ( !empty( $page_breadcrumbs ) ) {
			$breadcrumbs = $page_breadcrumbs;
		}
	}

	// Decide on home/frontpage
	if( is_home() || is_front_page() ) {
		$breadcrumbs = zget_option('show_breadcrumbs_frontpage', 'general_options', false, 'no');
	}

	if( $breadcrumbs == 'yes' ){
		return true;
	}

	return false;
}


/**
 * Breadcrumbs markup
 */
function dannys_breadcrumb_trail( $args = array() ){

	$defaults = array(
		'class_head_position' => 'dn-breadcrumbs--header'. ucfirst ( zget_meta_option( 'head_position', 'general_options', false, 'relative' ) ),
		'text_style' => zget_option('breadcrumbs_text_style', 'general_options', false, 'dark'),
		'show_current' => zget_option( 'breadcrumbs_show_current', 'general_options', false, 'yes' ) == 'yes' ? true : false,
		'home_label' => zget_option( 'breadcrumbs_home_text', 'general_options', false, esc_html__( 'Home', 'dannys-restaurant' ) ),
		'class' => '',
		'attributes' => '',
	);

	$args = wp_parse_args( $args, $defaults );

	// Get Site Header's Position (relative | absolute)
	$classes[] = $args['class_head_position'];
	$classes[] = 'dn-breadcrumbs--' . $args['text_style'];
	$classes[] = $args['class'];

	?>
	<section class="dn-breadcrumbs <?php echo zn_join_spaces($classes); ?>" <?php echo $args['attributes']; ?> >
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php

					if( function_exists('breadcrumb_trail') ):
						breadcrumb_trail(array(
							'show_browse'     => false,
							'show_title'      => $args['show_current'],
							'labels' => array(
								'home' => $args['home_label'],
							)
						));
					endif;

					?>
					<hr class="dn-breadcrumbsSep">
				</div>
			</div>
		</div>
	</section><!-- /.dn-breadcrumbs -->

<?php }


/**
 * Recursive wp_parse_args WordPress function which handles multidimensional arrays
 * @url http://mekshq.com/recursive-wp-parse-args-wordpress-function/
 * @param  array &$a Args
 * @param  array $b Defaults
 */
function zn_wp_parse_args( &$a, $b )
{
	$a = (array)$a;
	$b = (array)$b;
	$result = $b;
	foreach ( $a as $k => &$v )
	{
		if ( is_array( $v ) && isset( $result[ $k ] ) )
		{
			$result[ $k ] = zn_wp_parse_args( $v, $result[ $k ] );
		}
		else
		{
			$result[ $k ] = $v;
		}
	}
	return $result;
}


/**
 * Register menus
 */
add_action( 'init', 'dannys_register_menu' );
if ( !function_exists( 'dannys_register_menu' ) )
{
	/**
	 * Register menus
	 */
	function dannys_register_menu()
	{
		if ( function_exists( 'wp_nav_menu' ) )
		{
			register_nav_menus( array(
				'main_navigation' => esc_html__( 'Main Navigation', 'dannys-restaurant' )
			) );
			register_nav_menus( array(
				'topbar_navigation' => esc_html__( 'Top Bar Navigation', 'dannys-restaurant' ),
			) );
			register_nav_menus( array(
				'footer_navigation' => esc_html__( 'Footer Navigation', 'dannys-restaurant' ),
			) );
		}
	}
}



if ( !function_exists( 'dannys_smart_slider_css' ) ):
	/**
	 * Function to generate custom CSS based on breakpoints
	 */
	function dannys_smart_slider_css( $opt, $selector, $def_property = 'height', $def_unit = 'px' )
	{
		$css = '';

		if ( is_array( $opt ) && !empty( $opt ) )
		{

			$breakp = isset( $opt[ 'breakpoints' ] ) ? $opt[ 'breakpoints' ] : '';
			$prop = isset( $opt[ 'properties' ] ) ? $opt[ 'properties' ] : $def_property;

			// Default Unit
			$unit_lg = isset( $opt[ 'unit_lg' ] ) ? $opt[ 'unit_lg' ] : $def_unit;

			if( $opt[ 'lg' ] != '' ){
				$css .= $selector . ' {' . $prop . ':' . $opt[ 'lg' ] . $unit_lg . ';}';
			}

			if ( !empty( $breakp ) )
			{
				if ( isset( $opt[ 'md' ] ) && !empty( $opt[ 'md' ] ) )
				{
					$unit_md = isset($opt[ 'unit_md' ]) ? $opt[ 'unit_md' ] : $def_unit;
					$md_val = $opt[ 'md' ] . $unit_md;
					if ( $opt[ 'md' ] == 'auto' )
					{
						$md_val = $opt[ 'md' ];
					}
					$css .= '@media (min-width:992px) and (max-width:1199px) {' . $selector . ' {' . $prop . ':' . $md_val . ';} }';
				}
				if ( isset( $opt[ 'sm' ] ) && !empty( $opt[ 'sm' ] ) )
				{
					$unit_sm = isset($opt[ 'unit_sm' ]) ? $opt[ 'unit_sm' ] : $def_unit;
					$sm_val = $opt[ 'sm' ] . $unit_sm;
					if ( $opt[ 'sm' ] == 'auto' )
					{
						$sm_val = $opt[ 'sm' ];
					}
					$css .= '@media (min-width:768px) and (max-width:991px) {' . $selector . ' {' . $prop . ':' . $sm_val . ';} }';
				}
				if ( isset( $opt[ 'xs' ] ) && !empty( $opt[ 'xs' ] ) )
				{
					$unit_xs = isset($opt[ 'unit_xs' ]) ? $opt[ 'unit_xs' ] : $def_unit;
					$xs_val = $opt[ 'xs' ] . $unit_xs;
					if ( $opt[ 'xs' ] == 'auto' )
					{
						$xs_val = $opt[ 'xs' ];
					}
					$css .= '@media (max-width:767px) {' . $selector . ' {' . $prop . ':' . $xs_val . ';} }';
				}
			}
		}
		else
		{
			if ( !empty( $opt ) )
			{
				$css .= $selector . ' {' . $def_property . ':' . $opt . $def_unit . ';}';
			}
		}

		return $css;
	}
endif;

function dannys_typography_css_output($typo = array()){
	$out = '';
	if( !empty($typo) ){
		foreach( $typo as $key => $value ){
			if( !empty($value) ){
				$out .= $key .':'. $value.';';
			}
		}
	}
	return $out;
}

/**
 * Function to unite an array of classes used by breakpoint hide options
 * @param  array  $brp Array of breakpoint values, eg: array('lg', 'md')
 * @return string      String of united classes, eg: "hidden-lg hidden-md"
 */
function dannys_breakpoint_classes_output($brp = array()){

    if ( empty( $brp ) ) {
        return;
    }

	$classes = array();
	foreach( $brp as $value ){
		$classes[] = 'hidden-' . $value;
	}
	return zn_join_spaces($classes);
}


function dannys_alignment_breakpoint_classes_output($brp = array()){

	if(empty($brp)) return;

	$classes = array();
	foreach( $brp as $k => $value ){
		if( !empty($value) )
			$classes[] = 'text-' . ($k != 'lg' ? $k . '-' : '' ) . $value;
	}
	return zn_join_spaces($classes);
}

add_action( 'wp_head', 'dannys_add_meta_viewport' );
if ( !function_exists( 'dannys_add_meta_viewport' ) )
{
	function dannys_add_meta_viewport()
	{
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<?php
	}
}




/**
 * Create CSS for typography option-types (with breakpoints)
 */
if ( !function_exists( 'zn_typography_css' ) )
{
	function zn_typography_css( $args = array() )
	{

		$css = '';
		$defaults = array(
			'selector' => '',
			'lg' => array(),
			'md' => array(),
			'sm' => array(),
			'xs' => array(),
		);
		$args = wp_parse_args( $args, $defaults );

		if ( empty( $args[ 'selector' ] ) )
		{
			return;
		}

		$brp = array( 'lg', 'md', 'sm', 'xs' );

		foreach ( $brp as $k )
		{

			if ( is_array( $args[ $k ] ) & !empty( $args[ $k ] ) )
			{

				$brp_css = '';
				foreach ( $args[ $k ] as $key => $value )
				{
					if ( $value != '' )
					{
						if ( $key == 'font-family' )
						{
							$brp_css .= $key . ':' . zn_convert_font( $value ) . ';';
						}
						else
						{
							$brp_css .= $key . ':' . $value . ';';
						}
					}
				}

				if ( !empty( $brp_css ) )
				{
					$mq = zn_wrap_mediaquery( $k, $args[ 'selector' ] );
					$css .= $mq[ 'start' ];
					if ( !empty( $brp_css ) )
					{
						$css .= $brp_css;
					}
					$css .= $mq[ 'end' ];
				}
			}
		}

		return $css;
	}
}

if ( !function_exists( 'zn_convert_font' ) )
{
	function zn_convert_font( $fontfamily )
	{

		$fonts = array(
			'arial' => 'Arial, sans-serif',
			'verdana' => 'Verdana, Geneva, sans-serif',
			'trebuchet' => '"Trebuchet MS", Helvetica, sans-serif',
			'georgia' => 'Georgia, serif',
			'times' => '"Times New Roman", Times, serif',
			'tahoma' => 'Tahoma, Geneva, sans-serif',
			'palatino' => '"Palatino Linotype", "Book Antiqua", Palatino, serif',
			'helvetica' => 'Helvetica, Arial, sans-serif'
		);

		if ( array_key_exists( $fontfamily, $fonts ) )
		{
			$fontfamily = $fonts[ $fontfamily ];
		}
		else
		{
			// Google Font
			$fontfamily = '"' . $fontfamily . '", Helvetica, Arial, sans-serif;';
		}

		return $fontfamily;
	}
}


/**
 * Wrap CSS into media query
 */
if ( !function_exists( 'zn_wrap_mediaquery' ) )
{
	function zn_wrap_mediaquery( $breakpoint = 'lg', $selector = '' )
	{

		$mq = array();
		$mq[ 'start' ] = '';
		$mq[ 'end' ] = '';

		if ( !empty( $selector ) )
		{
			$selector = $selector . '{';
		}

		$mq_lg = $selector;
		$mq_md = '@media screen and (min-width: 992px) and (max-width: 1199px){';
		$mq_sm = '@media screen and (min-width: 768px) and (max-width:991px){';
		$mq_xs = '@media screen and (max-width: 767px){';
		$mq_end = '}';

		if ( $breakpoint == 'lg' )
		{
			$mq[ 'start' ] = $mq_lg;
			$mq[ 'end' ] = $mq_end;
		}
		elseif ( $breakpoint == 'md' )
		{
			$mq[ 'start' ] = $mq_md . $selector;
			$mq[ 'end' ] = $mq_end . $mq_end;
		}
		elseif ( $breakpoint == 'sm' )
		{
			$mq[ 'start' ] = $mq_sm . $selector;
			$mq[ 'end' ] = $mq_end . $mq_end;
		}
		elseif ( $breakpoint == 'xs' )
		{
			$mq[ 'start' ] = $mq_xs . $selector;
			$mq[ 'end' ] = $mq_end . $mq_end;
		}

		return $mq;
	}
}



/**
 * Check if this is a subpage
 */
if ( !function_exists( 'is_subpage' ) )
{
	/**
	 * Check if this is a subpage
	 * @return bool|int
	 */
	function is_subpage()
	{
		global $post;                              // load details about this page
		if ( is_page() && $post->post_parent )
		{   // test to see if the page has a parent
			return $post->post_parent;             // return the ID of the parent post
		}
		return false;
	}
}


/**
 * Display Google analytics to page
 */
add_action( 'wp_footer', 'add_googleanalytics' );
if ( !function_exists( 'add_googleanalytics' ) )
{
	/**
	 * Display Google analytics to page
	 * @hooked to wp_footer
	 * @see functions.php
	 */
	function add_googleanalytics()
	{
		if ( $google_analytics = zget_option( 'google_analytics', 'general_options' ) )
		{
			echo stripslashes( $google_analytics );
		}
	}
}


/**
 * Retrieve all sidebars from the theme.
 * @since 1.0.0
 * @return array
 */
function dannys_get_theme_sidebars(){
	$sidebars = array ();
	$sidebars['defaultsidebar'] = __( 'Default Sidebar', 'dannys-restaurant' );
	if ( $unlimited_sidebars = zget_option( 'unlimited_sidebars', 'unlimited_sidebars' ) ) {
		foreach ( $unlimited_sidebars as $sidebar ) {
			if (isset($sidebar['sidebar_name']) && !empty($sidebar['sidebar_name'])) {
				$sidebars[ $sidebar['sidebar_name'] ] = $sidebar['sidebar_name'];
			}
		}
	}
	return $sidebars;
}

/**
 * LOAD META BOXES
 */

add_action( 'znhgfw_register_metabox_locations', 'dannys_register_metabox_locations' );
add_action( 'znhgfw_register_metabox_options', 'dannys_register_metabox_options' );

function dannys_register_metabox_locations( $metaboxClass ) {
	$zn_meta_locations = array();

	if ( file_exists( get_template_directory() . '/inc/metaboxes/metaboxes_locations.php' ) ) {
		include_once( get_template_directory() . '/inc/metaboxes/metaboxes_locations.php' );
	}

	$zn_meta_locations = apply_filters( 'dannys_metabox_locations', $zn_meta_locations );

	foreach ( $zn_meta_locations as $metabox_location ) {
		$metaboxClass->register_meta_location(
			$metabox_location[ 'slug' ],
			array(
				'title' => $metabox_location[ 'title' ],
				'post_type' => $metabox_location[ 'page' ],
				'context' => $metabox_location[ 'context' ],
				'priority' => $metabox_location[ 'priority' ] )
			);
	}
}

function dannys_register_metabox_options( $metaboxClass ) {
	$zn_meta_elements = array();

	if ( file_exists( get_template_directory() . '/inc/metaboxes/metaboxes.php' ) ) {
		include_once( get_template_directory() . '/inc/metaboxes/metaboxes.php' );
	}

	$metaboxes_options = apply_filters( 'dannys_metabox_elements', $zn_meta_elements );

	foreach ( $metaboxes_options as $metabox_option ) {
		$metaboxClass->register_meta_option( $metabox_option );
	}
}

add_filter('get_the_archive_title', 'dannys_home_archive_title', 10);
function dannys_home_archive_title($title){

	if ( is_home() ){
		if( $custom_title = zget_option( 'archive_page_title', 'blog_options', false, '' ) ){
			$title = $custom_title;
		}
	}
	return $title;
}



/**
 * Add SVG Sprite definitions to the footer.
 */
function dannys_include_svg_icons() {

	if ( file_exists( get_template_directory() . '/assets/img/svg-icons.svg' ) ) {
		require_once( get_template_directory() . '/assets/img/svg-icons.svg' );
	}

}
add_action( 'wp_footer', 'dannys_include_svg_icons', 9999 );

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function dannys_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'dannys-restaurant' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'dannys-restaurant' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * Dannys theme doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo dannys_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo dannys_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="dn-icon dn-icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	$svg .= '</svg>';

	return $svg;
}

add_filter('comment_form_fields', 'dannys_add_custom_css_classes_comment_inputs', 10);
function dannys_add_custom_css_classes_comment_inputs($fields){

	foreach ($fields as $key => $value) {
		$fields[$key] = str_replace(array('type="text"', 'id="comment"', 'id="email"'), array( 'type="text" class="form-control"', 'id="comment" class="form-control"', 'id="email" class="form-control"' ), $value );

		// $fields[$key] = str_replace('type="text"', 'type="text" class="form-control"', $value );
	}
	return $fields;
}


if ( ! function_exists( 'dannys_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
function dannys_edit_link() {

	$link = edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'dannys-restaurant' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);

	return $link;
}
endif;


/**
 * Retrieve the post attachment URL
 */
if ( !function_exists( 'dannys_find_first_image_src' ) )
{
	/**
	 * Retrieve the post attachment URL
	 * @return bool|string
	 */
	function dannys_find_first_image_src()
	{
		global $post;

		$id = $post->ID;

		// Check if the post has any images
		$post = get_post( $id );

		preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );

		if ( isset( $matches[ 1 ][ 0 ] ) )
		{
			if ( !empty( $matches[ 1 ][ 0 ] ) && basename( $matches[ 1 ][ 0 ] ) != 'trans.gif' )
			{
				return esc_url( $matches[ 1 ][ 0 ] );
			}
			elseif ( isset( $matches[ 1 ][ 1 ] ) && !empty( $matches[ 1 ][ 1 ] ) )
			{
				return esc_url( $matches[ 1 ][ 1 ] );
			}
		}

		return '';
	}
}

/**
 * Show first image of a given post
 * @param  string $size image size
 * @return bool | HTML markup for image
 */
function dannys_echo_first_img($size = 'thumbnail', $attr = ''){

	if( dannys_find_first_image_src() ){
		$img = ZngetAttachmentIdFromUrl( dannys_find_first_image_src() );
		return wp_get_attachment_image( $img, $size, false, $attr );
	}
	return false;
}

/**
 * Check if "Use First attached image" option is enabled
 * @return bool true
 */
function dannys_option_use_first_image(){
	return (zget_option( 'use_first_image', 'blog_options' , false, 'yes' ) == 'yes');
}

/**
 * Check if it can "Use First attached image"
 * @return bool
 */
function dannys_can_use_first_image(){
	return (bool) (dannys_option_use_first_image() && ! post_password_required() && dannys_find_first_image_src() );
}

/**
 * Get featured image or the first attached image in post
 * @param string|array $size Optional. Image size to use. Accepts any valid image size, or
 *                           an array of width and height values in pixels (in that order).
 *                           Default 'post-thumbnail'.
 * @param string|array $attr Optional. Query string or array of attributes. Default empty.
 * @return bool|string       Image HTML markup
 */
function dannys_get_featured_or_first_img( $size = 'thumbnail', $attr = '' ){
	// Show Featured
	if ( '' !== get_the_post_thumbnail() ) {
		return the_post_thumbnail( $size, $attr );
	}
	// Show First
	elseif ( dannys_can_use_first_image() ) {
		return dannys_echo_first_img( $size, $attr );
	}
	return false;
}

add_action('widgets_init', 'dannys_register_sidebars');

if ( !function_exists( 'dannys_register_sidebars' ) )
{
	/**
	 * Register theme sidebars
	 */
	function dannys_register_sidebars()
	{
		if ( function_exists( 'register_sidebar' ) )
		{

			$sidebar_widget_title_tag = apply_filters('dannys_sidebar_widget_title_tag', 'h3');

			// Custom Widget Classes
			$sidebar_widget_classes = apply_filters('dannys_sidebar_widget_classes', array('text-center'));
			$sidebar_widget_classes = implode( ' ', $sidebar_widget_classes );

			/**
			 * Default sidebar
			 */
			register_sidebar( array(
				'name' => 'Default Sidebar',
				'id' => 'defaultsidebar',
				'description' => esc_html__( "This is the default sidebar. You can choose from the theme's options page where
										the widgets from this sidebar will be shown.", 'dannys-restaurant' ),
				'before_widget' => '<div id="%1$s" class="dn-widget '.$sidebar_widget_classes.' %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<'.$sidebar_widget_title_tag.' class="dn-widgetTitle '.$sidebar_widget_title_tag.'">',
				'after_title' => '</'.$sidebar_widget_title_tag.'>'
			) );

			/**
			 * Dynamic sidebars
			 */
			if ( $unlimited_sidebars = zget_option( 'unlimited_sidebars', 'unlimited_sidebars' ) )
			{
				foreach ( $unlimited_sidebars as $sidebar )
				{
					if ( $sidebar[ 'sidebar_name' ] )
					{
						register_sidebar( array(
							'name' => $sidebar[ 'sidebar_name' ],
							'id' => zn_sanitize_widget_id( $sidebar[ 'sidebar_name' ] ),
							'before_widget' => '<div id="%1$s" class="dn-widget '.$sidebar_widget_classes.' %2$s">',
							'after_widget' => '</div>',
							'before_title' => '<'.$sidebar_widget_title_tag.' class="dn-widgetTitle '.$sidebar_widget_title_tag.'">',
							'after_title' => '</'.$sidebar_widget_title_tag.'>'
						) );
					}
				}
			}
		}
	}
}

/**
 * Get the sidebar type
 * @param  string $layout Type of sidebar assigned in Sidebar settings
 * @return string         Type of sidebar matched with the page/post/archive type
 */
function dannys_sidebar_layout( $layout = 'blog_sidebar' ){

	if( is_page() || is_404() || is_attachment() ) $layout = 'page_sidebar';
	elseif( is_archive() ) $layout = 'archive_sidebar';
	elseif( is_singular() ) $layout = 'single_sidebar';

	return apply_filters('dannys_filter_sidebar_layout', $layout);
}

/**
 * Get the sidebar's position
 * @param  string $sidebar_position Sidebar position or if it's disabled
 * @return string                   Position
 */
function dannys_sidebar_position( $sidebar_position = 'no' ){

	// Determine layout from Sidebar settings in Theme Options
	$sidebar_data = zget_option( dannys_sidebar_layout(), 'unlimited_sidebars' , false , array( 'layout' => 'right' , 'sidebar' => 'defaultsidebar' ) );
	$sidebar_position = $sidebar_data['layout'];

	// Determine layout from page options
	if( $sidebar_per_page = get_post_meta( zn_get_the_id(), 'dannys_sidebar_position', true ) ){
		$sidebar_position = $sidebar_per_page;
	}

	return apply_filters('dannys_filter_sidebar_position', $sidebar_position);
}

/**
 * Get the sidebar source. Will add the widgets from this source.
 * @param  string $sidebar_source Default source
 * @return string                 The source
 */
function dannys_sidebar_source( $sidebar_source = 'defaultsidebar' ){

	// Determine layout from Sidebar settings in Theme Options
	$sidebar_data = zget_option( dannys_sidebar_layout(), 'unlimited_sidebars' , false , array( 'layout' => 'right' , 'sidebar' => 'defaultsidebar' ) );
	$sidebar_source = $sidebar_data['sidebar'];

	// Determine layout from page options
	if( is_singular() && $sidebar_per_page = get_post_meta( zn_get_the_id(), 'dannys_sidebar_source', true ) ){
		$sidebar_source = $sidebar_per_page;
	}

	return apply_filters('dannys_filter_sidebar_source', $sidebar_source);
}

/**
 * Array of classes added to the main row that contains the main content and sidebar
 * @return array List of classes
 */
function dannys_get_sidebar_class() {

	$classes = array();

	// Determined position
	$classes[] = 'dn-contentRow--sidebar-' . dannys_sidebar_position();

	/**
	 * Add/edit/remove classes applied to the content row
	 * @var array
	 *
	 * Extra classes:
	 * dn-contentRow--biggerSidebar = Will make the sidebar bigger, ~1/3 of the content
	 * dn-contentRow--flipMobile    = Will flip the order of the content on mobiles (eg: sidebar first on mobile)
	 */
	$classes = apply_filters( 'dannys_sidebar_classes', $classes );

	return zn_join_spaces( $classes );
}

/**
 * Adds classes to the main site content section
 * @return array List of classes
 */
function dannys_site_content_class(){

	$classes = array();

	if( is_page() || is_404() || is_attachment() ) {
		$classes[] = 'dn-isPage';
	}
	if( is_archive() ) {
		$classes[] = 'dn-isArchive';
	}
	if( is_tax() ) {
		$classes[] = 'dn-isTax';
	}
	if( is_singular() ) {
		$classes[] = 'dn-isSingle';
	}
	if( dannys_pb_enabled() ) {
		$classes[] = 'dn-isPageBuilder';
	}
	if( dannys_pb_active() ) {
		$classes[] = 'dn-isBuilderActive';
	}

	/**
	 * Add/edit/remove classes applied to the content main content section
	 */
	$classes = apply_filters( 'dannys_filter_site_content_classes', $classes );

	return zn_join_spaces( $classes );
}


function dannys_site_container_class(){

	$classes = array();

	// Check if page builder is enabled
	if( !dannys_pb_enabled() ){
		$classes[] = 'container';
	}

	/**
	 * Add/edit/remove classes applied to the content main container section
	 */
	$classes = apply_filters( 'dannys_filter_site_container_classes', $classes );

	return zn_join_spaces( $classes );
}



if ( ! function_exists( 'dannys_before_content' ) ) {
	/**
	 * Before Content
	 * Wraps all WooCommerce content in wrappers which match the theme markup
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function dannys_before_content() {
		?>
		<div class="dn-contentRow <?php echo dannys_get_sidebar_class(); ?>">
			<div id="mainbody" class="dn-mainBody" <?php echo zn_schema_markup('main'); ?>>
		<?php
	}
}

if ( ! function_exists( 'dannys_after_content' ) ) {
	/**
	 * After Content
	 * Closes the wrapping divs
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function dannys_after_content() {
		?>
			</div><!-- /.dn-mainBody -->
			<?php get_sidebar(); ?>
		</div><!-- /.dn-contentRow -->

		<?php
	}
}




function dannys_pb_enabled(){
	return function_exists('ZNB') && ZNB()->utility->isPageBuilderEnabled();
}

function dannys_pb_active(){
	return function_exists('ZNB') && ZNB()->utility->isActiveEditor();
}


/*
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 *
 * php 5.2+
 *
 * Exemplo de uso:
 *
 * <?php
 * $thumb = get_post_thumbnail_id();
 * $image = vt_resize($thumb, '', 140, 110, true);
 * ?>
 * <img src="<?php echo esc_url( $image[url] ); ?>" width="<?php echo esc_attr( $image[width] ); ?>" height="<?php echo esc_attr( $image[height] ); ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
*/
if ( !function_exists( 'dannys_vt_resize' ) )
{
	/**
	 * @param null $attach_id
	 * @param null $img_url
	 * @param int $width
	 * @param int $height
	 * @param bool $crop
	 *
	 * @return array
	 */
	function dannys_vt_resize( $attach_id = null, $img_url = null, $width = 0, $height = 0, $crop = false )
	{

		if ( $attach_id )
		{
			$img_url = wp_get_attachment_url( $attach_id );
		}
		$image = mr_image_resize( $img_url, $width, $height, $crop, 'c', false );

		if ( $image != 'image_not_specified' && $image != 'getimagesize_error_common' && $image != '' ) {
			return $image;
		}
		else {
			return $img_url;
		}
	}
}




/**
 * Retrieve all shop categories as an associative array: id => name
 * @requires plugin WooCommerce installed and active
 * @return array
 */
function dannys_get_shop_categories(){
	$args = array (
		'type'         => 'shop',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'id',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false
	);

	$shop_categories = get_categories( $args );

	$categories = array ();
	if ( ! empty( $shop_categories ) ) {
		foreach ( $shop_categories as $category ) {
			if ( isset( $category->cat_ID ) && isset( $category->cat_name ) ) {
				$categories[ $category->cat_ID ] = $category->cat_name;
			}
		}
	}
	return $categories;
}

/**
 * Page pre-loading
 */
add_action( 'dannys_after_body', 'dannys_page_loading', 10 );
if ( !function_exists( 'dannys_page_loading' ) ):
	function dannys_page_loading()
	{
		if ( ($page_preloader = zget_option( 'page_preloader', 'general_options', false, 'no' )) && $page_preloader != 'no' ) {

			echo '<div id="page-loading" class="dn-pageLoading dn-pageLoading--'.$page_preloader.'" style="color:'. zget_option( 'page_preloader_bg' , 'general_options', false, '' ) .'">';

				echo '<div class="dn-pageLoading-inner">';
					if( $page_preloader_img = zget_option( 'page_preloader_img', 'general_options', false, '' ) ){
						echo '<img src="' . $page_preloader_img . '" alt="image-preloader">';
					}
					else {
						echo '<span class="dn-pageLoading-fallback">'. __('LOADING', 'dannys-restaurant') .'</span>';
					}
				echo '</div>';

			echo '</div>';
		}
	}
endif;


// Add inline css to page
	add_action( 'wp_head', 'dannys_pageMeta_inlineCss' );
	function dannys_pageMeta_inlineCss(){

		$css = '';

		if( $header_bg_color = zget_meta_option( 'header_bg_color', 'general_options', false, '' ) ){
			$css .= ".dn-siteHeader.dn-stickyHeader--off {background-color:{$header_bg_color}}";
		}

		$menu_font = zget_meta_option( 'menu_font', 'general_options', false, array() );
		$menu_font = array_filter($menu_font);
		if(!empty($menu_font)){
			$menufont_styles = dannys_typography_css_output( $menu_font );
			$css .= ".dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link {{$menufont_styles}}";
		}

		// Active menu item
		if( $menu_font_active = zget_meta_option( 'menu_font_active', 'general_options', false, false ) ){
			$css .= "
			.dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link:hover,
			.dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link:focus,
			.dn-mainNav .menu-item.menu-item-depth-0:hover > .main-menu-link,
			.dn-mainNav .menu-item.menu-item-depth-0.current-menu-item > .main-menu-link {color:{$menu_font_active};}";
			$css .= ".dn-mainNav .menu-item.menu-item-depth-0 > .main-menu-link::after {background-color:{$menu_font_active};}";
		}

		if(!empty($css) && function_exists('ZNHGFW')){
			ZNHGFW()->getComponent('scripts-manager')->add_inline_css( $css );
		}
	}


/**
 * Load Elements
 */
add_action( 'znb:elements:register_elements', 'dannys_register_elements' );
function dannys_register_elements( $zionBuilder ){
	// Include the element file
	$elements_path = get_template_directory() . '/zion-elements';
	// Load elements
	require( $elements_path . '/breadcrumbs/breadcrumbs.php' );
	require( $elements_path . '/special_icon/special_icon.php' );
	require( $elements_path . '/blog_archive/blog_archive.php' );
	require( $elements_path . '/post_content/post_content.php' );
	require( $elements_path . '/product_archive/product_archive.php' );
	require( $elements_path . '/product_content/product_content.php' );
	require( $elements_path . '/custom_menu/custom_menu.php' );
	require( $elements_path . '/page_content/page_content.php' );
	require( $elements_path . '/price_list/price_list.php' );
	require( $elements_path . '/image_gallery/image_gallery.php' );
	require( $elements_path . '/section_modal/section_modal.php' );
	require( $elements_path . '/multi_layered/multi_layered.php' );
	require( $elements_path . '/slider/slider.php' );
	require( $elements_path . '/css3_panels/css3_panels.php' );

}


/**
 * Registers an editor stylesheet for the theme.
 */
function dannys_theme_add_editor_styles() {
	add_editor_style();
}
add_action( 'admin_init', 'dannys_theme_add_editor_styles' );

// If zion is not active enqueue fonts and dynamic css from locall assets folder
// Also, include the default google fonts used in demo
