<?php if(! defined('ABSPATH')){ return; }
?>
	</div><!-- /.dn-siteContainer -->
</main><!-- /.dn-siteContent -->

<?php
	/**
	 * Perform an action where we can hook before the footer content
	 */
	do_action('dannys_before_footer');


$style = "";
$show_footer = zget_option( 'footer_show', 'general_options', false, 'yes' );
if( is_singular() && get_post_meta( get_the_ID() , 'show_footer', true ) === 'zn_dummy_value') {
	$show_footer = 'no';
	if ( dannys_pb_active() ){
		$show_footer = 'yes';
		$style = ' style="display:none" ';
	}
}

/* Should we display a template ? */
$config = zn_get_pb_template_config( 'footer' );
if( $config['template'] !== 'no_template' ){
	// We have a subheader template... let's get it's possition
	$pb_data = get_post_meta( $config['template'], 'zn_page_builder_els', true );

	if( $config['location'] === 'before' ){
		echo '<div class="znpb-footer-smart-area" '. $style .'>';
		if( dannys_isZionBuilderEnabled() ) {
			ZNB()->frontend->renderUneditableContent( $pb_data, $config[ 'template' ] );
		}
		echo '</div>';
	}
	elseif( $config['location'] === 'replace' && $show_footer == 'yes' ){
		echo '<div class="znpb-footer-smart-area" '. $style .'>';
		if( dannys_isZionBuilderEnabled() ) {
			ZNB()->frontend->renderUneditableContent( $pb_data, $config[ 'template' ] );
		}
		echo '</div>';
		$show_footer = 'no';
	}
}

if ( $show_footer == 'yes' ) : ?>
	<footer id="site-footer" class="dn-siteFooter" <?php echo $style;?> <?php echo zn_schema_markup('footer'); ?>>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<?php
					// Footer menu
					if ( has_nav_menu( 'footer_navigation' ) ) {
						echo '<div class="dn-footerNav-wrapper clearfix">';
							zn_show_nav( 'footer_navigation', 'dn-footerNav', array( 'depth' => '1' ) );
						echo '</div>';
					}

					// Copyright
					$copyright_text = zget_option( 'copyright_text', 'general_options' );

					if ( !empty( $copyright_text ) ) { ?>
						<div class="dn-siteFooter-copyright">
							<?php
								echo do_shortcode(stripslashes( $copyright_text ));
							?>
						</div>
					<?php } ?>

				</div>
			</div>
			<!-- end row -->
		</div>
	</footer>
<?php
endif;

if( $config['template'] !== 'no_template' && $config['location'] === 'after' ){
	echo '<div class="znpb-footer-smart-area" '. $style .'>';
	if( dannys_isZionBuilderEnabled() ) {
		ZNB()->frontend->renderUneditableContent( $pb_data, $config['template'] );
	}
	echo '</div>';
}

?>

	</div><!-- end page_wrapper -->

	<?php zn_footer(); ?>
	<?php wp_footer(); ?>
	</body>
</html>
