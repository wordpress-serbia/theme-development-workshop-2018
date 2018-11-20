<?php
/**
 * Single
 *
 * Template for displaying all posts.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/
 * @link https://wphierarchy.com/
 *
 * @package WordPress
 */
get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			get_template_part( '/template-parts/entry', get_post_type() );

		endwhile; // have_posts()
	endif; // have_posts()

get_footer();
