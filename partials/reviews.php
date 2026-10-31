<?php
$page = $args['page'] ?? get_queried_object();
$label = get_field('home_reviews_label', $page) ?? '';
$title = get_field('home_reviews_title', $page) ?? '';
$selected_ids = get_field('home_reviews_selected', $page) ?? [];

if (empty($selected_ids)) {
	$reviews_query = new WP_Query([
		'post_type' => 'reviews',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
	]);
} else {
	$reviews_query = new WP_Query([
		'post_type' => 'reviews',
		'posts_per_page' => -1,
		'post__in' => (array) $selected_ids,
		'orderby' => 'post__in',
	]);
}
?>

<?php if ($title || $reviews_query->have_posts()): ?>
	<section class="section home-reviews" id="home-reviews">
		<div class="container home-reviews__container">
			<div class="home-reviews__header">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
				]); ?>
			</div>

			<?php if ($reviews_query->have_posts()): ?>
				<div class="home-reviews__swiper home-reviews-swiper swiper">
					<div class="swiper-wrapper">
						<?php while ($reviews_query->have_posts()):
							$reviews_query->the_post();
							$review_id = get_the_ID();
							$author = get_the_title();
							$review_text = get_the_content();
							?>
							<div class="swiper-slide home-reviews-swiper__slide reviews-slide">
								<div class="reviews-slide__wrapper">
									<?php if ($review_text): ?>
										<div class="reviews-slide__descr descr title-3">
											<?php echo wp_kses_post($review_text); ?>
										</div>
									<?php endif; ?>

									<?php if ($author): ?>
										<h3 class="reviews-slide__author">
											<?php echo esc_html($author); ?>
										</h3>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</div>

					<div class="home-reviews-swiper__controls">
						<div class="home-reviews-swiper__nav">
							<button class="home-reviews-swiper__prev swiper-btn swiper-btn__prev" type="button"
								aria-label="Предыдущий отзыв">
							</button>

							<div class="home-reviews-swiper__counter-wrapper">
								<div class="home-reviews-swiper__counter">
									<span class="home-reviews-swiper__counter-current">01</span>
									<span class="home-reviews-swiper__counter-divider">/</span>
									<span class="home-reviews-swiper__counter-total">
										<?php echo esc_html($reviews_query->post_count < 9 ? '0' . $reviews_query->post_count : $reviews_query->post_count); ?>
									</span>
								</div>
							</div>

							<button class="home-reviews-swiper__next swiper-btn swiper-btn__next" type="button"
								aria-label="Следующий отзыв">
							</button>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>