<?php
add_action('acf/init', function () {

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => 'Контактные данные',
			'menu_title' => 'Контактные данные',
			'menu_slug' => 'opt-contacts',
			'position' => 20,
		]);
	}

	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	acf_add_local_field_group([
		'key' => 'group_contacts_page',
		'title' => 'Контактные данные',
		'fields' => [
			[
				'key' => 'field_contacts_tab_page',
				'label' => 'Страница контактов',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_contacts_block_top_label',
				'label' => 'Верхняя надпись',
				'name' => 'contacts_block_top_label',
				'type' => 'text',
			],
			[
				'key' => 'field_contacts_block_title',
				'label' => 'Заголовок',
				'name' => 'contacts_block_title',
				'type' => 'text'
			],
			[
				'key' => 'field_contacts_block_descr',
				'label' => 'Описание',
				'name' => 'contacts_block_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_contacts_block_btn',
				'label' => 'Кнопка "Запись на обслуживание"',
				'name' => 'contacts_block_btn',
				'type' => 'link',
			],

			[
				'key' => 'field_contacts_tab_phones',
				'label' => 'Телефон',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_contacts_phones',
				'label' => 'Телефоны',
				'name' => 'contacts_phones',
				'type' => 'repeater',
				'layout' => 'table',
				'collapsed' => 'field_contact_phone_number',
				'button_label' => 'Добавить телефон',
				'sub_fields' => [
					[
						'key' => 'field_contact_phone_number',
						'label' => 'Номер телефона',
						'name' => 'phone',
						'type' => 'text',
					],
				],
			],

			[
				'key' => 'field_contacts_tab_address_time',
				'label' => 'Адрес и время работы',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_contacts_address',
				'label' => 'Адрес',
				'name' => 'contacts_address',
				'type' => 'textarea',
				'rows' => 3
			],
			[
				'key' => 'field_contacts_time',
				'label' => 'Время работы',
				'name' => 'contacts_time',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_of_tab_map',
				'label' => 'Карта',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_contacts_map',
				'label' => 'Код карты (iframe)',
				'name' => 'contacts_map',
				'type' => 'textarea',
				'rows' => 6,
				'new_lines' => '',
				'instructions' => 'Вставьте iframe из виджета Яндекс.Карт или Google Maps.',
			],
		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-contacts',
				],
			]
		],
	]);

});