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
        'query_var' => true,
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
        'query_var' => true,
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

//ACCEPT POSTS FROM OTHERS
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/create_post', array(
        'methods' => 'POST',
        'callback' => 'create_remote_post',
        'permission_callback' => 'verify_request',
    ));
});

function verify_request(WP_REST_Request $request) {
    // Log the IPs to see what's coming in
    error_log('verifying request');

    // Get the correct IP address of the client
    $client_ip = $_SERVER['REMOTE_ADDR'];

    // If the server is behind a proxy, check 'X-Forwarded-For'
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $client_ip = trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]); // First IP in the list
    }

    error_log('Client IP: ' . $client_ip);

    // Allowed IP addresses from wp-config.php
    $allowed_ips = explode(',', IP_ADDRESSES); // Convert the string into an array

    // Check if the client's IP is in the list of allowed IPs
    if (!in_array($client_ip, $allowed_ips)) {
        error_log('not a valid IP address');
        return new WP_Error('invalid_ip', 'Your IP address is not allowed to access this endpoint.', array('status' => 403));
    }

    // If the IP is valid, continue processing the request
    return true;
}

function create_remote_post(WP_REST_Request $request) {

    // Log the incoming request for debugging
    $school_name = sanitize_text_field($request['school_name']);

    // Check if the subcategory exists on the main site
    $subcategory = get_term_by('name', $school_name, 'category');

    // If the subcategory doesn't exist, create it under the parent category (ID 22)
    if (!$subcategory) {
        $subcategory = wp_insert_term(
            $school_name,   // The term name (school name)
            'category',     // The taxonomy
            array(
                'parent' => 22, // ID of the parent category
            )
        );

        // Handle error if term creation fails
        if (is_wp_error($subcategory)) {
            error_log('Error creating subcategory: ' . $subcategory->get_error_message());
            return new WP_Error('error_creating_subcategory', 'There was an error creating the subcategory', array('status' => 500));
        }

        // Get the new term's ID from the result
        $subcategory_id = $subcategory['term_id'];
    } else {
        // If the subcategory exists, get its ID
        $subcategory_id = $subcategory->term_id;
    }

    // Extract post data from the request
    $post_data = array(
        'post_title'   => sanitize_text_field($request['title']),
        'post_content' => sanitize_textarea_field($request['content']),
        'post_status'  => 'draft', 
        'post_author'  => 9, 
        'post_category' => array(22, $subcategory_id), 
    );

    // Attempt to create the post
    $post_id = wp_insert_post($post_data);

    // Check for errors in post creation
    if (is_wp_error($post_id)) {
        error_log('Error creating post: ' . $post_id->get_error_message());
        return new WP_Error('error_creating_post', 'There was an error creating the post', array('status' => 500));
    }

    error_log('Post created successfully with ID: ' . $post_id);

    return new WP_REST_Response('Post created successfully', 200);
}