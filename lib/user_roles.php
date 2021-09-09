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
      'unfiltered_html' => false,
      'upload_files' => true,
      'list_users' => true,
      'create_users' => true,
      'add_users' => true,
      'delete_users' => true,
      'edit_users' => true,
      'promote_users' => true,
      'edit_vacancy' => true,
      'edit_theme_options' => true,
    )
);
//Vacancy Manager
//remove_role('vacancy_manager');
add_role(
  'vacancy_manager',
  __( 'Vacancy Manager', 'anglianlearning' ),
  array(
    'read' => true,
    'edit_vacancy' => true
  )
);


//Remove Admin Sections depending on user role
add_action( 'admin_enqueue_scripts', 'custom_prevent_admin_access' );
function custom_prevent_admin_access() {
  if ( !current_user_can( 'unfiltered_html' ) ) {
    remove_menu_page('tools.php');  
  }
  if ( !current_user_can( 'edit_posts' ) ) {
    remove_menu_page('edit.php');  
  }
}