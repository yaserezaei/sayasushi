<?php if(! defined('ABSPATH')){ return; }

/*--------------------------------------------------------------------------------------------------
	Set-up post data
--------------------------------------------------------------------------------------------------*/

if ( !function_exists( 'zn_setup_post_data' ) )
{
	function zn_setup_post_data( $post_format, $post_content = 'content' )
	{

		global $post;

		$opt_archive_content_type = zget_option( 'archive_content_type', 'blog_options', false, 'full' );

		// CHECK TO SEE IF WE NEED TO WRAP THE ARTICLE
		$post_data[ 'before' ] = ''; // Before the opening article tag
		$post_data[ 'after' ] = ''; // After the closing article tag

		$post_data[ 'before_head' ] = '';
		$post_data[ 'after_head' ] = '';

		$post_data[ 'before_content' ] = '';
		$post_data[ 'after_content' ] = '';

		// Posts defaults
		$post_data[ 'media' ] = zn_get_post_media();
		$post_data[ 'title' ] = get_the_title();

		$the_content = get_the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dannys-restaurant' ),
			get_the_title()
		) );
		$post_data[ 'content' ] = ( ( is_archive() || is_home() ) && $opt_archive_content_type == 'excerpt' ) ? get_the_excerpt() : apply_filters('the_content', $the_content);

		if ( $post_format == 'video' || $post_format == 'audio' ) {
			$post_data[ 'content' ] = $the_content;
		}

		// Separate post content and media
		$post_data = apply_filters( 'post-format-' . $post_format, $post_data );

		return $post_data;
	}
}

if ( !function_exists( 'zn_get_post_media' ) )
{

	function zn_get_post_media()
	{
		$image = $the_image = '';
		$attr = array('class' => 'dn-blogItem-img');
		$size = is_sticky() || is_single() ? 'full' : 'large';

		if ( '' !== get_the_post_thumbnail() ) :
			$the_image = get_the_post_thumbnail( get_the_id(), $size, $attr );
		elseif ( dannys_can_use_first_image() ):
			$the_image = dannys_echo_first_img( $size, $attr );
		endif;

		if( !empty($the_image) ){
			$image .= '<div class="dn-blogItem-imgWrapper">';
				$image .= '<a href="' . get_the_permalink() . '">';
					$image .= $the_image;
				$image .= '</a>';
			$image .= '</div>';
		}
		return $image;
	}
}

add_filter( 'post-format-standard', 'zn_post_standard', 10, 1 );
add_filter( 'post-format-video', 'zn_post_video' );
add_filter( 'post-format-audio', 'zn_post_audio' );
add_filter( 'post-format-quote', 'zn_post_quote' );
add_filter( 'post-format-link', 'zn_post_link' );
add_filter( 'post-format-status', 'zn_post_status' );
add_filter( 'post-format-gallery', 'zn_post_gallery', 10, 2 );


// STANDARD POST
if ( !function_exists( 'zn_post_standard' ) ):
	function zn_post_standard( $current_post ) {
		$current_post[ 'title' ] = zn_wrap_titles( $current_post[ 'title' ] );
		if( is_single() ){
			$current_post[ 'before_head' ] = '<div class="dn-blogItem--formatBefore dn-blogItem-contentMedia">'.$current_post[ 'media' ].'</div>';
			$current_post[ 'media' ] = '';
		}
		return $current_post;
	}
endif;

// STATUS POST
if ( !function_exists( 'zn_post_status' ) ):
	function zn_post_status( $current_post ) {

		$current_post[ 'title' ] = '<div class="dn-blogItem-contentStatus">'.$current_post[ 'content' ].'</div>';
		$current_post[ 'before_head' ] = $current_post[ 'media' ]? '<div class="dn-blogItem--formatBefore dn-blogItem-contentMedia">'.$current_post[ 'media' ].'</div>' : '';

		if( is_single() ){
			$current_post[ 'content' ] = $current_post[ 'title' ];
			$current_post[ 'media' ] = '';
			$current_post[ 'title' ] = '';
		}
		else {
			$current_post[ 'content' ] = '';
		}

		return $current_post;
	}
endif;


// VIDEO POST
if ( !function_exists( 'zn_post_video' ) )
{
	function zn_post_video( $current_post )
	{

		$video = $video_html = false;
		$current_post[ 'title' ] = zn_wrap_titles( $current_post[ 'title' ] );
		$current_post[ 'content' ] = apply_filters( 'the_content', $current_post[ 'content' ] );

		// Only get video from the content if a playlist isn't present.
		if ( false === strpos( $current_post[ 'content' ], 'wp-playlist-script' ) ) {
			$video = get_media_embedded_in_content( $current_post[ 'content' ], array( 'video', 'object', 'embed', 'iframe' ) );
		}

		if ( ! empty( $video ) ) :
			foreach ( $video as $video_html ) {
				$current_post[ 'before_head' ] .= '<div class="dn-blogItem--formatBefore dn-blogItem-contentVideo">';
				$current_post[ 'before_head' ] .= '<div class="embed-responsive embed-responsive-16by9">';
				$current_post[ 'before_head' ] .= $video_html;
				$current_post[ 'before_head' ] .= '</div></div>';
			}
		endif;

		$current_post[ 'media' ] = '';
		$current_post[ 'content' ] = str_replace( $video_html, "", $current_post[ 'content' ] );

		return $current_post;

	}
}


if ( !function_exists( 'zn_post_audio' ) ):
	function zn_post_audio( $current_post ) {

		$audio = $audio_html = false;
		$current_post[ 'title' ] = zn_wrap_titles( $current_post[ 'title' ] );
		$current_post[ 'content' ] = apply_filters( 'the_content', $current_post[ 'content' ] );

		// Only get audio from the content if a playlist isn't present.
		if ( false === strpos( $current_post[ 'content' ], 'wp-playlist-script' ) ) {
			$audio = get_media_embedded_in_content( $current_post[ 'content' ], array( 'audio' ) );
		}

		if ( ! empty( $audio ) ) :
			foreach ( $audio as $audio_html ) {
				$current_post[ 'before_head' ] = '<div class="dn-blogItem--formatBefore dn-blogItem-contentAudio">' . $audio_html . '</div>';
			}
		endif;

		$current_post[ 'media' ] = '';
		$current_post[ 'content' ] = str_replace( $audio_html, "", $current_post[ 'content' ] );

		return $current_post;
	}
endif;

// QUOTE POST
if ( !function_exists( 'zn_post_quote' ) )
{
	function zn_post_quote( $current_post )
	{
		$current_post[ 'title' ] = '<div class="dn-blogItem-contentQuote">'.dannys_get_svg( array('icon'=>'quote') ).'<blockquote><p>' . $current_post[ 'content' ] . '</p></blockquote><h5 class="dn-blogItem-contentQuote-title">' . $current_post[ 'title' ] . '</h5></div>';
		$current_post[ 'content' ] = '';
		$current_post[ 'media' ] = '';

		if( is_single() ){
			$current_post[ 'content' ] = $current_post[ 'title' ];
			$current_post[ 'title' ] = '';
		}

		return $current_post;

	}
}

// LINK POST
if ( !function_exists( 'zn_post_link' ) )
{
	function zn_post_link( $current_post )
	{
		$post_link = ( $has_url = get_url_in_content( get_the_content() ) ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
		$current_post[ 'title' ] = '<div class="dn-blogItem-contentLink">'. dannys_get_svg( array('icon'=>'chain') ) .' <a href="' . esc_url( $post_link ) . '" class="h2"> ' . $current_post[ 'title' ] . ' </a></div>';
		$current_post[ 'content' ] = '';
		$current_post[ 'media' ] = '';

		return $current_post;

	}
}

// GALLERY POST
if ( !function_exists( 'zn_post_gallery' ) ):
	function zn_post_gallery( $current_post )
	{
		preg_match( "!\[(?:zn_)?gallery.+?\]!", get_the_content(), $match_gallery );

		$current_post[ 'title' ] = zn_wrap_titles( $current_post[ 'title' ] );

		if ( !empty( $match_gallery ) ) {

			$gallery = $match_gallery[ 0 ];

			if ( strpos( $gallery, 'zn_' ) === false ) {
				$gallery = str_replace( "gallery", 'zn_gallery', $gallery );
			}

			$current_post[ 'before_head' ] = '<div class="dn-blogItem--formatBefore dn-blogItem-contentGallery">'.do_shortcode( $gallery ).'</div>';
			$current_post[ 'media' ] = '';
			$current_post[ 'content' ] = str_replace( $match_gallery[ 0 ], "", $current_post[ 'content' ] );
		}

		return $current_post;

	}
endif;

/*--------------------------------------------------------------------------------------------------
	Wrap post titles based on page
--------------------------------------------------------------------------------------------------*/
if ( !function_exists( 'zn_wrap_titles' ) ):
	function zn_wrap_titles( $title ) {

		if ( is_single() ) {
			$title = '<h1 class="dn-blogItem-headerTitle h1" ' . zn_schema_markup( 'title' ) . '>' . $title . '</h1>';
		}
		else {
			$title = '<h2 class="dn-blogItem-headerTitle '. ( is_sticky() ? 'h1' : 'h2' ) .'" ' . zn_schema_markup( 'title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $title . '</a></h2>';
		}

		return $title;
	}
endif;
