<?php
/**
 * Theme function
 *
 * @package WordPress
 */

/**
 * Sets up theme defaults and registers support
 * for various WordPress features.
 *
 * Note that this function is hooked into the
 * after_setup_theme hook, which runs before
 * the init hook. The init hook is too late
 * for some features, such as indicating
 * support for post thumbnails.
 */
function twentyseventeen_child_setup() {
	/**
	 * Remove parent's support
	 * for 'post-formats'.
	 */
	// remove_theme_support( 'post-formats' );
	/**
	 * Or just modify parent's support
	 * for 'post-formats'.
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		// 'quote',
		// 'link',
		// 'gallery',
		// 'audio',
	) );

	/**
	 * Add theme support for 'custom-background'
	 * only in child theme.
	 */
	add_theme_support( 'custom-background' );

	/**
	 * Takes effect with priority or
	 * hooked to 'init' action hook.
	 */
	remove_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );
}
add_action( 'after_setup_theme', 'twentyseventeen_child_setup', 20 );

/**
 * Load scripts and styles.
 *
 * This function is attached to
 * 'wp_enqueue_scripts' action hook.
 */
function twentyseventeen_child_enqueue_scripts() {
	// Parent's stylesheet with fonts as deps.
	wp_enqueue_style( 'twentyseventeen-parent', get_template_directory_uri() . '/style.css', array( 'twentyseventeen-fonts' ) );
	// Child's stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );
	/**
	 * Child's custom Javascript file with
	 * 'twentyseventeen-skip-link-focus-fix' as dependedncy.
	 */
	wp_enqueue_script( 'twentyseventeen-child-js', get_stylesheet_directory_uri() . '/js/global.js', array('twentyseventeen-skip-link-focus-fix' ), time(), true );
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_enqueue_scripts' );

/**
 * Removing parent's hook like this
 * won't work. It needs to be hooked
 * either in 'after_setup_theme' action
 * hook with priority or in 'init'
 * action hook.
 */
// remove_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );

/**
 * Prints HTML with meta information
 * for the current post-date/time and author.
 *
 * We are using parent's custom function
 * wrapped in function_exists() check.
 */
function twentyseventeen_posted_on() {
	// Get the author name; wrap it in a link.
	$byline = sprintf(
		/* translators: %s: post author */
		__( ', author is %s', 'twentyseventeen' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
	);

	// Finally, let's write all of this to the page.
	echo '<span class="posted-on">' . twentyseventeen_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
}

/**
 * Filter parent's custom heading arguments.
 *
 * @param  array $args Array of custom header arguments.
 * @return array       Returns filtered array of custom header args.
 */
function twentyseventeen_child_filter_header_image( $args ) {
	$args['width'] = '1600';
	$args['height'] = '600';

	return $args;
}
add_filter( 'twentyseventeen_custom_header_args', 'twentyseventeen_child_filter_header_image' );
