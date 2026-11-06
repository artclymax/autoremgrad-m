<?php
acf_add_local_field_group([
	'key' => 'group_about_prices',
	'title' => 'Страница "О компании": Формирование стоимости',
	'fields' => [
		[
			'key' => 'field_about_prices_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_prices_label',
			'label' => 'Верхняя надпись',
			'name' => 'about_prices_label',
			'type' => 'text',
		],
		[
			'key' => 'field_about_prices_title',
			'label' => 'Заголовок',
			'name' => 'about_prices_title',
			'type' => 'text'
		],
		[
			'key' => 'field_about_prices_descr',
			'label' => 'Описание',
			'name' => 'about_prices_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_about_prices_image',
			'label' => 'Изображение',
			'name' => 'about_prices_image',
			'type' => 'image',
		],

		[
			'key' => 'field_about_prices_tab_items',
			'label' => 'Пункты',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_prices_items',
			'label' => 'Список пунктов',
			'name' => 'about_prices_items',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить пункт',
			'sub_fields' => [
				[
					'key' => 'field_about_prices_items_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text',
				],
				[
					'key' => 'field_about_prices_items_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 2,
					'new_lines' => 'wpautop',
				],
			]
		],
		[
			'key' => 'field_about_prices_footer_descr',
			'label' => 'Доп. описание (под списком)',
			'name' => 'about_prices_footer_descr',
			'type' => 'textarea',
			'rows' => 3,
			'new_lines' => 'wpautop',
		],
	],
	'location' => [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-about.php'
			]
		]
	],
]);
?>