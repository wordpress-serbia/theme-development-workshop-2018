<?php
/**
 * Template Name: Escaping
 *
 * Template for testing escaping functions.
 *
 * @package WordPress
 */
get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			the_title( '<h1 class="entry-title">', '</h1>' );
		endwhile; // have_posts()
	endif; // have_posts()

	echo '<h2>Custom HTML</h2>';

	$string = '
		<div class="custom-string-class">
			<p>This is the custom string paragraph with a <a href="https://sr.wordpress.org/news/" rel="bookmark">link</a>, a <span>span</span>, <strong>bold</strong> and <em>italic</em> text, wrapped in <code>&lt;div&gt;</code>.</p>
			<ul>
				<li>List item 1</li>
				<li>List item 2</li>
				<li>List item 3</li>
				<li>List item 4</li>
				<li>List item 5</li>
			</ul>
		</div>
	';

	echo '<h3>Raw</h3>';
	echo $string;

	/**
	 * esc_html()
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_html/
	 * @link http://php.net/manual/en/function.htmlspecialchars.php
	 */
	echo '<h3>esc_html()</h3>';
	echo esc_html( $string );
	echo htmlspecialchars( $string );

get_footer();
