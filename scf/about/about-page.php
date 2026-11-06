<?php
acf_add_local_field_group([
	'key' => 'group_about_page',
	'title' => 'Страница: О компании',
	'fields' => [
		[
			'key' => 'field_about_page_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_page_label',
			'label' => 'Верхняя надпись',
			'name' => 'about_page_label',
			'type' => 'text',
		],
		[
			'key' => 'field_about_page_title',
			'label' => 'Заголовок',
			'name' => 'about_page_title',
			'type' => 'text'
		],
		[
			'key' => 'field_about_page_descr',
			'label' => 'Описание (верхняя часть)',
			'name' => 'about_page_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_about_page_title_2',
			'label' => 'Заголовок (нижняя часть)',
			'name' => 'about_page_title_2',
			'type' => 'text'
		],
		[
			'key' => 'field_about_page_link',
			'label' => 'Ссылка',
			'name' => 'about_page_link',
			'type' => 'link'
		],

		[
			'key' => 'field_about_page_tab_images',
			'label' => 'Изображения',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_page_image_1',
			'label' => 'Изображение 1 (верхнее)',
			'name' => 'about_page_image_1',
			'type' => 'image',
		],
		[
			'key' => 'field_about_page_image_2',
			'label' => 'Изображение 2 (нижнее)',
			'name' => 'about_page_image_2',
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