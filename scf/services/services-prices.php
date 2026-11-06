<?php
acf_add_local_field_group([
	'key' => 'group_services_price',
	'title' => 'Прайс-лист услуги',
	'fields' => [
		[
			'key' => 'field_services_price_tab_items',
			'label' => 'Список цен',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_services_price_items',
			'label' => 'Позиции прайса',
			'name' => 'services_price_items',
			'type' => 'repeater',
			'layout' => 'table',
			'button_label' => 'Добавить позицию',
			'sub_fields' => [
				[
					'key' => 'field_services_price_items_name',
					'label' => 'Услуга',
					'name' => 'name',
					'type' => 'text',
				],
				[
					'key' => 'field_services_price_items_cost',
					'label' => 'Стоимость',
					'name' => 'cost',
					'type' => 'text',
				],
			],
		],
		[
			'key' => 'field_services_price_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_services_price_descr',
			'label' => 'Описание прайс-листа',
			'name' => 'services_price_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_services_price_link',
			'label' => 'Ссылка',
			'name' => 'services_price_link',
			'type' => 'link',
		],
		

	],
	'location' => [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'services'
			]
		]
	],
]);
?>