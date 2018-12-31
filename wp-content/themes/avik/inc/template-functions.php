<?php
/**
* templatew-functions.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

function avik_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'avik_body_classes' );

/**
* Add a pingback url auto-discovery header for single posts, pages, or attachments.
*/
function avik_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'avik_pingback_header' );
