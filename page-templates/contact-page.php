<?php
/*
Template Name: Contact page
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container contact-page">
        <div class="row">
          <div class="col-lg-8 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
            <div class="gradline"></div>
              <div class="row">
              <?php
              if (is_sports_page()) {
                $sports_fields = get_field('sports_footer_options','option');
                $phone_number = $sports_fields['telephone'];
                $email = $sports_fields['email_address'];
                $address = $sports_fields['address'];
                $social = $sports_fields['social_media'];
              } elseif (is_adult_ed_page()) {
                $adult_fields = get_field('footer_options','option');
                $phone_number = $adult_fields['telephone'];
                $email = $adult_fields['email_address'];
                $address = $adult_fields['address'];
                $social = $adult_fields['social_media'];
              } else {
                $phone_number = get_field('telephone','option');
                $email = get_field('email_address','option');
                $address = get_field('address','option');
                $social = get_field('platforms' , 'option');
              }
              $display_options = get_field('display_options'); 
              ?>
                <div class="col-12 col-md-6 contact-details">
                  <?php if ($display_options['phone_number']) : ?>
                     <h5>Phone</h5>
                     <a href="tel:<?php echo $phone_number; ?>"><p><?php echo $phone_number; ?></p></a>
                  <?php endif; ?>
                  <?php if ($display_options['show_email_address']) : ?>
                    <h5>Email</h5>
                    <a href="mailto:<?php echo $email; ?>"><p><?php echo $email; ?></p></a>
                  <?php endif; ?>
                </div>

                <div class="col-12 col-md-6 contact-details">
                <?php if ($display_options['social_media_accounts']) : ?>

                  <?php if( $social ):
                      foreach ($social as $social_platform) :
                    ?>
                    <div class="d-flex socials row">
                      <a href="<?php echo $social_platform['platform_url']; ?>" target="_blank">
                        <i class="col-1 social fab fa-<?php echo $social_platform['platform']; if($social_platform['platform']=='facebook'){echo '-f';} ;?>"></i>
                        <?php if ($display_options['display_full_social_media_url']) : echo $social_platform['profile_url']; endif; ?>
                        <?php echo '<em>'.$social_platform['username'].'</em>'; ?>
                      </a>
                    </div>         
                   <?php endforeach; endif; ?>

                 <?php endif; ?>
                </div>

              </div>
              <?php if ($display_options['address']) : ?>
                  <h5>Address</h5>
                <p>
                  <?php 
                    if(!empty($address['address_line_1'])) : echo $address['address_line_1'].', '; endif; 
                    if(!empty($address['street'])) : echo $address['street'].', '; endif; 
                    if(!empty($address['town'])) : echo $address['town'].', '; endif; 
                    if(!empty($address['city'])) : echo $address['city'].', '; endif; 
                    if(!empty($address['county'])) : echo $address['county'].', '; endif; 
                    if(!empty($address['postal_code'])) : echo $address['postal_code']; endif;                                     
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
          <div class="col-lg-4 text-section">
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
