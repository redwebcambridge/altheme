<?php
/*
Template Name: Two Columns
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container">
        <div class="row">

          <!---Body section left--->
          <div class="col-md-6 text-section">
          <?php if (get_field('sub_heading_left')) : ?>
            <h2 class="heading-two"><?php the_field('sub_heading_left') ?></h2>
            <div class="gradline"></div>
          <?php endif; ?>
          <?php if (get_field('body_text')) : ?>
            <p class="body-text"><?php the_field('body_text') ?></p>
          <?php endif; ?>
          </div>
          <!---Body section left - End--->

          <!---Body section right--->
          <div class="col-md-6 text-section">
          <?php if (get_field('sub_heading_right')) : ?>
            <h2 class="heading-two"><?php the_field('sub_heading_right') ?></h2>
            <div class="gradline"></div>
          <?php endif; ?>
          <?php if (get_field('body_text_right')) : ?>
            <p class="body-text"><?php the_field('body_text_right') ?></p>
          <?php endif; ?>
          </div>
          <!---Body section right - End--->

        </div>

        <?php get_template_part('template-parts/downloads'); ?>

      </div>

</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
