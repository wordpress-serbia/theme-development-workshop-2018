<?php
/**
 * Template functions
 *
 * @package WordPress
 */

if ( ! function_exists( 'radionica_html5_comment' ) ) :
	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	function radionica_html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li'; ?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						<?php
							/* translators: %s: comment author link */
							printf( __( '%s <span class="says">says:</span>' ),
								sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) )
							);
						?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php
									/* translators: 1: comment date, 2: comment time */
									printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
								?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
					/**
					 * @todo  params should be changed to correct order in 5.1.
					 * https://core.trac.wordpress.org/ticket/45498
					 */
					comment_reply_link( array_merge( $depth, array(
						'add_below' => 'div-comment',
						'depth'     => $args,
						'max_depth' => $depth['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>'
					) ) );
				?>
			</article><!-- .comment-body --> <?php
	}
endif; // ! function_exists( 'radionica_html5_comment' )

/**
 * Reverse Comment Form fields order and set cookies
 * consent field after the comment field.
 *
 * This function is attached to 'comment_form_fields' filter hook.
 *
 * For overriding in child themes remove the filter hook:
 * remove_filter( 'comment_form_fields', 'radionica_comment_form_fields' );
 *
 * @param  array $fields The comment fields.
 * @return array Returns filtered comment form fields
 */
function radionica_comment_form_fields( $fields ) {
	if ( get_post_type() == 'post' ) :
		// Remove Website field.
		unset( $fields['url'] );
		// Unset Comment field so that Name and Email move to top.
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		// If cookies are enabled in Dashboard, do the same as with Comment field above.
		if ( isset( $fields['cookies'] ) ) :
			$cookies = $fields['cookies'];
			unset( $fields['cookies'] );
			$fields['cookies'] = $cookies;
		endif; // isset( $fields['cookies'] )
	endif; // get_post_type() == 'post'

	return $fields;
}
add_filter( 'comment_form_fields', 'radionica_comment_form_fields' );

/**
 * Filters the custom logo output.
 *
 * @param string $html Custom logo HTML output.
 * @return string      Returns filtered custom logo HTML output.
 */
function radionica_get_custom_logo( $html ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	/**
	 * This one was added just to avoid
	 * 'undefined' notice. For real project
	 * please check all the conditionals in
	 * function.
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_custom_logo/
	 */
	$custom_logo_attr = array(
		'class'    => 'custom-logo',
		'itemprop' => 'logo',
	);
	/*
	 * If the alt attribute is not empty, there's no need to explicitly pass
	 * it because wp_get_attachment_image() already adds the alt attribute.
	 */
	$html = sprintf( '<a href="%1$s" class="custom-logo-link radionica" rel="home" itemprop="url">%2$s</a>',
		esc_url( home_url( '/' ) ),
		wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
	);

	return $html;
}
add_filter( 'get_custom_logo', 'radionica_get_custom_logo' );

/**
 * Modify document title
 *
 * Change the document title appearance. This function is
 * attached to 'document_title_parts' filter hook.
 *
 * @param array $title {
 *     The document title parts. In that order.
 *
 *     @type string $title   Title of the viewed page.
 *     @type string $page    Optional. Page number if paginated.
 *     @type string $tagline Optional. Site description when on home page.
 *     @type string $site    Optional. Site title when not on home page.
 * }
 * @return array        Returns filtered document title parts
 */
function radionica_document_title_parts( $title ) {
	if ( is_front_page() ) :
		$title['tagline'] = $title['title'];
		$title['title']   = esc_html__( 'This is the home', 'radionica' );
	elseif ( is_single() ) :
		$title['title'] = '#' . get_the_ID() . ' ' . get_the_title( get_the_ID() );
		$title['site']  = get_bloginfo( 'description', 'display' ) . ' / ' . $title['site'];
	endif;

	return $title;
}
add_filter( 'document_title_parts', 'radionica_document_title_parts' );

/**
 * Document title separator
 *
 * Change the separator which will appear between
 * each document title part. This function is attached
 * to 'document_title_separator' filter hook.
 *
 * @param  string $sep Separator for document title, default '-'
 * @return string      Returns filtered separator
 */
function radionica_document_title_separator( $sep ) {
	if ( is_front_page() ) :
		$sep = '//';
	elseif ( is_single() ) :
		$sep = '/';
	endif;

	return $sep;
}
add_filter( 'document_title_separator', 'radionica_document_title_separator' );

/**
 * Body classes
 *
 * Custom classes for <body> tag. This function
 * is attached to 'body_class' filter hook. For
 * overriding in child themes, simply remove
 * the filter hook.
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function radionica_body_class( $classes ) {

	if ( is_active_sidebar( 'sidebar-main' ) && ( is_archive() || is_home() ) ) :
		$classes[] = 'has-sidebar';
	endif;

	if ( is_active_sidebar( 'sidebar-singular' ) && is_page_template( 'template-sidebar.php' ) ) :
		$classes[] = 'has-sidebar';
	endif;

	return $classes;
}
add_filter( 'body_class', 'radionica_body_class' );

/**
 * Filters the archive description. This function is attached to
 * 'get_the_archive_description' filter hook.
 *
 * @since 4.1.0
 *
 * @param string $description Archive description to be displayed.
 */
function radionica_get_the_archive_description( $description ) {
	if ( is_year() ) :
		$description = sprintf( esc_html__( 'Archive for %s year.', 'radionica' ),
			get_the_date( _x( 'Y', 'yearly archives date format' ) )
		);
	elseif ( is_month() ) :
		$description = sprintf( esc_html__( 'Archive for %1$s of %2$s year.', 'radionica' ),
			get_the_date( _x( 'F', 'monthly archives date format' ) ),
			get_the_date( _x( 'Y', 'yearly archives date format' ) )
		);
	elseif ( is_day() ) :
		$description = sprintf( esc_html__( 'Posts published on %1$s of %2$s, in %3$s year.', 'radionica' ),
			get_the_date( _x( 'jS', 'daily archives date format' ) ),
			get_the_date( _x( 'F', 'monthly archives date format' ) ),
			get_the_date( _x( 'Y', 'yearly archives date format' ) )
		);
	endif;

	return $description;
}
add_filter( 'get_the_archive_description', 'radionica_get_the_archive_description' );
