<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('home_why_us_label', $page) ?? '';
$title = get_field('home_why_us_title', $page) ?? '';
$descr = get_field('home_why_us_descr', $page) ?? '';
$image = get_field('home_why_us_image', $page) ?? null;
$features = get_field('home_why_us_features', $page) ?? [];
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
			</div>
		</div>
	</section>
<?php endif; ?>