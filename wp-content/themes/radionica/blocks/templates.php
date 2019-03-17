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

		$args['template_lock'] = 'all'; // insert, all

		$args['template'] = [
			[
				'core/heading', [
					'placeholder' => esc_html__( 'Subtitle', 'radionica' ),
					'level'       => 2
				]
			],
			[
				'core/image', [
					'align' => 'right'
				]
			],
			[
				'core/paragraph', [
					'align'       => 'left',
					'placeholder' => esc_html__( 'All of Chopin\'s compositions include the piano. Most are for solo piano, though he also wrote two piano concertos, a few chamber pieces, and some 19 songs set to Polish lyrics. His piano writing was technically demanding and expanded the limits of the instrument: his own performances were noted for their nuance and sensitivity.', 'radionica' )
				]
			],
			[
				'core/cover', [
					'align' => 'wide',
					'dimRatio' => 0
				]
			],
			[
				'core/heading', [
					'placeholder' => esc_html__( 'Yet Another Heading', 'radionica' ),
					'align'       => 'center',
					'level'       => 3
				]
			],
			[
				'core/separator'
			],
			[
				'core/list'
			],
			[
				'core/columns', [
					'align'   => 'wide', // wide, full
				],
				[
					[
						'core/column', [], [
							[
								'core/image', []
							],
						]
					],
					[
						'core/column', [], [
							[
								'core/paragraph', [
									'placeholder' => esc_html__( 'Add a inner paragraph', 'radionica' )
								]
							],
						]
					],
				]
			],
			[
				'core/gallery'
			],
			[
				'core/heading', [
					'content' => esc_html__( 'Latest Posts', 'radionica' ),
					'level'   => 4
				]
			],
			[
				'core/latest-posts'
			],
		];

	elseif ( 'page' == $post_type ) :

		$args['template'] = [
			[
				'core/heading', [
					'placeholder' => esc_html__( 'Page Subtitle', 'radionica' ),
					'level'       => 4
				]
			]
		];

	endif; // $post_type check

	return $args;
}
add_filter( 'register_post_type_args', __NAMESPACE__ . '\register_post_type_args', 10, 2 );
