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
