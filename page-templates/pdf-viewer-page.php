<?php
/*
Template Name: PDF Viewer page
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!---Body section--->
<div class="pdf-viewer">

      <div class="container ">
        <div class="row">

          <div class="col-md-12 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

            <div class="gradline"></div>
          </div>

        </div>
      </div>



        <div class="container">
          <div class="row pdf-list">

                <?php if( have_rows('pdf_file') ): ?>

                <?php while( have_rows('pdf_file') ): the_row(); ?>

                <div class="col-md-4">
                  <a href="<?php the_sub_field('pdf_document'); ?>" target="_blank">

                    <div class="d-flex icon-pdf">

                    <i class="fas fa-download"></i>
                     <p><?php the_sub_field('file_title'); ?></p>

                   </div>
                </a>
                </div>

                <?php endwhile; ?>

                <?php endif; ?>

        </div>
        <?php get_template_part('downloads'); ?>

      </div>

    <!---Body section - End--->

  </div>

</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
