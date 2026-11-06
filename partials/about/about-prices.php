<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('about_prices_label', $page) ?? '';
$title = get_field('about_prices_title', $page) ?? '';
$descr = get_field('about_prices_descr', $page) ?? '';
$image = get_field('about_prices_image', $page) ?? null;
$items = get_field('about_prices_items', $page) ?? [];
$footer_descr = get_field('about_prices_footer_descr', $page) ?? '';
?>

<?php if ($title || !empty($items)): ?>
	<section class="section about-prices" id="about-prices">
		<div class="container about-prices__header-container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>
		</div>
		<div class="un-container about-prices__container">
			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full about-prices__image image-box">
					<?php echo wp_get_attachment_image(
						$image['ID'],
						'large',
						false,
						array(
							'class' => 'img',
							'alt' => $image['alt'] ?: ''
						)
					); ?>
				</div>
			<?php endif; ?>
			<div class="un-container__content about-prices__right">
				<div class="about-prices__list">
					<?php if (!empty($items)): ?>
						<?php $index = 0;
						foreach ($items as $item):
							$index++;
							$item_number = $index > 9 ? $index : '0' . $index;
							$item_title = $item['title'] ?? '';
							$item_descr = $item['descr'] ?? '';
							if (!$item_title && !$item_descr)
								continue;
							?>
							<div class="about-prices__item prices-formation-item">
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
					<?php endif; ?>


				</div>
				<?php if ($footer_descr): ?>
					<div class="about-prices__footer-descr descr">
						<?php echo wp_kses_post($footer_descr); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

	</section>
<?php endif; ?>