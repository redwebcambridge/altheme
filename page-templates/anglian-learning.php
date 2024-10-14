<?php
/*
Template Name: About Anglian Learning Page
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<!---Body section--->

      <div class="container">
        <div class="row">

        <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>

          <div class="col-md-9 text-section">
            <p class="body-text">
            <?php 
                $response = wp_remote_get( 'https://anglianlearning.org/wp-json/wp/v2/pages/?slug=about-anglian-learning' );
                $content = json_decode( wp_remote_retrieve_body( $response ) );
                if ( isset( $content[0]->acf->body_text ) ) {
                    echo $content[0]->acf->body_text; 
                }
            ?>

            </p>
          </div>
        </div>

        <?php get_template_part('template-parts/downloads'); ?>
      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
