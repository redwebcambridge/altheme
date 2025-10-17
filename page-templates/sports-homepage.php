<?php
/*
Template Name: Sports Center Homepage
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="sports-page container">

        <!---Latest News section--->
        <?php if (get_field('enable_latest news')) : ?>
        <div class="col-12 latestnews">
        <?php
        //Retreive categories which are set to be Sports Center
        $args = array(
            'hide_empty' => 1,
            'meta_key' => 'category_type',
            'meta_value' => 'sportscentre'
        );
        $cats = get_terms($args);
        $cats_array = [];

        foreach($cats as $cat){
            array_push($cats_array,$cat->term_id);
        }

        if(get_field('enable_social_media_feed')){
            query_posts(array(
                'showposts' => 2,
                'cat' => $cats_array
            ));
            $newscol = 8;
            $newsitem = 6;
        } else {
            query_posts(array(
                'showposts' => 3,
                'cat' => $cats_array
            ));
            $newscol = 12;
            $newsitem = 4;
        }
        ?>
          <div class="container">
            <div class="row">

              <!-- News posts -->
              <div class="latestnews col-12 col-md-<?php echo $newscol; ?> newsholder">
                    <div class="row">
                        <div class="col-12">
                            <h2><?php echo get_field('title_left'); ?></h2>
                            <div class="gradline"></div>
                        </div>
                    </div>
                    <div class="row" role="list">
                        <?php while (have_posts()) : the_post();
                        $thumbnail= get_field('thumbnail');
                        $thumbnail = $thumbnail['sizes']['medium'];
                        $url = get_permalink();
                        ?>

                        <div class="col-md-<?php echo $newsitem; ?> newsitem" role="listitem">
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
                <?php if(get_field('enable_social_media_feed')) : ?>

                <div class="col-12 col-md-4 twittercontainer">
                <h2><?php echo get_field('social_media_feed_title'); ?></h2>
                    <div class="gradline"></div>

                    <?php 
                    $user = get_field('username'); 

                    if (get_field('platform') == 'Twitter') :
                    $tweets = twitterwp($user); ?>
                    <div class="twitter-box">
                        <a target="_blank" href="https://twitter.com/<?php echo $tweets[0]->user->screen_name; ?>">
                        <div class="twitter-header">
                            @<?php echo $tweets[0]->user->screen_name; ?>
                        </div>

                        </a>
                        <div class="slick-controls">
                            <button class="prev-tweet"><i class="fas fa-chevron-left"></i></button>
                            <button class="next-tweet"><i class="fas fa-chevron-right"></i></button>
                        </div>

                        <ul class="slick-twitter">
                           <?php
                           //Twitter loop
                            foreach ($tweets as $tweet) {
                                if(isset($tweet->entities->media[0]->media_url)){
                                    $tweet_img = $tweet->entities->media[0]->media_url;
                                } else {
                                    $tweet_img = null;
                                }
                                $tweet_date = $tweet->created_at;
                                $tweet_date= date_create($tweet_date);
                                $tweet_date = date_format($tweet_date,"jS F Y");
                                if ($tweet_img){
                                    echo '<li><p class="post-date">'.$tweet_date.'</p>';
                                    echo '<img class="twitter-tweet-image" src="'.$tweet_img.'" alt="Twitter Image">';
                                    $last_space_position = strrpos($tweet->full_text, ' ');
                                    $text_without_last_word = substr($tweet->full_text, 0, $last_space_position);
                                    echo $text_without_last_word.'</li>';
                                } else {
                                    echo '<li><p class="post-date">'.$tweet_date.'</p>'.$tweet->full_text.'</li>';
                                }
                            } //end foreach
                            ?>
                        </ul>

                        <a href="https://twitter.com/<?php echo $tweets[0]->user->screen_name; ?>" target="_blank" class="btn btn-primary rounded-0">VIEW ALL</a>
                    </div>
                    <?php endif; //end twitter feed 
                      
                    if (get_field('platform') == 'Instagram') :
                        echo '<div class="instagram-feed">';
                        echo do_shortcode('[instagram-feed user="'.$user.'" num=9 cols=3 showbutton=false showheader=false imagepadding=0 followtext=Follow customtemplate=true]');
                        echo '</div>';
                    endif;

                    if (get_field('platform') == 'Facebook') :
                        echo '<div class="facebook-feed">';
                        echo do_shortcode( get_field('facebook_feed_shortcode') );
                        echo '</div>';
                    endif;
                    
                    ?>


                </div>
                <?php endif; //end social feeds ?>
        </div>
        <div class="row">
          <div class="col-md-12 my-5">
              <div class="line"></div>
          </div>
        </div>  
        <?php endif; //end latest news ?>

        <!---Content and category  section--->
        <div class="col-12 text-section">
            <h2 class="heading-two"><?php echo get_field('content_block_title') ?></h2>
            <div class="gradline"></div>
            <p class="body-text"><?php echo get_field('content'); ?></p>
            <?php if (get_field('enable_categories')) : ?>
                <div class="row">
                <?php 
                $categories = get_terms([
                    'taxonomy' => 'sports-centre-category',
                    'hide_empty' => false,
                ]);

                if(!empty($categories) ):
                    foreach ($categories as $category) { 
                        echo '<div class="col-md-4 course"><a href="'.esc_url( get_term_link( $category->term_id ) ).'">';
                        echo '<div class="course-thumbnail" style="background-image:url('.get_field('image',$category).')"></div><p class="course-name">'.$category->name.'</p>';
                        echo '</a></div>';
                    } 
                ?> 
                <?php endif; ?>      
                </div>  
            <?php endif; ?>                      
                <?php if (get_field('display_contact_information_under_categories')) { get_template_part('template-parts/sports-contact');} ?>
                
        </div>

        <!-- partner slider -->
    </div>
</div>

</div>
</section>

<?php endwhile; endif;  wp_reset_query();  ?>

<?php get_footer(); ?>
