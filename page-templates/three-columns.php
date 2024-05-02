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
          <?php if (get_field('sub_heading')) : ?>
            <h2 class="heading-two"><?php echo get_field('sub_heading') ?></h2>
            <div class="gradline"></div>
          <?php endif; ?>  
          <?php if (get_field('body_text')) : ?>
            <p class="body-text"><?php echo get_field('body_text') ?></p>
          <?php endif; ?>
          </div>
          <!---Body section left - End--->

          <!---Body section centre--->
          <div class="col-md-4 text-section">
          <?php if (get_field('sub_heading_two')) : ?>
            <h2 class="heading-two"><?php echo get_field('sub_heading_two') ?></h2>
            <div class="gradline"></div>
          <?php endif; ?>  
          <?php if (get_field('body_text_centre')) : ?>
            <p class="body-text"><?php echo get_field('body_text_centre') ?></p>
          <?php endif; ?>
          </div>
          <!---Body section centre - End--->

          <!---Body section right--->
          <div class="col-md-4 text-section">
          <?php if (get_field('sub_heading_three')) : ?>
            <h2 class="heading-two"><?php echo get_field('sub_heading_three') ?></h2>
            <div class="gradline"></div>
          <?php endif; ?>  
          <?php if (get_field('body_text_right')) : ?>
            <p class="body-text"><?php echo get_field('body_text_right') ?></p>
          <?php endif; ?>
          </div>
          <!---Body section right - End--->

        </div>

        <?php get_template_part('template-parts/downloads'); ?>
      </div>

</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>