<?php
/*
Template Name: Accordions
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<!---Body section--->

      <div class="container">
        <div class="row">

          <?php if (get_field('menu_select')) : ?>
            <div class="col-md-3 text-section">
              <?php get_template_part('template-parts/sidebar-menu'); ?>
            </div>
          <?php endif; ?>

          <div class="<?php if (get_field('menu_select')) {echo 'col-md-9';} else {echo 'col-12';} ?> text-section">
          <?php if (get_field('sub_heading')) : ?>
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
            <div class="gradline"></div>
          <?php endif; ?>
          <?php if (get_field('body_text')) : ?>
            <?php the_field('body_text') ?>
          <?php endif; ?>
          <?php if( have_rows('accordions') ): $i = 1; ?>
            <div class="accordion" id="accordions">

              <?php
                while( have_rows('accordions') ) : the_row();
                    $acc_title = get_sub_field('acc_title');
                    $acc_content = get_sub_field('acc_content');
              ?>     
                <div class="card">

                  <div class="card-header" id="heading<?php echo $i;?>">
                    <h2 class="mb-0">
                      <button class="btn text-left" data-toggle="collapse" data-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                        <?php echo $acc_title; ?>
                      </button>
                    </h2>
                  </div>

                  <div id="collapse<?php echo $i;?>" class="collapse" aria-labelledby="heading<?php echo $i;?>" data-parent="#accordions">
                    <div class="card-body">
                      <?php echo $acc_content; ?>
                    </div>
                  </div>

                </div>

              <?php $i++; endwhile; ?>
            </div>

            <?php endif; ?>
          </div>
        </div>

        <?php get_template_part('template-parts/downloads'); ?>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
