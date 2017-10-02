<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ff_us
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-xs-12 col-sm-4 col-md-4">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
