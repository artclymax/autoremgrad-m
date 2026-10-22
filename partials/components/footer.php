<?php
$page_footer = 'option';
$page_contacts = 'option';

$footer_descr = get_field('footer_descr', $page_footer) ?? '';
$footer_company = get_field('footer_company', $page_footer) ?: get_bloginfo('name');
$footer_copy = get_field('footer_copy', $page_footer) ?? '';
$footer_links = get_field('footer_links', $page_footer) ?? [];
$footer_links_right = get_field('footer_links_right', $page_footer) ?? [];

$phone = get_field('footer_phone', $page_footer) ?: get_field('contacts_phones', $page_contacts)[0]['phone'] ?? [];

?>

<footer class="footer" id="footer">
	<div class="container footer__container">
		<div class="footer__top">
			<div class="footer__brand">
				<div class="footer__logo logo">
					<?php mx_logo(); ?>
				</div>
				<?php if ($footer_descr): ?>
					<div class="footer__descr descr">
						<?php echo wp_kses_post($footer_descr); ?>
					</div>
				<?php endif; ?>
				<?php if (!empty($phone)): ?>
					<a class="footer__phone phone link visible-mobile" href="tel:<?= esc_attr(correct_phone($phone)) ?>">
						<?php echo esc_html($phone) ?>
					</a>
				<?php endif; ?>
			</div>

			<nav class="footer__nav">
				<?php
				wp_nav_menu([
					'theme_location' => 'footer-menu',
					'container' => false,
					'menu_class' => 'footer-menu',
					'depth' => 1,
					'fallback_cb' => false,
				]);
				?>
			</nav>
		</div>

		<div class="footer__bottom">
			<div class="footer__bottom-links">
				<?php if (!empty($footer_links)): ?>
					<?php foreach ($footer_links as $item):
						$link = $item['footer_links_link'] ?? [];
						if (empty($link['url']))
							continue;
						?>
						<a class="footer__bottom-link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($link['title']); ?>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="footer__copy">
				&copy;
				<?php echo esc_html($footer_company) . ', ' . date('Y') . '.'; ?>
				<?php if ($footer_copy): ?>
					<?php echo esc_html($footer_copy); ?>
				<?php endif; ?>
			</div>
			<div class="footer__bottom-links footer__bottom-links--right">
				<?php if (!empty($footer_links_right)): ?>
					<?php foreach ($footer_links_right as $item):
						$link = $item['footer_links_link'] ?? [];
						if (empty($link['url']))
							continue;
						?>
						<a class="footer__bottom-link" href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?> target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($link['title']); ?>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>