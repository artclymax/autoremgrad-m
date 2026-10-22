<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('home_about_label', $page) ?? '';
$title = get_field('home_about_title', $page) ?? '';
$descr = get_field('home_about_descr', $page) ?? '';
$link = get_field('home_about_link', $page) ?? [];
$image = get_field('home_about_image', $page) ?? null;
$benefits = get_field('home_about_benefits', $page) ?? [];
?>

<?php if ($title || $descr): ?>
	<section class="home-about" id="home-about">
		<div class="un-container un-container--reverse home-about__container">
			<div class="un-container__content home-about__content">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>

				<?php if (!empty($link['url'])): ?>
					<a class="home-about__link btn-link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($link['title'] ?? 'Подробнее о компании'); ?>
					</a>
				<?php endif; ?>
			</div>

			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full home-about__image image-box">
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
		</div>

		<?php if (!empty($benefits)): ?>
			<div class="home-about__benefits">
				<div class="container home-about__benefits-container">
					<div class="home-about__benefits-grid grid">
						<?php foreach ($benefits as $item):
							$title_first = $item['title_first'] ?? '';
							$title_second = $item['title_second'] ?? '';
							$descr = $item['descr'] ?? '';
							if (!$title_first && !$title_second)
								continue;
							?>
							<div class="home-about__benefits-item home-about-benefits-item">
								<h3 class="home-about-benefits-item__title">
									<span class="home-about-benefits-item__title-first">
										<?php echo esc_html($title_first); ?>
									</span>
									<span class="home-about-benefits-item__title-second">
										<?php echo esc_html($title_second); ?>
									</span>
								</h3>
								<?php if (!empty($descr)): ?>
									<div class="home-about-benefits-item__descr descr">
										<?php echo wp_kses_post($descr) ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>