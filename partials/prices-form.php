<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('prices_form_label', $page) ?? '';
$title = get_field('prices_form_title', $page) ?? '';
$descr = get_field('prices_form_descr', $page) ?? '';
$image = get_field('prices_form_image', $page) ?? null;
$phone = get_field('prices_form_phone', $page) ?? '';
$shortcode = get_field('prices_form_shortcode', $page) ?? '';
$service_options = get_field('prices_form_service_options', $page) ?? [];

// Fallback телефона из контактов
if (empty($phone)) {
	$contacts_phones = get_field('contacts_phones', 'option') ?? [];
	$phone = $contacts_phones[0]['phone'] ?? '';
}
?>

<?php if ($title || $descr || $shortcode): ?>
	<section class="section prices-form" id="prices-form">
		<div class="container prices-form__container">
			<div class="prices-form__left">
				<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
					<div class="prices-form__image image-box">
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

				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>
			</div>

			<!-- Правая колонка: форма -->
			<?php if ($shortcode): ?>
				<div class="prices-form__right">
					<?php echo do_shortcode($shortcode); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>