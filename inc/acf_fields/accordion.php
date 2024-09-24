<?php 
acf_add_local_field_group(array(
    'key' => 'accordion',
    'title' => 'Accordion Template',
    'hide_on_screen' => array('the_content','slug','format'),
    'location' => array(
        array(
            array(
                'param' => 'page_template', // Use page_template parameter
                'operator' => '==',
                'value' => 'page-templates/accordion.php', // Replace with the actual template file name
            ),
        ),
    ),
    'fields' => array(
        array(
            'key' => 'sub_heading',
            'label' => 'Sub Heading',
            'name' => 'sub_heading',
            'type' => 'text',
        ),
        array(
            'key' => 'body_text',
            'label' => 'Content',
            'name' => 'body_text',
            'type' => 'wysiwyg',
            'instructions' => 'Can be left blank, otherwise it will appear before the accordions',
        ),
        array(
            'key' => 'accordions',
            'label' => 'Accordions',
            'name' => 'accordions',
            'type' => 'repeater',
            'layout' => 'row',
            'button_label' => 'Add Accordion',
            'sub_fields' => array(
                array(
                    'key' => 'Title',
                    'label' => 'Title',
                    'name' => 'acc_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'acc_content',
                    'label' => 'Content',
                    'name' => 'acc_content',
                    'type' => 'wysiwyg',
                )
            ),
        ),
        array(
            'key' => 'bottom_text',
            'label' => 'Bottom Content',
            'name' => 'bottom_text',
            'type' => 'wysiwyg',
            'instructions' => 'Can be left blank, otherwise it will appear after the accordions',
        ),
        array(
            'key' => 'show_side_menu',
            'label' => 'Include a side menu?',
            'name' => 'show_side_menu',
            'type' => 'true_false',
            'ui' => 1
        ),
        array(
            'key' => 'menu_select2',
            'label' => 'Side menu',
            'name' => 'menu_select',
            'type' => 'select',
            'choices' => array(
				'' => '',
			),
            'required' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'show_side_menu', 
                        'operator' => '==', 
                        'value' => '1', 
                    ),
                ),
            ),
        ),

        
      
   
        
    ),
    
));
    