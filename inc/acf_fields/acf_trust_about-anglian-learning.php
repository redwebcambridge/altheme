<?php 

acf_add_local_field_group(array(
    'key' => 'about_al_page',
    'title' => 'AL Contact Details',
    'location' => array(
		array(
			array(
				'param' => 'page',
                'operator' => '==',
                'value' => '1385',
			),
		),
	),
    'fields' => array(
        array(
            'key' => 'al_address',
            'label' => 'AL Address',
            'name' => 'al_address',
            'type' => 'text',
        ),
        array(
            'key' => 'al_phone_number',
            'label' => 'AL Phone Number',
            'name' => 'al_phone_number',
            'type' => 'text',
        ),
        array(
            'key' => 'al_web_url',
            'label' => 'AL URL',
            'name' => 'al_web_url',
            'type' => 'text',
        ),

       
    ),


));
    


acf_add_local_field_group(array(
	'key' => 'central_team_sidemenu',
	'title' => 'Sidebar Menu',
	'fields' => array(
		array(
			'key' => 'menu_select',
			'label' => 'Menu Select',
			'name' => 'menu_select',
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