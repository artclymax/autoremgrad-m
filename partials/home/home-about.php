<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('home_about_label', $page) ?? '';
$title = get_field('home_about_title', $page) ?? '';
$descr = get_field('home_about_descr', $page) ?? '';
$link = get_field('home_about_link', $page) ?? [];
$image = get_field('home_about_image', $page) ?? null;
?>

<?php if ($title || $descr): ?>
	<section class="home-about" id="home-about">
		<div class="un-container un-container--reverse home-about__container">
			<div class="un-container__content home-about__content">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>

				<?php if (!empty($link['url'])): ?>
					<a class="home-about__link btn-link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($link['title'] ?? 'Подробнее о компании'); ?>
					</a>
				<?php endif; ?>
			</div>

			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full home-about__image image-box">
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

		<?php get_template_part('partials/about/about-benefits'); ?>
	</section>
<?php endif; ?>