<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php if ( is_adult_ed_page() ) { echo 'id="adult_ed"'; } ?>>

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
    <div class="row align-items-center">
      <!-- logo -->
      <div class="col-6 col-md-3 pt-2 ">
            <?php if ( is_adult_ed_page() ) {  ?>
                <?php $adultlogos = get_field('adultlearning_logo_and_icons','option'); ?>
                <a href="<?php echo the_permalink(get_field('adult_learning_homepage','option')); ?>">
                  <img class="img-fluid py-2 pr-5" src="<?php echo $adultlogos['adult_logo']['url']; ?>" alt="<?php echo $adultlogos['adult_logo']['alt']; ?>">
                </a>
            <?php } else { ?>
                <?php $logos = get_field('logo_and_icons','option');?>
                <a href="/">
                  <img class="img-fluid py-2 pr-5" src="<?php echo $logos['logo']['url']; ?>" alt="<?php echo $logos['logo']['alt']; ?>">
                </a>
            <?php } ?>
        </div>
        <!-- grey buttons -->
        <div class="hidden-sm-down col-md-7 pt-4 searchtopbuttonholder">
              <div class="row justify-content-end google_search">
                <div class="col-4 px-0"><div id="google_translate_el"></div></div>
                <div class="col-4 pl-0"><?php get_search_form(); ?></div>
              </div>
              <div class="row" id="top_buttons">
              <?php
              if ( is_adult_ed_page() ) { 
                wp_nav_menu( array(
                  'menu'              =>  get_field('grey_tabs_menu','option'),
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker(),
                  'menu_class'        => 'd-md-flex justify-content-end',
                  'container_class'   => 'col-12',
                ));
              } else {
                wp_nav_menu( array(
                  'theme_location'    => 'top-buttons',
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker(),
                  'menu_class'        => 'd-md-flex justify-content-end',
                  'container_class'   => 'col-12',
                ));
              }
              ?>
              </div>
        </div>
        <!-- Anglian learning logo -->
        <div class="col-6 col-md-2 al-logo">
          <a href="https://anglianlearning.org/" title="Anglian Learning ">
            <img class="image-right img-fluid pt-2" src="https://anglianlearning.org/wp-content/themes/anglian-learning/images/logo.png" alt="Anglian Learning" />
          </a>
        </div>
      </div><!-- row -->

  </div> <!-- container -->
</header><!-- #masthead -->

<div class="navbar navbar-expand-md navbar-light bg-light sticky-nav" id="stickynav">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
              if ( is_adult_ed_page() ) { 
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
    <div id="currenthover" class="currenthover"></div>
</div>


<!-- Front Page header -->
  <?php if (is_front_page()) : ?>
  <div class="front-page-header">

    <div class="container">
      <div class="left">
        <div class="siteicon" style="background-image:url(<?php the_field('header_watermark'); ?> )">
          <div class="content_left">
              <div class="social">
                  <?php if( have_rows('platforms','option') ):  while( have_rows('platforms','option') ) : the_row(); ?>
                        <a href="<?php echo get_sub_field('profile_url'); ?>">
                          <i class="fab fa-<?php echo get_sub_field('platform'); ?><?php if(get_sub_field('platform')=='facebook'){echo "-f";} ?> top-social-icon"></i>
                        </a>
                  <?php endwhile; endif; ?>
                </div><!-- social -->
                <div class="intro">
                  <?php the_field('header_text'); ?>
                </div><!-- intro -->
            </div><!-- content_left -->
          </div><!-- siteicon -->
      </div><!-- left -->
    </div><!-- container -->

    <?php
  $backgroundimgs = array();
  if( have_rows('header_image') ):
    while( have_rows('header_image') ) : the_row();
          array_push($backgroundimgs,get_sub_field('image'));
    endwhile;
  endif;
  ?>
  <div class="header-images-slick-slider">
    <?php foreach ($backgroundimgs as $backgroundimage ): ?>
      <div class="image-slider" style="background-image:url(<?php echo $backgroundimage; ?>)">
      <?php echo file_get_contents(get_template_directory_uri().'/img/al-shape.svg'); ?>
      </div>
    <?php endforeach ?>
  </div>

  </div><!-- front-page-header -->
  <div class="container homepage-tabs-nav">
      <div class="row">
      <?php
        $i=0;
        if( have_rows('tab_content') ):
          while( have_rows('tab_content') ) : the_row(); $i++;
      ?>
          <div class="tab_button btn ml-3 col <?php if ($i==1){echo 'active';} ?>"><?php the_sub_field('tab_name'); ?></div>
      <?php
          endwhile;
        endif;
        ?>
      </div>
    </div><!-- homepage-tabs-nav-->
  <?php else : //Internal header?>

<section class="page-content">
    <?php $featuredimg = get_the_post_thumbnail_url(); if (empty($featuredimg)){$featuredimg = get_field('logo_and_icons','option')['default_header_image']; } ?>
    <div class="featured-top-image" style="background-image: url( <?php echo $featuredimg; ?> )">
      <div class="container">
        <div class="row main-heading">
        <h1><?php 
        if (is_search()) :
        printf( esc_html__( 'Search Results for: %s', 'anglian-learning' ), '<span>' . get_search_query() . '</span>' );
        else :
          the_title();
        endif; ?></h1>
        </div>
      </div>
    </div>

  <?php endif; ?>