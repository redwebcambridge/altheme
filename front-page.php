<?php get_header(); ?>


<div class="tabcontent">
<?php
    $index = 0;
    if( have_rows('tab_content') ):
        while( have_rows('tab_content') ) : the_row();
            $image = get_sub_field('image');
            $index++;
?>
    <div class="container <?php if ($index==1){echo 'active';} ?>" id="<?php echo 'tab' . '-' . $index;?>">
        <div class="row">
            <div class="col-12 col-md-4 image">

                <?php 
                if(!empty($image)) : ?>
                    <img class="img-fluid img-<?php echo $image["id"];?> al-border-bottom" src="<?php echo $image["sizes"]["medium_large"];?>" alt="<?php echo $image["alt"];?>" data-nosnippet>
                <?php endif;
                
                ?>

            </div>
            <div class="col-12 col-md-8 content">
                <h2><?php echo get_sub_field('heading'); ?></h2>
                <div class="gradline"></div>
                <div class="tab-text">
                <?php
                $content = get_sub_field('content');
                $text_only = wp_strip_all_tags($content); // Remove HTML tags for counting
                
                if (strlen($text_only) > 500) {
                    $string = truncateHtml($content, 500);
                } else {
                    $string = $content;
                }
                
                echo $string;
                ?>
                <p><a target="<?php echo get_sub_field('button')['target'] ?? 'blank'; ?>" href="<?php echo get_sub_field('button')['url'] ?? get_bloginfo('url'); ?>"><button class="btn btn-primary rounded-0">READ MORE</button></a></p>
                </div>
            </div>
            <?php $logos = get_field('logo_and_icons','option'); ?>
        </div>
    </div>
<?php
        endwhile;
        unset($string,$endPoint,$stringCut);

    endif; ?>
</div><!-- .tabcontent -->

<!-- School icon -->
<div class="container schooliconholder">
    <div class="d-flex flex-row-reverse">
        <div class="p-2">
            <div class="schoolicon"> <img src="<?php echo $logos['icon']['url']; ?>" alt="<?php echo $logos['icon']['alt']; ?>"></div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
          <div class="line"></div>
      </div>
    </div>
</div>

<?php if ( get_field('announcement_banner_show') ) : ?>
    <div class="container my-5">
        <div class="row">
            
            <div class="col p-4 text-white d-flex" id="announcement" style="background-color:<?php if ( get_field('announcement_banner_bg') ) : echo get_field('announcement_banner_bg'); endif; ?>">
                <div>
                    <i class="fas fa-solid fa-bullhorn px-3 h1"></i>
                </div>
                <div>
                <?php if ( get_field('announcement_banner_message_content') ) : ?>
                    <?php echo get_field('announcement_banner_message_content'); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php
if( have_rows('counters_repeater') ): ?>

<script>

document.addEventListener('DOMContentLoaded', function() {
    
var counterran = false;

// IntersectionObserver callback
function handleIntersection(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting && !counterran) {
            animateCounters();
            counterran = true;
        }
    });
}

// Initialize IntersectionObserver
var observer = new IntersectionObserver(handleIntersection, {
    threshold: 0.5 // Adjust threshold as needed
});

// Target the stats_strip element
var target = document.querySelector('.stats_strip');
if (target) {
    observer.observe(target);
}

// Animate counters function
function animateCounters() {
    var counters = document.querySelectorAll('.number1, .number2, .number3, .number4');
    counters.forEach(counter => {
        var targetValue = parseInt(counter.getAttribute('data-counter'), 10);
        animateCounter(counter, targetValue);
    });
}

// Function to animate each counter
function animateCounter(element, targetValue) {
    var startValue = 0;
    var duration = 2000;
    var startTime = null;

    function updateCounter(currentTime) {
        if (!startTime) startTime = currentTime;
        var elapsedTime = currentTime - startTime;
        var progress = Math.min(elapsedTime / duration, 1);
        element.textContent = Math.ceil(progress * targetValue);
        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        }
    }

    requestAnimationFrame(updateCounter);
}
});
</script>

    <div class="stats_strip my-5 py-5" role="none" style="<?php if(get_field('stats_background_colour')){echo 'background-color: '.get_field('stats_background_colour');} ?>">
        <div class="container">
            <div class="row"> 
                <?php $i=1; while( have_rows('counters_repeater') ) : the_row(); ?>

                <?php $rows = count(get_field('counters_repeater')); 

                switch ($rows) {
                    case 1:
                        $col = 'col-12';
                        break;
                    case 2:
                        $col = 'col-6';
                        break;
                    case 3:
                        $col = 'col-sm-4 col-12 ';
                        break;
                    case 4:
                        $col = 'col-md-3 col-6';
                        break;
                    default:
                        $col = 'col';
                    };

                    //Counter JSON or manual
                    if ( get_sub_field('counter_type') == 'manual') : 
                        if ( get_sub_field('counter_number') ) {
                            $counter_number = intval(get_sub_field('counter_number'));
                        } else {
                            $counter_number = 0;
                        }
                    else:

                        $counter_number = fetch_json_value(get_sub_field('counter_json_label'));

                    endif; 
                    

                ?>

                <div class="<?php echo $col; ?> text-center counters my-3">                 
                    <div class="counter">
                        <div class="icon"><?php if(get_sub_field('counter_icon')) : echo '<img class="img-fluid" alt="" src="'.get_sub_field('counter_icon')['url'].'" />'; endif; ?></div>

                        <div class="number number<?php echo $i; ?>" data-counter="<?php echo $counter_number;  ?>">0</div>

                        <div class="label"><?php if(get_sub_field('counter_title')) : echo get_sub_field('counter_title'); endif; ?></div>
                    </div>
                </div>

                <?php $i++; ?>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif;
?>




<!-- Latest news and twitter -->
<div class="latestnews my-5">
    <?php
    //exclude newsletters
	$newsletters = get_category_by_slug('newsletter');
	$exclude = '-'.$newsletters->term_id;
    //exclude foundtain
    $fountain = get_category_by_slug('the-fountain');
    if ($fountain){
        $exclude .= ',-'.$fountain->term_id;
    }
	//exclude sports and adult ed categories
	$categories = get_categories();
	foreach($categories as $category) {
		if (get_field('category_type',$category)=='sportscentre') {
			$exclude .= ', -'.$category->term_id;
		}
		if (get_field('category_type',$category)=='adultlearning') {
			$exclude .= ', -'.$category->term_id;
		}
	}

    if(get_field('homepage_feed_option') == 'Twitter' || get_field('homepage_feed_option') == 'Facebook'){

        query_posts(array(
            'showposts' => 2,
            'cat' => $exclude
        ) );
        $newscol = 8;
        $newsitem = 6;
       
    } else {
       
        query_posts(array(
            'showposts' => 3,
            'cat' => $exclude
        ) );
        $newscol = 12;
        $newsitem = 4;
    }
    
    //Anglian Learning main site just use trust news
    if(get_field('school_id','option') == 'al') :
        query_posts(array(
            'showposts' => 2,
            'cat' => 25
        ) );
        $newscol = 8;
        $newsitem = 6;
    endif;




    ?>
    <!-- Titles (Latest news and twitter if applicable) -->
    <div class="container">
        <div class="row">

                <!-- News posts -->
                <div class="col-12 col-md-<?php echo $newscol; ?> newsholder" role="list">
                    <div class="row">
                        <div class="col-12">
                            <h2><?php echo get_field('title_left'); ?></h2>
                            <div class="gradline"></div>
                        </div>
                    </div>
                    <div class="row">
                        <?php while (have_posts()) : the_post();
                        $thumbnail= get_field('thumbnail');
                        $thumbnail = $thumbnail['sizes']['large'];
                        $url = get_permalink();
                        if (in_category('newsletter')){
                            $download = get_field('pdf_upload');
                            $thumbnail =  $download['icon'];
                            $url = $download['url'];
                        }
                        ?>

                            <div class="col-md-<?php echo $newsitem; ?> newsitem <?php  if (in_category('newsletter')){echo 'newsletter';} ?>">
                                <div onclick="window.location.href = '<?php echo $url; ?>' " class="thumbnail al-border-bottom" style="background-image:url('<?php echo $thumbnail; ?>')"></div>
                                <div class="newsitemdetails">
                                    <h3><a href="<?php echo $url; ?>"><?php the_title(); ?></a></h3>
                                    <p class="post-date"><?php echo get_the_date('jS F Y'); ?> </p>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                    <a class="btn btn-primary rounded-0" href="<?php echo $url; ?>">READ MORE</a>
                                </div>
                            </div>

                        <?php endwhile;  wp_reset_query(); ?>
                    </div>
                </div>


                <!-- Twitter column -->
                <?php if(get_field('homepage_feed_option') == 'Twitter') : ?>

                    <?php
                    if( have_rows('platforms','option') ):
                        while( have_rows('platforms','option') ) : the_row();
                        if(get_sub_field('platform')=='twitter'){$twitter_username = get_sub_field('username');} 
                        endwhile;
                    endif;

                    // API endpoint URL
                    $apiUrl = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$twitter_username.'&tweet_mode=extended&count=5';

                    // API request data
                    $data = array();

                    // Convert data to JSON format
                    $jsonData = json_encode($data);

                    // Bearer token
                    $bearerToken = TW_bearer_token;

                    // Create a stream context with headers for the API request
                    $context = stream_context_create(array(
                        'http' => array(
                            'method' => 'GET',
                            'header' => "Content-Type: application/json\r\n" .
                                        "Authorization: Bearer " . $bearerToken . "\r\n",
                            'content' => $jsonData
                        )
                    ));

                    // Send the API request and get the response
                    $response = file_get_contents($apiUrl, false, $context);

                    // Check if the request was successful
                    if ($response !== false) {
                        // Decode the JSON response
                        $responseData = json_decode($response, true);
                        ?>

                        <div class="col-12 col-md-4 twittercontainer">
                        <h2 role="heading">Latest Tweets</h2>
                        <div class="gradline"></div>
                        <div class="twitter-box">
                            <a target="_blank" href="https://twitter.com/<?php echo $responseData[0]['user']['screen_name'];  ?>">
                            <div class="twitter-header">
                                @<?php echo $responseData[0]['user']['screen_name']; ?>
                            </div>

                            </a>
                            <div class="slick-controls">
                                <button class="prev-tweet"><i class="fas fa-chevron-left"></i></button>
                                <button class="next-tweet"><i class="fas fa-chevron-right"></i></button>
                            </div>

                            <ul class="slick-twitter">
                            <?php
                            
                                if(isset($responseData)){
                                    foreach ($responseData as $item) {
                                        $twitter_date = date("jS F Y", strtotime($item['created_at']));

                                        if(isset($item['entities']['media'][0]['media_url'])){
                                            $tweet_img = $item['entities']['media'][0]['media_url'];
                                        } else {
                                            $tweet_img = null;
                                        }

                                        if ($tweet_img){
                                            echo '<li><p class="post-date">'.$twitter_date.'</p>';
                                            echo '<img class="twitter-tweet-image" src="'.$tweet_img.'" alt="Twitter Image">';
                                            $last_space_position = strrpos($item['full_text'], ' ');
                                            $text_without_last_word = substr($item['full_text'], 0, $last_space_position);
                                            echo $text_without_last_word.'</li>';
                                        } else {
                                            echo '<li><p class="post-date">'.$twitter_date.'</p>'.$item['full_text'].'</li>';
                                        }
                                    }
                                }
                            
                                ?>
                            </ul>
                            <a href="https://twitter.com/<?php echo $responseData[0]['user']['screen_name']; ?>" target="_blank" class="btn btn-primary rounded-0">VIEW ALL</a>
                        </div>
                    </div>

                    <?php
                    } else { ?>

                        <div class="col-12 col-md-4 twittercontainer">
                            Something went wrong. 
                        </div>

                    <?php
                    }
                    ?>


                    


                <?php elseif(get_field('homepage_feed_option') == 'Facebook'): ?>

                    <div class="col-12 col-md-4 twittercontainer">
                        <h2>Latest Facebook Posts</h2>
                        <div class="gradline"></div>

                        <?php
                            echo '<div class="facebook-feed">';
                            echo do_shortcode( get_field('facebook_feed_shortcode_home') );
                            echo '</div>';
                        ?>
                        

                    </div>

                <?php endif; //end twitter feed ?>


        </div>
    </div>
</div><!-- . end latestnews -->
<!-- .video section-->

<?php if(!empty(get_field('file'))) : ?>


<div class="video-section" role="complementary" style="background-color:<?php echo get_field('section_background_colour'); ?>;) ">
    <div class="container">
    <div class="siteicon" style="background-image:url(<?php echo get_field('background_image');  ?>)">

      <div class="row d-flex align-items-center">
              <div class="col-md-6">
                <h2><?php echo get_field('text_with_file_title'); ?></h2>
                <div class="gradline-secondwhite"></div>
                <?php echo get_field('text_with_file_body'); ?>
              </div>



                <div class="col-md-6">
                <?php
                        $iframe = get_field('file');
                        $primarycolour = str_replace('#', '', get_field('colours','option')['primary_colour']);
                        preg_match('/src="(.+?)"/', $iframe, $matches);
                        $src = $matches[1];
                        $params = array(
                            'title' => 0,
                            'showinfo' => 0,
                            'modestbranding' => 0,
                            'controls'  => 1,
                            'badge' => 0,
                            'byline' => 0,
                            'buttons' => 0,
                            'autoplay'  => get_field('autoplay_video'),
                            'setVolume' => 0,
                            'color' => $primarycolour,
                            'portrait' => 0,
                            'pip' => true,
                            'rel' => 0,
                        );
                        $new_src = add_query_arg($params, $src);
                        $iframe = str_replace($src, $new_src, $iframe);
                        $attributes = 'frameborder="0"';
                        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                        echo $iframe;
                        ?>
                </div>

      </div>
      </div>
      </div>
</div>

<?php endif; ?>



<?php if( have_rows('information_panel') ):   ?>
<div class="container">
    <div class="information-section">
        <div class="row">
        <?php while( have_rows('information_panel') ) : the_row(); ?>
            <div class="informationitem col-12 col-md-6">
                <div class="infodetails">
                    <h2><?php echo get_sub_field('title'); ?></h2>
                    <div class="gradline"></div>
                    <div class="info_img w-100 my-4" style="background-image:url(<?php echo get_sub_field('image'); ?>)"></div>
                    <span class="information-panel-body-text" role="article"><?php echo get_sub_field('body_text'); ?></span>

                    <p><a target="<?php echo get_sub_field('button_link')['target'] ?? 'blank'; ?>" href="<?php echo get_sub_field('button_link')['url']; ?>"><button class="btn btn-primary rounded-0"><?php echo get_sub_field('button_link')['title']; ?></button></a></p>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</div>
<?php  endif; ?>
<?php get_footer(); ?>
