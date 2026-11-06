<?php
acf_add_local_field_group([
	'key' => 'group_about_approach',
	'title' => 'Страница "О компании": Подход к работе',
	'fields' => [
		[
			'key' => 'field_about_approach_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_approach_label',
			'label' => 'Верхняя надпись',
			'name' => 'about_approach_label',
			'type' => 'text',
		],
		[
			'key' => 'field_about_approach_title',
			'label' => 'Заголовок',
			'name' => 'about_approach_title',
			'type' => 'text'
		],
		[
			'key' => 'field_about_approach_descr',
			'label' => 'Описание',
			'name' => 'about_approach_descr',
			'type' => 'wysiwyg',
		],

		[
			'key' => 'field_about_approach_tab_items',
			'label' => 'Пункты',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_approach_items',
			'label' => 'Список пунктов',
			'name' => 'about_approach_items',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить пункт',
			'sub_fields' => [
				[
					'key' => 'field_about_approach_items_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text',
				],
				[
					'key' => 'field_about_approach_items_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 2,
					'new_lines' => 'wpautop',
				],
			]
		],
		[
			'key' => 'field_about_approach_footer_descr',
			'label' => 'Доп. описание (под сеткой)',
			'name' => 'about_approach_footer_descr',
			'type' => 'textarea',
			'rows' => 3,
			'new_lines' => 'wpautop',
		],

		[
			'key' => 'field_about_approach_tab_image',
			'label' => 'Изображение',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_approach_image',
			'label' => 'Изображение (нижнее, на всю ширину)',
			'name' => 'about_approach_image',
			'type' => 'image',
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