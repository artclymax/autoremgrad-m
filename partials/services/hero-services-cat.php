<?php

$term = get_queried_object();

if (!is_a($term, 'WP_Term')) {
	get_template_part('404');
	get_footer();
	return;
}

$term_id = $term->term_id;
$term_name = $term->name;
$term_slug = $term->slug;
$term_link = get_term_link($term);

// ACF поля таксономии
$term_thumb = get_field('term-thumb', 'services_cat_' . $term_id) ?? null;
$hero_title = get_field('hero_title', 'services_cat_' . $term_id) ?? $term_name ?? '';
$hero_descr = get_field('hero_descr', 'services_cat_' . $term_id) ?? $term->description ?? '';

$hero_btn = get_field('hero_btn', 'services_cat_' . $term_id) ?? [
	'title' => 'Записаться на диагностику',
	'url' =>
		'#section-services-form'
];
$hero_link = get_field('hero_link', 'services_cat_' . $term_id) ?? [
	'title' => 'Посмотреть услуги',
	'url' =>
		'#services-cat-page'
];

// Все категории для навигации
$all_categories = get_terms([
	'taxonomy' => 'services_cat',
	'hide_empty' => false,
	'orderby' => 'menu_order',
	'order' => 'ASC',
]);
if (is_wp_error($all_categories)) {
	$all_categories = [];
}
?>

<section class="hero-services-category" id="hero-services-category">
	<div class="un-container un-container--reverse hero-services-category__container">
		<!-- Левая колонка -->
		<div class="un-container__content hero-services-category__left">
			<?php get_template_part('partials/hero-page-content', null, [
				'label' => $term_name,
				'title' => $hero_title,
				'descr' => $hero_descr
			]); ?>

			<div class="hero-services-category__actions">
				<?php if (!empty($hero_btn['url'])): ?>
					<a class="hero-services-category__btn btn" href="<?php echo esc_url($hero_btn['url']); ?>" <?php if (!empty($hero_btn['target'])): ?> target="
					<?php echo esc_attr($hero_btn['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($hero_btn['title'] ?? 'Записаться на диагностику'); ?>
					</a>
				<?php endif; ?>

				<?php if (!empty($hero_link['url'])): ?>
					<a class="hero-services-category__link btn-link btn-link--down"
						href="<?php echo esc_url($hero_link['url']); ?>" <?php if (!empty($hero_link['target'])): ?> target="
					<?php echo esc_attr($hero_link['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($hero_link['title'] ?? 'Посмотреть услуги'); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>

		<!-- Правая колонка: изображение -->
		<?php if (!empty($term_thumb) && is_array($term_thumb) && !empty($term_thumb['ID'])): ?>
			<div class="un-container__full hero-services-category__right image-box">
				<?php echo wp_get_attachment_image(
					$term_thumb['ID'],
					'full',
					false,
					array(
						'class' => 'img',
						'alt' => $term_thumb['alt'] ?: $term_name
					)
				); ?>
			</div>
		<?php endif; ?>
	</div>

	<!-- Навигация по категориям -->
	<?php if (!empty($all_categories)): ?>
		<nav class="hero-services-category__nav hero-services-category-nav">
			<div class="hero-services-category-nav__container container">
				<?php foreach ($all_categories as $cat):
					$cat_link = get_term_link($cat);
					if (is_wp_error($cat_link))
						continue;
					$is_active = $cat->term_id === $term_id ? ' active-category' : '';
					?>
					<a class="hero-services-category-nav__link btn-link btn-link--dark <?php echo esc_attr($is_active); ?>"
						href="<?php echo esc_url($cat_link); ?>">
						<?php echo esc_html($cat->name); ?>
					</a>
				<?php endforeach; ?>
			</div>
		</nav>
	<?php endif; ?>
</section>