<?php 

acf_add_local_field_group(array(
    'key' => 'icon_grid',
    'title' => 'Icon Grid',
    'hide_on_screen' => array('slug','format'),
    'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/icon-grid.php',
			),
		),
	),
    'fields' => array(
        array(
            'key' => 'icons_display_menu',
            'label' => 'Display Menu?',
            'name' => 'icons_display_menu',
            'type' => 'true_false',
            'ui' => 1,
        ),
        array(
            'key' => 'field_60ae136406982',
            'label' => 'Menu Select',
            'name' => 'menu_select',
            'type' => 'select',
            'choices' => array(
                'About Us' => 'About Us',
                'Adult Learning' => 'Adult Learning',
                'Adult Learning (Top Buttons)' => 'Adult Learning (Top Buttons)',
                'Adult Learning Main Nav' => 'Adult Learning Main Nav',
                'Alumni' => 'Alumni',
                'Careers Education, Information, Advice and Guidance' => 'Careers Education, Information, Advice and Guidance',
                'Clubs and Activities' => 'Clubs and Activities',
                'Community' => 'Community',
                'Curriculum' => 'Curriculum',
                'Curriculum Rationale' => 'Curriculum Rationale',
                'Ethos and Values' => 'Ethos and Values',
                'Homework' => 'Homework',
                'Houses' => 'Houses',
                'Information' => 'Information',
                'Join Us' => 'Join Us',
                'Letters Home' => 'Letters Home',
                'Main Menu' => 'Main Menu',
                'Parents' => 'Parents',
                'Picture Gallery' => 'Picture Gallery',
                'Pupils' => 'Pupils',
                'Staff' => 'Staff',
                'Subjects' => 'Subjects',
                'Top Buttons (Top Buttons)' => 'Top Buttons (Top Buttons)',
                'Transition (Year 6 - 7)' => 'Transition (Year 6 - 7)',
                'Trips' => 'Trips',
                '' => '',
            ),
        ),
        array(
            'key' => 'icons_display_title',
            'label' => 'Title',
            'name' => 'icons_display_title',
            'type' => 'text',
        ),
        array(
            'key' => 'icons_display_intro',
            'label' => 'Intro Text',
            'name' => 'icons_display_intro',
            'type' => 'wysiwyg',
        ),
        array(
            'key' => 'icons_grid',
            'label' => 'Icons',
            'name' => 'icons_grid',
            'type' => 'repeater',
            'button_label' => 'Add Icon',
            'sub_fields' => array(
                array(
                    'key' => 'icon_grid_title',
                    'label' => 'Title',
                    'name' => 'icon_grid_title',
                    'type' => 'text',
                    'wrapper' => array('width' => '40'),

                ),
                array(
                    'key' => 'icon_grid_sub_title',
                    'label' => 'Sub-title',
                    'name' => 'icon_grid_sub_title',
                    'type' => 'text',
                    'wrapper' => array('width' => '40'),

                ),
                array(
                    'key' => 'icon_grid_icon',
                    'label' => 'Icon',
                    'name' => 'icon_grid_icon',
                    'type' => 'image',
                    'wrapper' => array('width' => '20'),
                ),
            ),
        ),


        
        
    ),


));
    

