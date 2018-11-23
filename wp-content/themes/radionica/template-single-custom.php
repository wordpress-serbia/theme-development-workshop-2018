<?php
/**
 * Template Name: Single Custom Template
 *
 * Template Post Type: post
 *
 * Custom template for post type post.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-page-templates-for-specific-post-types
 * @link https://make.wordpress.org/core/2016/11/03/post-type-templates-in-4-7/
 * @link https://wphierarchy.com/
 *
 * @package WordPress
 */
get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			if ( has_post_format() ) :
				get_template_part( '/template-parts/format', get_post_format() );
			else :
				get_template_part( '/template-parts/entry', get_post_type() );
			endif; // has_post_format()

		endwhile; // have_posts()
	endif; // have_posts()

get_footer();
