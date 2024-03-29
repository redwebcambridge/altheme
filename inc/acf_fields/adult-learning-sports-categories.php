<?php

acf_add_local_field_group(array(
    'key' => 'group_60c0e68bf1191',
    'title' => 'Adult Learning and Sports Categories',
    'fields' => array(
        array(
            'key' => 'field_60c0e69346d9e',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => 'adult-learning-category',
            ),
        ),
        array(
            array(
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => 'sports-centre-category',
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


acf_add_local_field_group(array(
    'key' => 'group_641c605328aa5',
    'title' => 'Page Content',
    'fields' => array(
        array(
            'key' => 'content_block_title',
            'label' => 'Title',
            'name' => 'content_block_title',
            'type' => 'text',
        ),
        array(
            'key' => 'content',
            'label' => 'Content',
            'name' => 'content',
            'type' => 'wysiwyg',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-templates/adult-learning-homepage.php',
            ),
        ),
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-templates/sports-homepage.php',
            ),
        ),
    ),
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
));



acf_add_local_field_group(array(
	'key' => 'group_646e14ee7857d',
	'title' => 'Social media feed',
	'fields' => array(
		array(
			'key' => 'field_646e14eed90e1',
			'label' => 'Platform',
			'name' => 'platform',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Instagram' => 'Instagram',
				'Facebook' => 'Facebook',
				'Twitter' => 'Twitter',
			),
			'default_value' => false,
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_646e157befa51',
			'label' => 'Facebook shortcode',
			'name' => 'facebook_feed_shortcode',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'This can be found within the Facebook feed plugin',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/sports-homepage.php',
			),
		),
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/adult-learning-homepage.php',
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
	'show_in_rest' => 0,
));