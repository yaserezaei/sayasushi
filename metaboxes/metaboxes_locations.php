<?php if(! defined('ABSPATH')){ return; }

	$zn_meta_locations = array(
		array( 	'title' =>  __( 'Post Options', 'dannys-restaurant' ), 'slug'=>'post_options', 'page'=>array('post'), 'context'=>'normal', 'priority'=>'default' ),
		array( 	'title' =>  __( 'Page Options', 'dannys-restaurant' ), 'slug'=>'page_options', 'page'=>array('page', 'product'), 'context'=>'normal', 'priority'=>'default' ),
	);
