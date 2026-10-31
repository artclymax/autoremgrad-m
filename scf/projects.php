<?php
acf_add_local_field_group([
	'key' => 'group_projects_fields',
	'title' => 'Настройки проекта',
	'fields' => [
		[
			'key' => 'field_projects_gallery',
			'label' => 'Галерея работ',
			'name' => 'projects_gallery',
			'type' => 'gallery',
			'return_format' => 'id',
			'library' => 'all',
			'min' => 0,
			'max' => '',
			'instructions' => 'Если не заполнено — откроется только изображение записи.',
		],
	],
	'location' => [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projects'
			]
		]
	],
]);
?>