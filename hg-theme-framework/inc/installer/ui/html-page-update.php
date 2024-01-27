<?php

if( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin View: Notice - Update
 * @see class-zn-about.php
 */

?>

<div id="message" class="notice notice-error">
	<h3><?php esc_html_e( 'Theme Data Update Required', 'dannys-restaurant' ); ?></h3>
	<p>&#8211; <?php esc_html_e( 'We just need to update your install to the latest version.', 'dannys-restaurant' ); ?></p>
	<p>&#8211; <?php esc_html_e( "Don't forget about backups, always backup!", 'dannys-restaurant' ); ?></p>
	<p class="submit"><a href="<?php echo esc_url( add_query_arg( 'do_theme_update', 'true', ZNHGTFW()->getComponent( 'utility' )->get_options_page_url() ) ); ?>" class="button-primary zn_run_theme_updater"><?php esc_html_e( 'Run the updater', 'dannys-restaurant' ); ?></a></p>
</div>

<div id="message" class="notice notice-info zn_updater_msg_container">

</div>
