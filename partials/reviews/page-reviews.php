<?php

// Настройки пагинации
$posts_per_page = 6;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
	'post_type' => 'reviews',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged,
	'orderby' => 'menu_order',
	'order' => 'ASC',
];

$reviews_query = new WP_Query($args);
?>

<section class="section reviews-page" id="reviews-page">
	<div class="container reviews-page__container">

		<div class="reviews-page__grid grid" id="reviews-grid"
			data-reviews-per-page="<?php echo esc_attr($posts_per_page); ?>">
			<?php if ($reviews_query->have_posts()): ?>
				<?php while ($reviews_query->have_posts()):
					$reviews_query->the_post();
					get_template_part('partials/reviews-card');
				endwhile;
				wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>

		<?php if ($reviews_query->have_posts() && $reviews_query->found_posts > $posts_per_page): ?>
			<div class="reviews-page__load-more">
				<button class="reviews-page__load-more-btn btn btn--outline" type="button" data-reviews-load-more
					data-current-page="1" data-total-pages="<?php echo esc_attr($reviews_query->max_num_pages); ?>">
					Показать ещё отзывы
				</button>
			</div>
		<?php endif; ?>
	</div>
</section>