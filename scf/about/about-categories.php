<?php
acf_add_local_field_group([
	'key' => 'group_about_categories',
	'title' => 'Страница "О компании": Категории транспорта',
	'fields' => [
		[
			'key' => 'field_about_categories_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_categories_label',
			'label' => 'Верхняя надпись',
			'name' => 'about_categories_label',
			'type' => 'text',
		],
		[
			'key' => 'field_about_categories_title',
			'label' => 'Заголовок',
			'name' => 'about_categories_title',
			'type' => 'text'
		],
		[
			'key' => 'field_about_categories_descr',
			'label' => 'Описание',
			'name' => 'about_categories_descr',
			'type' => 'wysiwyg',
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