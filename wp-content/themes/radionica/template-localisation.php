<?php
/**
 * Template Name: Localisation
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

	echo '<div>';

	echo '<h2>' . esc_html__( 'Basic strings', 'radionica' ) . '</h2>';

	/**
	 * __() & _e()
	 *
	 * @link https://developer.wordpress.org/reference/functions/__/
	 * @link https://developer.wordpress.org/reference/functions/_e/
	 */
	echo '<h3>__() and _e()</h3>';
	echo __( 'Basic string', 'radionica' );
	// Above is the same as:
	_e( 'Basic <strong>string</strong>', 'radionica' );
	/**
	 * Single or double quote?
	 *
	 * Avoid escaping quotes whenever possible.
	 */
	// Single
	__( 'This text contains "double" quote.', 'radionica' );
	__( 'This text contains \'single\' quote.', 'radionica' );
	// Double
	__( "This text contains 'single' quote.", "radionica" );
	__( "This text contains \"double\" quote.", "radionica" );
	/**
	 * esc_html__() and esc_html_e()
	 *
	 * Escaped for HTML.
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_html__/
	 * @link https://developer.wordpress.org/reference/functions/esc_html_e/
	 */
	echo '<h3>esc_html__() and esc_html_e()</h3>';
	echo esc_html__( 'Basic string', 'radionica' );
	// Above is the same as:
	esc_html_e( 'Basic <strong>string</strong>', 'radionica' );

	echo '<h4>Examples</h4>';
	echo '<p>' . esc_html__( 'We are acquainted with the wormhole phenomenon, but this... Is a remarkable piece of bio-electronic engineering by which I see much of the EM spectrum ranging from heat and infrared through radio waves, et cetera, and forgive me if I have said and listened to this a thousand times.', 'radionica' ) . '</p>';
	// or
	echo '<p>';
	esc_html_e( 'We are acquainted with the wormhole phenomenon, but this... Is a remarkable piece of bio-electronic engineering by which I see much of the EM spectrum ranging from heat and infrared through radio waves, et cetera, and forgive me if I have said and listened to this a thousand times.', 'radionica' );
	echo '</p>';
	/**
	 * esc_attr__() and esc_attr_e()
	 *
	 * Escaped for attribute.
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_attr__/
	 * @link https://developer.wordpress.org/reference/functions/esc_attr_e/
	 */
	echo '<h3>esc_attr__() and esc_attr_e()</h3>';

	echo esc_attr__( 'Basic string', 'radionica' );
	// Above is the same as:
	esc_attr_e( 'Basic string', 'radionica' );

	echo '<h4>Examples</h4>';
	$link = '<a href="" title="' . esc_attr__( 'This is title attribute for the link.', 'radionica' ) . '">';
	$link .= esc_html__( 'This is the link', 'radionica' );
	$link .= '</a>';

	echo $link;
	// or
?>
	<a href="" title="<?php esc_attr_e( 'This is title attribute for the link.', 'radionica' ); ?>">
		<?php esc_html_e( 'This is the link', 'radionica' ); ?>
	</a>
<?php
	/**
	 * _x() & _ex()
	 *
	 * Context.
	 *
	 * @link https://developer.wordpress.org/reference/functions/_x/
	 * @link https://developer.wordpress.org/reference/functions/_ex/
	 */
	echo '<h3>_x() and _ex()</h3>';
	// post object
	_x( 'Post', 'noun, appears in dashboard', 'radionica' );
	// to post comment
	echo _x( 'Post', 'verb, to submit comment', 'radionica' );
	// Above is the same as:
	_ex( 'Post', 'verb, to submit comment', 'radionica' );
	/**
	 * esc_html_x() & esc_attr_x()
	 *
	 * Escaped for HTML and attribute with context.
	 *
	 * @link https://developer.wordpress.org/reference/functions/esc_html_x/
	 * @link https://developer.wordpress.org/reference/functions/esc_attr_x/
	 */
	echo '<h3>esc_html_x() and esc_attr_x()</h3>';
	echo '<h4>Examples</h4>';
	// "Book" as noun
	$title = '<h5>';
	$title .= '<span>' . esc_html_x( 'Book: ', 'noun: book post type', 'radionica' ) . '</span>';
	$title .= get_the_title( get_the_ID() );
	$title .= '</h5>';
	echo $title;
	// "Book" as verb
	$button = '<button title="' . esc_attr__( 'Book your holiday now!', 'radionica' ) . '">';
	$button .= esc_html_x( 'Book', 'verb: make reservation, booking', 'radionica' );
	$button .= '</button>';
	echo $button;
	/**
	 * _n() & _nx()
	 *
	 * Singular and plural.
	 *
	 * @link https://developer.wordpress.org/reference/functions/_n/
	 * @link https://developer.wordpress.org/reference/functions/_nx/
	 */
	echo '<h3>_n() and _nx()</h3>';
	// string $single, string $plural, int $number, string $domain
	$number = 1;
	echo _n( 'Only one', 'More than one', $number, 'radionica' );

	// See also: https://en.wikipedia.org/wiki/Yoda_conditions
	if ( 1 === $number ) :
		echo 'Only one';
	elseif ( 1 < $number ) :
		echo 'More than one';
	endif;

	// string $single, string $plural, int $number, string $context, string $domain
	echo _nx( 'Only one', 'More than one', $number, 'How many items', 'radionica' );
	/**
	 * number_format_i18n()
	 *
	 * Number format.
	 *
	 * @global WP_Locale $wp_locale
	 *
	 * @link https://developer.wordpress.org/reference/functions/number_format_i18n/
	 */
	echo '<h3>number_format_i18n()</h3>';
	$another_number = 1024.58;

	echo number_format_i18n( $another_number, 2 );
	printf(
		_n(
			'%s item',
			'%s items',
			$another_number,
			'radionica'
		),
		number_format_i18n( $another_number, 2 )
	);
	echo sprintf(
		_nx(
			'%s item',
			'%s items',
			$another_number,
			'Number of items',
			'radionica'
		),
		number_format_i18n( $another_number, 2 )
	);

	echo '<h4>Examples</h4>';
	$comments_number = get_comments_number();
	printf(
		/* translators: 1: number of comments, 2: post title */
		_nx(
			'%1$s Reply to %2$s',
			'%1$s Replies to %2$s',
			$comments_number,
			'comments title',
			'radionica'
		),
		number_format_i18n( $comments_number ),
		get_the_title()
	);

	/**
	 * date_i18n()
	 *
	 * Date and time format.
	 *
	 * @global WP_Locale $wp_locale
	 *
	 * @link https://developer.wordpress.org/reference/functions/date_i18n/
	 */
	echo '<h3>date_i18n()</h3>';
	echo date_i18n( get_option( 'date_format' ), current_time( 'timestamp' ) );
	echo date_i18n( get_option( 'time_format' ), current_time( 'timestamp' ) );

	echo '<h4>Examples</h4>';
	$published_date = get_the_date( DATE_W3C );
	$date = date_i18n( get_option( 'date_format' ), strtotime( $published_date ) );
	$time = date_i18n( get_option( 'time_format' ), strtotime( $published_date ) );
	echo 'Published on: ' . $date . ' at ' . $time;
	// or
	printf(
		// Translators: 1. Published date, 2. Published time
		esc_html_x(
			'Published on: %1$s at %2$s',
			'Page publish date',
			'radionica'
		),
		date_i18n( get_option( 'date_format' ), strtotime( get_the_date( DATE_W3C ) ) ),
		date_i18n( get_option( 'time_format' ), strtotime( get_the_date( DATE_W3C ) ) )
	);

	echo '</div>';

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

	/**
	 * _n() & _nx()
	 *
	 * Singular and plural.
	 *
	 * @link https://developer.wordpress.org/reference/functions/_n/
	 * @link https://developer.wordpress.org/reference/functions/_nx/
	 */
	echo '<h3>_n() and _nx()</h3>';

	// string $single, string $plural, int $number, string $domain
	$number = 4;
	echo _n( 'Only one', 'More than one', $number, 'radionica' );

	// See also: https://en.wikipedia.org/wiki/Yoda_conditions
	if ( 1 === $number ) :
		echo 'Only one';
	elseif ( 1 < $number ) :
		echo 'More than one';
	endif;

	// string $single, string $plural, int $number, string $context, string $domain
	echo _nx( 'Only one', 'More than one', $number, 'How many items', 'radionica' );

	/**
	 * number_format_i18n()
	 *
	 * Number format.
	 *
	 * @link https://developer.wordpress.org/reference/functions/number_format_i18n/
	 */
	echo '<h3>number_format_i18n()</h3>';

	$another_number = 1024.58;

	printf(
		_n(
			'%s item',
			'%s items',
			$another_number,
			'radionica'
		),
		number_format_i18n( $another_number, 2 )
	);

	echo sprintf(
		_nx(
			'%s item',
			'%s items',
			$another_number,
			'Number of items',
			'radionica'
		),
		number_format_i18n( $another_number, 2 )
	);

	echo '<h4>Examples</h4>';

	$comments_number = get_comments_number();
	printf(
		/* translators: 1: number of comments, 2: post title */
		_nx(
			'%1$s Reply to &ldquo;%2$s&rdquo;',
			'%1$s Replies to &ldquo;%2$s&rdquo;',
			$comments_number,
			'comments title',
			'radionica'
		),
		number_format_i18n( $comments_number ),
		get_the_title()
	);

get_footer();
