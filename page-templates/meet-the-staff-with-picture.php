<?php
/*
Template Name: Meet the staff with picture
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="meet-the-staff2">
    <div class="container">
      <div class="row">
          <!---sidebar--->
          <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>
          <!---Sidebar - End--->

          <!---Body section--->
          <div class="col-md-9">

              <div class="row">
                <div class="col">
                  <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
                  <div class="gradline"></div>
                  <p class="body-text"><?php the_field('intro_text') ?></p>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-12 staff-container">

                  <div class="col-12 col-md-6">
                  <?php 
                  $staffcount = 1;
                  if( have_rows('table_of_staff') ): 
                    while( have_rows('table_of_staff') ): the_row(); 
                      if($staffcount % 2 !== 0): 
                        get_template_part('template-parts/staff-block'); 
                      endif;
                    $staffcount++;
                    endwhile;
                  endif; 
                  ?>  
                </div>

                <div class="col-12 col-md-6">
                  <?php 
                  $staffcount = 1;
                  if( have_rows('table_of_staff') ): 
                    while( have_rows('table_of_staff') ): the_row(); 
                      if($staffcount % 2 == 0): 
                        get_template_part('template-parts/staff-block'); 
                      endif;
                    $staffcount++;
                    endwhile;
                  endif; 
                  ?>  
                </div>
                    
                </div>
              </div>

        </div>
      </div>
      <?php get_template_part('template-parts/downloads'); ?>

    </div>

</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
