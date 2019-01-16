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
			the_content();
		endwhile; // have_posts()
	endif; // have_posts()

	echo '<h2>Custom HTML</h2>';

	$string = '
		<head>
			<link rel="profile" href="http://gmpg.org/xfn/11">
		</head>
		[gallery link="file" size="medium" ids="113,59"]
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
		<script type="text/javascript">
			console.log( window.location.href );
		</script>
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
	// echo htmlspecialchars( $string );

	/**
	 * esc_textarea()
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_textarea/
	 */
	echo '<h3>esc_textarea()</h3>';
	echo esc_textarea( $string );

	/**
	 * wp_kses_post()
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_kses_post/
	 */
	echo '<h3>wp_kses_post()</h3>';
	echo wp_kses_post( $string );

	/**
	 * wp_kses()
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_kses/
	 */
	echo '<h3>wp_kses()</h3>';
	$allowed = [
		'div' => [],
		'p'   => [],
		'a'   => [
			'href' => [],
			'rel' => []
		],
		'ul'  => []
	];
	echo wp_kses( $string, $allowed );

	/**
	 * the_content and the_excerpt filters
	 *
	 * @link https://developer.wordpress.org/reference/functions/the_content/
	 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
	 */
	echo '<h3>the_content filter</h3>';
	echo apply_filters( 'the_content', $string );
	echo '<h3>the_excerpt filter</h3>';
	echo apply_filters( 'the_excerpt', $string );

	/**
	 * Attributes
	 */
	echo '<h2>Attributes</h2>';

	$attr = '<div class="someclass">somediv<br>another &quot;row&quot;</div>';

	echo '<h3>Raw</h3>';
	echo $attr;
	// echo '<div id="' . $attr . '">somediv</div>';

	/**
	 * esc_attr()
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_attr/
	 */
	echo '<h3>esc_attr()</h3>';
	echo esc_attr( $attr );
	echo '<div id="' . esc_attr( $attr ) . '">somediv</div>';

	/**
	 * esc_url()
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_url/
	 */
	echo '<h3>esc_url()</h3>';
	$url = 'example.com/some page';
	echo esc_url( $url );

	$url = 'https://sr.wordpress.org/news/';
	echo esc_url( $url, array( 'https' ) );

	$email = 'email@example.com';
	echo esc_url( $email );

	/**
	 * antispambot()
	 *
	 * @link https://developer.wordpress.org/reference/functions/antispambot/
	 */
	echo '<h3>antispambot()</h3>';
	echo antispambot( $email );

get_footer();
