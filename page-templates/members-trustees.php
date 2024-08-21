<?php
/*
Template Name: Members & Trustees
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="meet-the-staff2" id="members-trustees">
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
                  <h2><?php echo get_field('mt_sub_heading') ?></h2>
                  <div class="gradline"></div>
                  <p class="body-text"><?php echo get_field('mt_intro_text') ?></p>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-12 staff-container pe-4">

                  <div class="col-12 col-md-6 members me-2">

                  <div class="row">
                    <div class="col">
                      <h2><?php echo get_field('mt_members_title') ?></h2>
                      <div class="gradline"></div>
                    </div>
                  </div>
                   
                  <?php 
                  $staffcount = 1;
                  if( have_rows('mt_members_staff') ): 
                    while( have_rows('mt_members_staff') ): the_row(); 
                        get_template_part('template-parts/staff-block'); 
                    endwhile;
                  endif; 
                  ?>  
                </div>

                <div class="col-12 col-md-6 trustees ms-2">
                  <div class="row">
                    <div class="col">
                      <h2><?php echo get_field('mt_trustees_title') ?></h2>
                      <div class="gradline"></div>
                    </div>
                  </div>

                <?php 
                  if( have_rows('mt_trustees_staff') ): 
                    while( have_rows('mt_trustees_staff') ): the_row(); 
                        get_template_part('template-parts/staff-block'); 
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
