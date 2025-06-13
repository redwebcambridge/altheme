<?php
/*
Template Name: About page
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container about-page">
        <div class="row">
          <!---Body section left--->

          <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>

          <!---Body section left - End--->
        <div class="col-md-9 text-section" role="article">


          <!---Body section centre--->
          <div class="col-md-12">
            <h2 class="heading-two"><?php echo get_field('sub_heading') ?></h2>
            <div class="gradline"></div>
          </div>

          <div class="row">
            <div class="col-md-9 text-section" role="article">
              <p class="body-text"><?php echo get_field('body_text') ?></p>
            </div>
            <!---Body section Centre - End--->
            <!---Body section right--->
            <div class="col-md-3 text-section mt-4">
                <?php 
                if (get_field('image_one')):
                    $image1 = get_field('image_one');
                    echo '<img src="'.$image1['url'].'" class="about-image-one" alt="'.$image1['alt'].'" />';
                    if ($image1['caption']) : echo '<div class="wp-caption-text">'.$image1['caption'].'</div>'; endif;
                endif; ?>
                <?php 
                if (get_field('image_two')):
                    $image2 = get_field('image_two');
                    echo '<img src="'.$image2['url'].'" class="about-image-two" alt="'.$image2['alt'].'" />';
                    if ($image2['caption']) : echo '<div class="wp-caption-text">'.$image2['caption'].'</div>'; endif;
                endif; ?>
            </div>
          <!---Body section right - End--->
         </div>

        </div>

         </div>
        <?php get_template_part('template-parts/downloads'); ?>
        </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
