<?php
/*
Template Name: Contact page
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container contact-page">
        <div class="row">

          <!---Body section left--->

          <div class="col-md-8 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

            <div class="gradline"></div>

              <div class="row">

                <div class="col-12 col-md-4 contact-details">
                  <h5>Phone</h5>
                  <a href="tel:<?php the_field('phone'); ?>"><p><?php the_field('phone'); ?></p></a>

                  <h5>Email</h5>
                  <a href="mailto:<?php the_field('email') ?>"><p><?php the_field('email') ?></p></a>
                </div>

                <div class="col-12 col-md-8 contact-details">

                  <div class="d-flex socials">
                      <i class="fab fa-facebook-f"> </i>
                      <a href="<?php the_field('facebook_link') ?>" target="_blank"><p><?php the_field('facebook_link') ?><br>
                      <em><?php the_field('facebook_handle') ?></em></p></a>
                  </div>

                  <div class="d-flex socials">
                      <i class="fab fa-instagram"></i>
                      <a href="<?php the_field('instagram_link') ?>" target="_blank"><p><?php the_field('instagram_link') ?><br>
                      <em><?php the_field('instagram_handle') ?></em></p></a>
                  </div>

                </div>

              </div>

              <h5>Address</h5>
              <p><?php the_field('address') ?></p>

              <!--map-->

              <div class="map-contact">
              <iframe width="100%" height="366px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=0.15682876110076907%2C52.125350769250126%2C0.16520798206329348%2C52.12819947730703&amp;layer=mapnik&amp;marker=52.12677514604294%2C0.16101837158203125"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=52.12678&amp;mlon=0.16102#map=18/52.12678/0.16102"></a></small>
              </div>

          </div>

          <!---Body section left - End--->


          <!---Body section right--->

          <div class="col-md-4 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading_right') ?></h2>

            <div class="gradline"></div>

            <p class="body-text"><?php the_field('body_text_right') ?></p>

          </div>

          <!---Body section right - End--->

        </div>
        <?php get_template_part('template-parts/downloads'); ?>

      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
