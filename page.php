<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anglian_Learning
 */

get_header();
?>

<div class="container">
  <div class="row">
    <div class="main-content d-flex justify-content-center align-items-center">
      <!-- <img class="main" src="<?php //the_field('main_image'); ?>" alt=""> -->

      <span class="overlaid-text"><?php the_field('title'); ?></span>
      <?php the_content(); ?>
    </div>

    <?php get_template_part('downloads'); ?>

  </div>
</div>

<?php
// get_sidebar();
get_footer();
