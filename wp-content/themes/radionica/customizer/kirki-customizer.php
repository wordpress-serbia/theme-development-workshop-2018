<?php
/**
 * Kirki customizer fields.
 *
 * @package WordPress
 */

/**
 * Extend Kirki fields
 *
 * This function is attached to 'kirki/fields' filter hook.
 *
 * @link https://aristath.github.io/blog/build-wordpress-theme-using-kirki
 *
 * @param WP_Customize_Manager $fields The Customizer object.
 */
function radionica_customizer_fields( $fields ) {

	/**
	 * Typography
	 */
	// H1
	$fields[] = [
		'type'        => 'typography',
		'settings'    => 'typography_h1',
		'section'     => 'radionica_options_panel_typography',
		'label'       => esc_html__( 'H1', 'kirki' ),
		'description' => esc_html__( 'Heading Level 1', 'kirki' ),
		'default'     => [
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '36px',
			'line-height'    => '1.2',
		],
		'priority'    => 10,
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => 'h1',
			],
		],
	];

	return $fields;
}
add_filter( 'kirki/fields', 'radionica_customizer_fields' );
