<?php
$page = $args['page'] ?? get_queried_object();
$default_page = 'options';

$label = get_field('home_why_us_label', $page) ?: get_field('home_why_us_label', $default_page) ?? '';
$title = get_field('home_why_us_title', $page) ?: get_field('home_why_us_title', $default_page) ?? '';
$descr = get_field('home_why_us_descr', $page) ?: get_field('home_why_us_descr', $default_page) ?? '';
$image = get_field('home_why_us_image', $page) ?: get_field('home_why_us_image', $default_page) ?? null;
$features = get_field('home_why_us_features', $page) ?: get_field('home_why_us_features', $default_page) ?? [];
$link = get_field('home_why_us_link', $page) ?: get_field('home_why_us_link', $default_page) ?? [];
?>

<?php if ($title || $descr || !empty($features)): ?>
	<section class="home-why-us" id="home-why-us">
		<div class="un-container home-why-us__container">
			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full home-why-us__image image-box">
					<?php echo wp_get_attachment_image(
						$image['ID'],
						'full',
						false,
						array(
							'class' => 'img',
							'alt' => $image['alt'] ?: ''
						)
					); ?>
				</div>
			<?php endif; ?>

			<div class="un-container__content home-why-us__content">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>
				<div class="home-why-us__right">
					<?php if (!empty($features)): ?>
						<div class="home-why-us__features grid">
							<?php foreach ($features as $item):
								$feature_title = $item['title'] ?? '';
								$feature_descr = $item['descr'] ?? '';
								if (!$feature_title && !$feature_descr)
									continue;
								?>
								<div class="home-why-us__feature">
									<?php if ($feature_title): ?>
										<h3 class="home-why-us__feature-title title-3">
											<?php echo esc_html($feature_title); ?>
										</h3>
									<?php endif; ?>

									<?php if ($feature_descr): ?>
										<div class="home-why-us__feature-descr descr">
											<?php echo wp_kses_post($feature_descr); ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php if (!empty($link) && !empty($link['title'])): ?>
						<a class="home-why-us__link btn-link" href="<?= esc_attr($link['url']) ?>">
							<?php echo esc_html($link['title']) ?>
						</a>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</section>
<?php endif; ?>