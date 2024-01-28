<?php if(! defined('ABSPATH')){ return; }
/*--------------------------------------------------------------------------------------------------
	Display the current year
	@use: [dannys_year]
--------------------------------------------------------------------------------------------------*/
class dannys_year extends HG_Shortcode{
	public function getTag(){
		return 'dannys_year';
	}

	public function render( $atts, $content = null ){
		// Return the proper year based on the local time
		return date_i18n('Y', current_time('timestamp'));
	}
}
