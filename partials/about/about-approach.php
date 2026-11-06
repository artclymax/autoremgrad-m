<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('about_approach_label', $page) ?? '';
$title = get_field('about_approach_title', $page) ?? '';
$descr = get_field('about_approach_descr', $page) ?? '';
$items = get_field('about_approach_items', $page) ?? [];
$footer_descr = get_field('about_approach_footer_descr', $page) ?? '';
$image = get_field('about_approach_image', $page) ?? null;
?>

<?php if ($title || !empty($items)): ?>
	<section class="section about-approach" id="about-approach">
		<div class="container about-approach__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>

			<?php if (!empty($items)): ?>
				<div class="about-approach__right">
					<div class="about-approach__grid">
						<?php $index = 0;
						foreach ($items as $item):
							$index++;
							$item_number = $index > 9 ? $index : '0' . $index;
							$item_title = $item['title'] ?? '';
							$item_descr = $item['descr'] ?? '';
							if (!$item_title && !$item_descr)
								continue;
							?>
							<div class="about-approach__item about-approach-item">
								<span class="about-approach-item__number title-3">
									<?php echo esc_html($item_number); ?>
								</span>

								<?php if ($item_title): ?>
									<h3 class="about-approach-item__title title-4">
										<?php echo esc_html($item_title); ?>
									</h3>
								<?php endif; ?>

								<?php if ($item_descr): ?>
									<div class="about-approach-item__descr descr">
										<?php echo wp_kses_post($item_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>


					<?php if ($footer_descr): ?>
						<div class="about-approach__footer-descr descr">
							<?php echo wp_kses_post($footer_descr); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<!-- Нижнее изображение на всю ширину -->
		<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
			<div class="about-approach__image image-box">
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
	</section>
<?php endif; ?>