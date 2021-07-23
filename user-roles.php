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
add_role(
    'webmaster',
    __( 'Webmaster', 'anglianlearning' ),
    array(
        'activate_plugins' => false,  // true allows this capability
        'update_core'   => false,
        'delete_posts' => true, // Use false to explicitly deny
    )
);