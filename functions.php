<?php

// vite
//require_once get_template_directory() . '/functions/vite.php';

// === Helpers ===
require_once get_template_directory() . '/functions/helpers/theme_asset_version.php';
require_once get_template_directory() . '/functions/helpers/print_dump.php';
require_once get_template_directory() . '/functions/helpers/mx_logo.php';
//require_once get_template_directory() . '/functions/helpers/mx_pagination.php';
//require_once get_template_directory() . '/functions/helpers/mx_category_list.php';
//require_once get_template_directory() . '/functions/helpers/trim_text.php';
require_once get_template_directory() . '/functions/helpers/correct_phone.php';
//require_once get_template_directory() . '/functions/helpers/smart_breadcrumbs.php';


/* get_json_from_query
$json = get_json_from_query($query);
<div class="select-products-data" data-select-from-acf="<?= esc_attr($json) ?>"></div>
*/
//require_once get_template_directory() . '/functions/helpers/get_json_from_query.php';

/** Добавление картинки для кастомных полей в таблице админки
 * add_admin_thumbnail_column('castom-post-slug'); // projects
 */
//require_once get_template_directory() . '/functions/helpers/add_admin_thumbnail_column.php';
//add_admin_thumbnail_column('portfolio');

//require_once get_template_directory() . '/functions/helpers/get_prev_post_slug.php';
//require_once get_template_directory() . '/functions/helpers/get_next_post_slug.php';
//require_once get_template_directory() . '/functions/helpers/custom_product_category.php';
//require_once get_template_directory() . '/functions/helpers/get_product_attributes_array.php';

// === BASE ====
// Общая настройка темы (лого, название и т.п.)
require_once get_template_directory() . '/functions/default_settings.php';

// Подключение стилей
require_once get_template_directory() . '/functions/connect_styles.php';

// Подключение скриптов
require_once get_template_directory() . '/functions/connect_scripts.php';

// Создание меню
require_once get_template_directory() . '/functions/register_nav_menus.php';

// Регистрация новых записей
require_once get_template_directory() . '/functions/register_post_type.php';

// Убираем записи
require_once get_template_directory() . '/functions/delete_default_post.php';

// Кастомная админка (новая версия)
require_once get_template_directory() . '/functions/admin/admin-page.php';
require_once get_template_directory() . '/functions/admin/plugin-installer.php';
//add_action('admin_init', function() {
//    if (current_user_can('manage_options')) {
//        delete_transient('verda_admin_post_types');
//    }
//});
// Создание SCF-полей
require_once get_template_directory() . '/functions/scf_data.php';

// FIX Orphans (висячие и / пустые символы фигмы)
require_once get_template_directory() . '/functions/fix_orphans.php';

// NXT BREADCRUMBS
require_once get_template_directory() . '/functions/nxt-breadcrumbs.php';
require_once get_template_directory() . '/functions/drag_and_drop_post.php';


add_action('admin_head', function () {
	echo '<style>
        #postexcerpt p {
            display: none !important;
        }
    </style>';
});

// не сжимать фото
//add_filter('big_image_size_threshold', '__return_false');



// === CF7 Redirect: Редирект после отправки формы ===
require_once get_template_directory() . '/functions/cf7-redirect.php';

// === CF7 Leads: Собственная система хранения заявок (замена Flamingo) ===
require_once get_template_directory() . '/functions/cf7-leads.php';

// === CF7: переопределение email получателя через настройки сайта ===
add_filter('wpcf7_mail_components', function ($components, $form) {
	$custom_email = get_option('form_email_to');

	if (!empty($custom_email) && is_email($custom_email)) {
		$components['recipient'] = $custom_email;
	}

	return $components;
}, 10, 2);

add_filter('wpcf7_autop', '__return_false', 20);
add_filter('wpcf7_form_elements', function ($content) {
	//$content = preg_replace('/<span class="wpcf7-form-control-wrap.*?">(.*?)<\/span>/is', '$1', $content);
	$content = str_replace('<br />', '', $content);
	return $content;
});


function sort_all_post_types_by_menu_order($query)
{

	if (is_admin() || !$query->is_main_query()) {
		return;
	}


	$post_type = $query->get('post_type');


	if (empty($post_type) || $post_type === 'any' || is_array($post_type) || is_string($post_type)) {
		$query->set('orderby', 'menu_order');
		$query->set('order', 'ASC');
	}
}
add_action('pre_get_posts', 'sort_all_post_types_by_menu_order', 99);


//!=== WOOCOMMERCE ===
//require_once get_template_directory() . '/functions/woocommerce/base.php';
//require_once get_template_directory() . '/functions/woocommerce/current.php';

add_action('wp_ajax_load_more_projects', 'load_more_projects_callback');
add_action('wp_ajax_nopriv_load_more_projects', 'load_more_projects_callback');

function load_more_projects_callback()
{
	// 1. Проверка безопасности (nonce)
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'projects_load_more_nonce')) {
		wp_send_json_error('Ошибка безопасности');
	}

	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$per_page = isset($_POST['per_page']) ? intval($_POST['per_page']) : get_option('posts_per_page');
	$cat = isset($_POST['cat']) ? sanitize_text_field($_POST['cat']) : '';

	$args = [
		'post_type' => 'projects',
		'posts_per_page' => $per_page,
		'paged' => $page,
		'orderby' => 'date',
		'order' => 'DESC',
	];

	if ($cat) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'projects_cat',
				'field' => 'slug',
				'terms' => $cat,
			]
		];
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		ob_start();

		while ($query->have_posts()) {
			$query->the_post();
			$project_id = get_the_ID();
			$tags = get_the_terms($project_id, 'projects_tag');

			$gallery_ids = get_field('projects_gallery', $project_id) ?? [];
			if (!is_array($gallery_ids))
				$gallery_ids = [];

			$thumb_id = get_post_thumbnail_id($project_id);
			$all_images = !empty($gallery_ids) ? $gallery_ids : ($thumb_id ? [$thumb_id] : []);
			$all_images = array_values(array_unique($all_images));

			$first_image_url = !empty($all_images) ? wp_get_attachment_image_url($all_images[0], 'large') : '';
			$fancybox_group = 'project-' . $project_id;

			if ($first_image_url):
				?>
				<a class="projects-page__card projects-card" href="<?php echo esc_url($first_image_url); ?>"
					data-fancybox="<?php echo esc_attr($fancybox_group); ?>">
					<?php if (has_post_thumbnail()): ?>
						<div class="projects-card__image image-box">
							<?php the_post_thumbnail('large', ['class' => 'img', 'alt' => get_the_title()]); ?>
						</div>
					<?php endif; ?>

					<div class="projects-card__content">
						<h3 class="projects-card__title title-4"><?php the_title(); ?></h3>
						<?php if (!empty($tags) && !is_wp_error($tags)): ?>
							<div class="projects-card__tags">
								<span
									class="projects-card__tags-text"><?php echo esc_html(implode(' • ', wp_list_pluck($tags, 'name'))); ?></span>
							</div>
						<?php endif; ?>
					</div>
				</a>

				<?php if (count($all_images) > 1): ?>
					<?php foreach ($all_images as $i => $img_id): ?>
						<?php if ($i === 0)
							continue; ?>
						<a class="projects-page__gallery-link" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'large')); ?>"
							data-fancybox="<?php echo esc_attr($fancybox_group); ?>" style="display:none;"></a>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php
			endif;
		}

		$html = ob_get_clean();
		wp_reset_postdata();

		wp_send_json_success(['html' => $html]);
	} else {
		wp_send_json_error('Записи не найдены');
	}

	wp_die(); // Обязательно завершаем выполнение скрипта
}
add_action('wp_enqueue_scripts', function () {
	// 2. ДОБАВЬТЕ ЭТО СРАЗУ ПОСЛЕ wp_enqueue_script для 'main'
	wp_localize_script(wp_get_theme()->get_stylesheet()
		. '-main', 'projectsAjax', [
		'url' => admin_url('admin-ajax.php'), // WordPress сам создаст правильный путь, даже если сайт в папке
		'nonce' => wp_create_nonce('projects_load_more_nonce'),
	]);
	
	wp_localize_script(wp_get_theme()->get_stylesheet()
		. '-main', 'reviewsAjax', [
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('reviews_load_more_nonce'),
	]);
});

// AJAX загрузка отзывов
add_action('wp_ajax_load_more_reviews', 'load_more_reviews_callback');
add_action('wp_ajax_nopriv_load_more_reviews', 'load_more_reviews_callback');

function load_more_reviews_callback()
{
	// Проверка безопасности (nonce)
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'reviews_load_more_nonce')) {
		wp_send_json_error('Ошибка безопасности');
	}

	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$per_page = isset($_POST['per_page']) ? intval($_POST['per_page']) : 6;

	$args = [
		'post_type' => 'reviews',
		'posts_per_page' => $per_page,
		'paged' => $page,
		'orderby' => 'menu_order',
		'order' => 'ASC',
	];

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		ob_start();

		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('partials/reviews-card');
		}

		$html = ob_get_clean();
		wp_reset_postdata();

		wp_send_json_success(['html' => $html]);
	} else {
		wp_send_json_error('Отзывы не найдены');
	}

	wp_die();
}