<?php
acf_add_local_field_group([
	'key' => 'group_home_why_us',
	'title' => 'Главная: Почему мы',
	'fields' => [
		[
			'key' => 'field_home_why_us_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_why_us_label',
			'label' => 'Верхняя надпись',
			'name' => 'home_why_us_label',
			'type' => 'text',
		],
		[
			'key' => 'field_home_why_us_title',
			'label' => 'Заголовок',
			'name' => 'home_why_us_title',
			'type' => 'text'
		],
		[
			'key' => 'field_home_why_us_descr',
			'label' => 'Описание',
			'name' => 'home_why_us_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_home_why_us_image',
			'label' => 'Изображение',
			'name' => 'home_why_us_image',
			'type' => 'image',
		],

		[
			'key' => 'field_home_why_us_tab_features',
			'label' => 'Преимущества',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_why_us_features',
			'label' => 'Список преимуществ',
			'name' => 'home_why_us_features',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить преимущество',
			'sub_fields' => [
				[
					'key' => 'field_home_why_us_features_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text',
				],
				[
					'key' => 'field_home_why_us_features_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 2,
					'new_lines' => 'wpautop',
				],
			]
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