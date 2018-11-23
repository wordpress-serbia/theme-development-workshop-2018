<?php
/**
 * Comments
 *
 * Template for displaying comments list and form on single posts.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/comments/
 *
 * @package WordPress
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">
	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'radionica' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'radionica'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="commentlist">
			<?php wp_list_comments( array(
				'avatar_size'       => false,
				'reverse_top_level' => true,
				'callback'          => 'radionica_html5_comment'
			) ); ?>
		</ol>

		<?php

			the_comments_navigation( array(
				'prev_text' => esc_html__( '&larr; Previous', 'radionica' ),
				'next_text' => esc_html__( 'Next &rarr;', 'radionica' )
			));

	endif; // have_comments()

	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		esc_html_e( 'Comments are closed.', 'radionica' );
	endif;

	if ( comments_open() ) :
		// Dashbord -> Settings -> Discussion -> Other comment settings
		if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :
			/* Translators: 1: Log in URL */
			printf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'starter' ),
				esc_url( wp_login_url( get_permalink() ) ) // WPCS: XSS ok.
			);
		else :
			comment_form();
		endif;
	endif;
	?>
</div>

<?php
/**
 * Comment form arguments
 */
// $req      = get_option( 'require_name_email' );
// $commenter = wp_get_current_commenter();
// $html_req = ( $req ? " required='required'" : '' );

// $args['fields'] = array(
// 	'author'  => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
// 				 '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . ' /></p>',
// 	'email'   => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
// 				 '<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $html_req . ' /></p>',
// );

// if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
// 	$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
// 	$args['fields']['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
// 						 '<label for="wp-comment-cookies-consent">' . __( 'Save my name, email, and website in this browser for the next time I comment.' ) . '</label></p>';

// 	// Ensure that the passed fields include cookies consent.
// 	if ( isset( $args['fields'] ) && ! isset( $args['fields']['cookies'] ) ) {
// 		$args['fields']['cookies'] = $args['fields']['cookies'];
// 	}
// }

// comment_form( $args );
