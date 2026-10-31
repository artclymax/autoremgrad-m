<?php
$class = $args['class'] ?? '';
$label = $args['label'] ?? '';
$title = $args['title'] ?? '';
$descr = $args['descr'] ?? ''
	?>
<div class="hero-page-content <?= esc_attr($class) ?>">
	<div class="hero-page-content__breadcrumbs">
		<div class="page-breadcrumbs">
			<?php if (function_exists('bcn_display')) {
				bcn_display();
			} ?>
		</div>
	</div>
	<div class="hero-page-content__wrapper">

		<?php if ($label): ?>
			<span class="hero-page-content__label label">
				<?php echo esc_html($label); ?>
			</span>
		<?php endif; ?>

		<?php if ($title): ?>
			<h1 class="hero-page-content__title title-2 descr">
				<?php echo wp_kses_post($title); ?>
			</h1>
		<?php endif; ?>

		<?php if ($descr): ?>
			<div class="hero-page-content__descr descr">
				<?php echo wp_kses_post($descr); ?>
			</div>
		<?php endif; ?>
	</div>

</div>