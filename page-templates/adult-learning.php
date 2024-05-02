<?php
/*
Template Name: Adult Learning 
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="adult-learning-page">
      <div class="container">
        <div class="row">

          <!---Sidebar--->
          <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>
          <!---Sidebar - End--->

          <!---Body section--->
        <div class="col-md-9 text-section">
            <h2 class="heading-two"><?php echo get_field('sub_heading') ?></h2>
            <div class="gradline"></div>
            <p class="body-text"><?php echo get_field('body_text'); ?></p>

            <div class="row">
            <?php 
            $categories = get_terms([
                'taxonomy' => 'adult-learning-category',
                'hide_empty' => false,
             ]);

            if( get_the_ID() == get_field('adult_learning_homepage','option')  && !empty($categories) ):
                foreach ($categories as $category) { 
                     echo '<div class="col-md-4 course"><a href="'.esc_url( get_term_link( $category->term_id ) ).'">';
                     echo '<div class="course-thumbnail" style="background-image:url('.get_field('image',$category).')"></div><p class="course-name">'.$category->name.'</p>';
                     echo '</a></div>';
                } 
            ?> 
            <?php endif; ?>      
            </div>                    
            <?php get_template_part('template-parts/adult-learning-contact'); ?>
        </div>
    </div>
</div>

</div>
</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
