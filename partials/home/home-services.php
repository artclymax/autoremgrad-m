<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('home_services_label', $page) ?? '';
$title = get_field('home_services_title', $page) ?? '';
$descr = get_field('home_services_descr', $page) ?? '';
$link = get_field('home_services_link', $page) ?? [];
$selected_ids = get_field('home_services_selected', $page) ?? [];

if (empty($selected_ids)) {
	$services_query = new WP_Query([
		'post_type' => 'services',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
	]);
} else {
	$services_query = new WP_Query([
		'post_type' => 'services',
		'posts_per_page' => -1,
		'post__in' => (array) $selected_ids,
		'orderby' => 'post__in',
	]);
}
?>

<?php if ($title || $descr || $services_query->have_posts()): ?>
	<section class="section home-services" id="home-services">
		<div class="container home-services__container">

			<?php get_template_part('partials/section-header-horizontal', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
				'link' => $link
			]); ?>

			<?php if ($services_query->have_posts()): ?>
				<div class="home-services__grid grid">
					<?php $index = 0;
					while ($services_query->have_posts()):
						$services_query->the_post();
						$index++;
						$number = $index > 9 ? $index : '0' . $index;
						$service_id = get_the_ID();
						$link_service = get_permalink();
						?>
						<a class="home-services__card services-card" href="<?php echo esc_url($link_service); ?>">
							<?php if (has_post_thumbnail()): ?>
								<div class="services-card__image image-box">
									<?php the_post_thumbnail('large', [
										'class' => 'img',
										'alt' => get_the_title()
									]); ?>
								</div>
							<?php endif; ?>

							<div class="services-card__content">
								<div class="services-card__number title-4">
									<?php echo esc_html($number); ?>
								</div>

								<h3 class="services-card__title title-3">
									<?php the_title(); ?>
								</h3>

								<?php if (has_excerpt()): ?>
									<div class="services-card__descr descr">
										<?php the_excerpt(); ?>
									</div>
								<?php endif; ?>

								<span class="services-card__link-text btn-link">
									<?php esc_html_e('Подробнее', 'textdomain'); ?>
								</span>
							</div>
						</a>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>