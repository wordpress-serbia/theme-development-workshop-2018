<?php
/**
 * Custom Theme Options
 *
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
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
	 *
	 * Sanitizing functions
	 * @link https://developer.wordpress.org/themes/theme-security/data-sanitization-escaping/
	 *
	 * Custom sanitize_callbacks
	 * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
	 */
	$wp_customize->add_setting( 'radionica_options_panel_welcome', array(
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
		'default'           => esc_html__( 'This is the place for your custom welcome message.', 'radionica' ),
		'sanitize_callback' => 'sanitize_text_field'
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
	 * Change order and title for default sections.
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/get_section/
	 */
	$wp_customize->get_section( 'static_front_page' )->priority = 15;
	$wp_customize->get_section( 'header_image' )->title         = esc_html__( 'Header Image and Video', 'radionica' );

	/**
	 * Set site title and tagline to 'postMessage'.
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/get_setting/
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/register_controls/
	 */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/**
	 * Add partial to selective refresh.
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_customize_selective_refresh/add_partial/
	 */
	$wp_customize->selective_refresh->add_partial( 'radionica_options_panel_welcome', array(
		'selector'        => '.radionica-welcome-message p',
		'render_callback' => 'radionica_customize_partial_welcome',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'radionica_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'radionica_customize_partial_blogdescription',
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

/**
 * Selective refresh callback for site title.
 *
 * @return string Returns custom site title.
 */
function radionica_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Selective refresh callback for site description.
 *
 * @return string Returns custom site description.
 */
function radionica_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueue scripts and styles for customizer preview.
 *
 * This function is attached to 'customize_preview_init' action hook.
 */
function radionica_customize_preview() {
	wp_enqueue_script(
		'radionica-customize-preview',
		get_theme_file_uri( '/customizer/js/customize-preview.js' ),
		array( 'customize-preview' ),
		'1.0',
		true
	);
}
add_action( 'customize_preview_init', 'radionica_customize_preview' );

/**
 * Enqueue scripts and styles for customizer controls.
 *
 * This function is attached to 'customize_controls_enqueue_scripts' action hook
 */
function radionica_customize_controls() {
	wp_enqueue_style( 'radionica-customize-controls', get_parent_theme_file_uri( '/customizer/css/style.css' ) );
}
add_action( 'customize_controls_enqueue_scripts', 'radionica_customize_controls' );
