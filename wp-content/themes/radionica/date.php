<?php
/**
 * Date Archives Template
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
		?>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="content-area">
			<ol>
				<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
							<header class="entry-header">
								<?php
									// Translators: 1. published date in DATE_W3C format, 2. published date in F jS format
									$date = sprintf( __( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>', 'radionica' ),
										get_the_date( DATE_W3C ),
										get_the_date( 'F jS' )
									);
									the_title(
										'<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . the_title_attribute( array( 'echo' => false ) ) . '">',
										'</a>, ' . $date . '</h2>'
									);
								?>
							</header>
						</article>
					</li>
				<?php endwhile; // have_posts() ?>
			</ol>
		</div>
	<?php endif; // have_posts()

get_sidebar();

get_footer();
