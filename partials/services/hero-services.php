<?php
$page = $args['page'] ?? get_page_by_path('services', OBJECT, 'page');

$label = get_field('hero_page_label', $page) ?? '';
$title = get_field('hero_page_title', $page) ?? get_the_archive_title();
$descr = get_field('hero_page_descr', $page) ?? '';
$selected_cats = get_field('hero_page_selected_cats', $page) ?? [];

if (empty($selected_cats)) {
	$categories = get_terms([
		'taxonomy' => 'services_cat',
		'hide_empty' => false,
		'orderby' => 'menu_order',
		'order' => 'ASC',
	]);
} else {
	$categories = is_array($selected_cats) ? $selected_cats : [$selected_cats];
}

if (is_wp_error($categories)) {
	$categories = [];
}
?>

<section class="hero-services" id="hero-services">
	<div class="container hero-services__container">
		<?php get_template_part('partials/hero-page-content', null, [
			'label' => $label,
			'title' => $title,
			'descr' => $descr
		]); ?>

		<?php if (!empty($categories)): ?>
			<div class="hero-services__right">
				<?php foreach ($categories as $cat):
					$cat_id = is_object($cat) ? $cat->term_id : 0;
					$cat_name = is_object($cat) ? $cat->name : '';
					$cat_descr = is_object($cat) ? $cat->description : '';
					$cat_link = get_term_link($cat);
					$cat_thumb = get_field('term-thumb', 'services_cat_' . $cat_id) ?? null;

					if (is_wp_error($cat_link) || !$cat_name)
						continue;
					?>
					<a class="hero-services__cat services-cat-card" href="<?php echo esc_url($cat_link); ?>">
						<?php if (!empty($cat_thumb) && is_array($cat_thumb) && !empty($cat_thumb['ID'])): ?>
							<div class="services-cat-card__image image-box">
								<?php echo wp_get_attachment_image(
									$cat_thumb['ID'],
									'large',
									false,
									array(
										'class' => 'img',
										'alt' => $cat_thumb['alt'] ?: $cat_name
									)
								); ?>
							</div>
						<?php endif; ?>

						<div class="services-cat-card__content">
							<h3 class="services-cat-card__title title-3">
								<?php echo esc_html($cat_name); ?>
							</h3>

							<?php if ($cat_descr): ?>
								<div class="services-cat-card__descr descr">
									<?php echo wp_kses_post(mx_fix_orphans($cat_descr)); ?>
								</div>
							<?php endif; ?>

							<span class="services-cat-card__link btn-link">
								Смотреть услуги
							</span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>