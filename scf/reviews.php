<?php
acf_add_local_field_group([
	'key' => 'group_home_reviews',
	'title' => 'Отзывы',
	'fields' => [
		[
			'key' => 'field_home_reviews_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_reviews_label',
			'label' => 'Верхняя надпись',
			'name' => 'home_reviews_label',
			'type' => 'text',
		],
		[
			'key' => 'field_home_reviews_title',
			'label' => 'Заголовок',
			'name' => 'home_reviews_title',
			'type' => 'text'
		],

		[
			'key' => 'field_home_reviews_tab_filter',
			'label' => 'Фильтр записей',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_reviews_selected',
			'label' => 'Выбрать отзывы для вывода',
			'name' => 'home_reviews_selected',
			'type' => 'post_object',
			'post_type' => ['reviews'],
			'return_format' => 'id',
			'multiple' => 1,
			'instructions' => 'Если ничего не выбрано — выводятся все отзывы.',
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