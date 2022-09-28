<?php


acf_add_local_field_group(array(
	'key' => 'group_60ae1fbce6d0d',
	'title' => 'Vacancies Page Options',
	'fields' => array(
		array(
			'key' => 'field_60ae1fd40241a',
			'label' => 'Show \'Log an Interest\' form',
			'name' => 'show_log_an_interest_form',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Show',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_60ae26d897b85',
			'label' => 'Form',
			'name' => 'form',
			'type' => 'relationship',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'wpcf7_contact_form',
			),
			'taxonomy' => '',
			'filters' => '',
			'elements' => '',
			'min' => 1,
			'max' => 1,
			'return_format' => 'id',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/vacancies.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => false,
));