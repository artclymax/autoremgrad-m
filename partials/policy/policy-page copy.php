<?php
$sections = get_field('policy_sections') ?? [];
?>

<div class="policy-page">
	<?php if (!empty($sections)): ?>
		<div class="container policy-page__container">
			<div class="policy-page__grid">
				<!-- Левая колонка: меню -->
				<aside class="policy-page__sidebar">
					<nav class="policy-page__nav">
						<ul class="policy-nav">
							<?php foreach ($sections as $index => $section):
								$section_id = 'section-' . ($index + 1);
								$menu_title = $section['title'];
								if (empty($menu_title)) {
									continue;
								}
								?>
								<li class="policy-nav__item">
									<a class="policy-nav__link" href="#<?php echo esc_attr($section_id); ?>">
										<?php echo esc_html($menu_title); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</nav>
				</aside>

				<!-- Правая колонка: контент -->
				<div class="policy-page__content">
					<?php foreach ($sections as $index => $section):
						$section_id = 'section-' . ($index + 1);
						$title = $section['title'];
						$content = $section['content'] ?? '';
						?>
						<section class="policy-section" id="<?php echo esc_attr($section_id); ?>">
							<?php if ($title): ?>
								<h2 class="policy-section__title">
									<?php echo esc_html($title); ?>
								</h2>
							<?php endif; ?>

							<?php if ($content): ?>
								<div class="policy-section__content">
									<?php echo wp_kses_post($content); ?>
								</div>
							<?php endif; ?>
						</section>
					<?php endforeach; ?>

					<!-- Кнопка "Вернуться наверх" -->
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