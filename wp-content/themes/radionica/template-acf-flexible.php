<?php
/**
 * Template Name: ACF Flexible content
 *
 * Template for ACF flexible content.
 *
 * @link https://www.advancedcustomfields.com/resources/flexible-content/
 *
 * @package WordPress
 */
get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>

			<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<?php
					the_title( '<h1 class="entry-title">', '</h1>' );

					if ( have_rows( 'flexible_content' ) ) :
						while ( have_rows( 'flexible_content' ) ) : the_row();

							if ( get_row_layout() == 'heading_h2' ) :

							elseif ( get_row_layout() == 'heading_h3' ) :

							elseif ( get_row_layout() == 'heading_h4' ) :

							elseif ( get_row_layout() == 'lead_paragraph' ) :

							elseif ( get_row_layout() == 'image' ) :

							elseif ( get_row_layout() == 'wysiwyg' ) :

							endif; // get_row_layout()

						endwhile; // have_rows( 'flexible_content' )
					else :
						the_content();
					endif; // have_rows( 'flexible_content' )
				?>
			</article>

		<?php
		endwhile; // have_posts()
	endif; // have_posts()

get_footer();
