<?php 
// all news
acf_add_local_field_group(array(
	'key' => 'group_60f6d79326a5a',
	'title' => 'News',
	'fields' => array(
		array(
			'key' => 'field_60f6d7ab4273a',
			'label' => 'Thumbnail',
			'name' => 'thumbnail',
			'type' => 'image',
			
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => false,
));

//single newsletter
acf_add_local_field_group(array(
	'key' => 'group_60f17ca439421',
	'title' => 'Newsletter',
	'fields' => array(
		array(
			'key' => 'field_60f17ca7826de',
			'label' => 'PDF Upload',
			'name' => 'pdf_upload',
			'type' => 'file',
			'instructions' => 'The uploaded newsletter will display on the relevant Newsletter category which you must select on the ‘Categories’ panel. If you wish to add a download to your news article instead, please upload this via the ‘Downloads’ box below',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		// array(
		// 	array(
		// 		'param' => 'post_category',
		// 		'operator' => '==',
		// 		'value' => 'category:the-fountain',
		// 	),
		// ),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'discussion',
		4 => 'comments',
		5 => 'revisions',
		6 => 'slug',
		7 => 'author',
		8 => 'format',
		9 => 'page_attributes',
		10 => 'featured_image',
		11 => 'tags',
		12 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
	'show_in_rest' => false,
));


acf_add_local_field_group(array(
	'key' => 'group_60ed5eba89249',
	'title' => 'News Categories',
	'fields' => array(
		array(
			'key' => 'field_60ed5ec0fc3a1',
			'label' => 'Header Image',
			'name' => 'header_image',
			'type' => 'image',
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
		),
		array(
			'key' => 'field_6141d7a2cf5df',
			'label' => 'Category Type',
			'name' => 'category_type',
			'type' => 'select',
			'choices' => array(
				'school' => 'School',
				'adultlearning' => 'Adult Learning',
				'sportscentre' => 'Sports Centre',
			),
			'default_value' => 'school',
			'return_format' => 'value',
		),
		array(
			'key' => 'category_display',
			'label' => 'Category Display',
			'name' => 'category_display',
			'type' => 'select',
			'choices' => array(
				'default' => 'Default',
				'newsletter_display' => 'Newsletter Display',
			),
			'default_value' => 'default',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'category',
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


acf_add_local_field_group(array(
	'key' => 'group_641c24f6b037e',
	'title' => 'News sub header',
	'fields' => array(
		array(
			'key' => 'subheaderarticle',
			'label' => 'Article sub header',
			'name' => 'subheaderarticle',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
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
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));
