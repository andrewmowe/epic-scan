<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Epic Scan
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function epic_scan_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'epic_scan_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function epic_scan_jetpack_setup
add_action( 'after_setup_theme', 'epic_scan_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function epic_scan_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function epic_scan_infinite_scroll_render
