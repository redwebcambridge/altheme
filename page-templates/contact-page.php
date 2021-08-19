<?php
/*
Template Name: Contact page
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container contact-page">
        <div class="row">

          <div class="col-md-8 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
            <div class="gradline"></div>
              <div class="row">

                <?php $display_options = get_field('display_options'); ?>

                <div class="col-12 col-md-4 contact-details">
                  <?php if ($display_options['phone_number']) : ?>
                     <h5>Phone</h5>
                     <a href="tel:<?php the_field('telephone','option'); ?>"><p><?php the_field('telephone','option'); ?></p></a>
                  <?php endif; ?>
                  <?php if ($display_options['show_email_address']) : ?>
                    <h5>Email</h5>
                    <a href="mailto:<<?php the_field('email_address','option'); ?>"><p><?php the_field('email_address','option'); ?></p></a>
                  <?php endif; ?>
                </div>

                <div class="col-12 col-md-8 contact-details">
                <?php if ($display_options['social_media_accounts']) : ?>

                  <?php if( have_rows('platforms' , 'option') ): while( have_rows('platforms' , 'option') ) : the_row();  ?>
                    <div class="d-flex socials row">
                      <a href="<?php echo get_sub_field('profile_url'); ?>" target="_blank">
                        <i class="col-1 social fab fa-<?php echo get_sub_field('platform'); if(get_sub_field('platform')=='facebook'){echo '-f';} ;?>"></i>
                        <?php if ($display_options['display_full_social_media_url']) : echo get_sub_field('profile_url'); endif; ?>
                        <?php echo '<em>'.get_sub_field('username').'</em>'; ?>
                      </a>
                    </div>         
                   <?php endwhile; endif; ?>

                 <?php endif; ?>
                </div>

              </div>
              <?php if ($display_options['address']) : ?>
                  <h5>Address</h5>
                  <p>
                  <?php $address = $adult_footer['address']; 
                                    if(!empty($address['address_line_1'])) : echo $address['address_line_1'].'<br>'; endif; 
                                    if(!empty($address['street'])) : echo $address['street'].'<br>'; endif; 
                                    if(!empty($address['town'])) : echo $address['town'].'<br>'; endif; 
                                    if(!empty($address['city'])) : echo $address['city'].'<br>'; endif; 
                                    if(!empty($address['county'])) : echo $address['county'].'<br>'; endif; 
                                    if(!empty($address['postal_code'])) : echo $address['postal_code'].'<br>'; endif;                                     
                                    ?>  
                </p>
               <?php endif; ?>
              <!--map-->

              <?php if ($display_options['map']) :
                 $longitude = get_field('longitude','option');
                 $latitude = get_field('latitude','option');
                ?>
              <div id="contactmap"></div>
              <?php echo  "<script> var map = L.map('contactmap').setView({lon:$longitude, lat:$latitude}, 15); </script>"; ?>
             <script>
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  maxZoom: 19,
                }).addTo(map);
                 L.control.scale().addTo(map);
            </script>
              <?php echo  "<script> L.marker({lon: $longitude, lat: $latitude}).addTo(map); </script>"; ?>
              <?php endif; ?>
          </div>

          <?php if ($display_options['contact_form']) : ?>
          <div class="col-md-4 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading_right'); ?></h2>
            <div class="gradline mb-4"></div>
            <?php echo do_shortcode( $display_options['shortcode_for_contact_form'] ); ?>
          </div>
          <?php endif; ?>

        </div>
        <?php get_template_part('template-parts/downloads'); ?>

      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
