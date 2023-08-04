<?php if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_64942ce39e3b3',
    'title' => 'Modules',
    'fields' => array(
        array(
            'key' => 'field_64942ce8f43c9',
            'label' => 'Modules List',
            'name' => 'modules_list',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            // prej qitu keni me shtu layouts (module)
			'layout_64c0de69031d8' => array(
				'key' => 'layout_64c0de69031d8',
				'name' => 'modules_cards',
				'label' => 'Modules Cards',
				'display' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_64c0e81ed137d',
						'label' => 'Post Type',
						'name' => 'post_type_select',
						'type' => 'button_group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'businesses' => 'Businesses',
							'pages' => 'Pages',
							'services' => 'Services',
						),
						'allow_null' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
					),
					array(
						'key' => 'field_64cbc201caa74',
						'label' => 'Pages',
						'name' => 'pages',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_64c0e81ed137d',
									'operator' => '==',
									'value' => 'pages',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'page',
						),
						'taxonomy' => '',
						'filters' => '',
						'elements' => '',
						'min' => '',
						'max' => '',
						'return_format' => 'object',
					),
					array(
						'key' => 'field_64cbc255ce0c5',
						'label' => 'Businesses',
						'name' => 'businesses_test',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_64c0e81ed137d',
									'operator' => '==',
									'value' => 'businesses',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'bussines_post',
						),
						'taxonomy' => '',
						'filters' => array(
							0 => 'search',
						),
						'elements' => '',
						'min' => '',
						'max' => '',
						'return_format' => 'object',
					),
				),
				'min' => '',
				'max' => '',
			),


            // end
            'button_label' => 'Add Module',
            'min' => '',
            'max' => '',
        ),
    ),
    'location' => array(
		array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
		),
        array(
			array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'bussines_post',
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
));
endif;