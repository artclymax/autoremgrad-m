<?php
$class = $args['class'] ?? '';
$label = $args['label'] ?? '';
$title = $args['title'] ?? '';
$link = $args['link'] ?? '';
$link_class = $args['link_class'] ?? 'btn-link';
$title_tag = $args['title_tag'] ?? 'h2';
$title_class = $args['title_class'] ?? 'title-2';
$descr = $args['descr'] ?? '';

if (!empty($label) || !empty($title) || !empty($descr)): ?>
	<div class="section-header-horizontal <?= esc_attr($class) ?>">
		<?php if ($label): ?>
			<div class="section-header-horizontal__label label">
				<?php echo esc_html($label); ?>
			</div>
		<?php endif; ?>

		<?php if ($title): ?>
			<<?= esc_attr($title_tag) ?> class="section-header-horizontal__title <?= esc_attr($title_class) ?>">
				<?php echo esc_html($title); ?>
			</<?= esc_attr($title_tag) ?>>
		<?php endif; ?>

		<?php if ($descr): ?>
			<div class="section-header-horizontal__descr descr">
				<?php echo wp_kses_post($descr); ?>
			</div>
		<?php endif; ?>

		<?php if (!empty($link)): ?>
			<a class="section-header-horizontal__link <?= esc_attr($link_class) ?>" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
				<?php echo esc_html($link['title']); ?>
			</a>
		<?php endif; ?>
	
		</div>
<?php endif; ?>