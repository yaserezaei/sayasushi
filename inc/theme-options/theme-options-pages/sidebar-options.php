<?php if(! defined('ABSPATH')){ return; }

/*--------------------------------------------------------------------------------------------------
	Unlimited Sidebars
--------------------------------------------------------------------------------------------------*/


$admin_options[] = array(
	'slug'          => 'unlimited_sidebars', // subpage
	'parent'        => 'unlimited_sidebars', // master page
	'id'            => 'unlimited_sidebars',
	'name'          => 'Unlimited Sidebars',
	'description'   => 'Here you can create unlimited sidebars that you can use all over the theme.',
	'type'          => 'group',
	'sortable'      => false,
	'element_title' => 'sidebar_name',
	'subelements'   => array(
		array(
			'id'          => 'sidebar_name',
			'name'        => 'Sidebar Name',
			'description' => 'Please enter a name for this sidebar. Please note that the name should only contain alphanumeric characters',
			'type'        => 'text',
			'supports'    => 'block'
		),
	)
);


// Sidebars settings
$sidebar_supports = array(
	'default_sidebar' => 'defaultsidebar',
	'sidebar_options' => array(
		'right' => 'Right sidebar' ,
		'left' => 'Left sidebar' ,
		'no' => 'No sidebar'
	)
);
$sidebar_std = array (
	'layout' => 'right',
	'sidebar' => 'defaultsidebar',
);

$admin_options[] = array(
	'slug'        => 'sidebar_settings',
	'parent'      => 'unlimited_sidebars',
	'id'          => 'archive_sidebar',
	'name'        => 'Sidebar on archive pages',
	'description' => 'Please choose the sidebar position for the archive pages.',
	'type'        => 'sidebar',
	'class'     => 'zn_full',
	'std'       => $sidebar_std,
	'supports'  => $sidebar_supports,
);

$admin_options[] = array(
	'slug'        => 'sidebar_settings',
	'parent'      => 'unlimited_sidebars',
	'id'          => 'blog_sidebar',
	'name'        => 'Sidebar on Blog',
	'description' => 'Please choose the sidebar position for the blog page.',
	'type'        => 'sidebar',
	'class'     => 'zn_full',
	'std'       => $sidebar_std,
	'supports'  => $sidebar_supports,
);

$admin_options[] = array(
	'slug'        => 'sidebar_settings',
	'parent'      => 'unlimited_sidebars',
	'id'          => 'single_sidebar',
	'name'        => 'Sidebar on single blog post',
	'description' => 'Please choose the sidebar position for the single blog posts.',
	'type'        => 'sidebar',
	'class'     => 'zn_full',
	'std'       => $sidebar_std,
	'supports'  => $sidebar_supports,
);

$admin_options[] = array(
	'slug'        => 'sidebar_settings',
	'parent'      => 'unlimited_sidebars',
	'id'          => 'page_sidebar',
	'name'        => 'Sidebar on pages',
	'description' => 'Please choose the sidebar position for the pages.',
	'type'        => 'sidebar',
	'class'     => 'zn_full',
	'std'       => $sidebar_std,
	'supports'  => $sidebar_supports,
);
