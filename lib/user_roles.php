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
//Webmaster
//remove_role('webmaster');
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
      'edit_vacancy' => true,
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

//Adult Learning Manager
remove_role('adult_learning');
add_role(
  'adult_learning',
  __( 'Adult Learning Manager', 'anglianlearning' ),
  array(
    'read' => true,
    'adult_learning' => true
  )
);
function psp_add_project_management_role() {
  add_role('psp_project_manager',
             'Project Manager',
             array(
                 'read' => true,
                 'edit_posts' => false,
                 'delete_posts' => false,
                 'publish_posts' => false,
                 'upload_files' => true,
             )
         );
    }
    register_activation_hook( __FILE__, 'psp_add_project_management_role' );



add_action('admin_init','anglianlearning_role_caps',999);
function anglianlearning_role_caps() {
  // Add the roles you'd like to administer the custom post types
  $roles = array('adult_learning');
  // Loop through each role and assign capabilities
  foreach($roles as $the_role) { 
      $role = get_role($the_role);
      $role->add_cap( 'read' );
      $role->add_cap( 'read_adult_learning');
      $role->add_cap( 'read_private_adult_learnings' );
      $role->add_cap( 'edit_adult_learning' );
      $role->add_cap( 'edit_adult_learnings' );
      $role->add_cap( 'edit_others_adult_learnings' );
      $role->add_cap( 'edit_published_adult_learnings' );
      $role->add_cap( 'publish_adult_learnings' );
      $role->add_cap( 'delete_others_adult_learnings' );
      $role->add_cap( 'delete_private_adult_learnings' );
      $role->add_cap( 'delete_published_adult_learnings' );
  }
}

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