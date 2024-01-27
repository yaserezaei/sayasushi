<?php if(! defined('ABSPATH')){ return; }

add_filter( 'znhgtfw:plugins', 'dannys_required_addons' );
add_action( 'znhgtfw:register_requirements', 'dannys_register_requirements' );
function dannys_required_addons( $addons ){

	$addons['dannys-child'] = array (
		'name' => 'Danny\'s Child Theme',
		'slug' => 'dannys-child',
		'source' => ZNHGTFW()->getThemeUrl( 'inc/addons/dannys-child.zip' ),
		'source_type' => 'external',
		'version' => '1.1',
		'z_plugin_icon' => 'http://i.imgur.com/5uaIRFG.png',
		'z_plugin_author' => 'Hogash Studio',
		'z_plugin_description' => 'Stay updated and safely customize Danny\'s theme code, by applying custom hooks or overriding files. <a href="https://codex.wordpress.org/Child_Themes">More on Child Themes</a>',
		'zn_plugin' => 'dannys-child/functions.php',
		'file_path' => 'dannys-child/functions.php',
	);

	$addons['zion-builder'] = array(
		'name' => 'Zion Builder',
		'slug' => 'zion-builder',
		'source' => ZNHGTFW()->getThemeUrl( 'inc/addons/zion-builder.zip' ),
		'source_type' => 'external',
		'required' => true,
		'version' => '1.0.28',
		'z_plugin_icon' => 'http://i.imgur.com/IWtmj5A.png',
		'z_plugin_author' => 'Hogash',
		'z_plugin_description' => 'Powerful, advanced frontend drag & drop page builder.',
		'zn_plugin' => 'zion-builder/zion-builder.php',
		'file_path' => 'zion-builder/zion-builder.php',
	);

	$addons['hogash-mailchimp'] = array(
		'name' => 'Hogash Mailchimp',
		'slug' => 'hogash-mailchimp',
		'source' => ZNHGTFW()->getThemeUrl( 'inc/addons/hogash-mailchimp.zip' ),
		'source_type' => 'external',
		'version' => '1.0.4',
		'z_plugin_icon' => 'http://i.imgur.com/V4A2Rat.png',
		'z_plugin_author' => 'Hogash Studio',
		'z_plugin_description' => 'A plugin that will add Mailchimp functionality to all Hogash themes.',
		'zn_plugin' => 'hogash-mailchimp/hogash-mailchimp.php',
	);

	$addons['breadcrumb-trail'] = array(
		'name' => 'Breadcrumb Trail',
		'slug' => 'breadcrumb-trail',
		'source' => ZNHGTFW()->getThemeUrl( 'inc/addons/breadcrumb-trail.zip' ),
		'source_type' => 'external',
		'version' => '1.0.0',
		'z_plugin_icon' => 'http://i.imgur.com/4PVhiJb.jpg',
		'z_plugin_author' => 'Justin Tadlock',
		'z_plugin_description' => 'A powerful script for adding breadcrumbs to your site that supports Schema.org, HTML5-valid microdata.',
		'zn_plugin' => 'breadcrumb-trail/breadcrumb-trail.php',
	);


	$addons['revslider'] = array(
		'name' => 'Revolution Slider',
		'slug' => 'revslider',
		'source' => 'http://hogash.com/tf-assets/dannys-wp/revslider.zip',
		'source_type' => 'external',
		'version' => '6.0.5',
		'z_plugin_icon' => 'http://imgur.com/zlC8IqW.png',
		'z_plugin_author' => 'themepunch',
		'z_plugin_description' => 'Slider Revolution is not only for Sliders. You can now build a beautiful one-page web presence with absolutely no coding knowledge required.',
		'zn_plugin' => 'revslider/revslider.php',
		'file_path' => 'revslider/revslider.php'
	);

	return $addons;
}


function dannys_register_requirements($dependencyManager){

	$dependencyManager->registerPluginRequirement(array(
		'slug' => 'zion-builder',
		'min_version' => '1.0.4'
	));
}
