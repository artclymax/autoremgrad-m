<?php
$term = get_queried_object();

if (!is_a($term, 'WP_Term'))
	return;

$term_id = $term->term_id;
$term_name = $term->name;
$term_slug = $term->slug;

$label = get_field('page_label', 'services_cat_' . $term_id) ?: $term_name ?? '';
$title = get_field('page_title', 'services_cat_' . $term_id) ?? 'Выберите необходимое направление';
$descr = get_field('page_descr', 'services_cat_' . $term_id) ?? 'Если вы не знаете точную причину неисправности, начните с диагностики автомобиля';

// Все записи этой категории
$services_query = new WP_Query([
	'post_type' => 'services',
	'posts_per_page' => -1,
	'tax_query' => [
		[
			'taxonomy' => 'services_cat',
			'field' => 'term_id',
			'terms' => $term_id,
		]
	],
	'orderby' => 'menu_order',
	'order' => 'ASC',
]);
?>

<?php if ($services_query->have_posts()): ?>
	<section class="section services-cat-page" id="services-cat-page">
		<div class="container services-cat-page__container">
			<div class="services-cat-page__grid">
				<div class="services-cat-page__left">
					<?php get_template_part('partials/section-header', null, [
						'label' => $label,
						'title' => $title,
						'descr' => $descr
					]); ?>
				</div>

				<?php if ($services_query->have_posts()): ?>
					<div class="services-cat-page__right">
						<?php $index = 0;
						while ($services_query->have_posts()):
							$services_query->the_post();
							$index++;
							$service_id = get_the_ID();
							$service_slug = get_post_field('post_name', $service_id);
							$service_title = get_the_title();
							$service_content = get_the_content();

							$is_active = $index === 1 ? ' spoiler-active' : '';
							?>
							<div class="faq-item<?php echo esc_attr($is_active); ?> faq-item-services" data-spoiler>
								<button class="faq-item__btn" data-spoiler-title type="button">
									<h3 class="faq-item__title title-4">
										<?php echo esc_html($service_title); ?>
									</h3>
									<span class="faq-item__icon"></span>
								</button>
								<div class="faq-item__content" data-spoiler-content>
									<?php if ($service_content): ?>
										<div class="faq-item__descr descr">
											<?php echo wp_kses_post($service_content); ?>
										</div>
									<?php endif; ?>

									<div class="faq-item-services__actions">
										<a class="faq-item-services__btn btn" href="#section-services-form">
											Записаться
										</a>
										<a class="faq-item-services__link btn-link" href="<?php echo esc_url(home_url('/prices#' . $term_slug)); ?>">
											Подробнее
										</a>
									</div>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>