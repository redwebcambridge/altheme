<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php
    if (!is_adult_ed_page() || !is_sports_page()) {
        $featuredimg = get_the_post_thumbnail_url();
    }
    if (is_home()) {
      $featuredimg = get_the_post_thumbnail_url(get_option( 'page_for_posts' ));
    }
    if(is_tax()){
      $featuredimg = get_field('image',get_queried_object());
    }
    if (!isset($featuredimg) || empty($featuredimg)){
      $featuredimg = get_field('logo_and_icons','option')['default_header_image'];
    }
    if (is_category()){
      $category = get_queried_object();
      $header_text = $category->name;
      $featuredimg = get_field('image', $category);
      if(empty($featuredimg)){
        $featuredimg = get_field('header_image', $category);
      }
      if(empty($featuredimg)){
        $featuredimg = get_field('logo_and_icons','option')['default_header_image'];
      }
    }
   
    ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <meta property="og:url" content="<?php echo the_permalink(); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo the_title(); ?>" />
  <meta property="twitter:title" content="<?php echo the_title(); ?>" />
  <meta name="twitter:card" content="summary_large_image">
  <?php
    if (is_front_page()) {

        if( have_rows('header_image') ):
          while( have_rows('header_image') ) : the_row();
            ?>
              <!--Front page-->
              <meta property="og:image" content="<?php echo get_sub_field('image'); ?>" />
              <meta property="twitter:image" content="<?php echo get_sub_field('image'); ?>" />
            <?php
            break;
          endwhile;
        endif;

      } elseif(is_single()) {
        ?>

        <!--News page-->
        <meta property="og:description" content="<?php echo the_excerpt(); ?>" />
        <meta property="og:image" content="<?php echo $featuredimg; ?>" />

        <?php
      } else { ?>

        <!--All pages-->

        <meta property="og:image" content="<?php echo $featuredimg; ?>" /> 
        <meta property="twitter:image" content="<?php echo $featuredimg; ?>">

        <?php
      }
  ?>
    
  <?php wp_head(); ?>
</head>
<?php $school_initials = 'school_id_'.get_field('school_id','option'); ?>
<body <?php body_class($school_initials); ?> <?php if ( is_adult_ed_page() ) { echo 'id="adult_ed"'; } ?><?php if ( is_sports_page() ) { echo 'id="sports"'; } ?>>

<?php
//ACF must be installed
if (!class_exists('ACF')) {
  echo 'The Anglian Learning theme requires ACF to be installed'; die;
}
?>

<?php if ( isset($_GET['sass']) ): sass_compile(); endif; ?>
<div id="page" class="site">
<div class="line col fixed-top"></div>

<?php if (get_field('laurel','option') && is_front_page(  )) : ?>
<div class="container-white-laurel">
<?php else : ?>
<div class="container-white">
<?php endif; ?>

<header>
  <div class="container">
    <div class="row align-items-center main-head-elements">
      <!-- logo -->
      <div class="col-6 col-md-3 pt-2 logo-container">
            <?php if ( is_adult_ed_page() ) {  ?>
                <?php $adultlogos = get_field('adultlearning_logo_and_icons','option'); ?>
                <a href="<?php echo the_permalink(get_field('adult_learning_homepage','option')); ?>">
                  <img class="img-fluid py-2 pr-5" id="logo" src="<?php echo $adultlogos['adult_logo']['url']; ?>" alt="<?php echo $adultlogos['adult_icon']['alt']; ?>">
                </a>
            <?php } elseif (is_sports_page()) { ?>
                <?php $sportlogos = get_field('sports_logo_and_icons','option'); ?>
                <a href="<?php echo the_permalink(get_field('sports_homepage','option')); ?>">
                  <img class="img-fluid py-2 pr-5" id="logo" src="<?php echo $sportlogos['sports_logo']['url']; ?>" alt="<?php echo $sportlogos['sports_logo']['alt']; ?>">
                </a>
            <?php } else { ?>
              <?php $logos = get_field('logo_and_icons','option'); ?>
                <a href="/">
                  <img class="img-fluid py-2 pr-5" id="logo" src="<?php echo $logos['logo']['url']; ?>" alt="<?php echo $logos['logo']['alt']; ?>">
                </a>
            <?php } ?>
        </div>
        <!-- grey buttons -->
        <div class="col-12 col-lg-7 pt-4 searchtopbuttonholder">
              <div class="row justify-content-end google_search">
                <div class="col-md-6 col-lg-4 px-0"><div id="google_translate_el"></div></div>
                <div class="col-md-6 col-lg-4 pl-0"><?php get_search_form(); ?></div>
              </div>
              <div class="row" id="top_buttons">
              <?php
              if ( is_sports_page()) {
                wp_nav_menu( array(
                  'menu'              =>  get_field('sports_grey_tabs_menu','option'),
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker(),
                  'menu_class'        => 'd-md-flex justify-content-end',
                  'container_class'   => 'col-12',
                ));
              }
              elseif ( is_adult_ed_page() ) {
                wp_nav_menu( array(
                  'menu'              =>  get_field('grey_tabs_menu','option'),
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker(),
                  'menu_class'        => 'd-md-flex justify-content-end',
                  'container_class'   => 'col-12',
                ));
              } elseif(has_nav_menu('top-buttons')) {
                $menu_name = 'top-buttons';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );


      
                        

              
                ?>
                <nav>
                <ul class="d-md-flex justify-content-end" id="menu-top-buttons" itemscope>
                <?php
                $count = 0;
                foreach ($menuitems as $item) :
                 // item does not have a parent so menu_item_parent equals 0 (false)
                  if ( !$item->menu_item_parent ):
                  $parent_id = $item->ID;
                  ?>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                    <a itemprop="url" href="<?php echo $item->url ?>" class="nav-link" alt="<?php echo $item->title; ?>" target="<?php echo $item->target; ?>"><span itemprop="name"><?php echo $item->title; ?></span></a>
                  <?php endif;

                  if ( $parent_id == $item->menu_item_parent ):
                    if ( !$submenu ): echo '<i class="fas fa-sort-down"></i>'; $submenu = true; ?>

                    <ul class="dropdown-menu">

                    <div class="double-sub">
                    <?php
                    if (get_field('include_left_column',$parent_id)) : ?>
                      <div class="submenu-left">
                        <?php
                          echo get_field('content',$parent_id);
                          if (get_field('show_button',$parent_id)){
                            echo '<a class="btn" href="'.get_field('button_url',$parent_id).'">'.get_field('button_text',$parent_id).'</a>';
                          }
                        ?>
                      </div>
                      <?php endif; ?>

                      <div class="submenu-right">
                      <?php endif; ?>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                            <a href="<?php echo $item->url ?>" class="title" alt="<?php echo $item->title; ?>" target="<?php echo $item->target; ?>"><span itemprop="name"><?php echo $item->title; ?></span></a>
                        </li>
                      <?php if ( isset($menuitems[ $count + 1 ]) && $menuitems[ $count + 1 ]->menu_item_parent  != $parent_id && $submenu ): ?>
                      </div>
                    </div>
                    </ul>
                    <?php $submenu = false; endif;
                  endif;

                  if ( isset($menuitems[ $count + 1 ]) && $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ):
                    echo '</li>';
                    $submenu = false;
                  endif;

                $count++;
                endforeach;
                ?>

                  </ul>
                </nav>
              <?php
              //top grey buttons
              }
              ?>
              </div>
        </div>
        <!-- Anglian learning logo -->
        <div class="col-6 col-md-2 al-logo">
          <a href="https://anglianlearning.org/" title="Anglian Learning" target="_blank">
            <img class="image-right img-fluid pt-2" src="https://anglianlearning.org/wp-content/themes/Anglian-Learning-Live/images/logo.png" alt="Anglian Learning" />
          </a>
        </div>
      </div><!-- row -->

  </div> <!-- container -->
</header><!-- #masthead -->

<div class="navbar navbar-expand-md navbar-light bg-light sticky-nav sticky-top" id="stickynav">
    <div class="container">
        <button class="navbar-toggler menuicon" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon" ></span> -->
          <span class=""><i class="fa-solid fa-bars navbar-icon"></i></span>

        </button>
        <?php
        //Get corrent page for back button
        //Homepage wont need back button
        if (!is_front_page()) :
          if (has_post_parent()){
            $back_url = get_permalink(get_post_parent());
          }
          if (is_category('newsletter') || is_category('the-fountain') || get_post_type() == 'post') {
            $back_url = get_post_type_archive_link( 'post' );
          }
          if (is_sports_page()) {
            $back_url =  get_permalink(get_field('sports_homepage','option'));
            //if single sports cat
            if (is_singular('sportscentre')) {
              $term = get_the_terms($post->ID,'sports-centre-category');
              if ( isset($term) && is_array( $term ) ) {
                foreach($term as $term_single) {
                  $back_url = get_term_link($term_single);
                }
              }
            }
          }
          if (is_adult_ed_page()) {
            $back_url =  get_permalink(get_field('adult_learning_homepage','option'));
            //if single adult cat
            if (is_singular('adultlearning')) {
              $term = get_the_terms($post->ID,'adult-learning-category');
              if ( isset($term) && is_array( $term ) ) {
                foreach($term as $term_single) {
                  $back_url = get_term_link($term_single);
                }
              }
            }
          }
          if (empty($back_url)){
            $back_url = get_home_url();
          }
          ?>
          <button class="navbar-toggler back-button" type="button" data-bs-toggle="offcanvas" aria-label="Back" data-link="<?php echo $back_url; ?>">
            <span class="navbar-toggler-icon"><i class="fas fa-arrow-left"></i></span>
          </button>
        <?php endif; ?>
        <?php
              if ( is_sports_page() ) {
                if (is_archive()) {
                  $term = get_queried_object();
                  $header_text = single_cat_title('',false);
                }
                if(empty($header_text) || $header_text == 'Archives' ){
                  $header_text = get_the_title();
                }
                wp_nav_menu( array(
                  'menu'              =>  get_field('sports_top_navigation_menu','option'),
                  'depth'				=> 2,
                  'container'			=> 'div',
                  'container_class'	=> 'navbar-collapse offcanvas-collapse',
                  'container_id'		=> 'mainnav',
                  'menu_class'        => 'navbar-nav mr-auto',
                  'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                  'walker'			=> new WP_Bootstrap_Navwalker()
                ));
                if (is_page_template('page-templates/sports-homepage.php')){
                  $header_text = get_field('header_title');
                }
              }
              elseif ( is_adult_ed_page() ) {
                if (is_archive()) {
                  $term = get_queried_object();
                  $header_text = single_cat_title('',false);
                }
                if(empty($header_text) || $header_text == 'Archives' ){
                  $header_text = get_the_title();
                }
                if (is_page_template('page-templates/adult-learning-homepage.php')){
                  $header_text = get_field('header_title');
                }
                wp_nav_menu( array(
                  'menu'              =>  get_field('top_navigation_menu','option'),
                  'depth'				=> 2,
                  'container'			=> 'div',
                  'container_class'	=> 'navbar-collapse offcanvas-collapse',
                  'container_id'		=> 'mainnav',
                  'menu_class'        => 'navbar-nav mr-auto',
                  'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                  'walker'			=> new WP_Bootstrap_Navwalker()
                ));
              } else {
                if (is_home()){
                  $header_text = 'News and Events';
                } else {
                  if (is_category('newsletter')) {
                    $header_text = 'Newsletter';
                  }
                  if (is_category('the-fountain')) {
                    $header_text = 'The Fountain';
                  }
                  if (is_category()) {
                    $term = get_queried_object();
                    $header_text = single_cat_title('',false);
                  }  
                  else {
                    $header_text = get_the_title();
                  }
                }
                wp_nav_menu( array(
                  'theme_location'    => 'main-navigation',
                  'depth'				=> 2,
                  'container'			=> 'div',
                  'container_class'	=> 'navbar-collapse offcanvas-collapse',
                  'container_id'		=> 'mainnav',
                  'menu_class'        => 'navbar-nav mr-auto',
                  'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                  'walker'			=> new WP_Bootstrap_Navwalker()
                ));
              }

              
        ?>
    </div>

    <?php if (get_field('Nav_Hover_Option','option') ) : ?>
      <div id="currenthover" class="currenthover"></div>
    <?php endif ; ?>


</div>


<!-- Front Page header -->
  <?php if (is_front_page()) : echo get_field('academy_news_emails', 'option'); ?>
  <div class="front-page-header">

    <div class="container">
      <div class="left">
        <div class="siteicon" style="background-image:url(<?php echo get_field('header_watermark'); ?> )">
          <div class="content_left">
              <div class="social">
                  <?php if( have_rows('platforms','option') ):  while( have_rows('platforms','option') ) : the_row(); ?>
                        <a href="<?php echo get_sub_field('platform_url'); ?>" target="_blank">
                            <?php if(get_sub_field('platform') == 'twitter') {
                                $platform = 'x-twitter';
                            } else {
                                $platform = get_sub_field('platform');
                            } 
                            ?>

                          <i class="fab fa-<?php echo $platform; ?><?php if(get_sub_field('platform')=='facebook'){echo "-f";} ?> top-social-icon"></i>
                        </a>
                  <?php endwhile; endif; ?>
                </div><!-- social -->
                <div class="intro">
                  <?php echo get_field('header_text'); ?>
                </div><!-- intro -->
            </div><!-- content_left -->
          </div><!-- siteicon -->
      </div><!-- left -->
    </div><!-- container -->

  <?php
  $backgroundimgs = array();
  //issue with skipping first image so we need to loop through them twice
  if( have_rows('header_image') ): 
    while( have_rows('header_image') ) : the_row();
        //array_push($backgroundimgs,get_sub_field('image'));
    endwhile;
  endif;
  if( have_rows('header_image') ): 
    while( have_rows('header_image') ) : the_row();
        array_push($backgroundimgs,get_sub_field('image'));
    endwhile;
  endif;
  ?>
  <div class="header-images-slick-slider">
    <?php foreach ($backgroundimgs as $backgroundimage ): ?>
      <div class="image-slider" style="background-image:url(<?php echo $backgroundimage; ?>)">
      <?php 
      $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );
    $response = file_get_contents(get_template_directory_uri().'/img/al-shape.svg', false, stream_context_create($arrContextOptions));echo $response; ?>
      </div>
    <?php endforeach ?>
  </div>

  </div><!-- front-page-header -->
  <div class="container homepage-tabs-nav">
      <div class="row ">
      <?php
        $i=0;
        if( have_rows('tab_content') ):
          while( have_rows('tab_content') ) : the_row(); $i++;
      ?>
          <div class="tab_button btn ml-3 col <?php if ($i==1){echo 'active';} ?>"><?php echo get_sub_field('tab_name'); ?></div>
      <?php
          endwhile;
        endif;
        ?>
        <div id="slider_nav" class="col"></div>
      </div>
    </div><!-- homepage-tabs-nav-->
  <?php else : //Internal header?>

<section class="page-content">
    <div class="featured-top-image  <?php echo get_field('header_title_location','option'); ?>" style="background-image: url( <?php echo $featuredimg; ?> )">
      <div class="container">
        <div class="row main-heading">
        <h1><?php
        if (is_search()) :
        printf( esc_html__( 'Search Results for: %s', 'anglian-learning' ), '<span>' . get_search_query() . '</span>' );
        else :
          echo $header_text;
        endif; ?></h1>
        </div>
      </div>
    </div>

  <?php endif;  

// Check if the page is password protected
if ( post_password_required() ) {
    // Display the password form
    echo '<div class="container p-5">'.get_the_password_form().'</div>';
    get_footer( );
    die;
} 
?>

