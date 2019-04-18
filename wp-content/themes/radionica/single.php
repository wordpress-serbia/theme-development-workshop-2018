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

			$custom_meta = get_post_meta( $post->ID, 'radionica_meta_field', true );

			if ( $custom_meta ) :
				echo esc_html( $custom_meta['radionica_meta_field'] );
			endif;

			/**
			 * Advanced Custom Fields plugin
			 *
			 * Text field
			 *
			 * @link https://www.advancedcustomfields.com/resources/get_field/
			 * @link https://www.advancedcustomfields.com/resources/the_field/
			 */
			if ( get_field( 'acf_custom_field' ) ) :
				the_field( 'acf_custom_field' );
			endif;

			/**
			 * Relationship field
			 *
			 * @link https://www.advancedcustomfields.com/resources/relationship/
			 */
			if ( is_array( get_field( 'related_posts' ) ) ) :
				$related_posts = get_field( 'related_posts' );

				$output = '<ul>';

				foreach ( $related_posts as $related_post ) :
					$output .= '<li>';
					$output .= '<h4>';
					$output .= '<a href="' . esc_url( get_permalink( $related_post ) ) . '">';
					$output .= esc_html( get_the_title( $related_post ) );
					$output .= '</a>';
					$output .= ' &vert; ';
					$output .= '<small>' . get_the_date( get_option( 'date_format' ), $related_post ) . '</small>';
					$output .= '</h4>';
					$output .= '</li>';
				endforeach;

				$output .= '</ul>';

				echo $output; // WPCS: XSS ok.

			endif; // is_array( get_field( 'related_posts' ) )

			if ( has_post_format() ) :
				get_template_part( '/template-parts/format', get_post_format() );
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