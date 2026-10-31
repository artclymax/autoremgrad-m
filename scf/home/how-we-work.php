<?php
acf_add_local_field_group([
	'key' => 'group_how_we_work',
	'title' => 'Как мы работаем',
	'fields' => [
		[
			'key' => 'field_how_we_work_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_how_we_work_label',
			'label' => 'Верхняя надпись',
			'name' => 'how_we_work_label',
			'type' => 'text',
		],
		[
			'key' => 'field_how_we_work_title',
			'label' => 'Заголовок',
			'name' => 'how_we_work_title',
			'type' => 'text'
		],
		[
			'key' => 'field_how_we_work_descr',
			'label' => 'Описание',
			'name' => 'how_we_work_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_how_we_work_link',
			'label' => 'Кнопка',
			'name' => 'how_we_work_link',
			'type' => 'link'
		],

		[
			'key' => 'field_how_we_work_tab_steps',
			'label' => 'Шаги процесса',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_how_we_work_steps',
			'label' => 'Список шагов',
			'name' => 'how_we_work_steps',
			'type' => 'repeater',
			'layout' => 'block',
			'button_label' => 'Добавить шаг',
			'sub_fields' => [
				[
					'key' => 'field_how_we_work_steps_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text',
				],
				[
					'key' => 'field_how_we_work_steps_descr',
					'label' => 'Описание',
					'name' => 'descr',
					'type' => 'textarea',
					'rows' => 2,
					'new_lines' => 'wpautop',
				],
			]
		],
		[
			'key' => 'field_how_we_work_image',
			'label' => 'Изображение',
			'name' => 'how_we_work_image',
			'type' => 'image',
			'return_format' => 'array',
			'preview_size' => 'large',
			'library' => 'all',
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