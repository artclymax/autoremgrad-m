<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('form_label', $page) ?? '';
$title = get_field('form_title', $page) ?? '';
$descr = get_field('form_descr', $page) ?? '';
$image = get_field('form_image', $page) ?? null;
$shortcode = get_field('form_shortcode', $page) ?? '';
?>

<?php if ($title || $descr || $shortcode): ?>
	<section class="section section-form" id="section-form">
		<div class="container section-form__container">
			<div class="section-form__left">
				<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
					<div class="section-form__image image-box visible-mobile">
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

			<?php if ($shortcode): ?>
				<div class="section-form__right">
					<?php echo do_shortcode($shortcode); ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
			<div class="section-form__image image-box hidden-mobile">
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