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
			?>

<nav class="custom-navigation">
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">Category</a>
			<ul>
				<li>
					<div class="entry-title">
						<a href="#">Post title</a>
						<span>This is description</span>
					</div>
					<div class="entry-summary">
						<p>The Accessibility Team works to make WordPress accessible to as many people as possible. This means making sure people are not just able to read web pages but also to maintain websites. You are a part of this mission. You benefit from this mission. So in the spirit of one of the largest open-source communities in the world, let’s work on universal accessibility.</p>
					</div>
					<div class="entry-image">
						<img src="https://images.unsplash.com/photo-1495774539583-885e02cca8c2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b4876c41d5e7585486007cab84b34512">
					</div>
				</li>
				<li>
					<div class="entry-title">
						<a href="#">Post title</a>
						<span>This is description</span>
					</div>
					<div class="entry-summary">
						<p>In this Make WordPress Accessibility Handbook you will learn what the best practices are for web accessibility, the many great accessibility tools, the testing we do to improve WordPress, themes, and plugins, and how to get involved in WordPress accessibility.</p>
					</div>
					<div class="entry-image">
						<img src="https://s.w.org/style/images/about/WordPress-logotype-alternative.png">
					</div>
				</li>
				<li>
					<div class="entry-title">
						<a href="#">Post title</a>
						<span>This is description</span>
					</div>
					<div class="entry-summary">
						<p>Below are the web essentials you’ll need to make your site accessible. Other handbook pages explain why these standards are critical to your site. This page tells you how to quickly implement the standards, with WordPress-specific code examples, guidelines, and best-practices.</p>
					</div>
					<div class="entry-image">
						<img src="https://s.w.org/style/images/about/WordPress-logotype-wmark.png">
					</div>
				</li>
			</ul>
		</li>
	</ul>
</nav>

			<?php
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
