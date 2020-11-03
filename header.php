<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Designfly
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'designfly' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( get_theme_mod( 'custom_logo' ) ) {
				the_custom_logo();
				designfly_site_title( 'screen-reader-text' );
			} else {
				designfly_site_title();
			}

			designfly_site_description();
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="designfly-main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'designfly' ); ?>">
			<?php
			wp_nav_menu(
				[
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'primary-menu menu',
					'depth'          => 3,
				]
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
