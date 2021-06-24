<?php
/*
Template Name: Sport Centre Courses
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="sport-centre-page">
      <div class="container">
        <div class="row">

          <!---Sidebar--->

          <div class="col-md-2 text-section">
           <?php
           wp_nav_menu(
             array('menu'=>'sports-centre-menu', 'menu_id' => 'sidebar-menu')
           );
           ?>
          </div>

          <!---Sidebar - End--->


          <!---Body section--->

          <div class="col-md-10 text-section">
              <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

              <div class="gradline"></div>

              <p class="body-text"><?php the_field('body_text') ?></p>

              <div class="row">
                  <?php if( have_rows('class_types') ): ?>
                      <?php while( have_rows('class_types') ): the_row(); ?>

                          <div class="col-md-4 course">
                              <?php $term = get_sub_field('link'); ?>
                              <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                  <div class="course-thumbnail" style="background-image:url('<?php the_sub_field('image'); ?>')"></div>
                                  <p class="course-name"><?php the_sub_field('name'); ?></p>
                              </a>
                          </div>

                      <?php endwhile; ?>
                  <?php endif; ?>
              </div>

            <div class="contact-box row">
                <div class="name-position col-md-6">
                      <p><strong><?php the_field('contact_name') ?></strong><br>
                          <?php the_field('position') ?></p>
                </div>

                <div class="contact-details d-flex col-md-6">
                    <p class="email"><a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a></p>
                    <p class="number"><?php the_field('phone_number') ?></p>
                </div>
            </div>


          <!---Body section - End--->
        </div>
    </div>
</div>
</div>
</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
