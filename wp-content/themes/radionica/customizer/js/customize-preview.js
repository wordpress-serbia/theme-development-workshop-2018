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

	// Site title.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		});
	});

	// Site description.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		});
	});

} )( jQuery );
