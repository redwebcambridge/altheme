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
              wp_nav_menu(
                array('menu'=>'adult-learning-menu', 'menu_id' => 'sidebar-menu')
              );
              ?>
          </div>

          <!---Sidebar - End--->


          <!---Body section--->

          <div class="col-md-10 text-section">
              <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

              <div class="gradline"></div>

              <p class="body-text"><?php the_field('body_text') ?></p>


              <h3>Course Details</h3>
              <div class="row">
                  <div class="col">
                      <strong>Date(s)</strong><br />
                      <?php if(get_field('single_day_event')) { ?>
                          <?php $singledatetime = get_field('single_day_date_&_time'); ?>
                          <?php echo $singledatetime['single_date']; ?>
                      <?php } else { ?>
                          <?php the_field('start_date'); ?> - <?php the_field('end_date'); ?>
                      <?php } ?>
                  </div>
                  <div class="col">
                      <strong>Time</strong><br />
                      <?php if(get_field('single_day_event')) { ?>
                          <?php $singledatetime = get_field('single_day_date_&_time'); ?>
                          <?php echo $singledatetime['single_start_time']; ?> - <?php echo $singledatetime['single_end_time']; ?>
                      <?php } else { ?>
                          <?php the_field('start_time'); ?> - <?php the_field('end_time'); ?>
                      <?php } ?>
                  </div>
                  <div class="col">
                      <strong>Location</strong><br />
                      <p>
                          <?php $location = get_field('location'); ?>
                          <?php echo $location['address_one']; ?><br />
                          <?php if($location['address_two']) { echo ''.$location['address_two'].'<br />'; } ?>
                          <?php echo $location['city']; ?><br />
                          <?php echo $location['county']; ?><br />
                          <?php echo $location['postcode']; ?>
                      </p>
                  </div>
                  <div class="col">
                      <p>
                          <a class="btn btn-primary rounded-0" href="<?php the_field('wisepay_link'); ?>">Book now</a>
                      </p>
                  </div>
              </div>




			  <div class="contact-box row">
  				<div class="name-position col-md-6">
  					  <p><strong><?php the_field('contact_name', 526) ?></strong><br>
  						  <?php the_field('position', 526) ?></p>
  				</div>

  				<div class="contact-details d-flex col-md-6">
  					<p class="email"><a href="mailto:<?php the_field('email', 526) ?>"><?php the_field('email', 526) ?></a></p>
  					<p class="number"><?php the_field('phone_number', 526) ?></p>
  				</div>
  			</div>


          <!---Body section - End--->
        </div>
    </div>
    <?php get_template_part('downloads'); ?>

</div>
</section>

<?php
// get_sidebar();
get_footer();
