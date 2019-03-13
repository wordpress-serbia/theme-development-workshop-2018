<?php
/**
 * Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
		<div class="wrapper">
			<?php
				if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
					<aside class="widget-area widget-area-header" role="complementary">
						<?php dynamic_sidebar( 'sidebar-header' ); ?>
					</aside>
				<?php endif;

				/**
				 * Get custom theme option from customizer.
				 */
				// if ( get_option( 'radionica_theme_options_welcome' ) ) :
				// 	echo get_option( 'radionica_theme_options_welcome' );
				// endif; // get_option( 'radionica_theme_options_welcome' )

				/**
				 * Get custom theme_mod from customizer.
				 */
				if ( get_theme_mod( 'radionica_options_panel_welcome' ) ) : ?>
					<div class="radionica-welcome-message">
						<p><?php echo get_theme_mod( 'radionica_options_panel_welcome' ); ?></p>
					</div>
				<?php endif; // get_theme_mod( 'radionica_options_panel_welcome' )

				if ( has_custom_logo() ) :
					the_custom_logo();
				else :
					if ( is_front_page() ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
					<?php else : ?>
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</p>
					<?php endif; // is_front_page() ?>

					<p class="site-description">
						<?php bloginfo( 'description' ); ?>
					</p>
				<?php endif; // has_custom_logo()

				/**
				 * Menu
				 *
				 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
				 */
				// wp_nav_menu( array(
				// 	'theme_location' => 'header',
				// 	'menu_class'     => 'radionica-menu',
				// 	'container'      => 'nav',
				// 	'after'          => '<span>icon</span>',
				// 	'link_before'    => '&rarr; ',
				// 	// 'depth'          => 1,
				// 	'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				// 	'item_spacing'   => 'discard',
				// 	'walker'         => new Radionica_Walker_Nav_Menu(),
				// ) );
				/**
				 * Custom menu
				 */
				if ( has_nav_menu( 'header' ) ) :
					wp_nav_menu( array(
						'theme_location'  => 'header',
						'container'       => 'nav',
						'container_class' => 'custom-navigation',
						'walker'          => new Custom_Walker_Nav_Menu(),
					) );
				else :
					wp_nav_menu();
				endif; // has_nav_menu( 'header' )

				/**
				 * Header image
				 *
				 * This is code we used on workshop
				 * but this is easily achieved with
				 * the_custom_header_markup()
				 */
				if ( get_header_image() ) :
					// Get custom header object.
					$custom_header = get_custom_header();
					// Get uploaded image ID.
					$header_id = $custom_header->attachment_id; ?>

					<div class="wp-custom-header">
						<img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_the_title( $header_id ) ); ?>" >
					</div>

				<?php endif; // get_header_image()

				/**
				 * Much easier and faster with the_custom_header_markup().
				 * @link https://developer.wordpress.org/reference/functions/the_custom_header_markup/
				 *
				 * Also, it uses srcset for responsive images.
				 * @link https://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/
				 */
				// the_custom_header_markup();
			?>
		</div><!-- wrapper -->
	</header>

	<main>
		<div class="wrapper">