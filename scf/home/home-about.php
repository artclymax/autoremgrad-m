<?php
acf_add_local_field_group([
	'key' => 'group_home_about',
	'title' => 'Главная: О компании',
	'fields' => [
		[
			'key' => 'field_home_about_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_about_label',
			'label' => 'Верхняя надпись',
			'name' => 'home_about_label',
			'type' => 'text',
		],
		[
			'key' => 'field_home_about_title',
			'label' => 'Заголовок',
			'name' => 'home_about_title',
			'type' => 'text'
		],
		[
			'key' => 'field_home_about_descr',
			'label' => 'Описание',
			'name' => 'home_about_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_home_about_link',
			'label' => 'Ссылка',
			'name' => 'home_about_link',
			'type' => 'link'
		],
		[
			'key' => 'field_home_about_image',
			'label' => 'Изображение',
			'name' => 'home_about_image',
			'type' => 'image',
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

acf_add_local_field_group([
	'key' => 'group_home_about_benefits',
	'title' => 'Преимущества',
	'fields' => [

		[
			'key' => 'field_home_about_benefits',
			'label' => 'Список преимуществ',
			'name' => 'home_about_benefits',
			'type' => 'repeater',
			'layout' => 'table',
			'button_label' => 'Добавить преимущество',
			'sub_fields' => [
				[
					'key' => 'field_home_about_benefits_title_first',
					'label' => 'Крупный текст',
					'name' => 'title_first',
					'type' => 'text',
				],
				[
					'key' => 'field_home_about_benefits_title_second',
					'label' => 'Подпись',
					'name' => 'title_second',
					'type' => 'text',
				],
				[
					'key' => 'field_home_about_benefits_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 2,
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
		],
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