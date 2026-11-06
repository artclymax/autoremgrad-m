<?php
add_action('init', function () {
	// Таксономия категорий услуг
	register_taxonomy('services_cat', 'services', [
		'labels' => [
			'name' => 'Категории услуг',
			'singular_name' => 'Категория услуги',
			'menu_name' => 'Категории',
			'search_items' => 'Найти категорию',
			'all_items' => 'Все категории',
			'parent_item' => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item' => 'Редактировать категорию',
			'update_item' => 'Обновить категорию',
			'add_new_item' => 'Добавить категорию',
			'new_item_name' => 'Новая категория',
		],
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'services-cat'],
	]);

	register_post_type('services', [
		'labels' => [
			'name' => 'Услуги',
			'singular_name' => 'Услуга',
			'menu_name' => 'Услуги',
			'add_new' => 'Добавить услугу',
			'add_new_item' => 'Добавить новую услугу',
			'edit_item' => 'Редактировать услугу',
			'new_item' => 'Новая услуга',
			'view_item' => 'Просмотреть услугу',
			'search_items' => 'Найти услуги',
			'not_found' => 'Услуги не найдены',
			'not_found_in_trash' => 'В корзине услуг не найдено',
		],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-hammer',
		'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
		'rewrite' => ['slug' => 'services'],
		'has_archive' => true,
		'menu_position' => 10,
		'taxonomies' => ['services_cat'],
	]);
});

add_action('init', function () {
	register_taxonomy('projects_cat', 'projects', [
		'labels' => [
			'name' => 'Вид транспорта',
			'singular_name' => 'Вид транспорта',
			'menu_name' => 'Вид транспорта',
			'search_items' => 'Найти вид транспорта',
			'all_items' => 'Все виды транспорта',
			'parent_item' => 'Родительский вид',
			'parent_item_colon' => 'Родительский вид:',
			'edit_item' => 'Редактировать вид',
			'update_item' => 'Обновить вид',
			'add_new_item' => 'Добавить вид транспорта',
			'new_item_name' => 'Новый вид транспорта',
		],
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'projects-cat'],
	]);

	// Таксономия "Типы работ" (теги, неиерархическая)
	register_taxonomy('projects_tag', 'projects', [
		'labels' => [
			'name' => 'Типы работ',
			'singular_name' => 'Тип работы',
			'menu_name' => 'Типы работ',
			'search_items' => 'Найти тип работы',
			'all_items' => 'Все типы работ',
			'edit_item' => 'Редактировать тип',
			'update_item' => 'Обновить тип',
			'add_new_item' => 'Добавить тип работы',
			'new_item_name' => 'Новый тип работы',
			'separate_items_with_commas' => 'Разделять запятыми',
			'choose_from_most_used' => 'Выбрать из популярных',
		],
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'projects'],
	]);

	// CPT проектов
	register_post_type('projects', [
		'labels' => [
			'name' => 'Проекты',
			'singular_name' => 'Проект',
			'menu_name' => 'Наши работы',
			'add_new' => 'Добавить проект',
			'add_new_item' => 'Добавить новый проект',
			'edit_item' => 'Редактировать проект',
			'new_item' => 'Новый проект',
			'view_item' => 'Просмотреть проект',
			'search_items' => 'Найти проекты',
			'not_found' => 'Проекты не найдены',
			'not_found_in_trash' => 'В корзине проектов не найдено',
		],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-camera',
		'supports' => ['title', 'editor', 'thumbnail'],
		'rewrite' => ['slug' => 'procects'],
		'has_archive' => 'projects',
		'taxonomies' => ['projects_cat', 'projects_tag'],
		'menu_position' => 10
	]);
});

add_action('init', function () {
	register_post_type('reviews', [
		'labels' => [
			'name' => 'Отзывы',
			'singular_name' => 'Отзыв',
			'menu_name' => 'Отзывы',
			'add_new' => 'Добавить отзыв',
			'add_new_item' => 'Добавить новый отзыв',
			'edit_item' => 'Редактировать отзыв',
			'new_item' => 'Новый отзыв',
			'view_item' => 'Просмотреть отзыв',
			'search_items' => 'Найти отзывы',
			'not_found' => 'Отзывы не найдены',
			'not_found_in_trash' => 'В корзине отзывов не найдено',
		],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-format-quote',
		'supports' => ['title', 'editor'],
		'rewrite' => false,
		'has_archive' => false,
		'menu_position' => 10
	]);
});