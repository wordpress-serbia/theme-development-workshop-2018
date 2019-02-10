<?php
/**
 * Main Template File
 *
 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/
 * @link https://wphierarchy.com/
 *
 * @package WordPress
 */
get_header();

	if ( have_posts() ) : ?>
		<div class="content-area">
			<?php while ( have_posts() ) : the_post();

				get_template_part( '/template-parts/entry' );

			endwhile; // have_posts() ?>
		</div>
	<?php endif; // have_posts()

get_sidebar();

get_footer();