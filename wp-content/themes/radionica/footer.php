<?php
/**
 * Footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 */
?>

<footer>
	<p>
		<?php
			printf( esc_html__( '&copy; %s', 'radionica' ),
				get_bloginfo( 'name', 'display' )
			);
		?>
	</p>
</footer>

<?php wp_footer(); ?>

</body>
</html>
