

<div class="afooter2">
	<div class="footer">


		<div class="mlogo">
			<div class="sidebar-user2 span2">
					<div>Icons made by <a href="http://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
				    <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'shop_one_column' ) ); ?>"><?php printf( __( 'Powered by %s', 'shop_one_column' ), 'WordPress' ); ?></a>	
				    <?php _e( 'Theme', 'shop_one_column' ); ?>   <a href="<?php echo esc_url( __( 'http://justpx.com/', 'shop_one_column' ) ); ?>"><?php printf( __( 'Shop One Column', 'shop_one_column' ), 'Shop One Column' ); ?></a>
					<?php if ( is_active_sidebar( 'footbar1' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'footbar1' ); ?>
						</div><!-- #primary-sidebar -->
					<?php endif; ?>
			</div>
		</div>		
	</div>
</div>
</div>

	<?php wp_footer(); ?>
</body>
</html>