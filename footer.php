            <?php if (is_front_page() && have_rows('information_panel') || !is_front_page() ): ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!is_adult_ed_page() && !is_sports_page() ) : ?>   
            <div class="container partners">
                <div class="partner-slider slider">
                    <?php if( have_rows('carousel','option') ):
                        while( have_rows('carousel','option') ) : the_row(); ?>
                                <a href="<?php the_sub_field('url'); ?>" class="<?php the_sub_field('class'); ?>" target="_blank" style="background-image:url(<?php the_sub_field('image'); ?>)">
                                </a>
                    <?php endwhile; endif; ?>
                </div>
                <div class="slick-controls-lower">
                    <button class="prev-slide-lower"></button>
                    <button class="next-slide-lower"></button>
                </div>
            </div>
            <?php else : 
                
                if (is_adult_ed_page()) {$page_id = get_field('adult_learning_homepage','option');}
                if (is_sports_page()) {$page_id = get_field('sports_homepage','option');}
                 ?>
            <div class="container partners">
                <div class="partner-slider slider">
                    <?php if( have_rows('icons',$page_id)):
                        while( have_rows('icons',$page_id) ) : the_row(); ?>
                            <a href="<?php the_sub_field('link'); ?>" class="<?php the_sub_field('class'); ?>" target="_blank" style="background-image:url(<?php the_sub_field('icon_image'); ?>)">
                            </a>
                    <?php endwhile; endif; ?>
                </div>
                <div class="slick-controls-lower">
                    <button class="prev-slide-lower"></button>
                    <button class="next-slide-lower"></button>
                </div>
            </div>
            <?php endif; ?>

        </div><!-- container-white -->

        </div><!-- #page -->

        <footer>
            
            <div class="inner-footer">

                <?php $logos = get_field('logo_and_icons','option'); ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                        <?php if (is_adult_ed_page()) : ?>
                            <!-- Adult Learning Footer -->
                            <?php $adult_footer = get_field('footer_options','option'); ?>
                            <h5><?php echo $adult_footer['column_1_title']; ?></h5>
                            <div class="footer-line"></div>
                            <p><?php echo $adult_footer['col1_content']; ?></p>
                            <?php $socialmedia = $adult_footer['social_media']; ?>
                                <div class="social">
                                <?php foreach ($socialmedia as $platform) :
                                    //save instagram user in case they wish to have a footer feed - adult
                                    if($platform['platform']=='instagram'){
                                        $instauser_adult = str_replace('@','',$platform['username']);
                                     }
                                ?>

                                    <?php if($platform['platform'] == 'twitter') {
                                        $platform_icon = 'x-twitter';
                                    } else {
                                        $platform_icon = $platform['platform'];
                                    } 
                                    ?>

                                    <a href="<?php echo $platform['platform_url']; ?>" target="_blank"><i class="social fab fa-<?php echo $platform_icon; if($platform['platform']=='facebook'){echo '-f';} ;?>"></i></a>
                                <?php endforeach; ?>
                                </div>
                        <?php elseif (is_sports_page()) : ?>
                            <!-- Sports Footer -->
                            <?php $sports_footer = get_field('sports_footer_options','option'); ?>
                            <h5><?php echo $sports_footer['column_1_title']; ?></h5>
                            <div class="footer-line"></div>
                            <p><?php echo $sports_footer['col1_content']; ?></p>
                            <?php $socialmedia = $sports_footer['social_media']; ?>
                                <div class="social">
                                <?php foreach ($socialmedia as $platform) :
                                    //save instagram user in case they wish to have a footer feed - sports
                                    if($platform['platform']=='instagram'){
                                       $instauser_sport = str_replace('@','',$platform['username']);
                                    }
                                ?>

                                    <?php if($platform['platform'] == 'twitter') {
                                        $platform_icon = 'x-twitter';
                                    } else {
                                        $platform_icon = $platform['platform'];
                                    } 
                                    ?>



                                    <a href="<?php echo $platform['platform_url']; ?>" target="_blank"><i class="social fab fa-<?php echo $platform_icon; if($platform['platform']=='facebook'){echo '-f';} ;?>"></i></a>
                                <?php endforeach; ?>
                                </div>
                        <?php else : ?>    
                            <!-- School Footer -->
                            <h5><?php the_field('left_footer_title','option') ?></h5>
                            <div class="footer-line"></div>
                            <?php the_field('footer_left_side_text','option'); ?>
                                <div class="social">
                                <?php if( have_rows('platforms' , 'option') ): while( have_rows('platforms' , 'option') ) : the_row();  ?>
                                    <?php if(get_sub_field('platform') == 'twitter') {
                                        $platform = 'x-twitter';
                                        } else {
                                            $platform = get_sub_field('platform');
                                        } 
                                    ?>
                                    <a href="<?php echo get_sub_field('platform_url'); ?>" target="_blank"><i class="social fab fa-<?php echo $platform; if(get_sub_field('platform')=='facebook'){echo '-f';} ;?>"></i></a>
                                <?php endwhile; endif; ?>
                                </div>
                        <?php endif; ?>
                        </div>

                        <div class="col-md-4 contact-info">
                        <?php if (is_adult_ed_page()) : ?>
                            <h5><?php echo $adult_footer['column_2_header']; ?></h5>
                            <div class="footer-line"></div>
                            <div class="row">
                                <i class="fas fa-phone-alt"></i>
                                <a class="text-white" href="tel:<?php echo $adult_footer['telephone']; ?>"><?php echo $adult_footer['telephone']; ?></a>
                            </div>
                            <div class="row">
                                <i class="fas fa-envelope"></i>
                                <a class="text-white" href="mailto:<?php echo $adult_footer['email_address']; ?>"><?php echo $adult_footer['email_address']; ?></a>
                            </div>
                            <div class="row">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php $address = $adult_footer['address']; 
                                if(!empty($address['address_line_1'])) : echo $address['address_line_1'].'<br>'; endif; 
                                if(!empty($address['street'])) : echo $address['street'].'<br>'; endif; 
                                if(!empty($address['town'])) : echo $address['town'].'<br>'; endif; 
                                if(!empty($address['city'])) : echo $address['city'].'<br>'; endif; 
                                if(!empty($address['county'])) : echo $address['county'].'<br>'; endif; 
                                if(!empty($address['postal_code'])) : echo $address['postal_code'].'<br>'; endif;                                     
                                ?>
                            </div>
                        <?php elseif (is_sports_page()) : ?>
                            <h5><?php echo $sports_footer['column_2_header']; ?></h5>
                            <div class="footer-line"></div>
                            <div class="row">
                                <i class="fas fa-phone-alt"></i>
                                <a class="text-white" href="tel:<?php echo $sports_footer['telephone']; ?>"><?php echo $sports_footer['telephone']; ?></a>
                            </div>
                            <div class="row">
                                <i class="fas fa-envelope"></i>
                                <a class="text-white" href="mailto:<?php echo $sports_footer['email_address']; ?>"><?php echo $sports_footer['email_address']; ?></a>
                            </div>
                            <div class="row">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php $address = $sports_footer['address']; 
                                if(!empty($address['address_line_1'])) : echo $address['address_line_1'].'<br>'; endif; 
                                if(!empty($address['street'])) : echo $address['street'].'<br>'; endif; 
                                if(!empty($address['town'])) : echo $address['town'].'<br>'; endif; 
                                if(!empty($address['city'])) : echo $address['city'].'<br>'; endif; 
                                if(!empty($address['county'])) : echo $address['county'].'<br>'; endif; 
                                if(!empty($address['postal_code'])) : echo $address['postal_code'].'<br>'; endif;                                     
                                ?>
                            </div>
                        <?php else : ?>
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
                                <?php $address = get_field('address','option'); 
                                if(!empty($address['address_line_1'])) : echo $address['address_line_1'].'<br>'; endif; 
                                if(!empty($address['street'])) : echo $address['street'].'<br>'; endif; 
                                if(!empty($address['town'])) : echo $address['town'].'<br>'; endif; 
                                if(!empty($address['city'])) : echo $address['city'].'<br>'; endif; 
                                if(!empty($address['county'])) : echo $address['county'].'<br>'; endif; 
                                if(!empty($address['postal_code'])) : echo $address['postal_code'].'<br>'; endif;                                     
                                ?>
                            </div>
                        <?php endif; ?>
                        </div>

                        <div class="col-md-4">
                        <?php if (is_sports_page()) : ?>
                            <h5><?php echo $sports_footer['column_3_title']; ?></h5>
                            <div class="footer-line"></div>

                            <?php 
                            if (isset($sports_footer['map_or_insta']) && $sports_footer['map_or_insta'] == 'Map') : 
                                $longitude = $sports_footer['longatude']; 
                                $latitude = $sports_footer['latitude']; 
                            ?>
                                <div id="map"></div>
                                <?php echo  "<script> var map = L.map('map').setView({lon:$longitude, lat:$latitude}, 15); </script>"; ?>
                                <script>
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                    }).addTo(map);
                                    L.control.scale().addTo(map);
                                </script>
                                <?php echo  "<script> L.marker({lon: $longitude, lat: $latitude}).addTo(map); </script>"; ?>
                            <?php endif; ?>
                            <?php if (isset($sports_footer['map_or_insta']) && $sports_footer['map_or_insta'] == 'Instagram') : ?>             
                                <div class="insta-gallery">
                                    <?php echo do_shortcode('[instagram-feed feed=1 cols=3 showbutton=false showheader=false imagepadding=0 followtext=Follow customtemplate=true user="'.$instauser_sport.'" ]'); ?>
                                </div>
                            <?php endif; ?>

                            <?php elseif (is_adult_ed_page()) : ?>
                                <h5><?php echo $adult_footer['column_3_title']; ?></h5>
                                <div class="footer-line"></div>
                                <?php
                                if (isset($adult_footer['adult_instagram_map_option']) && $adult_footer['adult_instagram_map_option'] == 'Map') : 
                                    $longitude = $adult_footer['longatude']; 
                                    $latitude = $adult_footer['latitude']; 
                                ?>
                                <div id="map"></div>
                                <?php echo  "<script> var map = L.map('map').setView({lon:$longitude, lat:$latitude}, 15); </script>"; ?>
                                <script>
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                    }).addTo(map);
                                    L.control.scale().addTo(map);
                                </script>
                                <?php echo  "<script> L.marker({lon: $longitude, lat: $latitude}).addTo(map); </script>"; ?>
                                <?php endif; ?>
                                <?php if (isset($adult_footer['map_or_insta']) && $adult_footer['map_or_insta'] == 'Instagram') : ?>             
                                <div class="insta-gallery">
                                    <?php 
                                    echo do_shortcode('[instagram-feed num=6 cols=3 showbutton=false showheader=false imagepadding=0 followtext=Follow customtemplate=true user="'.$instauser_adult.'" ]'); ?>
                                </div>
                                <?php endif; ?>

                            <?php else : ?>

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
                                    <?php echo  "<script> var map = L.map('map').setView({lon:$longitude, lat:$latitude}, 15); </script>"; ?>
                                    <script>
                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                        }).addTo(map);
                                        L.control.scale().addTo(map);
                                    </script>
                                    <?php echo  "<script> L.marker({lon: $longitude, lat: $latitude}).addTo(map); </script>"; ?>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-base">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            Company registration number: 07564749
                        </div>
                        <div class="col text-right">
                            Designed & Developed by <a href="https://www.redgraphic.co.uk/">Red Graphic</a>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <div class="backtotop"> 
            <i class="fas fa-chevron-up"></i>
        </div>

        <div class="cookieconsent_msg"> 
        <?php $cookie_link = get_field('cookie_policy_page','option'); ?>
            <span><?php the_field('cookie_notice_message','option'); ?> See <a href="<?PHP echo get_permalink($cookie_link->ID); ?>" target="_blank" class="ml-1 text-decoration-none">Cookie policy</a> </span>
            <div class=" ml-2 d-flex align-items-center justify-content-center g-2 mx-2">
                <button class="allow-button mr-1">Allow cookies</button>
            </div>
        </div>
    
    <?php wp_footer(); ?>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/offcanvas.js"></script>




</body>
</html>
