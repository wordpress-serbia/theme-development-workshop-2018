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
			?>
		</div><!-- wrapper -->
	</header>

	<main>
		<div class="wrapper">
