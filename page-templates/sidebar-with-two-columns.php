<?php
/*
Template Name: Sidebar with two columns
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


      <div class="container">
        <div class="row">
          <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>

          <div class="col-md-5 text-section"> 
            <?php if (get_field('sub_heading')) : ?>
              <h2 class="heading-two"><?php echo get_field('sub_heading'); ?></h2>
              <div class="gradline"></div>
            <?php endif; ?>
            <?php if (get_field('body_text')) : ?>
              <p class="body-text"><?php echo get_field('body_text') ?></p>
            <?php endif; ?>
          </div>

          <div class="col-md-4 text-section">
          <?php if (get_field('body_text_right')) : ?>
            <p class="body-text"><?php echo get_field('body_text_right') ?></p>
          <?php endif; ?>
          </div>
        </div>

        <?php get_template_part('template-parts/downloads'); ?>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
