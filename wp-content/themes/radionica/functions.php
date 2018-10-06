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

/**
 * Modify document title
 *
 * Change the document title appearance. This function is
 * attached to 'document_title_parts' filter hook.
 *
 * @param array $title {
 *     The document title parts. In that order.
 *
 *     @type string $title   Title of the viewed page.
 *     @type string $page    Optional. Page number if paginated.
 *     @type string $tagline Optional. Site description when on home page.
 *     @type string $site    Optional. Site title when not on home page.
 * }
 * @return array        Returns filtered document title parts
 */
function radionica_document_title_parts( $title ) {
	if ( is_front_page() ) :
		$title['tagline'] = $title['title'];
		$title['title']   = esc_html__( 'This is the home', 'radionica' );
	elseif ( is_single() ) :
		$title['title'] = '#' . get_the_ID() . ' ' . get_the_title( get_the_ID() );
		$title['site']  = get_bloginfo( 'description', 'display' ) . ' / ' . $title['site'];
	endif;

	return $title;
}
add_filter( 'document_title_parts', 'radionica_document_title_parts' );

/**
 * Document title separator
 *
 * Change the separator which will appear between
 * each document title part. This function is attached
 * to 'document_title_separator' filter hook.
 *
 * @param  string $sep Separator for document title, default '-'
 * @return string      Returns filtered separator
 */
function radionica_document_title_separator( $sep ) {
	if ( is_front_page() ) :
		$sep = '//';
	elseif ( is_single() ) :
		$sep = '/';
	endif;

	return $sep;
}
add_filter( 'document_title_separator', 'radionica_document_title_separator' );
