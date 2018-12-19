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
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 */
function radionica_setup() {
	/**
	 * Custom Logo
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
	 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width'  => true,
		'flex-height' => true
	) );

	/**
	 * Automatic Feed Links
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Title Tag
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Custom Background
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
	 */
	add_theme_support( 'custom-background', array(
		'default-image'      => get_template_directory_uri() . '/images/WordPress-logotype-wmark.png',
		'default-preset'     => 'custom', // 'default', 'fill', 'fit', 'repeat', 'custom'
		'default-position-x' => 'center', // 'left', 'center', 'right'
		'default-position-y' => 'top',    // 'top', 'center', 'bottom'
		'default-size'       => 'auto',   // 'auto', 'contain', 'cover'
		'default-repeat'     => 'repeat', // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
		'default-attachment' => 'scroll', // 'scroll', 'fixed'
		'default-color'      => '#ff0000',
	) );

	/**
	 * Post Thumbnails
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	/**
	 * Add cusrom image sizes
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 */
	add_image_size( 'featured-single', 1200, 400, true );
	add_image_size( 'featured-archive', 400, 200, array( 'center', 'center' ) );

	/**
	 * Custom Header
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
	 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
	 */
	add_theme_support( 'custom-header', array(
		'width'  => 1200,
		'height' => 400
	) );

	/**
	 * Register Navigation Menus
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 * @link https://developer.wordpress.org/themes/functionality/navigation-menus/
	 */
	register_nav_menus( array(
		'header' => esc_html__( 'Header Menu', 'radionica' )
	) );

	/**
	 * HTML5 support
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
	 */
	add_theme_support( 'html5', array(
		// 'comment-list',
		// 'comment-form'
	) );

	/**
	 * Post Formats
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-formats
	 * @link https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
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

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'radionica_enqueue_scripts' );

/**
 * Navigation Walker
 */
require_once get_parent_theme_file_path( '/inc/class.RadionicaNavwalker.php' );
require_once get_parent_theme_file_path( '/inc/class-custom-walker-nav-menu.php' );

/**
 * Template functions
 */
require_once get_parent_theme_file_path( '/inc/template-functions.php' );
