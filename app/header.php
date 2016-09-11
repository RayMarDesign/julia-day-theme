<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package juliaday
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'juliaday' ); ?></a>
    <header id="masthead" class="site-header" role="banner">
        <?php if ( get_header_image() ) { ?>
        <div class="site-branding" style="background-image: url(<?php header_image(); ?>);">
        <?php } else { ?>
        <div class="site-branding">
        <?php } // End header image check. ?>
            <div class="container">
                <div class="site-logo">
                    <?php if ( has_custom_logo() ) {
                        the_custom_logo();
                    } ?>

                    <?php
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title<?php if ( has_custom_logo() ) { echo ' screen-reader-text'; } ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title<?php if ( has_custom_logo() ) { echo ' screen-reader-text'; } ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                    endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description<?php if ( has_custom_logo() ) { echo ' screen-reader-text'; } ?>"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; ?>
                </div>
            </div>
        </div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'juliaday' ); ?></button>
            <div class="container">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
