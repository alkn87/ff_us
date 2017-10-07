<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ff_us
 */

get_header(); ?>

<h1 style="text-align: center">WILLKOMMEN BEI DER FEUERWEHR PRESSBAUM</h1>

<div class="container-fluid">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <?php echo do_shortcode('[recent_post_slider limit="5" design="design-4" dots="false"]'); ?>
  </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-8 col-md-8">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  get_template_part( 'template-parts/content', get_post_format() );
?>

    <?php endwhile; else: ?>
        <p><?php _e('Sorry, this page does not exist.'); ?></p>
    <?php endif; ?>
  </div>


  <?php
  get_sidebar();
  get_footer();
