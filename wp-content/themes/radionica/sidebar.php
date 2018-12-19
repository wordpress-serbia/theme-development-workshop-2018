<?php
/**
 * Sidebar
 *
 * @package WordPress
 */
if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
	<aside class="widget-area widget-area-sidebar" role="complementary">
	    <?php dynamic_sidebar( 'sidebar-main' ); ?>
	</aside>
<?php endif;
