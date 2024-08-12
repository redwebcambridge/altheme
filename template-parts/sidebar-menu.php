<?php
if(get_field('menu_select')) : 
    wp_nav_menu( array('menu'=>get_field('menu_select'), 'menu_id' => 'sidebar-menu') );
    echo '<div class="sidebarclose"><i class="fas fa-chevron-circle-up"></i></div>';
endif;
?>
