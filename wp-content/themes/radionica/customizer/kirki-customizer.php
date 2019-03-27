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

}
add_filter( 'kirki/fields', 'radionica_customizer_fields' );
