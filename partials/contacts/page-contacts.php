<?php
$label = get_field('contacts_block_top_label', 'option') ?? '';
$title = get_field('contacts_block_title', 'option') ?? '';
$descr = get_field('contacts_block_descr', 'option') ?? '';
$btn = get_field('contacts_block_btn', 'option') ?? [];
$phones = get_field('contacts_phones', 'option') ?? [];
$address = get_field('contacts_address', 'option') ?? '';
$time = get_field('contacts_time', 'option') ?? [];
$map = get_field('contacts_map', 'option') ?? '';
?>

<?php if ($title || $map): ?>
	<section class="section page-contacts" id="page-contacts">
		<div class="container page-contacts__container">
			<!-- Левая колонка -->
			<div class="page-contacts__left">
				<div class="page-contacts__header">
					<div class="page-contacts__breadcrumbs">
						<div class="page-breadcrumbs">
							<?php if (function_exists('bcn_display')) {
								bcn_display();
							} ?>
						</div>
					</div>
					<?php get_template_part('partials/section-header', null, [
						'label' => $label,
						'title' => $title,
						'descr' => $descr,
						'title_tag' => 'h1',
						'title_class' => 'title-3'
					]); ?>
				</div>

				<div class="page-contacts__info">
					<!-- Телефоны -->
					<?php if (!empty($phones)): ?>
						<div class="page-contacts__info-item">
							<span class="page-contacts__info-label">Телефон</span>
							<div class="page-contacts__info-text page-contacts__phones">
								<?php foreach ($phones as $phone_item):
									$phone_number = $phone_item['phone'] ?? '';
									if (!$phone_number)
										continue;
									?>
									<a class="page-contacts__phone link"
										href="tel:+<?php echo esc_attr(correct_phone($phone_number)); ?>">
										<?php echo esc_html($phone_number); ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

					<!-- Адрес -->
					<?php if ($address): ?>
						<div class="page-contacts__info-item">
							<span class="page-contacts__info-label">Адрес</span>
							<div class="page-contacts__info-text page-contacts__address">
								<?php echo esc_html($address); ?>
							</div>
						</div>
					<?php endif; ?>

					<!-- Режим работы -->
					<?php if (!empty($time)): ?>
						<div class="page-contacts__info-item">
							<span class="page-contacts__info-label">Режим работы</span>
							<div class="page-contacts__info-text page-contacts__hours descr">
								<?php echo wp_kses_post($time) ?>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<?php if (!empty($btn['url'])): ?>
					<a class="page-contacts__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
					<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($btn['title'] ?? 'Запись на обслуживание'); ?>
					</a>
				<?php endif; ?>
			</div>

			<!-- Правая колонка: карта -->
			<?php if ($map): ?>
				<div class="page-contacts__map">
					<?php echo wp_kses($map, [
						'iframe' => [
							'src' => true,
							'width' => true,
							'height' => true,
							'style' => true,
							'allowfullscreen' => true,
							'loading' => true,
							'frameborder' => true,
						],
					]); ?>
				</div>
			<?php endif; ?>
		</div>
		</section>
<?php endif; ?>