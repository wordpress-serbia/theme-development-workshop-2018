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

								if ( get_sub_field( 'heading' ) ) :
									echo '<h2>' . esc_html( get_sub_field( 'heading' ) ) . '</h2>';
								endif;

							elseif ( get_row_layout() == 'heading_h3' ) :

								if ( get_sub_field( 'heading' ) ) :
									echo '<h3>' . esc_html( get_sub_field( 'heading' ) ) . '</h3>';
								endif;

							elseif ( get_row_layout() == 'heading_h4' ) :

								if ( get_sub_field( 'heading' ) ) :
									echo '<h4>' . esc_html( get_sub_field( 'heading' ) ) . '</h4>';
								endif;

							elseif ( get_row_layout() == 'lead_paragraph' ) :

								if ( get_sub_field( 'textarea' ) ) :
									echo '<p class="lead-paragraph">' . esc_html( get_sub_field( 'textarea' ) ) . '</p>';
								endif;

							elseif ( get_row_layout() == 'image' ) :

								if ( get_sub_field( 'image' ) ) :
									$image = get_sub_field( 'image' );
									echo '<img src="' . esc_url( $image['url'] ) . '" alt="' . esc_attr( $image['alt'] ) . '">';
								endif;

							elseif ( get_row_layout() == 'wysiwyg' ) :

								if ( get_sub_field( 'editor' ) ) :
									/**
									 * Ternary operator
									 *
									 * @link https://davidwalsh.name/php-ternary-examples
									 * @link https://davidwalsh.name/php-shorthand-if-else-ternary-operators
									 *
									 * PHP 7+
									 * @link https://php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op
									 */
									$background_color = ( get_sub_field( 'background_color' ) ) ? get_sub_field( 'background_color' ) : '#fff';

									echo '<div style="background-color:' . esc_attr( $background_color ) . ';">' . wp_kses_post( get_sub_field( 'editor' ) ) . '</div>';

								endif; // get_sub_field( 'editor' )

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
