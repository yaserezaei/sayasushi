<?php if(! defined('ABSPATH')){ return; }
	// TODO:
	// optiune show

	$encoded_url = urlencode( get_permalink() );
	$share_text = htmlspecialchars( urlencode( __( "Check out - ", 'dannys-restaurant' ) . get_the_title() ), ENT_COMPAT, 'UTF-8');

	$social_share = apply_filters('dannys_blog_share_icons', array(
		array(
			'url' => 'https://www.facebook.com/sharer/sharer.php?display=popup&amp;u='.$encoded_url.'%3Futm_source%3Dsharefb',
			'icon' => 'facebook',
			'title' => 'Facebook',
			'show_title' => true,

		),
		array(
			'url' => 'https://twitter.com/intent/tweet?text='.$share_text.'&amp;url='.$encoded_url.'%3Futm_source%3Dsharetw',
			'icon' => 'twitter',
			'title' => 'Twitter',
			'show_title' => true,
		),
		array(
			'url' => 'https://plus.google.com/share?url='.$encoded_url.'%3Futm_source%3Dsharegp',
			'icon' => 'googleplus',
			'title' => 'Google Plus'
		),
		array(
			'url' => 'http://pinterest.com/pin/create/button?description='.$share_text.'&amp;url='.$encoded_url.'%3Futm_source%3Dsharepi',
			'icon' => 'pinterest',
			'title' => 'Pinterest'
		),
	), $encoded_url, $share_text );


 ?>
<div class="dn-blogItem-share">
	<ul class="dn-blogItem-shareList">

		<li class="dn-blogItem-shareTitle">
			<?php
				echo __('SHARE', 'dannys-restaurant');
			?>
		</li>

		<?php
			foreach ($social_share as $key => $value) {
				echo '<li>';
				echo '<a href="'.$value['url'].'" title="' . __( "SHARE ON", 'dannys-restaurant' ) . ' '. strtoupper($value['title']) .'" class=" dn-shareItem dn-shareItem-'.$value['icon'].'">';
					echo '<span class="dn-shareItem-icon">'. dannys_get_svg( array( 'icon' => $value['icon'], 'title' => $value['title'] ) ) .'</span>';
					if( isset($value['show_title']) && $value['show_title'] ){
						echo '<span class="dn-shareItem-title">'. $value['title'] .'</span>';
					}
				echo '</a></li>';
			}
		?>
	</ul>
</div>
