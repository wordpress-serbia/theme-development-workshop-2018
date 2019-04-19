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
