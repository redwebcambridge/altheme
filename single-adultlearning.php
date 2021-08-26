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

          <div class="col-md-2 text-section">
          <?php
				$menu_choice = get_field('top_navigation_menu','option');
				wp_nav_menu(
					array('menu'=>$menu_choice, 'menu_id' => 'sidebar-menu')
				);
			?>
          </div>

          <!---Sidebar - End--->


          <!---Body section--->

          <div class="col-md-10 text-section">
              <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

              <div class="gradline"></div>

              <p class="body-text"><?php the_field('body_text') ?></p>
              <div class="gradline my-5"></div>


              <h3>Course Details</h3>
              <div class="row course_details">
                  <div class="col">
                      <strong class="table_head">Day</strong><br />
                      <?php if(get_field('day')) { ?>
                          <?php the_field('day'); ?>
                      <?php } ?>
                  </div>
                  <div class="col">
                    <strong class="table_head">Time</strong><br />
                      <?php if(get_field('time')) { ?>
                        <?php the_field('time'); ?>
                      <?php } ?>
                  </div>
                  <div class="col">
                    <strong class="table_head">Weeks/Term</strong><br />
                      <?php if(get_field('weeksterm')) { ?>
                        <?php the_field('weeksterm'); ?>
                      <?php } ?>
                  </div>
                  <div class="col">
                    <strong class="table_head">Start Date</strong><br />
                      <?php if(get_field('start_date')) { ?>
                        <?php the_field('start_date'); ?>
                      <?php } ?>
                  </div>
                  <div class="col">
                    <strong class="table_head">Cost</strong><br />
                      <?php if(get_field('course_cost')) { ?>
                        <?php the_field('course_cost'); ?>
                      <?php } ?>
                  </div>
                  <div class="col">
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
