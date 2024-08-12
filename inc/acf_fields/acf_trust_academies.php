<?php 
$socials = [
    'facebook',
	'twitter',
	'instagram',
	'linkedin',
];

acf_add_local_field_group(array(
    'key' => 'academies',
    'title' => 'Academy',
    'hide_on_screen' => array('the_content','format'),
    'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'academies',
			),
		),
	),
    'fields' => array(
        array(
            'key' => 'branding',
            'label' => 'Academy Branding',
            'name' => 'branding',
            'type' => 'tab',
        ),
        array(
            'key' => 'logo',
            'label' => 'Logo',
            'name' => 'logo',
            'type' => 'image',
            'wrapper' => array('width' => '20'),
        ),
        array(
            'key' => 'icon',
            'label' => 'Icon',
            'name' => 'icon',
            'type' => 'image',
            'wrapper' => array('width' => '20'),
        ),
        array(
            'key' => 'school_color',
            'label' => 'Colour',
            'name' => 'school_color',
            'type' => 'color_picker',
            'wrapper' => array('width' => '20'),
        ),
        array(
            'key' => 'profile_tab',
            'label' => 'Profile',
            'name' => 'profile_tab',
            'type' => 'tab',
        ),
        array(
            'key' => 'acad_profile',
            'label' => 'Profile',
            'name' => 'profile',
            'type' => 'wysiwyg',
        ),
        array(
            'key' => 'socials_tab',
            'label' => 'Socials',
            'name' => 'socials_tab',
            'type' => 'tab',
        ),
        array(
			'key' => 'acad_socials',
			'label' => 'Platforms',
			'name' => 'acad_socials',
			'type' => 'repeater',
			'button_label' => 'Add Social Media Platform',
			'sub_fields' => array(
				array(
					'key' => 'acad_social_platform',
					'label' => 'Platform',
					'name' => 'acad_social_platform',
					'type' => 'select',
					'choices' => array_combine($socials, $socials),
				),
				array(
					'key' => 'acad_social_url',
					'label' => 'Profile URL',
					'name' => 'acad_social_url',
					'type' => 'url',
				),
			),
		),
        array(
            'key' => 'head_governers',
            'label' => 'Head Teacher',
            'name' => 'head_governers',
            'type' => 'tab',
        ),
        array(
            'key' => 'image_of_head',
            'label' => 'Photo of Head Teacher',
            'name' => 'image_of_head',
            'type' => 'image',
            'wrapper' => array('width' => '20'),
        ),
        array(
            'key' => 'head_name',
            'label' => 'Full Name of Head Teacher',
            'name' => 'head_name',
            'type' => 'text',
            'wrapper' => array('width' => '20'),
        ),
        array(
            'key' => 'head_title',
            'label' => 'Title of Head Teacher',
            'name' => 'head_title',
            'type' => 'text',
            'wrapper' => array('width' => '20'),
        ),
        array(
            'key' => 'contact_details',
            'label' => 'Contact Details',
            'name' => 'contact_details',
            'type' => 'tab',
        ),
        array(
            'key' => 'telephone',
            'label' => 'Telephone',
            'name' => 'telephone',
            'type' => 'number',
            'wrapper' => array('width' => '30'),
        ),
        array(
            'key' => 'email',
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email',
            'wrapper' => array('width' => '30'),
        ),
        array(
            'key' => 'website',
            'label' => 'Website URL',
            'name' => 'website',
            'type' => 'url',
            'wrapper' => array('width' => '30'),
        ),
        array(
            'key' => 'full_address',
            'label' => 'Address',
            'name' => 'full_address',
            'type' => 'wysiwyg',
            'wrapper' => array('width' => '50'),
        ),
        array(
            'key' => 'map_tab',
            'label' => 'Map',
            'name' => 'map_tab',
            'type' => 'tab',
        ),
        array(
            'key' => 'map_lng',
            'label' => 'Longitude',
            'name' => 'map_lng',
            'type' => 'text',
            'wrapper' => array('width' => '50'),
        ),
        array(
            'key' => 'map_lat',
            'label' => 'Latitude',
            'name' => 'map_lat',
            'type' => 'text',
            'wrapper' => array('width' => '50'),
        ),
        array(
            'key' => 'downloads_tab',
            'label' => 'Downloads',
            'name' => 'downloads_tab',
            'type' => 'tab',
        ),
        array(
            'key' => 'academy_downloads',
            'label' => 'Downloads',
            'name' => 'academy_downloads',
            'type' => 'repeater',
            'button_label' => 'Add Download',
            'sub_fields' => array(
                array(
                    'key' => 'acad_download_title',
                    'label' => 'Button Title',
                    'name' => 'acad_download_title',
                    'type' => 'text',
                    'wrapper' => array('width' => '50'),
                ),
                array(
                    'key' => 'acad_download_file',
                    'label' => 'File',
                    'name' => 'acad_download_file',
                    'type' => 'file',
                    'wrapper' => array('width' => '50'),
                ),
            ),
        ),

        array(
            'key' => 'gallery_tab',
            'label' => 'Gallery',
            'name' => 'gallery_tab',
            'type' => 'tab',
        ),
        array(
            'key' => 'acad_gallery',
            'label' => 'Gallery',
            'name' => 'acad_gallery',
            'type' => 'gallery',
        ),
        
    ),


));
    
