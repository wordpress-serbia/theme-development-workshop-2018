<?php
/**
 * Theme functions
 *
 * @package WordPress
 */

/**
 * Load scripts and styles.
 *
 * This function is attached to
 * 'wp_enqueue_scripts' action hook.
 */
function radionica_enqueue_scripts() {
	// Main stylesheet.
	wp_enqueue_style( 'radionica-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'radionica_enqueue_scripts' );