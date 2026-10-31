<?php
acf_add_local_field_group([
	'key' => 'group_archive_services_list',
	'title' => 'Настройки архива услуг',
	'fields' => [
		[
			'key' => 'field_archive_services_list_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_archive_services_list_label',
			'label' => 'Верхняя надпись',
			'name' => 'archive_services_list_label',
			'type' => 'text',
		],
		[
			'key' => 'field_archive_services_list_title',
			'label' => 'Заголовок',
			'name' => 'archive_services_list_title',
			'type' => 'text'
		],
		[
			'key' => 'field_archive_services_list_descr',
			'label' => 'Описание',
			'name' => 'archive_services_list_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_archive_services_list_link',
			'label' => 'Кнопка ',
			'name' => 'archive_services_list_link',
			'type' => 'link',
		],

		[
			'key' => 'field_archive_services_list_tab_filter',
			'label' => 'Фильтр категорий',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_archive_services_list_selected_cats',
			'label' => 'Выбрать категории для вывода',
			'name' => 'archive_services_list_selected_cats',
			'type' => 'taxonomy',
			'taxonomy' => 'services_cat',
			'field_type' => 'multi_select',
			'return_format' => 'object',
			'multiple' => 1,
			'allow_null' => 1,
			'instructions' => 'Если ничего не выбрано — выводятся все категории.',
		],
	],
	'location' => [
		[
			[
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'archive-services.php',
			]
		]
	],
]);
?>