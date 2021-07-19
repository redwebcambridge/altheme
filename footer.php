                <?php if ( is_front_page() && have_rows('information_panel') || !is_front_page() ): ?>
                    <div class="container">
                        <div class="line"></div>
                    </div>
                <?php endif; ?>

                <div class="container partners">
                    <div class="partner-slider slider">
                        <?php if( have_rows('carousel','option') ):
                            while( have_rows('carousel','option') ) : the_row(); ?>
                                  <a href="<?php the_sub_field('url'); ?>" target="_blank" style="background-image:url(<?php the_sub_field('image'); ?>)">
                                  </a>
                        <?php endwhile; endif; ?>
                    </div>
                    <div class="slick-controls-lower">
                        <button class="prev-slide-lower"></button>
                        <button class="next-slide-lower"></button>
                    </div>
                </div>

            </div><!-- container-white -->

            <div class="footer-buffer-one"></div>

            <footer>
                <div class="inner-footer">

                    <?php $logos = get_field('logo_and_icons','option'); ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">

                                <h5><?php the_field('left_footer_title','option') ?></h5>
                                <div class="footer-line"></div>

                                <?php the_field('footer_left_side_text','option'); ?>

                                <?php if( have_rows('platforms' , 'option') ): while( have_rows('platforms' , 'option') ) : the_row();  ?>
                                    <a href="<?php echo get_sub_field('profile_url'); ?>" target="_blank"><i class="social fab fa-<?php echo get_sub_field('platform'); if(get_sub_field('platform')=='facebook'){echo '-f';} ;?>"></i></a>
                                <?php endwhile; endif; ?>

                            </div>

                            <div class="col-md-4 contact-info">

                                <?php the_field('footer_icon_title','option'); ?>

                                <h5><?php the_field('middle_footer_title','option') ?></h5>
                                <div class="footer-line"></div>

                                <div class="row">
                                    <i class="fas fa-phone-alt"></i>
                                    <a class="text-white" href="tel:<?php the_field('telephone','option'); ?>"><?php the_field('telephone','option'); ?></a>
                                </div>

                                <div class="row">
                                    <i class="fas fa-envelope"></i>
                                    <a class="text-white" href="mailto:<?php the_field('email_address','option'); ?>"><?php the_field('email_address','option'); ?></a>
                                </div>

                                <div class="row">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php the_field('address','option'); ?>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <?php
                                $selection = get_field('instagram_map','option');
                                if ($selection == "Map") {
                                    echo '<h5>LOCATION</h5>';
                                } elseif ($selection == "Instagram") {
                                    echo '<h5>INSTAGRAM GALLERY</h5>';
                                }; ?>
                                <div class="footer-line"></div>

                                <?php if( get_field('instagram_map','option') == 'Instagram' ) { ?>

                                    <div class="insta-gallery">
                                      <?php echo do_shortcode('[instagram-feed num=6 cols=3 showbutton=false showheader=false imagepadding=0 followtext=Follow customtemplate=true]'); ?>
                                    </div>

                                <?php } else { ?>

                                    <?php
                                    $longitude = get_field('longitude','option');
                                    $latitude = get_field('latitude','option');
                                    ?>

                                    <div id="map"></div>

                                    <?php
                                        echo  "<script> var map = L.map('map').setView({lon:$longitude, lat:$latitude}, 15); </script>";
                                    ?>

                                    <script>
                                        // add the OpenStreetMap tiles
                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                          maxZoom: 19,
                                        }).addTo(map);
                                        // show the scale bar on the lower left corner
                                        L.control.scale().addTo(map);
                                    </script>

                                    <?php echo  "<script> L.marker({lon: $longitude, lat: $latitude}).addTo(map); </script>"; ?>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-base">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                Registration Number: <?php the_field('company_registration_number','option'); ?>
                            </div>
                            <div class="col text-right">
                                Designed & Developed by <a href="https://www.redgraphic.co.uk/">Red Graphic</a>
                            </div>
                        </div>
                    </div>
                </div>

            </footer>

        </div><!-- #page -->

        <?php wp_footer(); ?>

        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/offcanvas.js"></script>

    </body>
</html>
