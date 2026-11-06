<?php
$page = 'option';
$modals = get_field('modals', $page) ?? [];
?>

<?php if ($modals): ?>
	<?php foreach ($modals as $item):
		// Санитизация ID: только латиница, цифры, дефис, нижнее подчёркивание
		$raw_id = $item['id'] ?? '';
		$id = preg_replace('/[^a-z0-9\-_]/i', '', sanitize_title($raw_id));

		// Пропускаем итерацию, если после очистки ID пустой
		if (empty($id))
			continue;

		$label = $item['label'] ?? '';
		$title = $item['title'] ?? '';
		$descr = $item['descr'] ?? '';
		$shortcode = $item['shortcode'] ?? '';
		?>

		<!-- OVERLAY -->
		<div class="modal <?= esc_attr($id) ?>" id="<?= esc_attr($id) ?>" data-modal
			style="--bg-url: url('<?= esc_url(get_template_directory_uri() . '/assets/images/modal-bg.webp'); ?>');">
			<!-- MODAL -->
			<div class="modal__box modal-call__box" data-modal-box>
				<!-- CLOSE-BTN -->
				<button class="modal__close-btn modal-close-btn" data-modal-close aria-label="Закрыть модальное окно"
					type="button">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M19.3848 2.41406L11.6074 10.1914L19.3867 17.9707L17.9727 19.3848L10.1934 11.6055L2.41406 19.3848L1 17.9707L8.7793 10.1914L1.00195 2.41406L2.41602 1L10.1934 8.77734L17.9707 1L19.3848 2.41406Z"
							fill="currentColor" />
					</svg>
				</button>
				<!-- BODY -->
				<div class="modal__body">
					<div class="modal__wrapper">
						<div class="modal__content">
							<?php if ($label): ?>
								<span class="modal__label label">
									<?php echo esc_html($label); ?>
								</span>
							<?php endif; ?>
							<?php if ($title): ?>
								<h3 class="modal__title title-3">
									<?php echo esc_html($title); ?>
								</h3>
							<?php endif; ?>
							<?php if ($descr): ?>
								<div class="modal__descr descr" id="<?= esc_attr($id) ?>-desc">
									<?php echo wp_kses_post($descr) ?>
								</div>
							<?php endif; ?>
						</div>
						<?php if ($shortcode): ?>
							<div class="modal__form">
								<?php echo do_shortcode($shortcode) ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>