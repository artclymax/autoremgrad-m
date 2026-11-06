<?php
$page = $args['page'] ?? get_queried_object();
$default_page = 'option';

$label = get_field('how_we_work_label', $page) ?: get_field('how_we_work_label', $default_page) ?? '';
$title = get_field('how_we_work_title', $page) ?: get_field('how_we_work_title', $default_page) ?? '';
$descr = get_field('how_we_work_descr', $page) ?: get_field('how_we_work_descr', $default_page) ?? '';
$link = get_field('how_we_work_link', $page) ?: get_field('how_we_work_link', $default_page) ?? [];
$steps = get_field('how_we_work_steps', $page) ?: get_field('how_we_work_steps', $default_page) ?? [];
$image = get_field('how_we_work_image', $page) ?: get_field('how_we_work_image', $default_page) ?? null;
?>

<?php if ($title || $descr || !empty($steps)): ?>
	<section class="section how-we-work" id="how-we-work">
		<div class="container how-we-work__header-container">
			<div class="how-we-work__header section-header-decor">
				<?php get_template_part('partials/section-header-horizontal', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr,
					'link' => $link,
					'link_class' => 'btn'
				]); ?>
			</div>
		</div>

		<div class="un-container un-container--reverse how-we-work__container">
			<div class="un-container__content how-we-work__content">
				<?php if (!empty($steps)): ?>
					<div class="how-we-work__steps grid">
						<?php foreach ($steps as $index => $step):
							$step_title = $step['title'] ?? '';
							$step_descr = $step['descr'] ?? '';
							if (!$step_title && !$step_descr)
								continue;
							?>
							<div class="how-we-work__step how-we-work-step">
								<div class="how-we-work-step__dot"></div>
								<div class="how-we-work-step__content">
									<?php if ($step_title): ?>
										<h3 class="how-we-work-step__title title-4">
											<?php echo esc_html($step_title); ?>
										</h3>
									<?php endif; ?>

									<?php if ($step_descr): ?>
										<div class="how-we-work-step__descr descr">
											<?php echo wp_kses_post($step_descr); ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if (!empty($image) && is_array($image) && !empty($image['ID'])): ?>
				<div class="un-container__full how-we-work__image image-box">
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