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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<?php wp_head(); ?>
<script type="text/javascript" src="//cdn.rawgit.com/icons8/bower-webicon/v0.10.7/jquery-webicon.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/blazy/latest/blazy.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text visuallyhidden" href="#content"><?php esc_html_e( 'Skip to content', 'epic-scan' ); ?></a>

	<?php
		if ( is_user_logged_in() ) {
			global $current_user;
			get_currentuserinfo();
			$login_link = get_author_posts_url($current_user->ID);
		} else {
			$login_link = wp_login_url();
		}
	?>

	<header id="masthead" class="site-header cf" role="banner">
		<div class="container">
			<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/epic-scan-logo.svg'; ?>" alt="Logo Alt Text" width="286" height="65" /></a>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
			<a href="<?php echo $login_link; ?>" class="client-login">My Epic Scans</a>
		</div>
	</header>

	<div id="content" class="site-content">
