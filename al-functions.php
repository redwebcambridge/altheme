<?php
//AL JS
function trust_scripts() {
    wp_enqueue_script( 'trust-script', get_stylesheet_directory_uri().'/js/trust_scripts.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'trust_scripts' );

// ACF Fields
if( function_exists('acf_add_local_field_group') ): 
    get_template_part('inc/acf_fields/acf_trust');
endif;


//Academies Post Type
// // Add theme support for post thumbnails if not already added
// if (function_exists('add_theme_support')) {
//     add_theme_support('post-thumbnails');
// }

// Academies Post Type
function register_academies_post_type() {
    $args = array(
        'label' => 'Academies',
        'public' => true,
        'taxonomies' => array(
            'school_age',
            'local_authority',
        ),
        'menu_icon' => 'dashicons-admin-multisite',
        'rewrite' => array(
            'slug' => 'academy', // Custom slug for single posts
            'with_front' => false // Optional: this removes the front base if you have one
        ),
        'supports' => array(
            'thumbnail', 'title',
        ),

    );

    register_post_type('academies', $args);
}
add_action('init', 'register_academies_post_type');

// Register taxonomy for school age
function register_school_age_taxonomy() {
    $args = array(
        'label' => 'School Age',
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'taxonomies' => array('academies'),
    );

    register_taxonomy('school_age', 'academies', $args);
}

// Register taxonomy for local authority
function register_local_authority_taxonomy() {
    $args = array(
        'label' => 'Local Authority',
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'taxonomies' => array('academies'),
    );

    register_taxonomy('local_authority', 'academies', $args);
}

add_action('init', 'register_school_age_taxonomy');
add_action('init', 'register_local_authority_taxonomy');

//Google Maps API Key for admin
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyB8JsaC4td2W_wo5MKPwoqJLk8cSZTTkjM';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/a6cf3f2e48.js' );
