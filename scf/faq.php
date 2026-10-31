<?php
acf_add_local_field_group([
	'key' => 'group_faq',
	'title' => 'FAQ (Вопросы и ответы)',
	'fields' => [
		[
			'key' => 'field_faq_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_faq_label',
			'label' => 'Верхняя надпись',
			'name' => 'faq_label',
			'type' => 'text',
		],
		[
			'key' => 'field_faq_title',
			'label' => 'Заголовок',
			'name' => 'faq_title',
			'type' => 'text'
		],
		[
			'key' => 'field_faq_link',
			'label' => 'Ссылка "Задать вопрос"',
			'name' => 'faq_link',
			'type' => 'link',
		],
		[
			'key' => 'field_faq_image',
			'label' => 'Изображение (фон левой части)',
			'name' => 'faq_image',
			'type' => 'image',
		],

		[
			'key' => 'field_faq_tab_items',
			'label' => 'Вопросы',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_faq_items',
			'label' => 'Список вопросов',
			'name' => 'faq_items',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить вопрос',
			'sub_fields' => [
				[
					'key' => 'field_faq_items_title',
					'label' => 'Вопрос',
					'name' => 'title',
					'type' => 'text',
				],
				[
					'key' => 'field_faq_items_descr',
					'label' => 'Ответ',
					'name' => 'descr',
					'type' => 'wysiwyg',
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