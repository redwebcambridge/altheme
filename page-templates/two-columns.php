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
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

            <div class="gradline"></div>

            <p class="body-text"><?php the_field('body_text') ?></p>

          </div>

          <!---Body section left - End--->


          <!---Body section right--->

          <div class="col-md-6 text-section">

            <p class="body-text"><?php the_field('body_text_right') ?></p>

          </div>

          <!---Body section right - End--->

        </div>

        <?php get_template_part('downloads'); ?>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
