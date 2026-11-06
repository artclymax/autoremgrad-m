<?php
$page = $args['page'] ?? get_queried_object();
$default_page = get_page_by_path('home', OBJECT, 'page');

$label = get_field('faq_label', $page) ?: get_field('faq_label', $default_page) ?? '';
$title = get_field('faq_title', $page) ?: get_field('faq_title', $default_page) ?? '';
$link = get_field('faq_link', $page) ?: get_field('faq_link', $default_page) ?? [];
$image = get_field('faq_image', $page) ?: get_field('faq_image', $default_page) ?? null;
$items = get_field('faq_items', $page) ?: get_field('faq_items', $default_page) ?? [];
?>

<?php if ($title || !empty($items)): ?>
	<section class="section faq" id="faq">
		<div class="container faq__container">
			<div class="faq__left">


				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
				]); ?>
				<?php if (!empty($link)): ?>
					<a class="faq__link btn-link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="
				<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($link['title']); ?>
					</a>
				<?php endif; ?>
			</div>
			<!-- Правая колонка: вопросы -->
			<?php if (!empty($items)): ?>
				<div class="faq__right">
					<?php foreach ($items as $index => $item):
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';
						if (!$item_title)
							continue;

						// Первый элемент всегда открытый
						$is_active = $index === 0 ? ' spoiler-active' : '';
						?>
						<div class="faq-item<?php echo esc_attr($is_active); ?>" data-spoiler>
							<button class="faq-item__btn" data-spoiler-title type="button">
								<h3 class="faq-item__title title-3">
									<?php echo esc_html($item_title); ?>
								</h3>
								<span class="faq-item__icon"></span>
							</button>
							<div class="faq-item__content" data-spoiler-content>
								<?php if ($item_descr): ?>
									<div class="faq-item__descr descr">
										<?php echo wp_kses_post($item_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
			<div class="faq__image image-box">
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