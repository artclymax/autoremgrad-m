<?php
acf_add_local_field_group([
	'key' => 'group_services_cat_fields',
	'title' => 'Настройки категории услуг',
	'fields' => [
		[
			'key' => 'field_services_cat_thumb',
			'label' => 'Изображение категории',
			'name' => 'term-thumb',
			'type' => 'image',
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
		],
	],
	'location' => [
		[
			[
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'services_cat'
			]
		]
	],
	'menu_order' => 1,
]);


acf_add_local_field_group([
	'key' => 'group_services_cat_hero_fields',
	'title' => 'Первый экран',
	'fields' => [
		[
			'key' => 'field_services_cat_accordion',
			'label' => 'Первый экран',
			'name' => 'services_cat_accordion',
			'type' => 'accordion',
		],
		[
			'key' => 'field_services_cat_hero_title',
			'label' => 'Заголовок',
			'name' => 'hero_title',
			'type' => 'text',
		],
		[
			'key' => 'field_services_cat_hero_descr',
			'label' => 'Заголовок',
			'name' => 'hero_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_services_cat_hero_btn',
			'label' => 'Кнопка "Записаться"',
			'name' => 'hero_btn',
			'type' => 'link',
		],
		[
			'key' => 'field_services_cat_hero_link',
			'label' => 'Ссылка',
			'name' => 'hero_link',
			'type' => 'link',
		],
	],
	'location' => [
		[
			[
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'services_cat'
			]
		]
	],
	'menu_order' => 2,
]);
acf_add_local_field_group([
	'key' => 'group_services_cat_page_fields',
	'title' => 'Настройки категории услуг',
	'fields' => [
		[
			'key' => 'field_services_cat_tab_page',
			'label' => 'Секция "Выберите направление"',
			'name' => '',
			'type' => 'accordion',
		],
		[
			'key' => 'field_services_cat_page_label',
			'label' => 'Надзаголовок секции',
			'name' => 'page_label',
			'type' => 'text',
		],
		[
			'key' => 'field_services_cat_page_title',
			'label' => 'Заголовок секции',
			'name' => 'page_title',
			'type' => 'text',
			'instructions' => 'Например: Выберите необходимое направление',
		],
		[
			'key' => 'field_services_cat_page_descr',
			'label' => 'Описание',
			'name' => 'page_descr',
			'type' => 'wysiwyg',
		],
	],
	'location' => [
		[
			[
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'services_cat'
			]
		]
	],
	'menu_order' => 3
]);
?>