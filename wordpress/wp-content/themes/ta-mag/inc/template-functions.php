<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Ta_Mag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ta_mag_body_classes( $classes ) {

	global $post;
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.	

	$global_sidebar_layout = get_theme_mod('global_sidebar_layout','right-sidebar');

	if( is_search() ){

		$classes[] = 'no-sidebar';

	}elseif( ( is_singular() && 'post' === get_post_type() ) || is_page() ){

		$ta_mag_post_sidebar = get_post_meta( $post->ID, 'ta_mag_post_sidebar_layout', true );

		if( $ta_mag_post_sidebar == 'global' ){

			$classes[] = esc_attr( $global_sidebar_layout );

		}

		if( $ta_mag_post_sidebar ){
			$classes[] = esc_attr( $ta_mag_post_sidebar );
		}else{
			$classes[] = esc_attr( $global_sidebar_layout );
		}

	}else{

		$classes[] = esc_attr( $global_sidebar_layout );

	}

	return $classes;
}
add_filter( 'body_class', 'ta_mag_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ta_mag_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ta_mag_pingback_header' );
