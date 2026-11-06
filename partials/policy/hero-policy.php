<?php
$page = get_queried_object();
$class = $args['class'] ?? '';

$label = '';
$title = '';
$version = '';


if (!$title || !$version || !$label) {
	if (is_tax()) {
		$term = get_queried_object();
		$label = get_field('hero_subtitle', $term) ?? '';
		$title = $title ?: (get_field('hero_title', $term) ?? '');
		$version = $version ?: (get_field('hero_version', $term) ?? '');

		if (!$title) {
			$title = single_term_title('', false);
		}
	} else {
		if (is_archive()) {
			$archive_name = '';
			$queried = get_queried_object();
			$archive_name = is_string($queried->has_archive ?? null) ? $queried->has_archive : ($queried->name ?? '');
			$archive_page = $archive_name ? get_page_by_path($archive_name, OBJECT, 'page') : null;
			if ($archive_page) {
				$page = $archive_page;
			}
		}
		$label = get_field('hero_subtitle', $page) ?? '';
		$title = $title ?: (get_field('hero_title', $page) ?? '');
		$version = $version ?: (get_field('hero_version', $page) ?? '');

		if (!$title) {
			$title = get_the_title();
		}
	}
}

if ($title):
	?>
	<section class="section hero-page-simple <?php echo esc_attr($class); ?>" id="hero-page-simple">
		<div class="container hero-page__container">
			<div class="hero-page__breadcrumbs page-breadcrumbs">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				} ?>
			</div>

			<div class="hero-page__content">
				<?php if ($label): ?>
					<span class="hero-page__label label">
						<?php echo esc_html($label); ?>
					</span>
				<?php endif; ?>
				<?php if ($title): ?>
					<h1 class="hero-page__title title-2 descr">
						<?php echo wp_kses_post($title); ?>
					</h1>
				<?php endif; ?>
				<?php if ($version): ?>
					<div class="hero-page__version descr">
						<?php echo wp_kses_post($version); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>