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

}
add_action( 'customize_register', 'radionica_customize_register_options' );
