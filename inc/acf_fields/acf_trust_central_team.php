<?php 

acf_add_local_field_group(array(
    'key' => 'central_team',
    'title' => 'Central Team Page',
    'hide_on_screen' => array('the_content','slug','format','featured_image'),
    'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/central-team.php',
			),
		),
	),
    'fields' => array(
        array(
            'key' => 'organogram',
            'label' => 'Organogram Image',
            'name' => 'organogram',
            'type' => 'image',
        ),
        array(
            'key' => 'EXECUTIVE_TEAM',
            'label' => 'CENTERAL LEADERSHIP TEAM',
            'name' => 'EXECUTIVE_TEAM',
            'type' => 'tab',
        ),
        array(
            'key' => 'ct_row_1',
            'label' => 'Row 1',
            'name' => 'ct_row_1',
            'type' => 'group',
            'wrapper' => array('width' => '50'),
            'sub_fields' => array(
                array(
                    'key' => 'row_1_members',
                    'label' => 'Row 1 Members',
                    'name' => 'row_1_members',
                    'type' => 'repeater',
                    'button_label' => 'Add Member',
                    'sub_fields' => array(
                        array(
                            'key' => 'memeber_images',
                            'label' => 'Image',
                            'name' => 'memeber_images',
                            'type' => 'image',
                        ),
                        array(
                            'key' => 'members_name',
                            'label' => 'Name',
                            'name' => 'members_name',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'ct_row_2',
            'label' => 'Row 2',
            'name' => 'ct_row_2',
            'type' => 'group',
            'wrapper' => array('width' => '50'),
            'sub_fields' => array(
                array(
                    'key' => 'row_2_members',
                    'label' => 'Row 2 Members',
                    'name' => 'row_2_members',
                    'type' => 'repeater',
                    'button_label' => 'Add Member',
                    'sub_fields' => array(
                        array(
                            'key' => 'memeber_images',
                            'label' => 'Image',
                            'name' => 'memeber_images',
                            'type' => 'image',
                        ),
                        array(
                            'key' => 'members_name',
                            'label' => 'Name',
                            'name' => 'members_name',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'ct_row_3',
            'label' => 'Row 3',
            'name' => 'ct_row_3',
            'type' => 'group',
            'wrapper' => array('width' => '50'),
            'sub_fields' => array(
                array(
                    'key' => 'row_3_members',
                    'label' => 'Row 3 Members',
                    'name' => 'row_3_members',
                    'type' => 'repeater',
                    'button_label' => 'Add Member',
                    'sub_fields' => array(
                        array(
                            'key' => 'memeber_images',
                            'label' => 'Image',
                            'name' => 'memeber_images',
                            'type' => 'image',
                        ),
                        array(
                            'key' => 'members_name',
                            'label' => 'Name',
                            'name' => 'members_name',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'ct_row_4',
            'label' => 'Row 4',
            'name' => 'ct_row_4',
            'type' => 'group',
            'wrapper' => array('width' => '50'),
            'sub_fields' => array(
                array(
                    'key' => 'row_4_members',
                    'label' => 'Row 4 Members',
                    'name' => 'row_4_members',
                    'type' => 'repeater',
                    'button_label' => 'Add Member',
                    'sub_fields' => array(
                        array(
                            'key' => 'memeber_images',
                            'label' => 'Image',
                            'name' => 'memeber_images',
                            'type' => 'image',
                        ),
                        array(
                            'key' => 'members_name',
                            'label' => 'Name',
                            'name' => 'members_name',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'DEPARTMENTS',
            'label' => 'DEPARTMENTS',
            'name' => 'DEPARTMENTS',
            'type' => 'tab',
        ),
        array(
            'key' => 'team_departments',
            'label' => 'Departments',
            'name' => 'team_departments',
            'type' => 'repeater',
            'button_label' => 'Add Department',
            'sub_fields' => array(
                array(
                    'key' => 'departments_name',
                    'label' => 'Department name',
                    'name' => 'departments_name',
                    'type' => 'text',
                    'wrapper' => array('width' => '25'),
                ),
                array(
                    'key' => 'department_repeater',
                    'label' => 'Department members',
                    'name' => 'department_repeater',
                    'type' => 'repeater',
                    'button_label' => 'Add Member',
                    'wrapper' => array('width' => '75'),

                    'sub_fields' => array(
                        array(
                            'key' => 'name',
                            'label' => 'Name',
                            'name' => 'name',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'role',
                            'label' => 'Role',
                            'name' => 'role',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        ),
    ),


));
    


acf_add_local_field_group(array(
	'key' => 'central_team_sidemenu',
	'title' => 'Sidebar Menu',
	'fields' => array(
		array(
			'key' => 'ct_menu_select',
			'label' => 'Menu Select',
			'name' => 'ct_menu_select',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
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
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/central-team.php',
			),
		),
		
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
	),
	'active' => true,
	'description' => '',
	'show_in_rest' => false,
));