<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ff_us
 */

?>

	</div><!-- #content -->
</div>

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ff_us' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'ff_us' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'ff_us' ), 'ff_us', '<a href="http://aknapp.at/blog">Alexander Knapp</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
