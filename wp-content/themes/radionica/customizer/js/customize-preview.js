/**
 * Customizer preview
 *
 * Customizer live preview.
 *
 * @link https://developer.wordpress.org/themes/customize-api/tools-for-improved-user-experience/#using-postmessage-for-improved-setting-previewing
 */

(function( $ ) {

	wp.customize( 'radionica_options_panel_welcome', function( value ) {
		value.bind( function( to ) {
			$( '.radionica-welcome-message p' ).html( to );
		} );
	} );

} )( jQuery );
