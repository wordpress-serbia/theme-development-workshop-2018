<?php
/**
 * Meta box
 *
 * Custom post meta functionality.
 *
 * @link https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/#comment-60
 *
 * @package WordPress
 */

/**
 * Register meta box(es).
 */
function radionica_register_meta_boxes() {
	add_meta_box(
		'meta-box-id',
		esc_html__( 'My Meta Box', 'radionica' ),
		'radionica_my_display_callback',
		'post'
	);
}
add_action( 'add_meta_boxes', 'radionica_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function radionica_my_display_callback( $post ) {
	$meta = get_post_meta( $post->ID, 'radionica_meta_field', true ); ?>

	<label for="my-meta-text-field">My text field</label>
	<input id="my-meta-text-field" name="radionica_meta_field" type="text" value="<?php if ( ! empty( $meta['radionica_meta_field'] ) ) { echo $meta['radionica_meta_field']; } ?>" />
	<?php
	wp_nonce_field( 'radionica_meta_field_nonce', 'meta_field_nonce' );
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function radionica_save_meta_box( $post_id ) {
	// Ignore autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Do we have nonce?
	if ( ! isset( $_POST['meta_field_nonce'] ) ) {
		return;
	}
	// Is the nonce valid?
	if ( ! wp_verify_nonce( $_POST['meta_field_nonce'], 'radionica_meta_field_nonce' ) ) {
		return;
	}
	// Are we looking at 'post' post type and can current user edit posts?
	if ( $_POST['post_type'] == 'post' ) :
		if ( ! current_user_can( 'edit_post', $post_id ) ) :
			return;
		endif; // ! current_user_can( 'edit_page', $post_id )
	endif; // $_POST['post_type'] == 'post'

	// Do we have any value for our field?
	if ( ! empty( $_POST['radionica_meta_field'] ) && isset( $_POST['radionica_meta_field'] )  ) :
		$new_data['radionica_meta_field'] = (string) $_POST['radionica_meta_field'];
	endif;
	// Sanitize the value.
	$new_data = sanitize_meta( 'radionica_meta_field', $new_data, 'post' );
	/**
	 * Finally update meta
	 */
	update_post_meta( $post_id, 'radionica_meta_field', $new_data );

	return $post_id;
}
add_action( 'save_post', 'radionica_save_meta_box' );
