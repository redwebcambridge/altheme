<?php
/*
Template Name: About page
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container about-page">
        <div class="row">

          <!---Body section left--->

          <div class="col-md-2 text-section">
            <?php

            $menu_choice = get_field('menu');

            wp_nav_menu(

              array('menu'=>$menu_choice,'menu_id'=>'sidebar-menu')

            );


            ?>
          </div>

          <!---Body section left - End--->


          <!---Body section centre--->

          <div class="col-md-7 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

            <div class="gradline"></div>

            <p class="body-text"><?php the_field('body_text') ?></p>

          </div>

          <!---Body section Centre - End--->


          <!---Body section right--->

          <div class="col-md-3 text-section">

              <img src="<?php the_field('image_one'); ?>" class="about-image-one" />
              <img src="<?php the_field('image_two'); ?>" />

          </div>

          <!---Body section right - End--->

        </div>

        <?php get_template_part('template-parts/downloads'); ?>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
