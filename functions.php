<?php
/**
 * Anglian Learning functions and definitions
 */
if ( ! defined( '_S_VERSION' ) ) {
  // Replace the version number of the theme on each release.
  define( '_S_VERSION', '1.0.0' );
}
if ( ! function_exists( 'anglian_learning_setup' ) ) :

  function anglian_learning_setup() {
    add_theme_support( 'title-tag' );
    register_nav_menus(
      array(
            'top-buttons' => esc_html__( 'Top Buttons', 'anglian-learning' ),
            'main-navigation' => __( 'Main Navigation', 'anglian-learning' )
      )
    );
  }

endif;
add_action( 'after_setup_theme', 'anglian_learning_setup' );

//updater
require 'theme-updates/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
    'altheme',
    'https://anglianlearning.org/al-theme-version.json'
);

//School Settings
add_action('acf/init', 'school_settings');
function school_settings() {
    // Check function exists.
    if( function_exists('acf_add_options_page') ) {
        // Register options page.
        $option_page = acf_add_options_page(
      array(
        'page_title'    => __('School Settings'),
        'menu_title'    => __('School Settings'),
        'menu_slug'     => 'school-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position' => '1'
          )
    );
  }
};
add_theme_support( 'post-thumbnails' );

/**
 * Enqueue scripts and styles.
 */
function anglian_learning_scripts() {
  //Google Translate
  wp_enqueue_script( 'google-translate', 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit');
  //jQuery
  wp_enqueue_script( 'al-jquery', get_template_directory_uri().'/js/jquery.js');
  //Leaflet for maps
  wp_enqueue_script( 'leafletjs', get_template_directory_uri().'/js/leaflet.js');
  wp_enqueue_style( 'leafletcss', get_template_directory_uri().'/sass/styles/leaflet.css');
  //Calendar
  wp_enqueue_script( 'fullcalendar', get_template_directory_uri().'/js/calendar.min.js');
  //Styles
  wp_enqueue_style( 'anglian-learning-style', get_stylesheet_uri(), array(), _S_VERSION );
  //bootstrap
  wp_enqueue_script( 'popper', get_template_directory_uri().'/js/popper.min.js');
  wp_enqueue_script( 'al-bootstrap', get_template_directory_uri().'/js/bootstrap.js');
  //sliders
  wp_enqueue_script( 'al-slick', get_template_directory_uri().'/js/slick/slick.min.js');
   //Lightbox
   wp_enqueue_script( 'al-gallery-js', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js');
   wp_enqueue_style( 'al-gallery-style', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css');
  //Custom scripts
  wp_enqueue_script( 'al-scripts', get_template_directory_uri().'/js/scripts.js');
 
}
add_action( 'wp_enqueue_scripts', 'anglian_learning_scripts' );

// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

//Change posts admin label to news in admin meny
function al_change_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}
add_action( 'admin_menu', 'al_change_label' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
  require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Register Custom Mega Navigation Walker
 */
function register_mega_navwalker(){
  require_once get_template_directory() . '/lib/class-wp-bootstrap-mega-navwalker.php';
}
add_action( 'after_setup_theme', 'register_mega_navwalker' );




//Disable Gutenburg
add_filter('use_block_editor_for_post', '__return_false', 10);
//Disable comments
function disable_comments_status() {
  return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

//News Items
function register_news_post_type() {
  $labels = array(
    'name'                  => _x( 'News', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'News', 'Post Type Singular Name', 'text_domain' )
  );
  $args = array(
    'label'                 => __( 'News', 'text_domain' ),
    'labels'                => $labels,
    'taxonomies'            => array( 'category', 'post_tag' ),
    'capability_type'       => 'post',
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
  );
  register_post_type( 'news', $args );
}
add_action( 'init', 'register_news_post_type', 0 );

function twitterwp() {
  require_once( 'lib/TwitterWP.php' );
  $app = array(
    'consumer_key'        => '3i3FaOxBLWKbVFHBjHCRoM2wl',
    'consumer_secret'     => 'd8UAsFMHXgbS0qUyxWDfAUda8htAxoluJZeF4qZRWnqYlJs3TZ',
    'access_token'        => '1366708527566385153-6FgFgNAMeCYRP39lOZ7CldWDlz6QRB',
    'access_token_secret' => '5IlRYw6R2zXeK5l0T4eywgo1f2W4AgzhCFNyPGB3pmFZK',
    );
  // initiate your app
  $tw = TwitterWP::start( $app );

  if( have_rows('platforms','option') ):
    while( have_rows('platforms','option') ) : the_row();
      if(get_sub_field('platform')=='twitter'){$user = get_sub_field('username');} else {$user = 'AnglianLearning';}
    endwhile;
  endif;
  if ( ! $tw->user_exists( $user ) ) {
    return;
  }
  $tweets = $tw->get_tweets( $user, 5 );
  // Now let's check our app's rate limit status
  $rate_status = $tw->rate_limit_status();
  if ( is_wp_error( $rate_status ) ) {
    $tw->show_wp_error( $rate_status );
  }
  return $tweets;
}

//WILL HAVE TO HAVE A DEVELOPMENT OPTION SO THIS DOESNT RUN EACH TIME
//SASS CSS COMPILER
if ( isset($_GET['sass']) ):
  function sass_compile() {
    require_once get_template_directory() . '/lib/scssphp/scss.inc.php';
    require_once get_template_directory() . '/lib/sass-compile.php';
  }
endif;

//Set Favicon
function favicon() {
  if (class_exists('ACF')) {
  $logos = get_field('logo_and_icons','option');
  $fav_url = $logos['icon']['url'];
  echo '<link rel="shortcut icon" href="'.$fav_url.'" >';
  }
}
add_action('wp_head', 'favicon');

add_action( 'wp_ajax_calendar_xml', 'calendar_xml_init' );
add_action( 'wp_ajax_nopriv_calendar_xml', 'calendar_xml_init' );
function calendar_xml_init() {
    $xmlstr = file_get_contents(get_home_url().'/wp-content/themes/anglian-learning/calendar-xml.php');
    $xml = new SimpleXMLElement($xmlstr);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    wp_send_json_success($array);
    die();
}

if (get_field('activate_adult_learning','option')) {
    // Register Adult Learning Custom Post Type
    function register_adult_learning() {
      $labels = array(
        'name' => __( 'Adult Learning Courses' ),
        'singular_name' => __( 'Course' ),
        'add_new_item' => __( 'Add Course' ),
    );
      $args = array(
        'label' => __( 'Adult Learning', 'text_domain' ),
        'supports'  => array( 'title', 'editor', 'thumbnail' ),
        'show_ui' => true,
        'labels' => $labels
      );
      register_post_type( 'adultlearning', $args );
    }
    add_action( 'init', 'register_adult_learning', 0 );

    /* Create the Adult Learning Category Taxonomy --------------------------------------------*/
    function build_taxonomies_adult_learning(){
        $labels = array(
            'name' => __( 'Adult Learning Categories' ),
            'singular_name' => __( 'Adult Learning Category' ),
        );
        register_taxonomy(
            'adult-learning-category',
            array( __( 'adultlearning' )),
            array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'adult-learning/courses', 'hierarchical' => true)
            )
        );
    }
    add_action( 'init', 'build_taxonomies_adult_learning', 0 );
}

add_action('admin_menu', 'vacanciesmenu');
function vacanciesmenu() {
    add_menu_page( 'Vacancies Admin', 'Vacancies', 'manage_options', 'vacancyadmin', 'vacancies_admin','dashicons-format-aside',5);
    add_submenu_page( 'vacancyadmin', 'Vacancies Admin', 'Add New', 'manage_options', '?page=vacancyadmin&action=addvacancy');
}

function vacancies_admin() {
    require_once('vacancy-admin.php');
}

//Display Menu options in menu dropdown on relevant pages
function acf_load_color_field_choices( $field ) {
  $field['choices'] = array();
  $menus = get_terms('nav_menu');
  foreach($menus as $menu){
    $choices .= $menu->name . "\n";
  }
  $choices = explode("\n", $choices);
  $choices = array_map('trim', $choices);

  if( is_array($choices) ) {
      foreach( $choices as $choice ) {
          $field['choices'][ $choice ] = $choice;
      }
  }
  return $field;
}
add_filter('acf/load_field/name=menu_select', 'acf_load_color_field_choices');
add_filter('acf/load_field/name=grey_tabs_menu', 'acf_load_color_field_choices');
add_filter('acf/load_field/name=top_navigation_menu', 'acf_load_color_field_choices');

function is_adult_ed_page() {
  if (is_page_template('page-templates/adult-learning.php') || 'adultlearning' == get_post_type() || is_singular( 'adultlearning' ) ) :
    return true;
  endif;
}


if( !function_exists( 'tz_excerpt_length' ) ) {
    function tz_excerpt_length($length) {
        return 18;
    }
    add_filter('excerpt_length', 'tz_excerpt_length');
}

