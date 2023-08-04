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
            'layouts' => array(
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
				'layout_64a809a3b4c08' => array(
					'key' => 'layout_64a809a3b4c08',
					'name' => 'page_cards',
					'label' => 'Page Cards',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64a809bb2bb38',
							'label' => 'Page',
							'name' => 'get_page',
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
								0 => 'page',
							),
							'taxonomy' => '',
							'filters' => array(
								0 => 'search',
							),
							'elements' => array(
								0 => 'featured_image',
							),
							'min' => '',
							'max' => '',
							'return_format' => 'object',
						),
					),
					'min' => '',
					'max' => '',
				),
				
				'layout_64b105c645e48' => array(
					'key' => 'layout_64b105c645e48',
					'name' => 'banner_section',
					'label' => 'Banner Section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64b105e6ccbf2',
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
							'key' => 'field_64b1060eccbf3',
							'label' => 'Description',
							'name' => 'description',
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
							'key' => 'field_64b1061cccbf4',
							'label' => 'Photo',
							'name' => 'photo',
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
					'min' => '',
					'max' => '',
				),
				'layout_64b4f537351fb' => array(
					'key' => 'layout_64b4f537351fb',
					'name' => 'toplist_section',
					'label' => 'toplist_section',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64b4f53889a5a',
							'label' => 'toplist_items',
							'name' => 'toplist_items',
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
								0 => 'bussines_post',
							),
							'taxonomy' => '',
							'filters' => array(
								0 => 'search',
								1 => 'post_type',
								2 => 'taxonomy',
							),
							'elements' => array(
								0 => 'featured_image',
							),
							'min' => '',
							'max' => '',
							'return_format' => 'object',
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_64ae78686a0af' => array(
					'key' => 'layout_64ae78686a0af',
					'name' => 'homepage_header',
					'label' => 'Homepage Header',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64ae791e24381',
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
							'key' => 'field_64ae794f24383',
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
					),
					'min' => '',
					'max' => '',
				),
				'layout_64b1495a7c254' => array(
					'key' => 'layout_64b1495a7c254',
					'name' => 'parallax',
					'label' => 'Parallax',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64b1496a21dc3',
							'label' => 'Parallax Effect',
							'name' => 'parallax_effect',
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
							'max' => 0,
							'layout' => 'table',
							'button_label' => '',
							'sub_fields' => array(
								array(
									'key' => 'field_64b1499121dc4',
									'label' => 'Parallax Image Effects',
									'name' => 'parallax_image_effects',
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
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_64ad4245bb8c0' => array(
					'key' => 'layout_64ad4245bb8c0',
					'name' => 'services_cards',
					'label' => 'Services Cards',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64ad42555c8b7',
							'label' => 'cards',
							'name' => 'cards',
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
							'max' => 0,
							'layout' => 'table',
							'button_label' => '',
							'sub_fields' => array(
								array(
									'key' => 'field_64ad43055c8b8',
									'label' => 'title',
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
									'key' => 'field_64ad43195c8ba',
									'label' => 'image',
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
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_64ae6d9808804' => array(
					'key' => 'layout_64ae6d9808804',
					'name' => 'content_module',
					'label' => 'Content Module',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64ae6da50aeaa',
							'label' => 'Textarea',
							'name' => 'textarea',
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
							'media_upload' => 1,
							'delay' => 0,
						),
					),
					'min' => '',
					'max' => '',
				),
				'layout_64a7ea0c21d9f' => array(
					'key' => 'layout_64a7ea0c21d9f',
					'name' => 'cta_section',
					'label' => 'CTA',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64a7ea16b9d0f',
							'label' => 'cta_items',
							'name' => 'cta_items',
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
								0 => 'bussines_post',
							),
							'taxonomy' => '',
							'filters' => array(
								0 => 'search',
								1 => 'post_type',
								2 => 'taxonomy',
							),
							'elements' => array(
								0 => 'featured_image',
							),
							'min' => '',
							'max' => 1,
							'return_format' => 'object',
						),
						array(
							'key' => 'field_64abb44d27e16',
							'label' => 'Oneliner Text',
							'name' => 'oneliner_text',
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
					),
					'min' => '',
					'max' => '',
				),
				'layout_64ac7ab3b923e' => array(
					'key' => 'layout_64ac7ab3b923e',
					'name' => 'business_cards',
					'label' => 'Business Cards',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64ac7ab528b43',
							'label' => 'cards_relationship',
							'name' => 'cards_relationship',
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
								0 => 'bussines_post',
							),
							'taxonomy' => '',
							'filters' => array(
								0 => 'search',
								1 => 'post_type',
								2 => 'taxonomy',
							),
							'elements' => array(
								0 => 'featured_image',
							),
							'min' => '',
							'max' => '3',
							'return_format' => 'object',
						),
					),
					'min' => '',
					'max' => '',
				),
                'layout_64942cee77bea' => array(
                    'key' => 'layout_64942cee77bea',
                    'name' => 'faq',
                    'label' => 'FAQ',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_64942cf9f43ca',
                            'label' => 'FAQ items',
                            'name' => 'faq_items',
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
                            'max' => 0,
                            'layout' => 'table',
                            'button_label' => '',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_64942d3b850e5',
                                    'label' => 'Question',
                                    'name' => 'faq_question',
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
                                    'key' => 'field_64942d40850e6',
                                    'label' => 'Answer',
                                    'name' => 'faq_answer',
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
                            ),
                        ),
                    ),
                    'min' => '',
                    'max' => '',
                ),
				'layout_64937496af6bc' => array(
					'key' => 'layout_64937496af6bc',
					'name' => 'pro_cons',
					'label' => 'Pro Cons',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_649fe33e2d926',
							'label' => 'Columns (copy)',
							'name' => 'columns_copy',
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
							'max' => 0,
							'layout' => 'table',
							'button_label' => '',
							'sub_fields' => array(
								array(
									'key' => 'field_649fe33f2d927',
									'label' => 'Content',
									'name' => 'content',
									'type' => 'textarea',
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
									'maxlength' => '',
									'rows' => '',
									'new_lines' => '',
								),
							),
						),
						array(
							'key' => 'field_64a334cf4368f',
							'label' => 'Columns cons',
							'name' => 'columns_cons',
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
							'max' => 0,
							'layout' => 'table',
							'button_label' => '',
							'sub_fields' => array(
								array(
									'key' => 'field_64a334cf43690',
									'label' => 'Contenti',
									'name' => 'contenti',
									'type' => 'textarea',
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
									'maxlength' => '',
									'rows' => '',
									'new_lines' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
                'layout_649fdfffd64a0' => array(
					'key' => 'layout_649fdfffd64a0',
					'name' => 'quick_facts',
					'label' => 'Quick Facts',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_649fe023d64a1',
							'label' => 'Colum',
							'name' => 'colum',
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
							'max' => 4,
							'layout' => 'table',
							'button_label' => 'Add quick fact',
							'sub_fields' => array(
								array(
									'key' => 'field_649fe03cd64a2',
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
									'key' => 'field_649fe044d64a3',
									'label' => 'Content',
									'name' => 'content',
									'type' => 'textarea',
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
									'maxlength' => '',
									'rows' => '',
									'new_lines' => '',
								),
								array(
									'key' => 'field_649fe084d64a4',
									'label' => 'Link',
									'name' => 'link',
									'type' => 'url',
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
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
                'layout_649944239c9b0' => array(
					'key' => 'layout_649944239c9b0',
					'name' => 'carousel',
					'label' => 'Gallery Carousel',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_64994434bd67e',
							'label' => 'image_gallery',
							'name' => 'image_gallery',
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
							'max' => 0,
							'layout' => 'table',
							'button_label' => '',
							'sub_fields' => array(
								array(
									'key' => 'field_6499444cbd67f',
									'label' => 'gallerycarousel',
									'name' => 'gallerycarousel',
									'type' => 'gallery',
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
									'insert' => 'append',
									'library' => 'all',
									'min' => '',
									'max' => '',
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
					),
					'min' => '',
					'max' => '',
				),
				'layout_649e69388bcf5' => array(
					'key' => 'layout_649e69388bcf5',
					'name' => 'testimonials',
					'label' => 'Testimonials',
					'display' => 'row',
					'sub_fields' => array(
						array(
							'key' => 'field_64a286ccd49ef',
							'label' => 'Testimonials Items',
							'name' => 'testimonials_items',
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
							'max' => 0,
							'layout' => 'row',
							'button_label' => '',
							'sub_fields' => array(
								array(
									'key' => 'field_64a286e1d49f0',
									'label' => 'image',
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
									'key' => 'field_64a286efd49f1',
									'label' => 'name',
									'name' => 'name',
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
								// array(
								// 	'key' => 'field_64a286f9d49f2',
								// 	'label' => 'title',
								// 	'name' => 'title',
								// 	'type' => 'text',
								// 	'instructions' => '',
								// 	'required' => 0,
								// 	'conditional_logic' => 0,
								// 	'wrapper' => array(
								// 		'width' => '',
								// 		'class' => '',
								// 		'id' => '',
								// 	),
								// 	'default_value' => '',
								// 	'placeholder' => '',
								// 	'prepend' => '',
								// 	'append' => '',
								// 	'maxlength' => '',
								// ),
								array(
									'key' => 'field_64a28703d49f3',
									'label' => 'comment',
									'name' => 'comment',
									'type' => 'textarea',
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
									'maxlength' => '',
									'rows' => '',
									'new_lines' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				
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