<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('about_page_label', $page) ?? '';
$title = get_field('about_page_title', $page) ?? '';
$descr = get_field('about_page_descr', $page) ?? '';
$title_2 = get_field('about_page_title_2', $page) ?? '';
$link = get_field('about_page_link', $page) ?? [];
$image_1 = get_field('about_page_image_1', $page) ?? null;
$image_2 = get_field('about_page_image_2', $page) ?? null;
?>

<?php if ($title || $descr): ?>
	<section class="section about-page" id="about-page">
		<div class="container about-page__container">
			<!-- Левая колонка: текст -->
			<div class="about-page__left">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>
				<?php if (!empty($image_1) && is_array($image_1) && !empty($image_1['ID'])): ?>
					<div class="about-page__image about-page__image--1 image-box visible-mobile">
						<?php echo wp_get_attachment_image(
							$image_1['ID'],
							'large',
							false,
							array(
								'class' => 'img',
								'alt' => $image_1['alt'] ?: ''
							)
						); ?>
					</div>
				<?php endif; ?>
				<?php if ($title_2): ?>
					<h2 class="about-page__title-2 title-2">
						<?php echo esc_html($title_2); ?>
					</h2>
				<?php endif; ?>

				<?php if (!empty($link['url'])): ?>
					<a class="about-page__link btn-link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="
					<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($link['title'] ?? 'Посмотреть услуги'); ?>
					</a>
				<?php endif; ?>
			</div>

			<div class="about-page__right">
				<?php if (!empty($image_1) && is_array($image_1) && !empty($image_1['ID'])): ?>
					<div class="about-page__image about-page__image--1 image-box hidden-mobile">
						<?php echo wp_get_attachment_image(
							$image_1['ID'],
							'large',
							false,
							array(
								'class' => 'img',
								'alt' => $image_1['alt'] ?: ''
							)
						); ?>
					</div>
				<?php endif; ?>

				<?php if (!empty($image_2) && is_array($image_2) && !empty($image_2['ID'])): ?>
					<div class="about-page__image about-page__image--2 image-box">
						<?php echo wp_get_attachment_image(
							$image_2['ID'],
							'large',
							false,
							array(
								'class' => 'img',
								'alt' => $image_2['alt'] ?: ''
							)
						); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>