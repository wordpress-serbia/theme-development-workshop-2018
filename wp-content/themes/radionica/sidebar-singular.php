<?php
/**
 * Sidebar Singular
 *
 * @package WordPress
 */
if ( is_active_sidebar( 'sidebar-singular' ) ) : ?>
	<aside class="widget-area widget-area-sidebar" role="complementary">
		<?php dynamic_sidebar( 'sidebar-singular' ); ?>
	</aside>
<?php endif;
