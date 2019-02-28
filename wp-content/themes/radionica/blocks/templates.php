<?php
/**
 * Templates for block editor
 *
 * @package WordPress
 */

namespace Radionica\Templates;

/**
 * Filters the arguments for registering a post type. This
 * function is attached to 'register_post_type_args' action hook.
 *
 * Accepts the same arguments as register_post_type(). Argument 'template'
 * is still not documented, ticket open:
 * @link https://core.trac.wordpress.org/ticket/46261
 *
 * @param array  $args        Array of arguments for registering a post type.
 * @param string $post_type   Post type key.
 *
 * @return array              Returns filtered array of arguments for registering a post type.
 */
function register_post_type_args( $args, $post_type ) {

	if ( 'post' == $post_type ) :

		$args['template'] = [
			[
				'core/heading', [
					'placeholder' => esc_html__( 'Post Subtitle', 'radionica' )
				]
			]
		];

	elseif ( 'page' == $post_type ) :

		$args['template'] = [
			[
				'core/heading', [
					'placeholder' => esc_html__( 'Page Subtitle', 'radionica' )
				]
			]
		];

	endif; // $post_type check

	return $args;
}
add_action( 'register_post_type_args', __NAMESPACE__ . '\register_post_type_args', 10, 2 );
