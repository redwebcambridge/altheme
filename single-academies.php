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

  </style>
<?php endif; ?>


<!---Body section--->

      <div class="container" id="academy-single">
        <div class="row top-details mx-0 mb-5">
          <div class="col-md-3 logo d-flex justify-content-center align-items-center text-center"> 
            <?php if ( get_field('logo') ) : ?>
              <img src="<?php echo get_field('logo')['url']; ?>" alt="<?php echo get_field('logo')['alt']; ?>"  />
            <?php endif; ?>
          </div>

          <div class="col-md-3 py-3">
            <?php if ( get_field('full_address') ) : ?>
              <h3 class="text_school_col m-0">Address</h3>
              <?php echo get_field('full_address'); ?>
            <?php endif; ?>
          </div>

          <div class="col-md-3 py-3">
            <?php if ( get_field('telephone') ) : ?>
              <h3 class="text_school_col m-0">Telephone</h3>
              <?php echo get_field('telephone'); ?>
            <?php endif; ?>
            <?php if ( get_field('email') ) : ?>
              <h3 class="mt-3 text_school_col m-0">Email</h3>
              <?php echo get_field('email'); ?>
            <?php endif; ?>
          </div>
        
        </div>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
