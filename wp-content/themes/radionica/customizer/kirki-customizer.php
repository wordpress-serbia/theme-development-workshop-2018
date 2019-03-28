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
	 * Switch
	 *
	 * Warning: Choices are strings, 'on' and 'off', but it returns bool (!).
	 * See 'active_callback' in 'typography_h1' control.
	 *
	 * @link http://aristath.github.io/kirki/docs/controls/switch.html
	 */
	$fields[] = [
		'type'        => 'switch',
		'settings'    => 'typography_enable',
		'label'       => esc_html__( 'Enable custom typography', 'radionica' ),
		'section'     => 'radionica_options_panel_typography',
		'priority'    => 9,
		'default'     => 'off',
		'choices'     => [
			'on'  => esc_attr__( 'ON', 'radionica' ),
			'off' => esc_attr__( 'OFF', 'radionica' )
		],
	];

	/**
	 * Typography
	 *
	 * @link http://aristath.github.io/kirki/docs/controls/typography.html
	 */
	// H1
	$fields[] = [
		'type'        => 'typography',
		'settings'    => 'typography_h1',
		'section'     => 'radionica_options_panel_typography',
		'label'       => esc_html__( 'H1', 'radionica' ),
		'description' => esc_html__( 'Heading Level 1', 'radionica' ),
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
		/**
		 * Active callback
		 *
		 * @link http://aristath.github.io/kirki/docs/arguments/active_callback.html
		 */
		'active_callback'  => [
			[
				'setting'  => 'typography_enable',
				'operator' => '==',
				'value'    => 1
			]
		],
	];

	/**
	 * Radio Buttonset
	 *
	 * @link http://aristath.github.io/kirki/docs/controls/radio-buttonset.html
	 */
	$fields[] = [
		'type'        => 'radio-buttonset',
		'settings'    => 'colors_enable',
		'label'       => esc_html__( 'Enable custom colors', 'radionica' ),
		'section'     => 'radionica_options_panel_colors',
		'default'     => 'disable',
		'choices'     => [
			'enable'  => esc_html__( 'Turn ON', 'radionica' ),
			'disable' => esc_html__( 'Turn OFF', 'radionica' ),
		],
	];

	/**
	 * Color Palette
	 *
	 * @link http://aristath.github.io/kirki/docs/controls/color-palette.html
	 */
	$fields[] = [
		'type'        => 'color-palette',
		'settings'    => 'color_headings',
		'label'       => esc_html__( 'Headings', 'radionica' ),
		'description' => esc_html__( 'Select color for H1 and Widget Title.', 'radionica' ),
		'section'     => 'radionica_options_panel_colors',
		'default'     => '#888888',
		'choices'     => [
			'colors' => [
				'#666666',
				'#888888',
				'#aaaaaa',
				'#cccccc',
				'#eeeeee'
			],
		],
		/**
		 * Active callback
		 *
		 * @link http://aristath.github.io/kirki/docs/arguments/active_callback.html
		 */
		'active_callback'  => [
			[
				'setting'  => 'colors_enable',
				'operator' => '==',
				'value'    => 'enable'
			]
		],
	];

	return $fields;
}
add_filter( 'kirki/fields', 'radionica_customizer_fields' );
