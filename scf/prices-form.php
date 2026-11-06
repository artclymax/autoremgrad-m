<?php
acf_add_local_field_group([
	'key' => 'group_prices_form',
	'title' => 'Секция: Форма расчёта стоимости',
	'fields' => [
		[
			'key' => 'field_prices_form_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_prices_form_label',
			'label' => 'Верхняя надпись',
			'name' => 'prices_form_label',
			'type' => 'text',
		],
		[
			'key' => 'field_prices_form_title',
			'label' => 'Заголовок',
			'name' => 'prices_form_title',
			'type' => 'text'
		],
		[
			'key' => 'field_prices_form_descr',
			'label' => 'Описание',
			'name' => 'prices_form_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_prices_form_image',
			'label' => 'Изображение (фон левой части)',
			'name' => 'prices_form_image',
			'type' => 'image',
			'return_format' => 'array',
			'preview_size' => 'large',
			'library' => 'all',
		],

		[
			'key' => 'field_prices_form_tab_shortcode',
			'label' => 'Форма',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_prices_form_shortcode',
			'label' => 'Шорткод формы',
			'name' => 'prices_form_shortcode',
			'type' => 'text',
			'instructions' => 'Вставьте шорткод формы, например: [contact-form-7 id="123" title="Расчёт стоимости"]',
		],
	],
	'location' => [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-prices.php'
			]
		],
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'archive-projects.php'
			]
		],
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-reviews.php'
			]
		]
	],
]);
?>