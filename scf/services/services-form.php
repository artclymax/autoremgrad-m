<?php
acf_add_local_field_group([
	'key' => 'group_services_form',
	'title' => 'Секция: Форма подбора услуги',
	'fields' => [
		[
			'key' => 'field_services_form_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_services_form_label',
			'label' => 'Верхняя надпись',
			'name' => 'services_form_label',
			'type' => 'text',
		],
		[
			'key' => 'field_services_form_title',
			'label' => 'Заголовок',
			'name' => 'services_form_title',
			'type' => 'text'
		],
		[
			'key' => 'field_services_form_descr',
			'label' => 'Описание',
			'name' => 'services_form_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_services_form_image',
			'label' => 'Изображение (левая часть)',
			'name' => 'services_form_image',
			'type' => 'image',
		],
		
		[
			'key' => 'field_services_form_tab_shortcode',
			'label' => 'Форма',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_services_form_shortcode',
			'label' => 'Shortcode Contact Form 7',
			'name' => 'services_form_shortcode',
			'type' => 'textarea',
			'rows' => 2,
			'instructions' => 'Вставьте шорткод формы',
		],
	],
	'location' => [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'archive-services.php'
			]
		]
	],
]);
?>