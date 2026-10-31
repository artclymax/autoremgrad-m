<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('home_contacts_label', $page) ?? 'Контакты';
$title = get_field('home_contacts_title', $page) ?? 'Запишитесь на обслуживание';
$descr = get_field('home_contacts_descr', $page) ?? 'Позвоните нам или оставьте заявку — уточним задачу и подберём удобное время';
$btn = get_field('home_contacts_btn', $page) ?? [];

$map = get_field('contacts_map', 'option') ?? '';
?>

<?php if ($title || $descr || $map): ?>
	<section class="section home-contacts" id="home-contacts">
		<div class="container home-contacts__container">
			<div class="home-contacts__left">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>

				<?php get_template_part('partials/components/phones', null, [
					'class' => 'home-contacts__phones'
				]); ?>

				<?php if (!empty($btn['url'])): ?>
					<a class="home-contacts__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($btn['title']); ?>
					</a>
				<?php endif; ?>
			</div>

			<?php if ($map): ?>
				<div class="home-contacts__map">
					<?php echo wp_kses($map, [
						'iframe' => [
							'src' => true,
							'width' => true,
							'height' => true,
							'style' => true,
							'allowfullscreen' => true,
							'loading' => true,
						],
					]) ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>