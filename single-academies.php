<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if ( get_field('school_color') ) : ?>
  <?php $school_colour = get_field('school_color');  ?>

  <style>
    .text_school_col {
      color: <?php echo $school_colour; ?>
    }
    .bg_school_col {
      background-color:<?php echo $school_colour; ?>
    }
    a.visit_website:hover, a.download_button:hover {
      background-color:<?php echo $school_colour; ?>
    }
    img.head_img {
      border-bottom:5px solid <?php echo $school_colour; ?>;
    }
  </style>
<?php endif; ?>


<!---Body section--->

<div class="container" id="academy-single">
  <div class="row top-details mx-0 mb-5">
    
    <div class="col-md-3 logo d-flex justify-content-center align-items-center text-center py-4"> 
      <?php if ( get_field('logo') ) : ?>
        <img src="<?php echo get_field('logo')['url']; ?>" alt="<?php echo get_field('logo')['alt']; ?>"  />
      <?php endif; ?>
    </div>

    <div class="col-6 col-md-3 py-3 mt-2 ps-4">
      <?php if ( get_field('full_address') ) : ?>
        <h3 class="text_school_col m-0">Address</h3>
        <?php echo get_field('full_address'); ?>
      <?php endif; ?>
    </div>

    <div class="col-6 col-md-3 py-3  mt-2">
      <?php if ( get_field('telephone') ) : ?>
        <h3 class="text_school_col m-0">Telephone</h3>
        <?php echo get_field('telephone'); ?>
      <?php endif; ?>
      <?php if ( get_field('email') ) : ?>
        <h3 class="mt-4 text_school_col m-0">Email</h3>
        <?php echo get_field('email'); ?>
      <?php endif; ?>

      <div class="d-md-none pt-4">
        <?php if( have_rows('acad_socials') ): while( have_rows('acad_socials') ) : the_row();  ?>
                <?php if(get_sub_field('acad_social_platform') == 'twitter') {
                    $platform = 'x-twitter';
                    } else {
                        $platform = get_sub_field('acad_social_platform');
                    } 
                ?>
                <a href="<?php echo get_sub_field('acad_social_url'); ?>" target="_blank"><i class="h4 pe-2 text_school_col social fab fa-<?php echo $platform; if(get_sub_field('acad_social_platform')=='facebook'){echo '-f';}?>"></i></a>
            <?php endwhile; endif; ?>
      </div>
    </div>

    <div class="col-md-3 py-3 pe-4 mt-md-2 text-md-end">
      <div class="row">
          <div class="col-4 col-md-12 d-none d-md-block">
            <?php if( have_rows('acad_socials') ): while( have_rows('acad_socials') ) : the_row();  ?>
                <?php if(get_sub_field('acad_social_platform') == 'twitter') {
                    $platform = 'x-twitter';
                    } else {
                        $platform = get_sub_field('acad_social_platform');
                    } 
                ?>
                <a href="<?php echo get_sub_field('acad_social_url'); ?>" target="_blank"><i class="h4 pe-2 text_school_col social fab fa-<?php echo $platform; if(get_sub_field('acad_social_platform')=='facebook'){echo '-f';}?>"></i></a>
            <?php endwhile; endif; ?>
          </div>
          <div class="col-6 col-md-12 pt-md-5">
            <?php if ( get_field('website') ) : ?>
              <a href="<?php echo get_field('website'); ?>" class="ms-2 visit_website btn bg_school_col text-white">Visit Website</a>
            <?php endif; ?>
          </div>
          <div class="col-6 col-md-12 pt-md-2"> 
            <a href="/our-academies/" title="Back to our Academies" class="back_acad align-items-center d-flex justify-content-end"> <i class="pe-1 text_school_col fa-solid fa-caret-left"></i> <small>Back to our Academies</small></a>
          </div>
      </div>
       
    </div>
  
  </div>
  <div class="row gx-1">
    <div class="col-md-3 p-2">
      <?php if ( get_field('image_of_head') ) : ?>
        <img src="<?php echo get_field('image_of_head')['url']; ?>" alt="<?php echo get_field('image_of_head')['alt']; ?>" class="head_img"> 
      <?php endif; ?>

      <div class="head_details p-3">
        <?php if ( get_field('head_name') ) : ?>
          <div class="fw-bold">
            <?php echo get_field('head_name'); ?>
          </div>
        <?php endif; ?>
        <?php if ( get_field('head_title') ) : ?>
          <div class="text_school_col">
            <?php echo get_field('head_title'); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="acad_downloads">
        <?php if ( have_rows('academy_downloads') ) : ?>
          <?php while( have_rows('academy_downloads') ) : the_row(); ?>

            <?php if ( get_sub_field('acad_download_type') === 'file' ) : ?>
              <a href="<?php echo get_sub_field('acad_download_file')['url']; ?>" title="<?php echo get_sub_field('acad_download_file')['title']; ?>" class="mt-3 w-100 text-start download_button btn bg_school_col text-white" target="_blank"><i class="fa-solid fa-download pe-2"></i> <?php the_sub_field('acad_download_title'); ?></a>
            <?php endif; ?>

            <?php if ( get_sub_field('acad_download_type') === 'url' ) : ?>
              <a href="<?php echo get_sub_field('acad_download_url'); ?>" title="<?php echo get_sub_field('acad_download_url'); ?>" class="mt-3 w-100 text-start download_button btn bg_school_col text-white" target="_blank"><i class="fa-solid fa-link pe-2"></i> <?php the_sub_field('acad_download_title'); ?></a>
            <?php endif; ?>
            

            


          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      
            
  </div>
  <div class="col-md-9 px-4 py-1">
    <?php if ( get_field('profile') ) : ?>
      <?php echo get_field('profile'); ?>
    <?php endif; ?>

    <?php
// Check if the gallery field has images
$gallery = get_field('acad_gallery');
if( $gallery ):
    echo '<div class="acf-gallery mb-5">';
    foreach( $gallery as $index => $image ):
        echo '<div class="acf-gallery-item">';
        echo '<a href="#" data-toggle="modal" data-target="#galleryModal' . $index . '">';
        echo '<img src="' . esc_url($image['sizes']['medium']) . '" alt="' . esc_attr($image['alt']) . '" />';
        echo '</a>';
        echo '</div>';

        // Modal structure
        echo '<div class="modal acad_gallery_modal fade" id="galleryModal' . $index . '" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel' . $index . '" aria-hidden="true">';
        echo '<div class="modal-dialog modal-dialog-centered" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="galleryModalLabel' . $index . '"></h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="img-fluid" />';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    endforeach;
    echo '</div>';
endif;
?>

        
  </div>
    
  </div>
</div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
