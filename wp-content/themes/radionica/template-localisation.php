<?php
/**
 * Template Name: Localisation
 *
 * Template for testing escaping functions.
 *
 * @package WordPress
 */
get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			the_title( '<h1 class="entry-title">', '</h1>' );
			the_content();
		endwhile; // have_posts()
	endif; // have_posts()

	echo '<h2>' . esc_html__( 'Basic strings', 'radionica' ) . '</h2>';
	/**
	 * __() & _e()
	 *
	 * @link https://developer.wordpress.org/reference/functions/__/
	 * @link https://developer.wordpress.org/reference/functions/_e/
	 * @link https://developer.wordpress.org/reference/functions/esc_html__/
	 * @link https://developer.wordpress.org/reference/functions/esc_html_e/
	 * @link https://developer.wordpress.org/reference/functions/esc_attr__/
	 * @link https://developer.wordpress.org/reference/functions/esc_attr_e/
	 */
	echo '<h3>__() and _e()</h3>';
	echo __( 'Basic string', 'radionica' );
	// Above is the same as:
	_e( 'Basic string', 'radionica' );

	// post object
	_x( 'Post', 'noun, appears in dashboard', 'radionica' );
	// to post comment
	echo _x( 'Post', 'verb, to submit comment', 'radionica' );
	_ex( 'Post', 'verb, to submit comment', 'radionica' );

get_footer();
