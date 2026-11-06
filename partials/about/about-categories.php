<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('about_categories_label', $page) ?? '';
$title = get_field('about_categories_title', $page) ?? '';
$descr = get_field('about_categories_descr', $page) ?? '';

// Получаем все категории услуг
$categories = get_terms([
	'taxonomy' => 'services_cat',
	'hide_empty' => false,
	'orderby' => 'menu_order',
	'order' => 'ASC',
]);

if (is_wp_error($categories)) {
	$categories = [];
}
?>

<?php if ($title || !empty($categories)): ?>
	<section class="section about-categories" id="about-categories">
		<div class="container about-categories__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>

			<?php if (!empty($categories)): ?>
				<div class="about-categories__grid grid">
					<?php foreach ($categories as $cat):
						$cat_id = $cat->term_id;
						$cat_name = $cat->name;
						$cat_descr = $cat->description;
						$cat_link = get_term_link($cat);
						$cat_thumb = get_field('term-thumb', 'services_cat_' . $cat_id) ?? null;

						if (is_wp_error($cat_link) || !$cat_name)
							continue;
						?>
						<a class="about-categories__card categories-card" href="<?php echo esc_url($cat_link); ?>">
							<?php if (!empty($cat_thumb) && is_array($cat_thumb) && !empty($cat_thumb['ID'])): ?>
								<div class="categories-card__image image-box">
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

							<div class="categories-card__content">
								<h3 class="categories-card__title title-3">
									<?php echo esc_html($cat_name); ?>
								</h3>

								<?php if ($cat_descr): ?>
									<div class="categories-card__descr descr">
										<?php echo wp_kses_post($cat_descr); ?>
									</div>
								<?php endif; ?>

								<span class="categories-card__link btn-link">
									Посмотреть услуги
								</span>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>