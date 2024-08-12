<?php
/*
Template Name: Academies
*/
get_header();

//Loop through all the academies
$args = array(
    'post_type' => 'academies',
    'posts_per_page' => -1,
    'orderby' => 'post_name',
    'order' => 'ASC',
);

$academies = new WP_Query($args);

?>





<div class="container academies-page">
    <div class="row">
        <div class="seach-filters col-12 mb-4 p-lg-0">
            <?php get_template_part('template-parts/academies-search'); ?>
        </div>
    </div>

    <div class="container academies-map p-0 m-0">
        <div id="academies_map" class="p-0 m-0">
        </div>   
        <script>
            var academies_map = L.map('academies_map').setView([52.15,0.20], 10);
            L.tileLayer.provider('Stadia.AlidadeSmooth').addTo(academies_map);
        </script>
    </div>

        <div class="row gx-5">
                    
            <?php
                if ($academies->have_posts()) {
                    while ($academies->have_posts()) {
                        $academies->the_post();

                        $school_age = get_the_terms(get_the_ID(), 'school_age');
                        $local_authority = get_the_terms(get_the_ID(), 'local_authority');
                        if ($school_age && !is_wp_error($school_age)) {
                            $school_age_html = '';
                            $school_age_data = '';
                            foreach ($school_age as $term) {
                                $school_age_html .= '<a href="#" class="label label-default">'.$term->name.'</a>';
                                $school_age_data .= preg_replace('/[^a-zA-Z0-9]+/', '', $term->name).' ';
                            }
                        }
                        if ($local_authority && !is_wp_error($local_authority)) {
                            $local_authority_html = '';
                            $local_authority_data = '';
                            foreach ($local_authority as $authority) {
                                $local_authority_html .= '<a href="#" class="label label-default">'.$authority->name.'</a>';
                                $local_authority_data .= preg_replace('/[^a-zA-Z0-9]+/', '', $authority->name).' ';
                            }
                        }
            ?>

            

            <div class="academies-row-cont col-lg-3 mb-4">
                <style type="text/css">
                        .map-icon-<?php echo get_the_ID(); ?> .marker_inner{
                            background-color:<?php echo get_field('school_color');?>;  
                        }
                        .map-popup<?php echo get_the_ID(); ?> h3, .map-popup<?php echo get_the_ID(); ?> a {
                            color:<?php echo get_field('school_color');?>;
                        }
                        a.btn<?php echo get_the_ID(); ?> {
                            background-color:<?php echo get_field('school_color');?>;
                        }
                    </style>

                    <script>
                        let mapicon<?php echo get_the_ID(); ?> = L.divIcon({
                            html: '<div class="academies_marker marker" data-filters-age="<?php echo $school_age_data; ?>" data-filters-local="<?php echo $local_authority_data; ?>" data-school-name="<?php echo preg_replace('/[^a-zA-Z0-9]+/', '', get_the_title()); ?>"><div class="marker_inner"><img src="<?php echo get_field('icon')['url'];?>" alt="<?php echo get_the_title(); ?>"></div></div>',
                            iconSize: [24, 40],
                            iconAnchor: [12, 40],
                            className: 'map-icon map-icon-<?php echo get_the_ID(); ?>',
                        });
                        let address<?php echo get_the_ID(); ?>  = `<?php echo addslashes(get_field('full_address'));?>`;

                        let popupcontent<?php echo get_the_ID(); ?> = '<div class="map-popup map-popup<?php echo get_the_ID(); ?>"><img src="<?php echo get_field('logo')['url'];?>" alt="<?php echo get_the_title(); ?>" /><h3><?php echo get_the_title(); ?></h3>'+address<?php echo get_the_ID(); ?> +'<a class="email" title="Email" href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a><a class="tel" href="tel:<?php echo get_field('telephone'); ?>"><?php echo get_field('telephone'); ?></a><div class="labels"><?php echo $school_age_html.$local_authority_html ?></div><div class="buttons"><a class="btn btn<?php echo get_the_ID(); ?>" href="<?php echo get_field('website'); ?>">Visit Website</a><a class="btn btn<?php echo get_the_ID(); ?>" href="#">Read More</a></div></div>';
                        
                        L.marker([<?php echo get_field('map_lng');?>,<?php echo get_field('map_lat');?>], { icon: mapicon<?php echo get_the_ID(); ?>, className:'map-icon-<?php echo get_the_ID(); ?>' }).addTo(academies_map).bindPopup(popupcontent<?php echo get_the_ID(); ?>, {
                            autoPan: true,
                            minWidth: 250,
                            maxWidth: 250,
                            offset: [-195, 50],
                        });


                    
                    </script>

                    <div class="academies-row flex-column justify-content-start h-100 row mb-4" data-field-visibility="visible" data-filters-local="<?php echo $local_authority_data; ?>" data-filters-age="<?php echo $school_age_data; ?>" data-school-name="<?php echo preg_replace('/[^a-zA-Z0-9]+/', '', get_the_title()); ?>">
                        <div class="col-12 p-5 bg-white school-icon-container text-center" >
                            <div class="school-icon" style="background-image:url(<?php echo get_field('logo')['url']; ?>)"></div>
                        </div>
                        <div class="col-12 school_name my-3 px-3">
                            <strong style="color:<?php echo get_field('school_color');?>;"><?php echo the_title(); ?></strong>
                        </div>
                        <div class="col-12 pb-3">
                            <div class="row bg-white m-1">
                                <div class="col-5 head-teacher-image" style="background-image:url('<?php echo get_field('image_of_head')['url']; ?>')">
                                </div>
                                <div class="col-7 py-4 head-name">
                                    <div class="w-100">
                                        <?php echo get_field('head_name'); ?>
                                    </div>
                                    <span style="color:<?php echo get_field('school_color');?>;">
                                    <?php echo get_field('head_title'); ?>
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 school_address py-1 px-3">
                            <?php echo get_field('full_address'); ?>
                        </div>

                        <div class="col-12 tel-email  px-3" >
                            <div class="w-100 email pb-1">
                                <a target="_blank" style="color:<?php echo get_field('school_color');?>;" href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a>
                            </div>
                            <div class="w-100">
                                <a target="_blank" style="color:<?php echo get_field('school_color');?>;" href="tel:<?php echo get_field('telephone'); ?>"><?php echo get_field('telephone'); ?></a>
                            </div>
                        </div>

                        <div class="col-12 taxonomies mb-0 p-3">
                            <?php
                                $school_age = get_the_terms(get_the_ID(), 'school_age');
                                $local_authority = get_the_terms(get_the_ID(), 'local_authority');
                                if ($school_age && !is_wp_error($school_age)) {
                                    foreach ($school_age as $term) : ?>
                                        <a><?php echo $term->name; ?></a>
                                    <?php endforeach; 
                                }
                                if ($local_authority && !is_wp_error($local_authority)) {
                                    foreach ($local_authority as $authority) : ?>
                                        <a><?php echo $authority->name; ?></a>
                                    <?php endforeach; 
                                }
                            ?>
                        </div>

                        <div class="col-12 academies_buttons p-3">
                            <a class="view-on-map-button" style="background-color:<?php echo get_field('school_color');?>;" href="#"><i class="fa-solid fa-location-dot"></i>View on Map</a>
                            <a target="_blank" style="background-color:<?php echo get_field('school_color');?>;" href="<?php echo get_field('website'); ?>"><i class="fa-solid fa-globe"></i>Visit Website</a>
                        </div>
                        
                    </div>
                </div>

                <?php
                }
            }
        ?>

        <div id="message" class="pt-4 mb-5" style="display: none;"><h1>No academies found.</h1></div>



</div>
<script>
    var checkboxes = document.querySelectorAll(".checkboxes button");

    //toggle class to clicked button KEEP ABOVE SCRIPT OTHERWISE CHECKING THE CLASS HAS DEACTIVE WONT WORK
    jQuery( ".filter_button" ).on( "click", function() {
        jQuery(this).toggleClass('deactive'); 
    }); 


    function checkifempty() {
        if (jQuery('.academies-page').length > 0 && jQuery('.academies-page').find('.academies-row:not([style*="display: none"])').length === 0) {
            jQuery('.academies-page #message').show();
        } else {
            jQuery('.academies-page #message').hide(); 
        } 
    }

    function updatesearchresults(){
        jQuery('.search-results').css('display', 'flex');
        jQuery('#search_results').html('Academies found: ' + jQuery('.academies-page').find('.academies-row:not([style*="display: none"])').length);
        
        document.querySelectorAll('.academies-row').forEach(function(row) {
            let parentContainer = row.closest('.academies-row-cont');
            
            if (window.getComputedStyle(row).display === 'none') {
                parentContainer.style.display = 'none';
            } else {
                parentContainer.style.display = ''; // Removes the inline display:none style
            }
        });

    }

    for (var checkbox of checkboxes) {
        checkbox.addEventListener("click", function(event) {
            academies_filter(event.target);
            const searchInput = document.getElementById('academies_search');
            searchInput.value = '';
            checkifempty();
        });
    }

    function academies_filter(checkbox) {
    
    var value = !checkbox.classList.contains('deactive') ? checkbox.getAttribute('data-filter-value') : "";

    var markers = document.querySelectorAll("#academies_map .marker");
    var academies_rows = document.querySelectorAll(".academies-page .academies-row");

    var checked_checkboxes_age = [];
    var checked_checkboxes_local = [];

    for (var checkbox of checkboxes) {
        if (!checkbox.classList.contains('deactive')) {
            if(checkbox.getAttribute('data-filter-type') == 'local'){
                checked_checkboxes_local.push(checkbox.getAttribute('data-filter-value'));                           
            } else if(checkbox.getAttribute('data-filter-type') == 'age') {
                checked_checkboxes_age.push(checkbox.getAttribute('data-filter-value'));
            }
        }
    }

    for (var academies_row of academies_rows) {
        var academies_filters_age = academies_row.getAttribute("data-filters-age").split(" ");
        var academies_filters_local = academies_row.getAttribute("data-filters-local").split(" ");
        let show = true;
        for (var filter of academies_filters_age) {
            if (checked_checkboxes_age.includes(filter) && filter.length > 1) {
                show = true;
                break;
            } else {
                show = false;
            } 
        }

        if(show === true){
            for (var filter of academies_filters_local) {
                if (checked_checkboxes_local.includes(filter) && filter.length > 1) {
                    show = true;
                    break;
                } else {
                    show = false;
                } 
            }
        }

        if(show === true){
            jQuery(academies_row).show();
        } else {
            jQuery(academies_row).hide();
        }
    }

    for (var marker of markers) {
        var filters_age = marker.getAttribute("data-filters-age").split(" ");
        var filters_local = marker.getAttribute("data-filters-local").split(" ");
        let show = true;
        for (var filter of filters_age) {
            if (checked_checkboxes_age.includes(filter) && filter.length > 1) {
                show = true;
                break;
            } else {
                show = false;
            } 
        }
        if(show === true){
            for (var filter of filters_local) {
                if (checked_checkboxes_local.includes(filter) && filter.length > 1) {
                    show = true;
                    break;
                } else {
                    show = false;
                } 
            }
        }
        if(show === true){
            marker.style.display = "block";
        } else {
            marker.style.display = "none";
        }
    }
    updatesearchresults();     
}
</script>

<script>
    jQuery(document).ready(function() {

        //search functionality
        jQuery("#academies_search").on("keyup", function() {
            let academy_string = this.value.toLowerCase(); 
            academy_string = academy_string.replace(/\s/g, '');

            jQuery('.filter_button').removeClass('deactive');

            jQuery(".academies-row").each(function(index, element) {
                var schoolName = jQuery(element).data("school-name").toLowerCase(); 

                if (schoolName.includes(academy_string)) {
                    jQuery(element).show();
                    // jQuery(element).attr('data-field-visibility', 'visible');
                    checkifempty();
                } else {
                    jQuery(element).hide();
                    // jQuery(element).attr('data-field-visibility', 'hidden');
                    checkifempty();
                }
            });

            updatesearchresults();     

            jQuery(".academies_marker").each(function(index, element) {
                var schoolName = jQuery(element).data("school-name").toLowerCase(); 

                if (schoolName.includes(academy_string)) {
                    jQuery(element).show();
                } else {
                    jQuery(element).hide();
                }
            });
        });

        jQuery("#academies_map").hide();

        jQuery( "#view_map" ).on( "click", function() {
            jQuery("#academies_map").show();
            jQuery(".academies-row").hide();
            jQuery(".search_buttons").removeClass('active');
            jQuery(this).addClass('active');            
        });

        jQuery( "#view_list" ).on( "click", function() {
            jQuery("#academies_map").hide();
            jQuery(".academies-row").show();
            jQuery(".search_buttons").removeClass('active');
            jQuery(this).addClass('active');
        });
    });



    //trigger view on map button
     jQuery(".view-on-map-button").on("click", function(event) {

        jQuery("#academies_map").show();
        jQuery(".academies-row").hide();
        jQuery(".search_buttons").removeClass('active');
        jQuery('.map_view').addClass('active');  

                    
        var markerId = jQuery(this).closest('.academies-row').data('school-name');
        
        var markerElement = jQuery('.academies_marker[data-school-name="' + markerId + '"]');
        

        markerElement.trigger('click');   
        // markerElement.click();               
             
    });


</script>



<?php get_footer(); ?>