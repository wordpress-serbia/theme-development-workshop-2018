<?php
/**
 * Entry Post
 *
 * Template part for rendering singular entry.
 *
 * @package WordPress
 */
?>
<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'featured-single' ); ?>
		</div>
	<?php endif; // has_post_thumbnail() ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<footer class="entry-footer">
		<div class="entry-categories"><?php the_category( ', ' ); ?></div>
		<?php the_tags( '<div class="entry-tags">', ', ', '</div>' ); ?>
	</footer>

</article>