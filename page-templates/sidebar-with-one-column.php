<?php
/*
Template Name: Sidebar with one column
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container">
        <div class="row">

          <!---Body section centre--->
          <div class="col-md-2 text-section">
            <!-- sidebar to go here -->
            <?php
            $menu_choice = get_field('menu_select');
            wp_nav_menu(
              array('menu'=>$menu_choice, 'menu_id' => 'sidebar-menu')
            );
            ?>
          </div>

          <!---Body section Centre - End--->

          <!---Body section centre--->
          <div class="col-md-10 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
            <div class="gradline"></div>
            <p class="body-text"><?php the_field('body_text') ?></p>
          </div>

          <!---Body section Centre - End--->

        </div>

        <?php get_template_part('downloads'); ?>
      </div>

</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
