<?php

$page = get_queried_object();
$default_page = 'option';

$label = get_field('price_page_label', $page) ?: get_field('price_page_label', $default_page) ?? '';
$title = get_field('price_page_title', $page) ?: get_field('price_page_title', $default_page) ?? '';
$descr = get_field('price_page_descr', $page) ?: get_field('price_page_descr', $default_page) ?? '';

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
<?php if (!empty($categories)): ?>
	<nav class="hero-services-category-nav prices-page__nav--top">
		<div class="hero-services-category-nav__container container">
			<?php foreach ($categories as $index => $cat): ?>
				<?php
				$tab_href = '#' . esc_attr($cat->slug);
				$is_active = $index === 0 ? ' active-cat' : '';

				?>
				<a class="hero-services-category-nav__link btn-link btn-link--dark <?php echo esc_attr($is_active); ?>"
					href="<?php echo esc_url($tab_href); ?>" data-cat-link>
					<?php echo esc_html($cat->name); ?>
				</a>
			<?php endforeach; ?>
		</div>
	</nav>
<?php endif; ?>
<section class="section prices-page" id="prices-page">
	<div class="container prices-page__container">

		<?php if (!empty($categories)): ?>


			<!-- УРОВЕНЬ 1: Контент категорий (используем data-cat-*) -->
			<?php foreach ($categories as $cat_index => $cat):
				$services = get_posts([
					'post_type' => 'services',
					'posts_per_page' => -1,
					'tax_query' => [
						[
							'taxonomy' => 'services_cat',
							'field' => 'term_id',
							'terms' => $cat->term_id,
						]
					],
					'orderby' => 'menu_order',
					'order' => 'ASC',
				]);

				if (!empty($services)) {
					?>

					<div class="prices-page__tab<?php echo $cat_index === 0 ? ' active-cat' : ''; ?>"
						id="<?php echo esc_attr($cat->slug); ?>" data-cat-tab>

						<div class="prices-page__tab-wrapper">
							<?php
							$term = $cat;
							$term_id = $cat->term_id;
							$term_name = $cat->name;
							$term_slug = $cat->slug;

							$term_label = get_field('price_page_label', 'services_cat_' . $term_id) ?: $label ?? '';
							$term_title = get_field('price_page_title', 'services_cat_' . $term_id) ?: $title ?? '';
							$term_descr = get_field('price_page_descr', 'services_cat_' . $term_id) ?: $descr ?? '';

							get_template_part('partials/section-header', null, [
								'label' => $term_label,
								'title' => $term_title,
								'descr' => $term_descr
							]); ?>
							<div class="prices-page__grid">
								<!-- УРОВЕНЬ 2: Навигация услуг (используем data-svc-*) -->
								<div class="prices-page__services-nav">
									<?php foreach ($services as $svc_index => $service): ?>
										<a class="prices-page__service-link btn-link btn-link--dark<?php echo $svc_index === 0 ? ' active-svc' : ''; ?>"
											href="#<?php echo esc_attr($cat->slug . '-' . $service->post_name); ?>" data-svc-link>
											<?php echo esc_html($service->post_title); ?>
										</a>
									<?php endforeach; ?>
								</div>

								<!-- УРОВЕНЬ 2: Контент услуг (используем data-svc-*) -->
								<div class="prices-page__services-content">
									<?php foreach ($services as $svc_index => $service):
										$price_descr = get_field('services_price_descr', $service->ID) ?? '';
										$price_items = get_field('services_price_items', $service->ID) ?? [];
										$price_link = get_field('services_price_link', $service->ID) ?? [];
										?>
										<div class="prices-page__service-content-item<?php echo $svc_index === 0 ? ' active-svc' : ''; ?>"
											id="<?php echo esc_attr($cat->slug . '-' . $service->post_name); ?>" data-svc-tab>

											<h3 class="prices-page__service-title title-3">
												<?php echo esc_html($service->post_title); ?>
											</h3>


											<?php if (!empty($price_items)): ?>
												<table class="prices-page__table">
													<thead>
														<tr>
															<th class="prices-page__table-th">Услуга</th>
															<th class="prices-page__table-th">Стоимость</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($price_items as $item):
															$item_name = $item['name'] ?? '';
															$item_cost = $item['cost'] ?? '';
															if (!$item_name)
																continue;
															?>
															<tr class="prices-page__table-row">
																<td class="prices-page__table-td"><?php echo esc_html($item_name); ?></td>
																<td class="prices-page__table-td prices-page__table-td--cost">
																	<?php echo esc_html($item_cost); ?>
																</td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											<?php endif; ?>

											<?php if ($price_descr): ?>
												<div class="prices-page__service-descr descr">
													<?php echo wp_kses_post($price_descr); ?>
												</div>
											<?php endif; ?>
											
											<?php if (!empty($price_link['url'])): ?>
												<a class="prices-page__btn btn" href="<?php echo esc_url($price_link['url']); ?>" <?php if (!empty($price_link['target'])): ?> target="<?php echo esc_attr($price_link['target']); ?>"
													<?php endif; ?>>
													<?php echo esc_html($price_link['title'] ?? 'Записаться'); ?>
												</a>
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="prices-page__tab<?php echo $cat_index === 0 ? ' active-cat' : ''; ?>"
						id="<?php echo esc_attr($cat->slug); ?>" data-cat-tab>

						<div class="prices-page__tab-wrapper">
							<?php
							$term = $cat;
							$term_id = $cat->term_id;
							$term_name = $cat->name;
							$term_slug = $cat->slug;

							$term_label = get_field('price_page_label', 'services_cat_' . $term_id) ?: $label ?? '';
							$term_title = get_field('price_page_title', 'services_cat_' . $term_id) ?: $title ?? '';
							$term_descr = get_field('price_page_descr', 'services_cat_' . $term_id) ?: $descr ?? '';

							get_template_part('partials/section-header', null, [
								'label' => $term_label,
								'title' => $term_title,
								'descr' => $term_descr
							]); ?>
							<div class="prices-page__not-found">
								<p class="title-3">Услуги для данной категории не найдены</p>
							</div>
						</div>
					</div>
				<?php }
			endforeach; ?>
		<?php endif; ?>
	</div>
</section>