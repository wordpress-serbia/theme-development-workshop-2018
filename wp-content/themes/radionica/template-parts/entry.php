<?php
/**
 * Entry
 *
 * Template part for rendering singular entry.
 *
 * @package WordPress
 */
?>
<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<?php if ( is_archive() || is_home() ) : ?>

			<header class="entry-header">
				<?php
					the_title(
						'<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . the_title_attribute( array( 'echo' => false ) ) . '">',
						'</a></h2>'
					);
				?>
			</header>

			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>

			<footer class="entry-footer">
				<div class="entry-categories"><?php the_category( ', ' ); ?></div>
			</footer>

		<?php else : ?>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php if ( is_single() ) : ?>
				<footer class="entry-footer">
					<div class="entry-categories"><?php the_category( ', ' ); ?></div>
					<?php the_tags( '<div class="entry-tags">', ', ', '</div>' ); ?>
				</footer>
			<?php endif; // is_single()

		endif; // is_archive() || is_home()
	?>
</article>