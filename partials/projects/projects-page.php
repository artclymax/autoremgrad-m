<?php
$page = get_queried_object();

// Получаем все категории проектов для фильтра
$categories = get_terms([
	'taxonomy' => 'projects_cat',
	'hide_empty' => true,
	'orderby' => 'menu_order',
	'order' => 'ASC',
]);

if (is_wp_error($categories)) {
	$categories = [];
}

// Настройки пагинации
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page = get_option('posts_per_page'); // Берём из настроек WordPress

$args = [
	'post_type' => 'projects',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged,
	'orderby' => 'date',
	'order' => 'DESC',
];

// Фильтр по категории
$current_cat = get_query_var('projects_cat');
if ($current_cat) {
	$args['tax_query'] = [
		[
			'taxonomy' => 'projects_cat',
			'field' => 'slug',
			'terms' => $current_cat,
		]
	];
}

$projects_query = new WP_Query($args);
?>

<section class="section projects-page" id="projects-page">
	<div class="container projects-page__container">
		<!-- Заголовок -->
		<div class="projects-page__header">
			<span class="projects-page__label label">
				Вид транспорта
			</span>

		<!-- Фильтр по категориям -->
		<?php if (!empty($categories)): ?>
			<div class="projects-page__filter">
				<a class="projects-page__filter-link<?php echo !$current_cat ? ' active' : ''; ?>"
					href="<?php echo esc_url(get_post_type_archive_link('projects')); ?>">
					Все работы
				</a>
				<?php foreach ($categories as $cat): ?>
					<a class="projects-page__filter-link<?php echo ($current_cat === $cat->slug) ? ' active' : ''; ?>"
						href="<?php echo esc_url(get_term_link($cat)); ?>">
						<?php echo esc_html($cat->name); ?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		</div>

		<!-- Сетка проектов -->
		<div class="projects-page__grid" id="projects-grid"
			data-projects-per-page="<?php echo esc_attr($posts_per_page); ?>">
			<?php if ($projects_query->have_posts()): ?>
				<?php $index = 0;
				while ($projects_query->have_posts()):
					$projects_query->the_post();
					$index++;
					$project_id = get_the_ID();
					$tags = get_the_terms($project_id, 'projects_tag');

					// Галерея из ACF (массив ID)
					$gallery_ids = get_field('projects_gallery', $project_id) ?? [];
					if (!is_array($gallery_ids))
						$gallery_ids = [];

					// Featured image
					$thumb_id = get_post_thumbnail_id($project_id);

					// Формируем итоговый список изображений: галерея + featured (если нет в галерее)
					$all_images = !empty($gallery_ids) ? $gallery_ids : ($thumb_id ? [$thumb_id] : []);

					// Убираем дубликаты и сохраняем порядок
					$all_images = array_values(array_unique($all_images));

					// Первое изображение — для href карточки
					$first_image_url = !empty($all_images)
						? wp_get_attachment_image_url($all_images[0], 'large')
						: '';

					$fancybox_group = 'project-' . $project_id;
					?>
					<?php if ($first_image_url): ?>
						<a class="projects-page__card projects-card" href="<?php echo esc_url($first_image_url); ?>"
							data-fancybox="<?php echo esc_attr($fancybox_group); ?>">
							<?php if (has_post_thumbnail()): ?>
								<div class="projects-card__image image-box">
									<?php the_post_thumbnail('large', [
										'class' => 'img',
										'alt' => get_the_title()
									]); ?>
								</div>
							<?php endif; ?>

							<div class="projects-card__content">
								<h3 class="projects-card__title title-4">
									<?php the_title(); ?>
								</h3>

								<?php if (!empty($tags) && !is_wp_error($tags)): ?>
									<div class="projects-card__tags">
										<?php $tag_names = wp_list_pluck($tags, 'name'); ?>
										<span class="projects-card__tags-text">
											<?php echo esc_html(implode(' • ', $tag_names)); ?>
										</span>
									</div>
								<?php endif; ?>
							</div>
						</a>

						<?php if (count($all_images) > 1): ?>
							<?php foreach ($all_images as $i => $img_id): ?>
								<?php if ($i === 0)
									continue; ?>
								<a class="projects-page__gallery-link"
									href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'large')); ?>"
									data-fancybox="<?php echo esc_attr($fancybox_group); ?>" style="display:none;"></a>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endwhile;
				wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>

		<!-- Кнопка "Показать ещё" -->
		<?php if ($projects_query->have_posts() && $projects_query->found_posts > $posts_per_page): ?>
			<div class="projects-page__load-more">
				<button class="projects-page__load-more-btn btn btn--outline" type="button" data-projects-load-more
					data-current-page="1" data-total-pages="<?php echo esc_attr($projects_query->max_num_pages); ?>"
					data-current-cat="<?php echo esc_attr($current_cat); ?>">
					Показать ещё работы
				</button>
			</div>
		<?php endif; ?>
	</div>
</section>