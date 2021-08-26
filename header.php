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
    if (!isset($featuredimg) || empty($featuredimg)){
      $featuredimg = get_field('logo_and_icons','option')['default_header_image'];
    }
    if (is_category()){
      $category = get_queried_object();
      $header_text = $category->name;
      $featuredimg = get_field('header_image',$category);
      if(empty($featuredimg)){
        $featuredimg = get_field('logo_and_icons','option')['default_header_image'];
      }
    }
    ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <meta property="og:url" content="<?php echo the_permalink(); ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?php echo the_title(); ?>" />
  <meta property="og:description" content="<?php echo the_excerpt(); ?>" />
  <meta property="og:image" content="<?php echo $featuredimg; ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php if ( is_adult_ed_page() ) { echo 'id="adult_ed"'; } ?><?php if ( is_sports_page() ) { echo 'id="sports"'; } ?>>

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
    <div class="row align-items-center">
      <!-- logo -->
      <div class="col-6 col-md-3 pt-2 ">
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
        <div class="col-12 col-md-7 pt-4 searchtopbuttonholder">
              <div class="row justify-content-end google_search">
                <div class="col-4 px-0"><div id="google_translate_el"></div></div>
                <div class="col-4 pl-0"><?php get_search_form(); ?></div>
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
              } else {
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

                  $title = $item->title;
                  $link = $item->url;
                 // item does not have a parent so menu_item_parent equals 0 (false)
                  if ( !$item->menu_item_parent ):
                  $parent_id = $item->ID;
                  ?>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                    <a itemprop="url" href="<?php echo $link; ?>" class="nav-link"><span itemprop="name"><?php echo $title; ?></span></a>
                  <?php endif;

                  if ( $parent_id == $item->menu_item_parent ):
                    if ( !$submenu ): echo '<i class="fas fa-sort-down"></i>'; $submenu = true; ?>

                    <ul class="dropdown-menu">

                    <div class="double-sub">
                    <?php
                    if (get_field('include_left_column',$parent_id)) : ?>
                      <div class="submenu-left">
                        <?php
                          echo the_field('content',$parent_id);
                          if (get_field('show_button',$parent_id)){
                            echo '<a class="btn" href="'.get_field('button_url',$parent_id).'">'.get_field('button_text',$parent_id).'</a>';
                          }
                        ?>
                      </div>
                      <?php endif; ?>

                      <div class="submenu-right">
                      <?php endif; ?>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                            <a href="<?php echo $link; ?>" class="title"><span itemprop="name"><?php echo $title; ?></span></a>
                        </li>
                      <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                      </div>
                    </div>
                    </ul>
                    <?php $submenu = false; endif;
                  endif;

                  if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ):
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
          <a href="https://anglianlearning.org/" title="Anglian Learning ">
            <img class="image-right img-fluid pt-2" src="https://anglianlearning.org/wp-content/themes/anglian-learning/images/logo.png" alt="Anglian Learning" />
          </a>
        </div>
      </div><!-- row -->

  </div> <!-- container -->
</header><!-- #masthead -->

<div class="navbar navbar-expand-md navbar-light bg-light sticky-nav sticky-top" id="stickynav">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
              if ( is_sports_page() ) {
                $header_text = get_the_archive_title();
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
              }
              elseif ( is_adult_ed_page() ) {
                $header_text = get_the_archive_title();
                if(empty($header_text) || $header_text == 'Archives' ){
                  $header_text = get_the_title();
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
                  $header_text = get_the_title();
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
                        <a href="<?php echo get_sub_field('profile_url'); ?>" target="_blank">
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
      <div class="row ">
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
        <div id="slider_nav" class="col"></div>
      </div>
    </div><!-- homepage-tabs-nav-->
  <?php else : //Internal header?>

<section class="page-content">
    
    <div class="featured-top-image" style="background-image: url( <?php echo $featuredimg; ?> )">
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

  <?php endif; ?>