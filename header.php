<?php if(! defined('ABSPATH')){ return; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' );?>"/>
		<meta name="twitter:widgets:csp" content="on">
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> <?php echo zn_schema_markup('body'); ?>>


	<?php
	/*
	 * After body action
	 */
	do_action( 'dannys_after_body' ); ?>


		<div id="page_wrapper">

		<?php
		/*
		 * Display SITE HEADER
		 */
		get_template_part( 'template-parts/theme-header/header', 'main' );
		do_action('dannys_after_header');

		// Show Breadcrumbs (if PB not enabled)
		if( !dannys_pb_enabled() )
			dannys_get_breadcrumbs();

		?>

		<main id="content" class="dn-siteContent <?php echo dannys_site_content_class(); ?>">
			<div class="dn-siteContainer <?php echo dannys_site_container_class(); ?>">