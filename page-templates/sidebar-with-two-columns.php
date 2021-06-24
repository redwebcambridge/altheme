<?php
/*
Template Name: Sidebar with two columns
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


      <div class="container">
        <div class="row">
          <!---Body section left--->
          <div class="col-md-2 text-section">
            <?php
            $menu_choice = get_field('menu_select');
            wp_nav_menu(
              array('menu'=>$menu_choice, 'menu_id' => 'sidebar-menu')
            );
            ?>
          </div>
          <!---Body section left - End--->


          <!---Body section centre--->
          <div class="col-md-5 text-section">
            <?php if (the_field('sub_heading')) : ?>
              <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
              <div class="gradline"></div>
            <?php endif; ?>
            <p class="body-text"><?php the_field('body_text') ?></p>
          </div>
          <!---Body section Centre - End--->


          <!---Body section right--->
          <div class="col-md-5 text-section">
            <p class="body-text"><?php the_field('body_text_right') ?></p>
          </div>
          <!---Body section right - End--->
        </div>

        <?php get_template_part('downloads'); ?>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
