<?php
acf_add_local_field_group([
	'key' => 'group_home_services',
	'title' => 'Главная: Услуги',
	'fields' => [
		[
			'key' => 'field_home_services_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_services_label',
			'label' => 'Верхняя надпись',
			'name' => 'home_services_label',
			'type' => 'text',
		],
		[
			'key' => 'field_home_services_title',
			'label' => 'Заголовок',
			'name' => 'home_services_title',
			'type' => 'text'
		],
		[
			'key' => 'field_home_services_descr',
			'label' => 'Описание',
			'name' => 'home_services_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_home_services_link',
			'label' => 'Ссылка "Все услуги"',
			'name' => 'home_services_link',
			'type' => 'link',
			'instructions' => 'Обычно ведёт на архив услуг'
		],

		[
			'key' => 'field_home_services_tab_filter',
			'label' => 'Фильтр записей',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_services_selected',
			'label' => 'Выбрать услуги для вывода',
			'name' => 'home_services_selected',
			'type' => 'post_object',
			'post_type' => ['services'],
			'return_format' => 'id',
			'multiple' => 1,
			'instructions' => 'Если ничего не выбрано — выводятся все услуги.',
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