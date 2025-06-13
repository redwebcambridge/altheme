<?php
/*
Template Name: Sidebar with one column
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container">
        <div class="row">

          <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>

          <div class="col-md-9 text-section" role="article">
            <?php if (get_field('sub_heading')) : ?>
              <h2 class="heading-two"><?php echo get_field('sub_heading') ?></h2>
              <div class="gradline"></div>
            <?php endif; ?>  
            <p class="body-text"><?php echo get_field('body_text') ?></p>
          </div>

        </div>

        <?php get_template_part('template-parts/downloads'); ?>
      </div>

</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
