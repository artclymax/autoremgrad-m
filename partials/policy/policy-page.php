<?php

$sections = get_field('policy_sections') ?? [];
?>

<div class="policy-page" id="top">
	<?php if (!empty($sections)): ?>

		<div class="container policy-page__container">

			<!-- Мобильный селект (виден только на мобильных) -->
				<?php if (!empty($sections)): ?>
				<div class="policy-page__mobile-select">
					<select class="policy-select" id="policy-mobile-select" aria-label="Перейти к разделу">
						<option value="" disabled selected>Содержание документа</option>
							<?php foreach ($sections as $index => $section):
								$section_id = 'section-' . ($index + 1);
								$menu_title = $section['title'];
								if (empty($menu_title)) {
									continue;
								}
								?>
							<option value="#<?php echo esc_attr($section_id); ?>">
									<?php echo esc_html($menu_title); ?>
							</option>
							<?php endforeach; ?>
					</select>
				</div>
				<?php endif; ?>

			<div class="policy-page__grid">
				<!-- Левая колонка: навигация (sticky на десктопе) -->
					<?php if (!empty($sections)): ?>
					<aside class="policy-page__sidebar">
						<nav class="policy-page__nav" aria-label="Разделы политики">
							<ul class="policy-nav">
									<?php foreach ($sections as $index => $section):
										$section_id = 'section-' . ($index + 1);
										$menu_title = $section['title'];
										if (empty($menu_title)) {
											continue;
										}
										?>
									<li class="policy-nav__item">
										<a class="policy-nav__link" href="#<?php echo esc_attr($section_id); ?>"
											data-target="<?php echo esc_attr($section_id); ?>">
												<?php echo esc_html($menu_title); ?>
										</a>
									</li>
									<?php endforeach; ?>
							</ul>
						</nav>
					</aside>
					<?php endif; ?>

				<!-- Правая колонка: контент -->
				<div class="policy-page__right">
					<div class="policy-page__content">
							<?php foreach ($sections as $index => $section):
								$section_id = 'section-' . ($index + 1);
								$title = $section['title'] ?? '';
								$content = $section['content'] ?? '';
								?>
							<section class="policy-section" id="<?php echo esc_attr($section_id); ?>"
								data-section-id="<?php echo esc_attr($section_id); ?>">
									<?php if ($title): ?>
									<h3 class="policy-section__title title-3">
											<?php echo esc_html($title); ?>
									</h3>
									<?php endif; ?>

									<?php if ($content): ?>
									<div class="policy-section__content descr">
											<?php echo wp_kses_post($content); ?>
									</div>
									<?php endif; ?>
							</section>
							<?php endforeach; ?>


					</div>
					<a class="policy-page__back-to-top btn-link btn-link--up" href="#top">
						Вернуться наверх
					</a>
				</div>
			</div>
		</div>
	<?php else: ?>
		<section class="index-section">
			<div class="container descr section-content">
				<?php the_content(); ?>
			</div>
		</section>
	<?php endif; ?>
</div>