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

<!-- <div class="container-fluid">
  <div class="col-xs-12 col-sm-12 col-md-12"> -->
    <?//php echo do_shortcode('[recent_post_slider limit="5" design="design-4" dots="false"]'); ?>
  <!-- </div>
</div> -->

<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./wp-content/imgs/FWG01.png" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h3>...</h3>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h3>...</h3>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h3>...</h3>
        <p>...</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->


<?php

ff_us_bs_carousel();

?>

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
