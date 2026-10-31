<?php
acf_add_local_field_group([
	'key' => 'group_section_form',
	'title' => 'Секция: Форма заявки',
	'fields' => [
		[
			'key' => 'field_form_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_form_label',
			'label' => 'Верхняя надпись',
			'name' => 'form_label',
			'type' => 'text',
		],
		[
			'key' => 'field_form_title',
			'label' => 'Заголовок',
			'name' => 'form_title',
			'type' => 'text'
		],
		[
			'key' => 'field_form_descr',
			'label' => 'Описание',
			'name' => 'form_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_form_image',
			'label' => 'Изображение (фон левой части)',
			'name' => 'form_image',
			'type' => 'image',
			'return_format' => 'array',
			'preview_size' => 'large',
			'library' => 'all',
		],

		[
			'key' => 'field_form_tab_shortcode',
			'label' => 'Форма',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_form_shortcode',
			'label' => 'Шорткод формы',
			'name' => 'form_shortcode',
			'type' => 'textarea',
			'rows' => 2,
		],
	],
	'location' => [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'front-page.php'
			]
		]
	],
]);
?>