<?php
/**
 * Custom Theme Options
 *
 * @package WordPress
 */

/**
 * Register customizer theme options
 *
 * This function is attached to 'customize_register' action hook.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function radionica_customize_register_options( $wp_customize ) {
	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}

	/**
	 * Top Level Section
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
	 */
	$wp_customize->add_section( 'radionica_theme_options_section', array(
		'priority'    => 10,
		'title'       => esc_html__( 'Radionica Options Section', 'radionica' ),
		'description' => esc_html__( 'Custom section for Radionica theme.', 'radionica' ),
	) );

	/**
	 * Setting
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 */
	$wp_customize->add_setting( 'radionica_theme_options_welcome', array(
		'type'       => 'option',
		'capability' => 'manage_options',
		'default'    => esc_html__( 'Welcome to my website.', 'radionica' ),
	) );

	/**
	 * Control
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 */
	$wp_customize->add_control( 'radionica_theme_options_welcome', array(
		'type'        => 'text',
		'section'     => 'radionica_theme_options_section',
		'label'       => esc_html__( 'Welcome Message', 'radionica' ),
		'description' => esc_html__( 'Set custom welcome message for the header of your website.', 'radionica' ),
		'input_attrs' => array(
			'class' => 'my-custom-class'
		)
	) );

	/**
	 * Top Level Panel
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
	 */
	$wp_customize->add_panel( 'radionica_options_panel', array(
		'priority'    => 9,
		'title'       => esc_html__( 'Radionica Options Panel', 'radionica' ),
		'description' => esc_html__( 'Custom panel for Radionica theme.', 'radionica' ),
	) );

	/**
	 * Section
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
	 */
	$wp_customize->add_section( 'radionica_options_panel_section', array(
		'priority'    => 10,
		'panel'       => 'radionica_options_panel',
		'title'       => esc_html__( 'Radionica Panel Section 1', 'radionica' ),
		'description' => esc_html__( 'Custom section for panel.', 'radionica' ),
	) );

	/**
	 * Setting
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 */
	$wp_customize->add_setting( 'radionica_options_panel_welcome', array(
		'type'      => 'theme_mod',
		'transport' => 'postMessage',
	) );

	/**
	 * Control
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 */
	$wp_customize->add_control( 'radionica_options_panel_welcome', array(
		'type'        => 'text',
		'section'     => 'radionica_options_panel_section',
		'label'       => esc_html__( 'Welcome Message 2', 'radionica' ),
		'description' => esc_html__( 'Set another custom welcome message for the header of your website.', 'radionica' ),
		'input_attrs' => array(
			'class' => 'my-custom-class'
		)
	) );

	/**
	 * Add partial to selective refresh.
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_selective_refresh/add_partial/
	 */
	$wp_customize->selective_refresh->add_partial( 'radionica_options_panel_welcome', array(
		'selector'        => '.radionica-welcome-message p',
		'render_callback' => 'radionica_customize_partial_welcome',
	) );

}
add_action( 'customize_register', 'radionica_customize_register_options' );

/**
 * Selective refresh callback for welcome message.
 *
 * @return string Returns custom welcome message.
 */
function radionica_customize_partial_welcome() {
	return get_theme_mod( 'radionica_options_panel_welcome' );
}
