<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Anglian_Learning
 */

get_header();
?>

<div class="adult-learning-page">
      <div class="container">
        <div class="row">

          <!---Sidebar--->

          <div class="col-md-3 text-section">
          <?php
				$menu_choice = get_field('top_navigation_menu','option');
				wp_nav_menu(
					array('menu'=>$menu_choice, 'menu_id' => 'sidebar-menu')
				);
			?>
          </div>

          <!---Sidebar - End--->


          <!---Body section--->

          <div class="col-md-9 text-section">
              <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

              <div class="gradline"></div>

              <p class="body-text"><?php the_field('body_text') ?></p>
              <div class="gradline my-5"></div>


              <h3>Course Details</h3>
              <div class="row course_details">
              <?php
                  if(get_field('day') !== '--Please Select--') { ?>
                  <div class="col-6 col-md-4 col-lg-2">
                   <strong class="table_head">Day</strong>
                   <span><?php the_field('day'); ?></span>
                  </div>
                  <?php } ?>
                  <?php if(get_field('time')) { ?>
                  <div class="col-6 col-md-4 col-lg-2">
                    <strong class="table_head">Time</strong>
                    <span><?php the_field('time'); ?></span>
                  </div>
                  <?php } ?>
                  <?php if(get_field('weeksterm')) { ?>
                  <div class="col-6 col-md-4 col-lg-2">
                    <strong class="table_head">Weeks/Term</strong>
                    <span><?php the_field('weeksterm'); ?></span>
                  </div>
                  <?php } ?>
                  <?php if(get_field('start_date')) { ?>
                  <div class="col-6 col-md-4 col-lg-2">
                    <strong class="table_head">Start Date</strong>
                    <span><?php the_field('start_date'); ?></span>
                  </div>
                  <?php } ?>
                  <?php if(get_field('course_cost')) { ?>
                  <div class="col-6 col-md-4 col-lg-2">
                    <strong class="table_head">Cost</strong>
                    <span><?php the_field('course_cost'); ?></span>
                  </div>
                  <?php } ?>
                  <div class="col-6 col-md-4 col-lg-2">
                        <a class="btn btn-primary rounded-0" href="<?php the_field('wisepay_url'); ?>">Book now</a>
                  </div>
              </div>





          <!---Body section - End--->
        </div>
    </div>

</div>
</section>

<?php
// get_sidebar();
get_footer();
