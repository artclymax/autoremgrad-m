<?php
acf_add_local_field_group([
	'key' => 'group_home_projects',
	'title' => 'Главная: Наши работы',
	'fields' => [
		[
			'key' => 'field_home_projects_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_projects_label',
			'label' => 'Верхняя надпись',
			'name' => 'home_projects_label',
			'type' => 'text',
		],
		[
			'key' => 'field_home_projects_title',
			'label' => 'Заголовок',
			'name' => 'home_projects_title',
			'type' => 'text'
		],
		[
			'key' => 'field_home_projects_descr',
			'label' => 'Описание',
			'name' => 'home_projects_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_home_projects_link',
			'label' => 'Ссылка "Смотреть все работы"',
			'name' => 'home_projects_link',
			'type' => 'link',
			'instructions' => 'Обычно ведёт на архив проектов'
		],

		[
			'key' => 'field_home_projects_tab_filter',
			'label' => 'Фильтр записей',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_projects_selected',
			'label' => 'Выбрать проекты для вывода',
			'name' => 'home_projects_selected',
			'type' => 'post_object',
			'post_type' => ['projects'],
			'return_format' => 'id',
			'multiple' => 1,
			'instructions' => 'Если ничего не выбрано — выводятся все проекты.',
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