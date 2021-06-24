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
          <div class="col-md-2 text-section">
          <?php
            $menu_choice = get_field('menu_select');
            wp_nav_menu(
              array('menu'=>$menu_choice, 'menu_id' => 'sidebar-menu')
            );
            ?>
          </div>
          <!---Sidebar - End--->


          <!---Body section--->
        <div class="col-md-10 text-section">
            <h2 class="heading-two"><?php the_field('sub-title') ?></h2>
            <div class="gradline"></div>
            <p class="body-text"><?php the_content(); ?></p>

            <div class="row">
            <?php 
            $categories = get_terms([
                'taxonomy' => 'adult-learning-category',
                'hide_empty' => false,
             ]);

            //var_dump($categories);
            if( get_the_ID() == get_field('adult_learning_homepage','option')  && !empty($categories) ):
                foreach ($categories as $category) { 
                     //echo $category->term_id; 
                     echo '<div class="col-md-4 course"><a href="'.esc_url( get_term_link( $category->term_id ) ).'">';
                     echo '<div class="course-thumbnail" style="background-image:url('.get_field('image',$category).')"></div><p class="course-name">'.$category->name.'</p>';
                     echo '</a></div>';
                } 
            ?> 
            </div>                    
            <?php endif; ?>

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

        </div>

          <!---Body section Centre - End--->


            


          <!---Body section - End--->
        </div>
    </div>
</div>

</div>
</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
