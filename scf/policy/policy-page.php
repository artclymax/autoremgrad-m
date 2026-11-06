<?php
acf_add_local_field_group([
	'key' => 'group_policy_page_content',
	'title' => 'Страница политики',
	'fields' => [
		[
			'key' => 'field_policy_sections',
			'label' => 'Разделы политики',
			'name' => 'policy_sections',
			'type' => 'repeater', // repeater или 'flexible_content' для большей гибкости
			'layout' => 'block',
			'button_label' => 'Добавить раздел',
			'sub_fields' => [
				[
					'key' => 'field_policy_section_title',
					'label' => 'Заголовок раздела',
					'name' => 'title',
					'type' => 'text',
				],
				[
					'key' => 'field_policy_section_content',
					'label' => 'Содержимое раздела',
					'name' => 'content',
					'type' => 'wysiwyg',
				],
			],
		],
	],
	'location' => [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-policy.php'
			]
		]
	],
]);
?>