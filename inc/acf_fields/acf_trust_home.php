<?php    

acf_add_local_field_group(array(
		'key' => 'home_announcement',
		'title' => 'Announcement',
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
		'location' => array(
			array(
				array(
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
				),
			),
		),
		'fields' => array(
			array(
				'key' => 'announcement_banner_show',
				'label' => 'Show/Hide',
				'name' => 'announcement_banner_show',
				'type' => 'true_false',
				'ui_on_text' => 'Show', // Custom label for the ON state
                'ui_off_text' => 'Hide',
				'ui' => 1,
				'wrapper' => array(
					'width' => '20',
				),
			),
			array(
                'key' => 'announcement_banner_message_content',
                'label' => 'Content',
                'name' => 'announcement_banner_message_content',
                'type' => 'wysiwyg',
                'wrapper' => array(
                    'width' => '80',
                ),
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'announcement_banner_show',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
		),
	));