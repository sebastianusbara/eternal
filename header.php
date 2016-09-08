<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
	<?php show_admin(); ?>
</head>
<body <?php body_class(); ?>>

<div class="wholePage">
	<div class="header">
		<div class="user-menu">
			<?php echo user_signin() ?>
		</div>
		<div class="hdr1">
			<div class="head-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 
								  'container_id' => 'main-menu' ) ); ?>
			</div>

			<div class="head">
				<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
			</div>
		</div>
		<div class="slider" id="brand-slide">
			<?php echo do_shortcode('[slick-carousel]'); ?>
		</div>
	</div>

<script type="text/javascript">


</script>



	<div class="main">
		<div class="content-main">
			