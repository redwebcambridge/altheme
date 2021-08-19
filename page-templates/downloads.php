<?php
/*
Template Name: Downloads 
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!---Body section--->
<div class="downloadsß">

    <div class="container ">
      <div class="row">

        <div class="col-md-12 text-section">
            <?php if (get_field('sub_heading')) : ?>
              <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
              <div class="gradline"></div>
            <?php endif; ?>  
            <?php if (get_field('body_text')) : ?>
              <p class="body-text"><?php the_field('body_text') ?></p>
            <?php endif; ?>
        </div>
      </div>
      
        <?php get_template_part('template-parts/downloads'); ?>

    </div>



  </div>

</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
