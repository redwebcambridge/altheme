<?php 

acf_add_local_field_group(array(
	'key' => 'group_6047a7bb409a1',
	'title' => 'Homepage',
	'fields' => array(
		array(
			'key' => 'field_6058cb3bc5708',
			'label' => 'Header',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_6047ac97fdde0',
			'label' => 'Header Text',
			'name' => 'header_text',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 0,
			'delay' => 0,
		),
		array(
			'key' => 'field_6047a7c937fd8',
			'label' => 'Header Images',
			'name' => 'header_image',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_60588e1e5be33',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Image',
			'sub_fields' => array(
				array(
					'key' => 'field_60588e1e5be33',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'thumbnail',
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
		),
		array(
			'key' => 'field_6058a770cf883',
			'label' => 'Header Watermark',
			'name' => 'header_watermark',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '20',
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
		array(
			'key' => 'field_6058cb5271454',
			'label' => 'Tabs',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_6048feafa3ab9',
			'label' => 'Tabs',
			'name' => 'tab_content',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_6049ee8c5420c',
			'min' => 0,
			'max' => 4,
			'layout' => 'block',
			'button_label' => 'Add Tab',
			'sub_fields' => array(
				array(
					'key' => 'field_6049ee8c5420c',
					'label' => 'Tab Name',
					'name' => 'tab_name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6048fec0a3aba',
					'label' => 'image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
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
				array(
					'key' => 'field_604b84f3e17a5',
					'label' => 'Heading',
					'name' => 'heading',
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
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6048fecea3abb',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'wysiwyg',
					'instructions' => 'Please do not enter any more than 500 characters. Any characters after this will be removed when displayed on the homepage.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 0,
					'delay' => 0,
				),
				array(
					'key' => 'field_605a0e04d7f02',
					'label' => 'Button',
					'name' => 'button',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
			),
		),
		array(
			'key' => 'field_605b5051d0da7',
			'label' => 'Latest News',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_604a3a69b04c4',
			'label' => 'Title Left',
			'name' => 'title_left',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),

		// array(
		// 	'key' => 'field_605b5108161ff',
		// 	'label' => 'Display Twitter Feed',
		// 	'name' => 'display_twitter_feed',
		// 	'type' => 'true_false',
		// 	'instructions' => 'You must had entered your twitter account in the <a href="/wp-admin/admin.php?page=school-settings">School Settings</a>',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '50',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'message' => '',
		// 	'default_value' => 0,
		// 	'ui' => 0,
		// 	'ui_on_text' => '',
		// 	'ui_off_text' => '',
		// ),

		array(
			'key' => 'homepage_feed_option',
			'label' => 'Display Twitter or Facebook Feed',
			'name' => 'homepage_feed_option',
			'type' => 'select',
			'instructions' => 'Please select whether you would like to display a Facebook, Twitter or No feed. You must had entered your social media account in the <a href="/wp-admin/admin.php?page=school-settings">School Settings</a>',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'No_Feed' => 'No Feed',
				'Twitter' => 'Twitter',
				'Facebook' => 'Facebook',
			),
		),



		array(
			'key' => 'facebook_feed_shortcode_home',
			'label' => 'Facebook feed shortcode',
			'name' => 'facebook_feed_shortcode_home',
			'type' => 'text',
			'instructions' => 'Please enter the shortcode for the Facebook feed you would like to use e.g. [custom-facebook-feed feed=1]',

			'wrapper' => array('width' => '25'),
			'conditional_logic' => array(
				array(
					array(
						'field' => 'homepage_feed_option',
						'operator' => '==',
						'value' => 'Facebook',
					),
				),
			),
		),







		array(
			'key' => 'field_605b50f1161fe',
			'label' => 'Video Section',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_604f7b4e3c178',
			'label' => 'Title',
			'name' => 'text_with_file_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_605c9eba3c7ff',
			'label' => 'Section Background Image',
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_605c9f02c6291',
			'label' => 'Section Background Colour',
			'name' => 'section_background_colour',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => false,
			'return_format' => 'string',
		),
		array(
			'key' => 'field_604f7b6b3c179',
			'label' => 'Text',
			'name' => 'text_with_file_body',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 0,
			'delay' => 0,
		),
		array(
			'key' => 'field_604f7b853c17a',
			'label' => 'Video',
			'name' => 'file',
			'type' => 'oembed',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'width' => '',
			'height' => '',
		),
		array(
			'key' => 'field_60d1cc398c620',
			'label' => 'Autoplay Video',
			'name' => 'autoplay_video',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_611f6d6e07f35',
			'label' => 'Information Panel',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_60507e893a9cf',
			'label' => 'Information Panel',
			'name' => 'information_panel',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 2,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_60507ec73a9d0',
					'label' => 'Title',
					'name' => 'title',
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
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_60507ed13a9d1',
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
				array(
					'key' => 'field_60507edf3a9d2',
					'label' => 'Body Text',
					'name' => 'body_text',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 0,
					'delay' => 0,
				),
				array(
					'key' => 'field_6196783e4c97c',
					'label' => 'Button',
					'name' => 'button_link',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
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
		11 => 'categories',
		12 => 'tags',
		13 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));
