<?php
/**
 * Main Template File
 *
 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/
 * @link https://wphierarchy.com/
 *
 * @package WordPress
 */
get_header(); ?>

<main>
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();

				the_title( '<h1>', '</h1>' );
				the_content();

			endwhile; // have_posts()
		endif; // have_posts()
	?>
</main>

<?php get_footer();
