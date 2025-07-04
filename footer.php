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
                    <!-- sliders from school settings -->
                    <?php if( have_rows('carousel','option') ):
                        while( have_rows('carousel','option') ) : the_row(); ?>
                            <a 
                            href="<?= get_sub_field('url'); ?>" 
                            class="<?= get_sub_field('class'); ?>" 
                            target="_blank" 
                            style="background-image:url(<?= get_sub_field('image'); ?>)"
                            title="<?= esc_attr(get_the_title(get_sub_field('image', false))); ?>"
                            aria-label="<?= esc_attr(get_the_title(get_sub_field('image', false))); ?>"
                            >
                                <span class="visually-hidden"><?= get_sub_field('alt_text') ?></span>                           
                            </a>
                    <?php endwhile; endif; ?>

                    <!-- Anglian learning site only - get all school icons -->
                    <?php
                    if(get_field('school_id','option') == 'al') :
                        $args = array(
                            'post_type' => 'academies',
                            'posts_per_page' => -1,
                            'orderby' => 'post_name',
                            'order' => 'ASC',
                        );
                        $query = new WP_Query( $args );
                        
                        // The Loop
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                $logo = get_field('logo'); ?>

                                <a href="<?= the_permalink(); ?>" 
                                class="al_acad_<?= get_the_id(); ?>" 
                                target="_blank"
                                title="<?= the_title(); ?>"
                                aria-label="<?= the_title(); ?>"
                                style="background-image:url(<?= get_field('logo')['url']; ?>)">
                                    <span class="visually-hidden"><?= the_title();?></span>                           
                                </a>

                            <?php
                                
                            }
                        }
                        // Restore original Post Data
                        wp_reset_postdata();

                    endif; ?>
                </div>
                <div class="slick-controls-lower">
                    <button class="prev-slide-lower"><span class="visually-hidden">Previous</span></button>
                    <button class="next-slide-lower"><span class="visually-hidden">Next</span></button>
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
                            <a 
                                href="<?= get_sub_field('link'); ?>" 
                                class="<?= get_sub_field('class'); ?>" 
                                target="_blank" 
                                style="background-image:url(<?= get_sub_field('icon_image'); ?>)"
                                title="Partner Logo"
                                aria-label="Partner Logo"
                            >
                                <span class="visually-hidden"><?= get_sub_field('link'); ?></span>                           
                            </a>
                    <?php endwhile; endif; ?>
                </div>
                <div class="slick-controls-lower">
                    <button class="prev-slide-lower"><span class="visually-hidden">Previous</span></button>
                    <button class="next-slide-lower"><span class="visually-hidden">Next</span></button>
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
                            <div class='h5'><?= $adult_footer['column_1_title']; ?></div>
                            <div class="footer-line"></div>
                            <p><?= $adult_footer['col1_content']; ?></p>
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

                                    <a href="<?= $platform['platform_url']; ?>" 
                                    target="_blank" 
                                    title="<?= esc_attr($platform['platform']);?>" 
                                    aria-label="<?= esc_attr($platform['platform']);?>">
                                    <i class="social fab fa-<?= $platform_icon; if($platform['platform']=='facebook'){echo '-f';} ;?>"></i></a>
                                <?php endforeach; ?>
                                </div>
                        <?php elseif (is_sports_page()) : ?>
                            <!-- Sports Footer -->
                            <?php $sports_footer = get_field('sports_footer_options','option'); ?>
                            <div class='h5'><?= $sports_footer['column_1_title']; ?></div>
                            <div class="footer-line"></div>
                            <p><?= $sports_footer['col1_content']; ?></p>
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



                                    <a href="<?= $platform['platform_url']; ?>" target="_blank" title="<?= esc_attr($platform['platform']);?>" aria-label="<?= esc_attr($platform['platform']);?>"><i class="social fab fa-<?= $platform_icon; if($platform['platform']=='facebook'){echo '-f';} ;?>"></i></a>
                                <?php endforeach; ?>
                                </div>
                        <?php else : ?>    
                            <!-- School Footer -->
                            <div class='h5'><?= get_field('left_footer_title','option') ?></div>
                            <div class="footer-line"></div>
                            <?= get_field('footer_left_side_text','option'); ?>
                                <div class="social">
                                <?php if( have_rows('platforms' , 'option') ): while( have_rows('platforms' , 'option') ) : the_row();  ?>
                                    <?php if(get_sub_field('platform') == 'twitter') {
                                        $platform = 'x-twitter';
                                        } else {
                                            $platform = get_sub_field('platform');
                                        } 
                                    ?>
                                    <a href="<?= get_sub_field('platform_url'); ?>" target="_blank" title="<?= esc_attr(get_sub_field('platform'));?>" aria-label="<?= esc_attr(get_sub_field('platform'));?>"><i class="social fab fa-<?= $platform; if(get_sub_field('platform')=='facebook'){echo '-f';} ;?>"></i></a>
                                <?php endwhile; endif; ?>
                                </div>
                        <?php endif; ?>
                        </div>

                        <div class="col-md-4 contact-info">
                        <?php if (is_adult_ed_page()) : ?>
                            <div class="h5"><?= $adult_footer['column_2_header']; ?></div>
                            <div class="footer-line"></div>
                            <div class="row">
                                <i class="fas fa-phone-alt"></i>
                                <a class="text-white" href="tel:<?= $adult_footer['telephone']; ?>"><?= $adult_footer['telephone']; ?></a>
                            </div>
                            <div class="row">
                                <i class="fas fa-envelope"></i>
                                <a class="text-white" href="mailto:<?= $adult_footer['email_address']; ?>"><?= $adult_footer['email_address']; ?></a>
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
                            <div class='h5'><?= $sports_footer['column_2_header']; ?></div>
                            <div class="footer-line"></div>
                            <div class="row">
                                <i class="fas fa-phone-alt"></i>
                                <a class="text-white" href="tel:<?= $sports_footer['telephone']; ?>"><?= $sports_footer['telephone']; ?></a>
                            </div>
                            <div class="row">
                                <i class="fas fa-envelope"></i>
                                <a class="text-white" href="mailto:<?= $sports_footer['email_address']; ?>"><?= $sports_footer['email_address']; ?></a>
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
                            <div class='h5'><?php the_field('middle_footer_title','option') ?></div>
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
                            <div class='h5'><?= $sports_footer['column_3_title']; ?></div>
                            <div class="footer-line"></div>

                            <?php 
                            if (isset($sports_footer['map_or_insta']) && $sports_footer['map_or_insta'] == 'Map') : 
                                $longitude = $sports_footer['longatude']; 
                                $latitude = $sports_footer['latitude']; 
                            ?>
                                <div id="map"></div>
                                <?=  "<script> var map = L.map('map').setView({lon:$longitude, lat:$latitude}, 15); </script>"; ?>
                                <script>
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                    }).addTo(map);
                                    L.control.scale().addTo(map);
                                </script>
                                <?=  "<script> L.marker({lon: $longitude, lat: $latitude}).addTo(map); </script>"; ?>
                            <?php endif; ?>
                            <?php if (isset($sports_footer['map_or_insta']) && $sports_footer['map_or_insta'] == 'Instagram') : ?>             
                                <div class="insta-gallery">
                                    <?= do_shortcode('[instagram-feed feed=1 cols=3 showbutton=false showheader=false imagepadding=0 followtext=Follow customtemplate=true user="'.$instauser_sport.'" ]'); ?>
                                </div>
                            <?php endif; ?>

                            <?php elseif (is_adult_ed_page()) : ?>
                                <div class='h5'><?= $adult_footer['column_3_title']; ?></div>
                                <div class="footer-line"></div>
                                <?php
                                if (isset($adult_footer['adult_instagram_map_option']) && $adult_footer['adult_instagram_map_option'] == 'Map') : 
                                    $longitude = $adult_footer['longatude']; 
                                    $latitude = $adult_footer['latitude']; 
                                ?>
                                <div id="map"></div>
                                <?=  "<script> var map = L.map('map').setView({lon:$longitude, lat:$latitude}, 15); </script>"; ?>
                                <script>
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                    }).addTo(map);
                                    L.control.scale().addTo(map);
                                </script>
                                <?=  "<script> L.marker({lon: $longitude, lat: $latitude}).addTo(map); </script>"; ?>
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
                                echo '<div class="h5">LOCATION</div>';
                            } elseif ($selection == "Instagram") {
                                echo '<div class="h5">INSTAGRAM GALLERY</div>';
                            }; ?>
                            <div class="footer-line"></div>

                                <?php if( get_field('instagram_map','option') == 'Instagram' ) { ?>
                                    <div class="insta-gallery">
                                    <?= do_shortcode('[instagram-feed num=6 cols=3 showbutton=false showheader=false imagepadding=0 followtext=Follow customtemplate=true]'); ?>
                                    </div>
                                <?php } else { ?>
                                    <?php
                                    $longitude = get_field('longitude','option');
                                    $latitude = get_field('latitude','option');
                                    ?>
                                    <div id="map"></div>
                                    <?=  "<script> var map = L.map('map').setView({lon:$longitude, lat:$latitude}, 15); </script>"; ?>
                                    <script>
                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                        }).addTo(map);
                                        L.control.scale().addTo(map);
                                    </script>
                                    <?=  "<script> L.marker({lon: $longitude, lat: $latitude}).addTo(map); </script>"; ?>
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
                            <div class="w-100 pb-4 trust_footer_text">
                                    <?php if ( get_field('school_id','option') != 'al' ) : ?>
                                        <?php if ( get_field('school_name','option') ) : echo get_field('school_name','option'); endif; ?>
                                        is operated by Anglian Learning, an exempt charitable company limited by guarantee and registered in England and Wales with company number 07564749. The registered office is at Bottisham Village College, Lode Road, Bottisham, Cambridge, CB25 9DL
                                    <?php else : ?>
                                        Anglian Learning is an exempt charitable company limited by guarantee and registered in England and Wales with company number 07564749. The registered office is at Bottisham Village College, Lode Road, Bottisham, Cambridge, CB25 9DL
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="col text-right">
                            <div id="rwdevlink"></div> 
                            <script>
                            (async () => {
                                const contentDiv = document.getElementById('rwdevlink');
                            try {
                                const response = await fetch('https://rgrw-footer-link.redwebcambridge.workers.dev/');
                                const data = await response.text();
                                contentDiv.innerHTML = data;
                            } catch (error) {
                                console.error('Failed to load footer content:', error);
                            }
                            })();
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <div class="backtotop"> 
            <i class="fas fa-chevron-up"></i>
        </div>

        
        <?php if(get_field('cookie_policy_page','option')) : $cookie_link = get_field('cookie_policy_page','option');  ?>


        <div class="cookieconsent_msg"> 
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-9" role='alert'>
                        <?php the_field('cookie_notice_message','option'); ?>  
                        <a href="<?= get_permalink($cookie_link->ID); ?>" target="_blank" class="ml-1 text-decoration-none">Learn More</a> 
                    </div>
                    <div class="col-lg-3 text-lg-end pt-4 pt-lg-0">
                        <button class="allow-button mr-1 mb-1">Accept</button>
                        <button class="decline-button mr-1 mb-1">Decline</button>
                    </div>
                    </div>
                </div>
            </div>
            

            <?php endif; ?>
    
    <?php wp_footer(); ?>

    <script src="<?= get_stylesheet_directory_uri(); ?>/js/offcanvas.js"></script>


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA_TAG; ?>"></script>
  <script>
    var cookiesAccepted = getCookie("cookiesAccepted");
    if (cookiesAccepted === "true") {
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?= GA_TAG; ?>');
    } else {
        clearCookies();
    }
  </script>

</body>
</html>