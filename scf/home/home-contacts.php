<?php
acf_add_local_field_group([
	'key' => 'group_home_contacts',
	'title' => 'Главная: Контакты',
	'fields' => [
		[
			'key' => 'field_home_contacts_tab_content',
			'label' => 'Контент',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'key' => 'field_home_contacts_label',
			'label' => 'Верхняя надпись',
			'name' => 'home_contacts_label',
			'type' => 'text',
		],
		[
			'key' => 'field_home_contacts_title',
			'label' => 'Заголовок',
			'name' => 'home_contacts_title',
			'type' => 'text'
		],
		[
			'key' => 'field_home_contacts_descr',
			'label' => 'Описание',
			'name' => 'home_contacts_descr',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'field_home_contacts_btn',
			'label' => 'Кнопка',
			'name' => 'home_contacts_btn',
			'type' => 'link'
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