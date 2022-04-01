<?php
//Remove old roles
add_action('admin_menu', 'remove_built_in_roles');
function remove_built_in_roles() {
global $wp_roles;
$roles_to_remove = array('author', 'editor', 'contributor', 'subscriber' );
	foreach ($roles_to_remove as $role) {
		if (isset($wp_roles->roles[$role])) {
			$wp_roles->remove_role($role);
		}
	}
}
//Super Admin
function add_new_admin_caps() {
  $role = get_role( 'administrator' );
  $role->add_cap( 'edit_vacancy' ); 
  $role->add_cap( 'edit_sport' ); 
  $role->add_cap( 'edit_sports' ); 
  $role->add_cap( 'edit_other_sports' ); 
  $role->add_cap( 'read_sports' ); 
  $role->add_cap( 'read_private_sports' ); 
  $role->add_cap( 'publish_sports' ); 
  $role->add_cap( 'delete_sports' ); 
  $role->add_cap( 'edit_adult_ed' ); 
  $role->add_cap( 'edit_adult_eds' ); 
  $role->add_cap( 'edit_other_adult_ed' ); 
  $role->add_cap( 'publish_adult_ed' ); 
  $role->add_cap( 'read_adult_ed' ); 
  $role->add_cap( 'read_private_adult_ed' ); 
  $role->add_cap( 'delete_adult_ed' ); 
}
add_action( 'admin_init', 'add_new_admin_caps');

//Webmaster
remove_role('webmaster');
add_role(
    'webmaster',
    __( 'Webmaster', 'anglianlearning' ),
    array(
      'delete_others_pages' => true,
      'delete_others_posts' => true,
      'delete_pages' => true,
      'delete_posts' => true,
      'delete_private_pages' => true,
      'delete_private_posts' => true,
      'delete_published_pages' => true,
      'delete_published_posts' => true,
      'delete Reusable Blocks' => true,
      'edit_others_pages' => true,
      'edit_others_posts' => true,
      'edit_pages' => true,
      'edit_posts' => true,
      'edit_private_pages' => true,
      'edit_private_posts' => true,
      'edit_published_pages' => true,
      'edit_published_posts' => true,
      'create Reusable Blocks' => true,
      'edit Reusable Blocks' => true,
      'manage_categories' => true,
      'manage_links' => true,
      'moderate_comments' => true,
      'publish_pages' => true,
      'publish_posts' => true,
      'read' => true,
      'read_private_pages' => true,
      'read_private_posts' => true,
      'unfiltered_html' => true,
      'upload_files' => true,
      'list_users' => true,
      'create_users' => true,
      'add_users' => true,
      'delete_users' => true,
      'edit_users' => true,
      'promote_users' => true,
      'edit_vacancy' => true,
      'edit_theme_options' => true,
      'update_themes' => false,
      'edit_sport' => true,
      'edit_sports' => true,
      'edit_other_sports' => true,
      'read_sports' => true,
      'read_private_sports' => true,
      'delete_sports' => true,
      'publish_sports' => true,
      'edit_adult_ed' => true,
      'edit_adult_eds' => true,
      'edit_other_adult_ed' => true,
      'publish_adult_ed' => true,
      'read_adult_ed' => true,
      'read_private_adult_ed' => true,
      'delete_adult_ed' => true,
      'manage_custom_facebook_feed_options' => true
    )
);

//Vacancy Manager
remove_role('adult_learning');
//remove_role('vacancy_manager');
add_role(
  'vacancy_manager',
  __( 'Vacancy Manager', 'anglianlearning' ),
  array(
    'read' => true,
    'edit_vacancy' => true
  )
);

//Sports User Role
remove_role('sports_manager');
add_role(
  'sports_manager',
  __( 'Sports Centre Manager', 'anglianlearning' ),
  array(
    'read' => true,
    'edit_vacancy' => true,
    'edit_sport' => true,
    'edit_sports' => true,
    'edit_other_sports' => true,
    'read_sports' => true,
    'read_private_sports' => true,
    'delete_sports' => true,
    'publish_sports' => true,
    'delete_others_pages' => true,
    'delete_others_posts' => true,
    'delete_pages' => true,
    'delete_posts' => true,
    'delete_private_pages' => true,
    'delete_private_posts' => true,
    'delete_published_pages' => true,
    'delete_published_posts' => true,
    'delete Reusable Blocks' => true,
    'edit_others_pages' => true,
    'edit_others_posts' => true,
    'edit_pages' => true,
    'edit_posts' => true,
    'edit_private_pages' => true,
    'edit_private_posts' => true,
    'edit_published_pages' => true,
    'edit_published_posts' => true,
    'create Reusable Blocks' => true,
    'edit Reusable Blocks' => true,
    'manage_categories' => true,
    'manage_links' => true,
    'publish_pages' => true,
    'publish_posts' => true,
    'unfiltered_html' => true,
    'upload_files' => true,
    'edit_theme_options' => true,
    'manage_custom_facebook_feed_options' => true
  )
);

//Adult Ed User Role
remove_role('adult_ed_manager');
add_role(
  'adult_ed_manager',
  __( 'Adult Learning Manager', 'anglianlearning' ),
  array(
    'read' => true,
    'edit_vacancy' => true,
    'edit_adult_ed' => true,
    'edit_adult_eds' => true,
    'edit_other_adult_ed' => true,
    'publish_adult_ed' => true,
    'read_adult_ed' => true,
    'read_private_adult_ed' => true,
    'delete_adult_ed' => true,
    'delete_others_pages' => true,
    'delete_others_posts' => true,
    'delete_pages' => true,
    'delete_posts' => true,
    'delete_private_pages' => true,
    'delete_private_posts' => true,
    'delete_published_pages' => true,
    'delete_published_posts' => true,
    'delete Reusable Blocks' => true,
    'edit_others_pages' => true,
    'edit_others_posts' => true,
    'edit_pages' => true,
    'edit_posts' => true,
    'edit_private_pages' => true,
    'edit_private_posts' => true,
    'edit_published_pages' => true,
    'edit_published_posts' => true,
    'create Reusable Blocks' => true,
    'edit Reusable Blocks' => true,
    'manage_categories' => true,
    'manage_links' => true,
    'publish_pages' => true,
    'publish_posts' => true,
    'unfiltered_html' => true,
    'upload_files' => true,
    'edit_theme_options' => true,
    'manage_custom_facebook_feed_options' => true
  )
);

//Remove Admin Sections depending on user role
add_action( 'admin_enqueue_scripts', 'custom_prevent_admin_access' );
function custom_prevent_admin_access() {
  if ( !current_user_can( 'update_themes' ) ) {
    remove_menu_page('tools.php');
  }
  if ( !current_user_can( 'edit_posts' ) ) {
    remove_menu_page('edit.php');  
  }
}

//Remove administrator role as an options for all but main admin
function wdm_user_role_dropdown($all_roles) {
  global $pagenow;
  if( $pagenow == 'user-new.php' && !current_user_can('administrator') ) {
    echo 'Function run';
      // if current user is editor AND current page is edit user page
      unset($all_roles['administrator']);
      unset($all_roles['editor']);
  }
  return $all_roles;
}
add_filter('editable_roles','wdm_user_role_dropdown');

//Smash balloon role
function sb_custom_capability( $cap ) {
  return 'edit_vacancy';
}
add_filter( 'sbi_settings_pages_capability', 'sb_custom_capability', 10, 1 );
//add_filter( 'sbf_settings_pages_capability', 'sb_custom_capability', 10, 1 );