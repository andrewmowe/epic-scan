<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Epic Scan
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href='https://fonts.googleapis.com/css?family=Martel+Sans:400,200,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text visuallyhidden" href="#content"><?php esc_html_e( 'Skip to content', 'epic-scan' ); ?></a>

	<header id="masthead" class="site-header cf" role="banner">
		<div class="container">
			<a class="site-logo" href="#"><img src="//placehold.it/375x85/" alt="Logo Alt Text" /></a>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
			<a href="#" class="client-login">My Epic Scans</a>
		</div>
	</header>

	<div id="content" class="site-content">
