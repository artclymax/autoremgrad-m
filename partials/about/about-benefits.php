<?php
$page = $args['page'] ?? get_queried_object();
$default_page = get_page_by_path('about', OBJECT, 'page');

$benefits = get_field('home_about_benefits', $page) ?: get_field('home_about_benefits', $default_page) ?? [];

if (!empty($benefits)): ?>
	<section class="about-benefits">
		<div class="container about-benefits__container">
			<div class="about-benefits__grid grid">
				<?php foreach ($benefits as $item):
					$title_first = $item['title_first'] ?? '';
					$title_second = $item['title_second'] ?? '';
					$descr = $item['descr'] ?? '';
					if (!$title_first && !$title_second)
						continue;
					?>
					<div class="about-benefits__item about-benefits-item">
						<h3 class="about-benefits-item__title">
							<?php if (!empty($title_first)): ?>
								<span class="about-benefits-item__title-first">
									<?php echo esc_html($title_first); ?>
								</span>
							<?php endif; ?>
							<?php if (!empty($title_second)): ?>
								<span class="about-benefits-item__title-second">
									<?php echo esc_html($title_second); ?>
								</span>
							<?php endif; ?>
						</h3>
						<?php if (!empty($descr)): ?>
							<div class="about-benefits-item__descr descr">
								<?php echo wp_kses_post($descr) ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>