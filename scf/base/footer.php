<?php
add_action('acf/init', function () {

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => 'Подвал / Футер',
			'menu_title' => 'Подвал / Футер',
			'menu_slug' => 'opt-footer',
			'position' => 22,
		]);
	}

	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	acf_add_local_field_group([
		'key' => 'group_footer_settings',
		'title' => 'Настройки футера',
		'fields' => [
			[
				'key' => 'field_footer_info_message',
				'label' => 'Инструкция',
				'name' => '',
				'type' => 'message',
				'message' => '<b>Логотип</b> — в <a href="' . esc_url(admin_url('admin.php?page=opt-header')) . '" target="_blank" rel="noopener">Шапке</a>.<br>' .
					'<b>Контакты</b> (телефон, адрес, соцсети) — в <a href="' . esc_url(admin_url('admin.php?page=opt-contacts')) . '" target="_blank" rel="noopener">Контактных данных</a>.<br>' .
					'<b>Меню</b> — в разделе <a href="' . esc_url(admin_url('nav-menus.php')) . '" target="_blank" rel="noopener">Внешний вид → Меню</a> (расположения "footer-nav" и "footer-services").<br>' .
					'Здесь настраиваются только описание под логотипом, ссылки и копирайт.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_footer_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_footer_descr',
				'label' => 'Описание под логотипом',
				'name' => 'footer_descr',
				'type' => 'wysiwyg',
				'instructions' => 'Краткое описание компании под логотипом.',
			],
			[
				'key' => 'field_footer_phone',
				'label' => 'Телефон',
				'name' => 'footer_phone',
				'type' => 'text',
				'instructions' => 'Если не заполнен — берётся первый номер из «Контактные данные».',
			],

			[
				'key' => 'field_footer_tab_links',
				'label' => 'Нижние ссылки',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_footer_links',
				'label' => 'Ссылки слева',
				'name' => 'footer_links',
				'type' => 'repeater',
				'layout' => 'block',
				'button_label' => 'Добавить ссылку',
				'sub_fields' => [
					[
						'key' => 'field_footer_links_link',
						'label' => 'Ссылка',
						'name' => 'footer_links_link',
						'type' => 'link',
					],
				],
				'instructions' => 'Ссылки в левой части нижней панели (например: Политика конфиденциальности).',
			],
			[
				'key' => 'field_footer_links_right',
				'label' => 'Ссылки справа',
				'name' => 'footer_links_right',
				'type' => 'repeater',
				'layout' => 'block',
				'button_label' => 'Добавить ссылку',
				'sub_fields' => [
					[
						'key' => 'field_footer_links_right_link',
						'label' => 'Ссылка',
						'name' => 'footer_links_link',
						'type' => 'link',
					],
				],
				'instructions' => 'Ссылки в правой части нижней панели (например: Политика обработки файлов cookie).',
			],

			[
				'key' => 'field_footer_tab_copy',
				'label' => 'Копирайт',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_footer_company',
				'label' => 'Название компании',
				'name' => 'footer_company',
				'type' => 'text',
				'placeholder' => get_bloginfo('name'),
				'instructions' => 'Для копирайта. По умолчанию берётся из настроек сайта.',
			],
			[
				'key' => 'field_footer_copy',
				'label' => 'Дополнительный текст копирайта',
				'name' => 'footer_copy',
				'type' => 'text',
				'instructions' => 'Например: "Все права защищены"',
			],
		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-footer',
				],
			],
		],
	]);

});