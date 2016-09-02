<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
</head>
<body <?php body_class(); ?>>
<div class="wholePage">
	<div class="main">
		<div class="hdr1">
			<?php echo do_shortcode('[slick-carousel]'); ?>
			<div class="head-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 
								  'container_id' => 'main-menu' ) ); ?>
			</div>

			<div class="head">
				<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
		</div>
		<div class="slider" id="brand-slide">
			<div class="slider-arrow">
				<div class="slider-arrow-left"><img src="http://localhost/wordpress/wp-content/uploads/2016/09/right-arrow.png" alt=""></div>
				<div class="slider-arrow-right"><img src="http://localhost/wordpress/wp-content/uploads/2016/09/right-arrow.png" alt=""></div>
			</div>
			<div class="slider-image"><img src="http://localhost/wordpress/wp-content/uploads/2016/09/WIN_20160819_18_41_17_Pro.jpg" alt=""></div>		
		</div>
	</div>

<script type="text/javascript">
	// $(function () {
	//     var $image = $('#container').children('img');
	//     function animate_img() {
	//         if ($image.css('top') == '0px') {
	//             $image.animate({top: '-175px'}, 5000, function () {
	//                 animate_img();
	//             });
	//         } else {console.log('2');
	//             $image.animate({top: '0px'}, 5000, function () {
	//                 animate_img();
	//             });
	//         }
	//     }
	//     animate_img();
	// });

</script>



	<div class="main">
		<div class="content-main">