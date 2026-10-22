<?php
acf_add_local_field_group([
	'key' => 'group_home_hero',
	'title' => 'Первый экран',
	'fields' => [
		[
			'key' => 'field_home_hero_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_hero_label',
			'label' => 'Верхняя надпись',
			'name' => 'home_hero_label',
			'type' => 'text',
		],
		[
			'key' => 'field_home_hero_title',
			'label' => 'Заголовок',
			'name' => 'home_hero_title',
			'type' => 'text'
		],
		[
			'key' => 'field_home_hero_descr',
			'label' => 'Описание',
			'name' => 'home_hero_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_home_hero_btn',
			'label' => 'Кнопка',
			'name' => 'home_hero_btn',
			'type' => 'link'
		],
		[
			'key' => 'field_home_hero_tab_image',
			'label' => 'Изображение',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_hero_image',
			'label' => 'Изображение',
			'name' => 'home_hero_image',
			'type' => 'image',
		],
		[
			'key' => 'field_home_hero_tab_services',
			'label' => 'Услуги',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_hero_services',
			'label' => 'Услуги (правая колонка)',
			'name' => 'home_hero_services',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить услугу',
			'sub_fields' => [
				[
					'key' => 'field_home_hero_services_link',
					'label' => 'Ссылка',
					'name' => 'link',
					'type' => 'link'
				],
				[
					'key' => 'field_home_hero_services_title',
					'label' => 'Название услуги',
					'name' => 'title',
					'type' => 'text',
				],
			]
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