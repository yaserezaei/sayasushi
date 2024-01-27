<?php if(! defined('ABSPATH')){ return; }

if ( ! function_exists( 'dannys_resmenu_wrapper' ) ) {
	/**
	* Function to display the main menu responsive markup
	* @return html
	*/
	function dannys_resmenu_wrapper(){
		?>
		<div class="dn-mainNavResp">
			<a href="#" class="dn-menuBurger" id="dn-menuBurger">
				<span></span>
				<span></span>
				<span></span>
			</a>
		</div><!-- end responsive menu -->
		<?php
	}
}

/**
 * Main Navigation
 */

if ( ! function_exists( 'dannys_header_main_menu' ) ) {
	/**
	* Function to display the main menu markup in header
	* @return html
	*/
	function dannys_header_main_menu( ){

		?>
		<div class="sh-component dn-mainNav-wrapper" <?php echo zn_schema_markup('nav'); ?>>

			<?php

			$classes = array();

			$args = array(
				'container' => 'div',
				'container_id' => 'dn-main-menu',
				'container_class' => 'dn-mainNav-container '.implode(' ', $classes),
				'walker' => 'znmegamenu',
				'link_before' => '<span>',
				'link_after' => '</span>',
			);
			zn_show_nav( 'main_navigation','dn-mainNav', $args );

			if( ! has_nav_menu( 'main_navigation' ) ){
				echo sprintf( '<a class="dn-mainNav-nomenu" href="%s" target="_blank">%s</a> %s',
					admin_url('nav-menus.php'),
					__('Create a new menu', 'dannys-restaurant'),
					__('and locate it as Main Navigation.', 'dannys-restaurant')
				 );
			}

			?>
		</div>
		<?php
	}
}