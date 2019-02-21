<?php
/**
 * Enqueue scripts and styles for block editor
 *
 * @package WordPress
 */

// PSR-0 for now
namespace Radionica\Assets;

/**
 * Enqueue scripts and styles for both, editor and frontend.
 */
function enqueue_block_assets() {

	wp_enqueue_style(
		'radionica-blocks-css',
		get_theme_file_uri( '/blocks/css/blocks.css' ),
		[],
		time()
	);

	wp_enqueue_script(
		'radionica-blocks-js',
		get_theme_file_uri( '/blocks/js/blocks.js' ),
		[],
		time()
	);
}
add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_block_assets' );

/**
 * Enqueue scripts and styles only for editor.
 */
function enqueue_block_editor_assets() {

	wp_enqueue_style(
		'radionica-editor-css',
		get_theme_file_uri( '/blocks/css/editor.css' ),
		[],
		time()
	);

	wp_enqueue_script(
		'radionica-editor-js',
		get_theme_file_uri( '/blocks/js/editor.js' ),
		[],
		time()
	);
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets' );
