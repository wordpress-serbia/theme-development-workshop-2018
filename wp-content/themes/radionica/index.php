<?php
/**
 * Main Template File
 *
 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/
 * @link https://wphierarchy.com/
 *
 * @package WordPress
 */
get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			the_title(
				'<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . the_title_attribute( array( 'echo' => false ) ) . '">',
				'</a></h2>'
			);

			the_excerpt();

		endwhile; // have_posts()
	endif; // have_posts()

get_footer();
