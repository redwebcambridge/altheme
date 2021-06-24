<?php
/*
Template Name: Meet the staff with picture
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="meet-the-staff2">
    <div class="container">
      <div class="row">
          <!---sidebar--->
          <div class="col-md-2">
            <?php
            $menu_choice = get_field('menu_select');
            wp_nav_menu( array('menu'=>$menu_choice, 'menu_id' => 'sidebar-menu') );
            ?>
          </div>
          <!---Sidebar - End--->

          <!---Body section--->
          <div class="col-md-10">
            
              <div class="row">
                <div class="col">
                  <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
                  <div class="gradline"></div>
                </div>
              </div>

              <div class="row mb-5">
                <div class="d-flex justify-content-between flex-wrap">
                    <?php if( have_rows('table_of_staff') ): while( have_rows('table_of_staff') ): the_row(); ?>
                      <div class="col-md-6 staff-section">
                        <?php if (get_sub_field('picture')): ?>
                        <div class="thumbnail" style="background-image:url('<?php the_sub_field('picture'); ?>')"></div>
                        <?php endif; ?>
                        <div class="staff-text">
                          <h3><?php the_sub_field('name'); ?></h3>
                          <p class="top-info"><?php
                          if(get_sub_field('role')){echo '<strong>'.get_sub_field('role').'</strong>';}
                          if(get_sub_field('department')){echo ', '.get_sub_field('department');}
                          if(get_sub_field('form__mentor_group')){echo ', <em>'.get_sub_field('form__mentor_group').'</em>';} 
                          if(get_sub_field('email')){echo '<br><a href="mailto:'.get_sub_field('email').'">'.get_sub_field('email')."</a>";}
                          ?></p>
                          <div class="desc"><?php echo get_sub_field('description'); ?><div class="whitegrad"></div></div>
                          <p class="read-more-button">More</p>
                        </div>
                      </div>
                  <?php endwhile; endif; ?>
                </div>    
              </div>    

        </div>
      </div>
    </div>        
    <?php get_template_part('downloads'); ?>

</div>
</section>

<script>
$('.read-more-button').on( "click", function() {
  $(this).parent('.staff-text').find('.whitegrad').toggle();
  $(this).parent('.staff-text').find('.desc').toggleClass('increaseheight');
  $(this).text($(this).text() == 'More' ? 'Less' : 'More'); 
  
});
</script>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
