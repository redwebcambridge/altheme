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
          <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>
          <!---Sidebar - End--->

          <!---Body section--->
          <div class="col-md-9">

              <div class="row">
                <div class="col">
                  <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
                  <div class="gradline"></div>
                  <p class="body-text"><?php the_field('intro_text') ?></p>
                </div>
              </div>

              <div class="row mb-5">

                    <?php if( have_rows('table_of_staff') ): while( have_rows('table_of_staff') ): the_row(); ?>

                        <div class="col-12 col-lg-6 staff-container">
                            <div class="staff-section">
                                <div class="row">

                                    <?php if (get_sub_field('picture')): ?>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-5 staffimage" style="background-image:url('<?php the_sub_field('picture'); ?>')">
                                        <div class="member-block-image-ghost"></div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('picture')) { ?>
                                    <div class="col-12 col-sm-6 col-md-8 col-lg-7">
                                    <?php } else { ?>
                                    <div class="col-12">
                                    <?php } ?>
                                        <div class="staffdetails">
                                            <h3><?php the_sub_field('name'); ?></h3>
                                            <p>
                                            <?php
                                            if(get_sub_field('role')){echo '<strong>'.get_sub_field('role').'</strong>';}
                                            if(get_sub_field('department')){echo ', '.get_sub_field('department');}
                                            if(get_sub_field('form__mentor_group')){echo ', <em>'.get_sub_field('form__mentor_group').'</em>';}
                                            if(get_sub_field('email')){echo '<br><a href="mailto:'.get_sub_field('email').'">'.get_sub_field('email')."</a>";}
                                            ?>
                                            </p>

                                            <?php if(get_sub_field('description')) : ?>
                                                <?php
                                                $content = substr(get_sub_field('description'),0,80);
                                                $content = substr($content,0,strrpos($content,' '));
                                                $$content = preg_replace('/<span[^>]+\>/i', '', $content);
                                                echo '<div class="desc_short">'.$content."...</div>";
                                                ?>

                                                <div class="allcontent"><?php echo get_sub_field('description'); ?></div>
                                                <p class="read-more-button">More</p>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                  <?php endwhile; endif; ?>

              </div>

        </div>
      </div>
    </div>
    <?php get_template_part('template-parts/downloads'); ?>

</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
