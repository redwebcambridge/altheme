<?php
/*
Template Name: One Column
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<!---Body section--->

      <div class="container">
        <div class="row">
          <div class="col-12 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

            <div class="gradline"></div>

            <p class="body-text"><?php the_field('body_text') ?></p>

          </div>
        </div>

        <?php get_template_part('downloads'); ?>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
