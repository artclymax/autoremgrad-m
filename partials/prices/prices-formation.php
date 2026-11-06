<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('prices_formation_label', $page) ?? '';
$title = get_field('prices_formation_title', $page) ?? '';
$descr = get_field('prices_formation_descr', $page) ?? '';
$items = get_field('prices_formation_items', $page) ?? [];
$footer_descr = get_field('prices_formation_footer_descr', $page) ?? '';
$btn = get_field('prices_formation_btn', $page) ?? [];
$image = get_field('prices_formation_image', $page) ?? null;
?>

<?php if ($title || !empty($items)): ?>
	<section class="prices-formation" id="prices-formation">
		<div class="un-container prices-formation__container">
			<!-- Левая колонка: изображение -->
			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full prices-formation__image image-box">
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

			<!-- Правая колонка: контент -->
			<div class="un-container__content prices-formation__content">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>

				<?php if (!empty($items)): ?>
					<div class="prices-formation__list">
						<?php $index = 0;
						foreach ($items as $item):
							$index++;
							$item_number = $index > 9 ? $index : '0' . $index;
							$item_title = $item['title'] ?? '';
							$item_descr = $item['descr'] ?? '';
							if (!$item_title && !$item_descr)
								continue;
							?>
							<div class="prices-formation__item prices-formation-item">
									<span class="prices-formation-item__item-number title-3">
										<?php echo esc_html($item_number); ?>
									</span>
									<?php if ($item_title): ?>
										<h3 class="prices-formation-item__item-title title-3">
											<?php echo esc_html($item_title); ?>
										</h3>
									<?php endif; ?>

								<?php if ($item_descr): ?>
									<div class="prices-formation-item__item-descr descr">
										<?php echo wp_kses_post($item_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ($footer_descr): ?>
					<div class="prices-formation__footer-descr descr">
						<?php echo wp_kses_post($footer_descr); ?>
					</div>
				<?php endif; ?>

				<?php if (!empty($btn['url'])): ?>
					<a class="prices-formation__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
				<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($btn['title'] ?? 'Рассчитать стоимость'); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>