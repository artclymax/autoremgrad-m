<?php

acf_add_local_field_group([
	'key' => 'group_price_page',
	'title' => 'Страница "Цены"',
	'fields' => [
		[
			'key' => 'field_price_page_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_price_page_label',
			'label' => 'Верхняя надпись',
			'name' => 'price_page_label',
			'type' => 'text',
		],
		[
			'key' => 'field_price_page_title',
			'label' => 'Заголовок',
			'name' => 'price_page_title',
			'type' => 'text'
		],
		[
			'key' => 'field_price_page_descr',
			'label' => 'Описание',
			'name' => 'price_page_descr',
			'type' => 'wysiwyg',

		],
	],
	'location' => [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-prices.php'
			]
		]
	],
]);

acf_add_local_field_group([
	'key' => 'group_price_page_tax',
	'title' => 'Страница "Цены"',
	'fields' => [
		[
			'key' => 'field_price_page_accordion_content',
			'label' => 'Страница "Цены"',
			'name' => '',
			'type' => 'accordion',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_price_page_label',
			'label' => 'Верхняя надпись',
			'name' => 'price_page_label',
			'type' => 'text',
		],
		[
			'key' => 'field_price_page_title',
			'label' => 'Заголовок',
			'name' => 'price_page_title',
			'type' => 'text'
		],
		[
			'key' => 'field_price_page_descr',
			'label' => 'Описание',
			'name' => 'price_page_descr',
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
	'menu_order' => 6
]);
?>