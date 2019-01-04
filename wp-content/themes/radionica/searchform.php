<?php
/**
 * Template for displaying search forms.
 *
 * @package WordPress
 */
if ( get_search_query() ) :
	$query = get_search_query();
else :
	$query = '';
endif;
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'radionica' ); ?></span>
	</label>
	<input type="search" id="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'radionica' ); ?>" value="<?php echo esc_attr( $query ); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'radionica' ); ?></button>
</form>
