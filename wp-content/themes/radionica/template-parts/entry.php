<?php
/**
 * Entry
 *
 * Template part for rendering singular entry.
 *
 * @package WordPress
 */
if ( is_archive() || is_home() ) :

	the_title(
		'<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . the_title_attribute( array( 'echo' => false ) ) . '">',
		'</a></h2>'
	);
	the_excerpt();
	the_category( ', ' );

else :

	the_title( '<h1 class="entry-title">', '</h1>' );
	the_content();

	if ( is_single() ) :
		the_category( ', ' );
		the_tags( '', ', ' );
	endif;

endif;
