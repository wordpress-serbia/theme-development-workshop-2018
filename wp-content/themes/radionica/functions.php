<?php
/**
 * Theme functions
 *
 * @package WordPress
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the 'after_setup_theme' hook, which
 * runs before the 'init' hook. The 'init' hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function radionica_setup() {
	/**
	 * Custom Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width'  => true,
		'flex-height' => true
	) );
}
add_action( 'after_setup_theme', 'radionica_setup' );
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