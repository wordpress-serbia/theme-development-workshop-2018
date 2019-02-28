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
				'core/paragraph', [
					'dropCap'         => true,
					'align'           => 'left', // left, center, right
					'placeholder'     => esc_html__( 'Lead Paragraph', 'radionica' ),
					'textColor'       => 'whitish', // Registered color slug
					'backgroundColor' => 'blckish', // Registered color slug
					'fontSize'        => 'regular', // Registered font size slug
					'content'         => esc_html__( 'Chopin was born Fryderyk Franciszek Chopin in the Duchy of Warsaw and grew up in Warsaw, which in 1815 became part of Congress Poland. A child prodigy, he completed his musical education and composed his earlier works in Warsaw before leaving Poland at the age of 20, less than a month before the outbreak of the November 1830 Uprising. At 21, he settled in Paris. Thereafter—in the last 18 years of his life—he gave only 30 public performances, preferring the more intimate atmosphere of the salon.', 'radionica' )
				]
			],
			[
				'core/heading', [
					'placeholder' => esc_html__( 'Post Subtitle', 'radionica' ),
					'level'       => 3,       // 1-6
					'align'       => 'right', // left, center, right
					'content'     => esc_html__( 'Default Subtitle', 'radionica' )
				]
			],
			[
				'core/image', [
					'align' => 'wide'
				]
			]
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
add_action( 'register_post_type_args', __NAMESPACE__ . '\register_post_type_args', 10, 2 );
