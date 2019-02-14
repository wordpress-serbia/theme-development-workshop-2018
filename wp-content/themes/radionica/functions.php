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
	 * Enable localisation of the theme.
	 *
	 * File .mo must be called only by locale and to be placed in theme root. If it's
	 * placed in another folder this folder must be specified in
	 * 'load_theme_textdomain'
	 *
	 * <code>
	 * load_theme_textdomain( 'radionica', get_theme_file_path( '/languages' ) );
	 * </code>
	 *
	 * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
	 */
	// load_theme_textdomain( 'radionica' );
	load_theme_textdomain( 'radionica', get_theme_file_path( '/languages' ) );

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

	/**
	 * Theme support for wide and full width blocks.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Theme support for default block styles.
	 * The frontend blocks will be styled the same as editor blocks.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#default-block-styles
	 */
	add_theme_support( 'wp-block-styles' );

	/**
	 * Theme support for blocks font size.
	 *
	 * Predefined size slugs are:
	 *     'small',
	 *     'regular',
	 *     'medium',
	 *     'large',
	 *     'huge',
	 *     'larger'
	 *
	 * Each generates the classname by following pattern:
	 * <code>
	 * .has-{SIZE}-font-size
	 * </code>
	 *
	 * There use to be 'normal' as well but this class doesn't exists any more.
	 * These are default styles:
	 *
	 * <code>
	 * .has-small-font-size {
	 *     font-size: 13px
	 * }
	 *
	 * .has-normal-font-size,.has-regular-font-size {
	 *     font-size: 16px
	 * }
	 *
	 * .has-medium-font-size {
	 *     font-size: 20px
	 * }
	 *
	 * .has-large-font-size {
	 *     font-size: 36px
	 * }
	 *
	 * .has-huge-font-size,.has-larger-font-size {
	 *     font-size: 42px
	 * }
	 * </code>
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#block-font-sizes
	 */
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'radionica' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Regular', 'radionica' ),
			'size' => 18,
			'slug' => 'regular'
		),
		array(
			'name' => esc_html__( 'Large', 'radionica' ),
			'size' => 48,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'radionica' ),
			'size' => 72,
			'slug' => 'huge'
		)
	) );

	/**
	 * Disable custom font sizes for blocks.
	 *
	 * Force usage of default font sizes or the
	 * custom ones defined with 'editor-font-sizes'.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#disabling-custom-font-sizes
	 */
	add_theme_support( 'disable-custom-font-sizes' );

	/**
	 * Theme support for embed blocks aspect ratio.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
	 */
	add_theme_support( 'responsive-embeds' );

	/**
	 * Disable custom colors (background and font) for blocks.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
	 */
	add_theme_support( 'disable-custom-colors' );

	/**
	 * Theme support for blocks color palettes.
	 *
	 * Predefined color slugs are:
	 *     'pale-pink'             => '#f78da7',
	 *     'vivid-red'             => '#cf2e2e',
	 *     'luminous-vivid-orange' => '#ff6900',
	 *     'luminous-vivid-amber'  => '#fcb900',
	 *     'light-green-cyan'      => '#7bdcb5',
	 *     'vivid-green-cyan'      => '#00d084',
	 *     'pale-cyan-blue'        => '#8ed1fc',
	 *     'vivid-cyan-blue'       => '#0693e3',
	 *     'very-light-gray'       => '#eee',
	 *     'cyan-bluish-gray'      => '#abb8c3',
	 *     'very-dark-gray'        => '#313131'
	 *
	 * Each generates the classname by following pattern:
	 * <code>
	 * .has-{COLOR-SLUG}-color
	 * .has-{COLOR-SLUG}-background-color
	 * </code>
	 *
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#block-color-palettes
	 */
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html__( 'Whitish', 'radionica' ),
			'slug'  => 'whitish',
			'color' => '#f2f2f2',
		),
		array(
			'name'  => esc_html__( 'Redish', 'radionica' ),
			'slug'  => 'redish',
			'color' => '#db5353',
		),
		array(
			'name'  => esc_html__( 'Grayish', 'radionica' ),
			'slug'  => 'grayish',
			'color' => '#b7aeae',
		),
		array(
			'name'  => esc_html__( 'Blackish', 'radionica' ),
			'slug'  => 'blckish',
			'color' => '#252525',
		),
	) );

	// To simply disable color palette add 'empty' support
	// add_theme_support( 'editor-color-palette' );
}
add_action( 'after_setup_theme', 'radionica_setup' );

/**
 * Load scripts and styles.
 *
 * This function is attached to
 * 'wp_enqueue_scripts' action hook.
 */
function radionica_enqueue_scripts() {

	if ( is_page_template( 'template-escaping.php' ) ) :
		// https://roundsliderui.com/
		// For the sake of working with some js settings.
		wp_enqueue_style( 'roundslider', 'https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.css' );
		wp_enqueue_script( 'roundslider', 'https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.js', array( 'jquery' ), '1.3.2', true );
		wp_enqueue_script( 'radionica-js', get_theme_file_uri( '/js/radionica.js' ), array(), time(), true );

		/**
		 * Register a global variable to be used in js files.
		 *
		 * @link https://developer.wordpress.org/reference/functions/wp_localize_script/
		 */
		// Returns all values as strings.
		wp_localize_script( 'radionica-js', 'radionica', array(
			'showTooltip'  => true,
			'tooltipValue' => 70,
			'circleShape'  => 'half-top'
		));
		// Keep the type of the value.
		wp_localize_script( 'radionica-js', 'radionica2', array(
			'roundslider' => array(
				'showTooltip'  => true,
				'tooltipValue' => 20,
				'circleShape'  => 'half-top'
			)
		));
	endif;

	// Main stylesheet.
	wp_enqueue_style( 'radionica-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'radionica_enqueue_scripts' );

/**
 * Register sidebars and widgets
 *
 * This function is attached to 'widgets_init' action hook.
 */
function radionica_widgets_init() {
	// Main sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'radionica' ),
		'description'   => esc_html__( 'Visible on all archives.', 'radionica' ),
		'id'            => 'sidebar-main',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// Singular sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Singular Sidebar', 'radionica' ),
		'description'   => esc_html__( 'Visible on Sidebar template for posts and pages.', 'radionica' ),
		'id'            => 'sidebar-singular',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// Header sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Header Sidebar', 'radionica' ),
		'description'   => esc_html__( 'Visible in header.', 'radionica' ),
		'id'            => 'sidebar-header',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="screen-reader-text">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'radionica_widgets_init' );

/**
 * Navigation Walker
 */
require_once get_parent_theme_file_path( '/inc/class.RadionicaNavwalker.php' );
require_once get_parent_theme_file_path( '/inc/class-custom-walker-nav-menu.php' );

/**
 * Template functions
 */
require_once get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Enqueue scripts and styles for block editor
 */
require_once get_parent_theme_file_path( '/blocks/enqueue-scripts-styles.php' );
