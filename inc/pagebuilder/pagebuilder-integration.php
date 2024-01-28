<?php if(! defined('ABSPATH')){ return; }

add_filter( 'znb:editor:page_options', 'dn_add_page_options' );

function dn_add_page_options( $options ){
	return array_merge(  array(
		'general' => array(
			'title' => 'General options',
			'options' => array (
				array(
					"slug" => array( 'page' , 'post', 'portfolio', 'product' ),
					'id'         	=> 'show_header',
					'name'       	=> 'Show header',
					'description' 	=> 'Choose if you want to show the main header or not on this page. ',
					'type'        	=> 'toggle2',
					'std'			=> 'show_header',
					'value'			=> 'show_header',
					'live' => array(
						'type'		=> 'hide',
						'css_class' => '#site-header'
					),
				),
				array (
					"slug" => array( 'page' , 'post', 'portfolio', 'product'),
					'id'         	=> 'show_footer',
					'name'       	=> 'Show footer',
					'description' 	=> 'Choose if you want to show the main footer on this page. ',
					'type'        	=> 'toggle2',
					'std'			=> 'show_footer',
					'value'			=> 'show_footer',
					'live' => array(
						'type'		=> 'hide',
						'css_class' => '#site-footer, .znpb-footer-smart-area'
					)
				),
			),
		),
	),$options );
}
