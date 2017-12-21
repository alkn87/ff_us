<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ff_us
 */

get_header(); ?>
<div class="row">
<div class="col-xs-12 col-sm-8 col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			echo get_the_post_navigation(array(
    				'prev_text' => '<< %title',
    				'next_text' => '%title >>',
						));

			?>
			<span align="left"; display="inline">
				<?php previous_post_link();?>
			</span>
			<span align="right"; display="inline">
			<?php next_post_link();?>
			</span>
			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_sidebar();
get_footer();
