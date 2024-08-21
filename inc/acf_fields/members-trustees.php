<?php
acf_add_local_field_group(array(
	'key' => 'members_trustees',
	'title' => 'Members & Trustees',
	'fields' => array(
		array(
			'key' => 'mt_sub_heading',
			'label' => 'Sub heading',
			'name' => 'mt_sub_heading',
			'type' => 'text',
		),
		array(
			'key' => 'mt_intro_text',
			'label' => 'Intro text',
			'name' => 'mt_intro_text',
			'type' => 'wysiwyg',
		),
        array(
			'key' => 'mt_members_tab',
			'label' => 'Members',
			'name' => 'mt_members_tab',
			'type' => 'tab',
		),
        array(
			'key' => 'mt_members_title',
			'label' => 'Members Title',
			'name' => 'mt_members_title',
			'type' => 'text',
		),
		array(
			'key' => 'mt_members_staff',
			'label' => 'Members',
			'name' => 'mt_members_staff',
			'type' => 'repeater',
			'collapsed' => 'field_604f52c9480e9',
			'layout' => 'block',
			'button_label' => 'Add Staff Member',
			'sub_fields' => array(
				array(
					'key' => 'picture',
					'label' => 'Picture',
					'name' => 'picture',
					'type' => 'image',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'preview_size' => 'medium',
				),
				array(
					'key' => 'field_604f52c9480e9',
					'label' => 'Name',
					'name' => 'name',
					'type' => 'text',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f52e6480ea',
					'label' => 'Role',
					'name' => 'role',
					'type' => 'text',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f52ed480eb',
					'label' => 'Department',
					'name' => 'department',
					'type' => 'text',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f52f5480ec',
					'label' => 'Email',
					'name' => 'email',
					'type' => 'email',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f5308480ed',
					'label' => 'Form / Mentor Group',
					'name' => 'form__mentor_group',
					'type' => 'text',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f5319480ee',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'wysiwyg',
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
				),
			),
		),
        array(
			'key' => 'mt_trustees_tab',
			'label' => 'Trustees',
			'name' => 'mt_trustees_tab',
			'type' => 'tab',
		),
        array(
			'key' => 'mt_trustees_title',
			'label' => 'Trustees Title',
			'name' => 'mt_trustees_title',
			'type' => 'text',
		),
        array(
			'key' => 'mt_trustees_staff',
			'label' => 'Trustees',
			'name' => 'mt_trustees_staff',
			'type' => 'repeater',
			'collapsed' => 'field_604f52c9480e9',
			'layout' => 'block',
			'button_label' => 'Add Staff Member',
			'sub_fields' => array(
				array(
					'key' => 'picture',
					'label' => 'Picture',
					'name' => 'picture',
					'type' => 'image',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'preview_size' => 'medium',
				),
				array(
					'key' => 'field_604f52c9480e9',
					'label' => 'Name',
					'name' => 'name',
					'type' => 'text',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f52e6480ea',
					'label' => 'Role',
					'name' => 'role',
					'type' => 'text',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f52ed480eb',
					'label' => 'Department',
					'name' => 'department',
					'type' => 'text',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f52f5480ec',
					'label' => 'Email',
					'name' => 'email',
					'type' => 'email',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f5308480ed',
					'label' => 'Form / Mentor Group',
					'name' => 'form__mentor_group',
					'type' => 'text',
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'key' => 'field_604f5319480ee',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'wysiwyg',
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/members-trustees.php',
			),
		),
	),
	'hide_on_screen' => array(
		0 => 'the_content',
	),
));