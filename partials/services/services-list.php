<?php
$page = $args['page'] ?? get_page_by_path('services', OBJECT, 'page');
$label = get_field('archive_services_list_label', $page) ?? '';
$title = get_field('archive_services_list_title', $page) ?? '';
$descr = get_field('archive_services_list_descr', $page) ?? '';
$link = get_field('archive_services_list_link', $page) ?? [];
$selected_cats = get_field('archive_services_list_selected_cats', $page) ?? [];

$args = [
	'post_type' => 'services',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
];

if (!empty($selected_cats)) {
	$cat_ids = [];
	foreach ((array) $selected_cats as $cat) {
		$cat_ids[] = is_object($cat) ? $cat->term_id : $cat;
	}
	$args['tax_query'] = [
		[
			'taxonomy' => 'services_cat',
			'field' => 'term_id',
			'terms' => $cat_ids,
		]
	];
}

$services_query = new WP_Query($args);
?>

<?php if ($services_query->have_posts()): ?>
	<section class="section services-list" id="services-list">
		<div class="container services-list__container">
			<div class="services-list__header">
				<?php if ($label): ?>
					<span class="services-list__label label">
						<?php echo esc_html($label); ?>
					</span>
				<?php endif; ?>
				<div class="services-list__header-left">
					<?php if ($title): ?>
						<h2 class="services-list__title title-2">
							<?php echo esc_html($title); ?>
						</h2>
					<?php endif; ?>
				</div>

				<div class="services-list__header-right">
					<?php if ($descr): ?>
						<div class="services-list__descr descr">
							<?php echo wp_kses_post($descr); ?>
						</div>
					<?php endif; ?>

					<?php if (!empty($link['url'])): ?>
						<a class="services-list__link btn-link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($link['title'] ?? 'Смотреть все услуги'); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>

			<?php if ($services_query->have_posts()): ?>
				<div class="services-list__grid">
					<?php while ($services_query->have_posts()):
						$services_query->the_post();
						$service_id = get_the_ID();
						$service_link = get_permalink();
						$service_title = get_the_title();
						$service_excerpt = get_the_excerpt();
						?>
						<a class="services-list__card services-list-card" href="<?php echo esc_url($service_link); ?>">
							<div class="services-list-card__content">
								<h3 class="services-list-card__title title-4">
									<?php echo esc_html($service_title); ?>
								</h3>

								<?php if ($service_excerpt): ?>
									<div class="services-list-card__descr descr">
										<?php echo wp_kses_post(mx_fix_orphans($service_excerpt)); ?>
									</div>
								<?php endif; ?>
							</div>
						</a>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>