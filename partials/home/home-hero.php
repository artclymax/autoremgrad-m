<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('home_hero_label', $page) ?? '';
$title = get_field('home_hero_title', $page) ?? get_the_title();
$descr = get_field('home_hero_descr', $page) ?? '';
$btn = get_field('home_hero_btn', $page) ?? [];
$image = get_field('home_hero_image', $page) ?? null;
$services = get_field('home_hero_services', $page) ?? [];
?>

<?php if ($title || !empty($services)): ?>
	<section class="home-hero" id="home-hero">
		<div class="un-container home-hero__container">
			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full home-hero__image image-box hidden-mobile">
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
			<div class="un-container__content home-hero__wrapper">
				<div class="home-hero__content">
					<div class="home-hero__text-wrapper">

							<?php if ($label): ?>
							<span class="home-hero__label label">
									<?php echo esc_html($label); ?>
							</span>
							<?php endif; ?>

							<?php if ($title): ?>
							<h1 class="home-hero__title title-2">
									<?php echo esc_html($title); ?>
							</h1>
							<?php endif; ?>

							<?php if ($descr): ?>
							<div class="home-hero__descr descr">
									<?php echo wp_kses_post($descr); ?>
							</div>
							<?php endif; ?>

					</div>
					<?php if (!empty($btn['url'])): ?>
						<a class="home-hero__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($btn['title'] ?? 'Выбрать услугу'); ?>
						</a>
					<?php endif; ?>
				</div>

				<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
					<div class="home-hero__image image-box visible-mobile">
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

				<?php if (!empty($services)): ?>
					<div class="home-hero__services">
						<?php foreach ($services as $item):
							$link = $item['link'] ?: ['url' => home_url('/services')];
							$title = $item['title'] ?? '';
							if (!$title)
								continue;
							?>
							<a class="home-hero__services-item hero-services-item" href="<?php echo esc_url($link['url'] ?? ''); ?>">
								<?php if (!empty($link['title'])): ?>
									<span class="hero-services-item__link-text btn-link">
										<?php echo esc_html($link['title']); ?>
									</span>
								<?php endif; ?>

								<?php if ($title): ?>
									<h3 class="hero-services-item__title title-3">
										<?php echo esc_html($title); ?>
									</h3>
								<?php endif; ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>


		</div>
	</section>
<?php endif; ?>