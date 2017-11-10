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

</div><!-- #row -->

<div class="row">
	<div class="col-xs-12 col-sm-4 col-md-4">
	<h2>Lorem Ipsum</h2>
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

	<div class="col-xs-12 col-sm-4 col-md-4">
		<h2>Social Media</h2>
			<p>Facebook</p>
			<p>Twitter</p>
			<p>Facebook</p>
	</div>

	<div class="col-xs-12 col-sm-4 col-md-4">
		<h2>Kontakt</h2>
			<span>Hauptstraße 70</span>
			<span>3021 Pressbaum</span>
			<span><span class="glyphicon glyphicon-phone-alt"></span> 02233 52222</span>
	</div>


</div>
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
