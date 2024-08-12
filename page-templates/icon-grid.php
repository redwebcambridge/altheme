<?php
/*
Template Name: Icon Grid
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container" id="grid_layout">
        <div class="row">

          <?php if ( get_field('icons_display_menu') ) : ?>
            <div class="col-md-3 text-section">
              <?php get_template_part('template-parts/sidebar-menu'); ?>
            </div>
          <?php endif; ?>
          

         
          <div class="<?php if (get_field('icons_display_menu')) : echo 'col-md-9'; else : echo 'col-12'; endif; ?> text-section">


            <?php if ( get_field('icons_display_title') ) : ?>
              <h2><?php echo get_field('icons_display_title'); ?></h2>
            <?php endif; ?>

            <?php if ( get_field('icons_display_intro') ) : ?>
              <?php echo get_field('icons_display_intro'); ?>
            <?php endif; ?>
          
          

            <?php if ( have_rows('icons_grid') ) : ?>

              <div class="row mb-4">
                <?php while( have_rows('icons_grid') ) : the_row(); ?>

                <div class="col-12 col-md-6 col-lg-4 text-center p-2">
                  <div class="single_icon">
                    <h5 class="pt-4 px-2"><?php the_sub_field('icon_grid_title'); ?></h5>
                    <div class="pb-2 w-100"><?php the_sub_field('icon_grid_sub_title'); ?></div>
                    <img src="<?php echo get_sub_field('icon_grid_icon')['url']; ?>" alt="<?php echo get_sub_field('icon_grid_icon')['alt']; ?>">
                  </div>
                </div>
              
              
                <?php endwhile; ?>
              </div>
            
             
            
            <?php endif; ?>
            

            <?php if (get_field('sub_heading')) : ?>
              <h2 class="heading-two"><?php echo get_field('sub_heading') ?></h2>
              <div class="gradline"></div>
            <?php endif; ?>  

            <div class="body-text">
              <?php echo the_content(); ?>
            </div>


          </div>

        </div>

        <?php get_template_part('template-parts/downloads'); ?>
      </div>

</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
