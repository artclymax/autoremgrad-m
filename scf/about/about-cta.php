<?php
acf_add_local_field_group([
	'key' => 'group_about_cta',
	'title' => 'Страница "О компании": Запись в сервис',
	'fields' => [
		[
			'key' => 'field_about_cta_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_about_cta_label',
			'label' => 'Верхняя надпись',
			'name' => 'about_cta_label',
			'type' => 'text',
		],
		[
			'key' => 'field_about_cta_title',
			'label' => 'Заголовок',
			'name' => 'about_cta_title',
			'type' => 'text'
		],
		[
			'key' => 'field_about_cta_descr',
			'label' => 'Описание',
			'name' => 'about_cta_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_about_cta_btn',
			'label' => 'Кнопка',
			'name' => 'about_cta_btn',
			'type' => 'link'
		],
		[
			'key' => 'field_about_cta_phone_text',
			'label' => 'Текст перед телефоном',
			'name' => 'about_cta_phone_text',
			'type' => 'text',
			'instructions' => 'Например: Или позвоните нам'
		],
		[
			'key' => 'field_about_cta_phone',
			'label' => 'Телефон',
			'name' => 'about_cta_phone',
			'type' => 'text',
			'instructions' => 'Если не заполнен — берётся из «Контактные данные».',
		],
		[
			'key' => 'field_about_cta_image',
			'label' => 'Изображение (правая часть)',
			'name' => 'about_cta_image',
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