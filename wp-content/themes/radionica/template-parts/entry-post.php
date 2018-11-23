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
		<div class="entry-categories">
			<?php
				// Translators: 1. string Categories, 2. categories assigned to post
				printf( __( '%1$s %2$s', 'radionica' ),
					esc_html__( 'Categories:', 'radionica' ),
					get_the_category_list( ', ' )
				);
			?>

			<?php
				// esc_html_e( 'Categories: ', 'radionica' );
				// the_category( ', ' );
			?>
		</div>

		<?php the_tags( '<div class="entry-tags">' . esc_html__( 'Tags: ', 'radionica' ), ', ', '</div>' ); ?>

		<?php
			// Translators: 1. string Published on, 2. day archive link, 3. published date in DATE_W3C format, 4. published date in dahsboard defined format
			printf( __( '%1$s <a href="%2$s"><time class="entry-date published updated" datetime="%3$s">%4$s</time></a>', 'radionica' ),
				esc_html__( 'Published on', 'radionica' ),
				get_day_link( get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ),
				get_the_date( DATE_W3C ),
				get_the_date()
			);
		?>
	</header>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'radionica' ),
				'after'  => '</div>',
			));
		?>
	</div>

	<footer class="entry-footer">
		<div class="entry-author">
			<h2><?php esc_html_e( 'Author', 'radionica' ); ?></h2>
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
			<span class="author vcard">
				<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?php echo get_the_author_meta( 'display_name' ); ?>
				</a>
			</span>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<p class="description">
					<?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?>
				</p>
			<?php endif; ?>
		</div>
	</footer>

</article>