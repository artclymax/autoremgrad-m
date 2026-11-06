<?php
$page = $args['page'] ?? get_page_by_path('services', OBJECT, 'page');

$label = get_field('services_form_label', $page) ?? '';
$title = get_field('services_form_title', $page) ?? '';
$descr = get_field('services_form_descr', $page) ?? '';
$image = get_field('services_form_image', $page) ?? null;
$shortcode = get_field('services_form_shortcode', $page) ?? '';
if (is_tax()) {
	$term = get_queried_object();
	$term_id = $term->term_id;
	$label = get_field('services_form_label', 'services_cat_' . $term_id) ?: get_field('services_form_label', $page) ?? '';
	$title = get_field('services_form_title', 'services_cat_' . $term_id) ?: get_field('services_form_title', $page) ?? '';
	$descr = get_field('services_form_descr', 'services_cat_' . $term_id) ?: get_field('services_form_descr', $page) ?? '';
	$image = get_field('services_form_image', 'services_cat_' . $term_id) ?: get_field('services_form_image', $page) ?? null;
	$shortcode = get_field('services_form_shortcode', 'services_cat_' . $term_id) ?: get_field('services_form_shortcode', $page) ?? '';
}
?>

<?php if ($title || $descr || $shortcode): ?>
	<section class="section-services-form" id="section-services-form">
		<div class="un-container section-services-form__container">

			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full section-services-form__image image-box">
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

			<div class="un-container__content section-services-form__right">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>

				<?php if ($shortcode): ?>
					<div class="section-services-form__form">
						<?php echo do_shortcode($shortcode); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>