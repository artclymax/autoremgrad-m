<?php
acf_add_local_field_group([
	'key' => 'group_prices_formation',
	'title' => 'Секция: Формирование стоимости',
	'fields' => [
		[
			'key' => 'field_prices_formation_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_prices_formation_label',
			'label' => 'Верхняя надпись',
			'name' => 'prices_formation_label',
			'type' => 'text',
		],
		[
			'key' => 'field_prices_formation_title',
			'label' => 'Заголовок',
			'name' => 'prices_formation_title',
			'type' => 'text'
		],
		[
			'key' => 'field_prices_formation_descr',
			'label' => 'Описание',
			'name' => 'prices_formation_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_prices_formation_footer_descr',
			'label' => 'Доп. описание (под списком)',
			'name' => 'prices_formation_footer_descr',
			'type' => 'textarea',
			'rows' => 4,
			'new_lines' => 'wpautop',
		],
		[
			'key' => 'field_prices_formation_image',
			'label' => 'Изображение (левая часть)',
			'name' => 'prices_formation_image',
			'type' => 'image',
		],
		[
			'key' => 'field_prices_formation_btn',
			'label' => 'Кнопка',
			'name' => 'prices_formation_btn',
			'type' => 'link'
		],
		[
			'key' => 'field_prices_formation_tab_items',
			'label' => 'Пункты',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_prices_formation_items',
			'label' => 'Список пунктов',
			'name' => 'prices_formation_items',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить пункт',
			'sub_fields' => [
				[
					'key' => 'field_prices_formation_items_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text',
				],
				[
					'key' => 'field_prices_formation_items_descr',
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
				'value' => 'page-prices.php'
			]
		]
	],
]);
?>