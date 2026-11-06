<?php
$page = $args['page'] ?? get_queried_object();
$default_page = 'option';
$label = get_field('home_projects_label', $page) ?: get_field('home_projects_label', $default_page) ?? '';
$title = get_field('home_projects_title', $page) ?: get_field('home_projects_title', $default_page) ?? '';
$descr = get_field('home_projects_descr', $page) ?: get_field('home_projects_descr', $default_page) ?? '';
$link = get_field('home_projects_link', $page) ?: get_field('home_projects_link', $default_page) ?? [];
$selected_ids = get_field('home_projects_selected', $page) ?: get_field('home_projects_selected', $default_page) ?? [];

if (empty($selected_ids)) {
	$projects_query = new WP_Query([
		'post_type' => 'projects',
		'posts_per_page' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
	]);
} else {
	$projects_query = new WP_Query([
		'post_type' => 'projects',
		'posts_per_page' => 3,
		'post__in' => (array) $selected_ids,
		'orderby' => 'post__in',
	]);
}
?>

<?php if ($title || $descr || $projects_query->have_posts()): ?>
	<section class="section home-projects" id="home-projects">
		<div class="container home-projects__container">
			<div class="home-projects__header section-header-decor">
				<?php get_template_part('partials/section-header-horizontal', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr,
					'link' => $link
				]); ?>
			</div>

			<?php if ($projects_query->have_posts()): ?>
				<div class="home-projects__grid">
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
							<a class="home-projects__card projects-card<?php echo $index === 1 ? ' projects-card--featured' : ''; ?>"
								href="<?php echo esc_url($first_image_url); ?>" data-fancybox="<?php echo esc_attr($fancybox_group); ?>">
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
									<a class="home-projects__gallery-link"
										href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'large')); ?>"
										data-fancybox="<?php echo esc_attr($fancybox_group); ?>" style="display:none;"></a>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endif; ?>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>