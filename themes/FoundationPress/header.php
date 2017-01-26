<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<div id="backtotop" class="hide-for-small-only">
		<a class="button round secondary">
			<i class="fa fa-arrow-up"></i>
		</a>
	</div>



	<header id="masthead" class="site-header" role="banner" data-sticky-container>
			<div class="title-bar" data-responsive-toggle="site-navigation">
				<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
				<div class="title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>

			</div>
			<nav id="top-navigation" class="top-navigation" role="navigation" >
				<div id="topmenu-left">
				<a href="#">Chi siamo</a>
				<a href="#">Contatti</a>
				</div>
			</nav>
			<nav id="site-navigation" class="main-navigation top-bar bigger" role="navigation" data-sticky style="width:100%">
				<div class="top-bar-left">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/gp30/logo.png" /></a>

					<?php foundationpress_top_bar_r(); ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
					<?php endif; ?>
				</div>
				<div class="top-bar-right">
					<!-- socials -->
					Seguici su: &#160;
					<span class="fa-stack fa-lg">
			  		<i class="fa fa-circle fa-stack-2x"></i>
			  		<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
					</span>

					&#160;
					<span class="fa-stack fa-lg">
			  		<i class="fa fa-circle fa-stack-2x"></i>
			  		<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
					</span>
				</div>
			</div>
			</nav>

		</header>



		<script src=<?php echo get_bloginfo('template_url'); ?>/assets/javascript/custom/gp30.js></script>
				<script src=<?php echo get_bloginfo('template_url'); ?>/assets/javascript/custom/slick.js></script>
			  <script src=<?php echo get_bloginfo('template_url'); ?>/assets/javascript/custom/slick.min.js></script>
	<section class="container">
