<?php
if(get_field('menu_select')) :
    wp_nav_menu( array('menu'=>get_field('menu_select'), 'menu_id' => 'sidebar-menu') );
else : 				
    echo '<div class="alert alert-secondary" role="alert"><em>You have selected a template which requires a menu. Please <a href="'.get_edit_post_link().'">edit this page</a> and select a menu</em></div>'; 
endif;
?>