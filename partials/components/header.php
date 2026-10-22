<?php
$header_class = $args['class'] ?? '';
$phone = get_field('header_phone', 'option') ?: get_field('contacts_phones', 'option')[0]['phone'] ?? '';
$btn = get_field('header_btn', 'option') ?? [];
?>

<header class="header <?php echo esc_attr($header_class); ?>" data-auto-calc="header, height">
	<div class="header__container container">
		<!-- logo -->
		<div class="header__logo logo">
			<?php mx_logo(); ?>
		</div>

		<!-- menu -->
		<nav class="header__menu header-menu" aria-label="Главное меню">
			<div class="header-menu__wrapper">
				<div class="header-menu__main-menu">
					<?php
					wp_nav_menu([
						'theme_location' => 'header-menu',
						'container' => false,
						'menu_class' => 'header-menu__list',
						'fallback_cb' => false,
						'depth' => 1,
					]);
					?>
				</div>
				<div class="header-menu__box">
					<?php if ($phone): ?>
						<a class="header__phone link" href="tel:<?php echo esc_attr(correct_phone($phone)); ?>"
							aria-label="Телефон: <?php echo esc_attr($phone); ?>">
							<?php echo esc_html($phone); ?>
						</a>
					<?php endif; ?>
					<?php if (!empty($btn)): ?>
						<a class="header__btn btn" href="<?= esc_attr($btn['url']) ?>">
							<?php echo esc_html($btn['title']) ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</nav>

		<button class="header__burger-btn burger-btn visible-tablet" type="button" aria-label="Открыть меню">
			<span></span>
		</button>
	</div>
</header>