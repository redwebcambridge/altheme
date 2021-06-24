<?php
/*
Template Name: Three Columns
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container">
        <div class="row">

          <!---Body section left--->

          <div class="col-md-4 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

            <div class="gradline"></div>

            <p class="body-text"><?php the_field('body_text') ?></p>

          </div>

          <!---Body section left - End--->


          <!---Body section centre--->

          <div class="col-md-4 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading_two') ?></h2>

            <div class="gradline"></div>

            <p class="body-text"><?php the_field('body_text_centre') ?></p>

          </div>

          <!---Body section centre - End--->


          <!---Body section right--->

          <div class="col-md-4 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading_three') ?></h2>

            <div class="gradline"></div>

            <p class="body-text"><?php the_field('body_text_right') ?></p>

          </div>

          <!---Body section right - End--->

        </div>

        <?php get_template_part('downloads'); ?>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
