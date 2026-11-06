<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('about_cta_label', $page) ?? '';
$title = get_field('about_cta_title', $page) ?? '';
$descr = get_field('about_cta_descr', $page) ?? '';
$btn = get_field('about_cta_btn', $page) ?? [];
$phone_text = get_field('about_cta_phone_text', $page) ?? '';
$phone = get_field('about_cta_phone', $page) ?? '';
$image = get_field('about_cta_image', $page) ?? null;

if (empty($phone)) {
	$contacts_phones = get_field('contacts_phones', 'option') ?? [];
	$phone = $contacts_phones[0]['phone'] ?? '';
}
?>

<?php if ($title || $descr): ?>
	<section class="about-cta" id="about-cta">
		<div class="container about-cta__container">
			<!-- Левая колонка: контент -->
			<div class="about-cta__left">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr,
					'title_class' => 'title-3'
				]); ?>

				<?php if (!empty($btn['url'])): ?>
					<a class="about-cta__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?>
							target="
					<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($btn['title'] ?? 'Записаться на обслуживание'); ?>
					</a>
				<?php endif; ?>

				<?php if ($phone): ?>
					<div class="about-cta__phone">
						<?php if ($phone_text): ?>
							<div class="about-cta__phone-text">
								<?php echo esc_html($phone_text); ?>
							</div>
						<?php endif; ?>
						<a class="about-cta__phone-link title-4 link" href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>">
							<?php echo esc_html($phone); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>

			<!-- Правая колонка: изображение -->
			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="about-cta__right image-box">
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
	</section>
<?php endif; ?>