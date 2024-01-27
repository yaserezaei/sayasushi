<?php

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Displays the header search
*/

if ( ! function_exists( 'dannys_header_search' ) ) {

	function dannys_header_search() {
		if ( zget_option( 'head_show_search', 'general_options', false, 'no' ) === 'yes' ) {
			?>
			<div class="dn-search">
				<a href="#" class="dn-searchBtn">
					<span class="dn-searchOpen"><?php echo dannys_get_svg(array( 'icon' => 'search' )); ?></span>
					<span class="dn-searchClose"><?php echo dannys_get_svg(array( 'icon' => 'close' )); ?></span>
				</a>
				<div class="dn-search-container">
					<?php echo get_search_form(); ?>
				</div><!--/.dn-search-container-->
			</div><!--/.dn-search-->
			<?php
		}
	}
}