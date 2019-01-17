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

get_footer();
