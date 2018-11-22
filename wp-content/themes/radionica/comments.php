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

if ( have_comments() ) : ?>

	<ol class="commentlist">
		<?php wp_list_comments( array(
			'avatar_size'       => false,
			'reverse_top_level' => true,
			'callback'          => 'radionica_html5_comment'
		) ); ?>
	</ol>

<?php endif; // have_comments()

comment_form();

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
