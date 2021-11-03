<?php
/*
Template Name: Gallery 
*/
get_header(); ?>
<script src="https://unpkg.com/magic-grid/dist/magic-grid.min.js"></script>
<script>
  jQuery(function() {  
    //gallery
    let magicGrid = new MagicGrid({
    container: document.querySelector('.gallery'),
    animate: true,
    gutter: 10,
    static: true,
    useMin: true
  });

  magicGrid.listen();

  });

  </script>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="container">
        <div class="row">
          <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>

            <div class="col-md-9 text-section">
              <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
              <div class="gradline"></div>

              <div class="gallery col-12">
              <?php 
                $image_ids = get_field('gallery');
                foreach ($image_ids as $img_id) {
                  echo '<div class="galleryimagecontianer"><img src="'.wp_get_attachment_url($img_id,'thumbnail').'" data-toggle="lightbox" class="galleryimage" data-gallery="gallery" alt="'.get_post_meta($img_id, '_wp_attachment_image_alt', true).'" data-title="'.get_the_excerpt($img_id).'" data-remote="'.wp_get_attachment_url($img_id).'" /></div>';
                }
              ?>
              </div>

          </div>

        </div>

</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
