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

			if ( has_post_format() ) :
				get_template_part( '/template-parts/entry', get_post_format() );
			else :
				get_template_part( '/template-parts/entry', get_post_type() );
			endif; // has_post_format()

		endwhile; // have_posts()
	endif; // have_posts()

	$navigation_args = array(
		'prev_text'          => esc_html__( '&larr; %title', 'radionica' ),
		'next_text'          => esc_html__( '%title &rarr;', 'radionica' ),
		'in_same_term'       => true,
		'taxonomy'           => 'category',
		'screen_reader_text' => esc_html__( 'Post navigation', 'radionica' ),
	);

	the_post_navigation( $navigation_args );

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

get_footer();
