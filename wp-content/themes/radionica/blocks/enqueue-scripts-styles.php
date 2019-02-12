<?php
/**
 * Enqueue scripts and styles for block editor
 *
 * @package WordPress
 */

/**
 * Enqueue scripts and styles for both, editor and frontend.
 */
function radionica_enqueue_block_assets() {

	wp_enqueue_style(
		'radionica-blocks-css',
		get_theme_file_uri( '/blocks/css/blocks.css' )
	);

	wp_enqueue_script(
		'radionica-blocks-js',
		get_theme_file_uri( '/blocks/js/blocks.js' )
	);
}
add_action( 'enqueue_block_assets', 'radionica_enqueue_block_assets' );
