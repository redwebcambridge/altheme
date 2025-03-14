<?php
if (get_field('menu_select')) :
    wp_nav_menu(array(
        'menu' => get_field('menu_select'),
        'menu_id' => 'sidebar-menu',
        'container' => 'nav', // Ensures correct semantic structure
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', // Enforces proper <ul> wrapping
    ));
    echo '<div class="sidebarclose"><i class="fas fa-chevron-circle-up"></i></div>';
endif;
?>
