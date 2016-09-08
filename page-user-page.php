<?php get_header(); ?>   

		<div class="content">
			<div class="container">
				<div class="main-content">
					<div class="user-details">
						<?php user_information($_GET["ID"]) ?>
					</div>
				</div>
				<div class="side-content">
					<?php if ( is_active_sidebar( 'footbar1' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'footbar1' ); ?>
						</div><!-- #primary-sidebar -->
					<?php endif; ?>
				</div>
			</div>
		</div>





</div>

<?php get_footer();?>
</div>