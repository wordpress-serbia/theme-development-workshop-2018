<?php
/**
 * Search Results Template File
 *
 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/
 * @link https://wphierarchy.com/
 *
 * @package WordPress
 */
get_header(); ?>

 	<header class="archive-header">
 		<?php
 			the_archive_title( '<h1 class="archive-title">', '</h1>' );
 			the_archive_description( '<p>', '</p>' );

 			echo get_search_form();
 		?>
 	</header>

	<?php if ( have_posts() ) : ?>
		<div class="content-area">
			<?php while ( have_posts() ) : the_post();

				get_template_part( '/template-parts/entry' );

			endwhile; // have_posts() ?>
		</div>
	<?php else :

		esc_html_e( 'No results match your criteria.', 'radionica' );

	endif; // have_posts()

get_sidebar();

get_footer();
