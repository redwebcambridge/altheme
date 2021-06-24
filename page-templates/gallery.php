<?php
/*
Template Name: Gallery 
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
            
            <?php 
            // Load value (array of ids).
            $image_ids = get_field('gallery');

            $i = 1;
            $col1 = array();
            $col2 = array();
            $col3 = array();
            
            foreach ($image_ids as $image_id){
              switch ($i) {
                case 1;
                  array_push($col1,$image_id);
                  $i = 2;
                  break;
                case 2;
                  array_push($col2,$image_id);
                  $i = 3;
                  break;
                case 3:
                  array_push($col3,$image_id);
                  $i = 1;
                  break;
              }
            }
            ?>

            <div class="row" id="gallery"> 
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 gal-col">
                          <?php foreach ($col1 as $img_id) {
                            $image = get_post($img_id);
                            echo '<div class="galleryimagecontianer"><img src="'.wp_get_attachment_url($img_id).'" data-toggle="lightbox" class="img-fluid galleryimage" alt="'.get_post_meta($img_id, '_wp_attachment_image_alt', true).'" data-title="'.$image->post_excerpt.'" data-remote="'.wp_get_attachment_url($img_id).'" /></div>';
                          } ?>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 gal-col">
              <?php foreach ($col2 as $img_id) {
                            $image = get_post($img_id);
                            echo '<div class="galleryimagecontianer"><img src="'.wp_get_attachment_url($img_id).'" data-toggle="lightbox" class="img-fluid galleryimage" alt="'.get_post_meta($img_id, '_wp_attachment_image_alt', true).'" data-title="'.$image->post_excerpt.'" data-remote="'.wp_get_attachment_url($img_id).'" /></div>';
                          } ?>
              </div>  
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 gal-col">
              <?php foreach ($col3 as $img_id) {
                            $image = get_post($img_id);
                            echo '<div class="galleryimagecontianer"><img src="'.wp_get_attachment_url($img_id).'" data-toggle="lightbox" class="img-fluid galleryimage" alt="'.get_post_meta($img_id, '_wp_attachment_image_alt', true).'" data-title="'.$image->post_excerpt.'" data-remote="'.wp_get_attachment_url($img_id).'" /></div>';
                          } ?>
              </div>
            </div>

          <!---Body section Centre - End--->

        </div>
        <?php get_template_part('downloads'); ?>

      </div>

</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
