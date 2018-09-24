<?php
/**
 * Footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 */
?>
		</div><!-- wrapper -->
	</main>

	<footer>
		<div class="wrapper">
			<p>
				<?php
					printf( esc_html__( '&copy; %s', 'radionica' ),
						get_bloginfo( 'name', 'display' )
					);
				?>
			</p>
		</div><!-- wrapper -->
	</footer>

<?php wp_footer(); ?>

</body>
</html>
