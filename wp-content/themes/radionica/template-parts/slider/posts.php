<?php
/**
 * Posts Slider
 *
 * @package WordPress
 */
if ( get_theme_mod( 'posts_slider' ) ) :

	$slider = get_theme_mod( 'posts_slider' ); ?>

	<div class="slider">
		<?php foreach ( $slider as $slide ) :
			$entry = get_post( $slide['post'] );
			$image = get_the_post_thumbnail( $slide['post'], 'full' ); ?>

			<div class="slide">
				<?php
					if ( has_post_thumbnail( $slide['post'] ) ) :
						echo $image;
					endif;
				?>
				<h2><?php echo esc_html( $entry->post_title ); ?></h2>
			</div>
		<?php endforeach; ?>
	</div>

<?php endif;