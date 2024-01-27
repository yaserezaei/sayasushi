<?php if( ! defined('ABSPATH') ){ return; }

/**
 * HEADER NAVIGATION
 */

if ( ! function_exists( 'dannys_topbar_navigation' ) ):
	/**
	 * Add navigation menu to the Top Area
	 */
	function dannys_topbar_navigation(){
		if ( has_nav_menu( 'topbar_navigation' ) ) {
			echo '<div class="sh-component dn-topNav-container '. zget_option( 'topbar_menu_hidexs', 'general_options', false, 'hidden-xs' ) .'">';
				zn_show_nav( 'topbar_navigation', 'dn-topNav', array('depth' => '1' ) );
			echo '</div>';
		}
	}
endif;