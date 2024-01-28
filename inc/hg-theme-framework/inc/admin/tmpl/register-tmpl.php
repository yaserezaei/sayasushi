<?php if(! defined('ABSPATH')){ return; }
if( ZN_HogashDashboard::isManagedApiKey() ){
	if( ZN_HogashDashboard::isConnected() ){
		?>
		<div class="inline notice notice-success">
			<p>
				<?php esc_html_e('The theme has been registered and connected with the Hogash Dashboard. To change the API Key, please contact your site administrator.', 'dannys-restaurant'); ?>
			</p>
		</div>
		<?php
	}
	else {
		$result = ZN_HogashDashboard::connectTheme( ZN_HogashDashboard::getManagedApiKey() );
		if( isset($result['code']) && $result['code'] == ZN_HogashDashboard::E_SUCCESS ) {
			?>
			<div class="inline notice notice-success">
				<p>
					<?php esc_html_e('The theme has been registered and connected with the Hogash Dashboard. To change the API Key, please contact your site administrator.', 'dannys-restaurant'); ?>
				</p>
			</div>
			<?php
		}
		else {
			?>
			<div class="inline notice notice-success">
				<p>
					<?php
						$e = ( isset($result['message']) ? $result['message'] : esc_html__( 'No response from server.', 'dannys-restaurant' ) );
						echo esc_html(sprintf(esc_html__('An error occurred: %s', 'dannys-restaurant'), $e ) );
					?>
				</p>
			</div>
			<?php
		}
	}
}
else {
	include( ZNHGTFW()->getFwPath( 'inc/admin/tmpl/form-register-theme-tmpl.php' ));
}
