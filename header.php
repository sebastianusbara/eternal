<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="wholePage">
	<div class="main">
		<div class="hdr1">
			<div class="head-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 
								  'container_id' => 'main-menu' ) ); ?>
			</div>

			<div class="head">
				<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
		</div>
		<div class="slider" id="brand-slide">Slider</div>
	</div>

	



	<div class="main">
		<div class="content-main">