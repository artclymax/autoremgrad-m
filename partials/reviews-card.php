<?php
/**
 * Карточка отзыва
 *
 * @package Theme
 */

$review_id = get_the_ID();
$author_name = get_field('reviews_author_name', $review_id) ?? get_the_title();
$review_text = get_the_content();
?>

<div class="reviews-page__card reviews-card">

	<?php if ($review_text): ?>
		<div class="reviews-card__text">
			<?php echo wp_kses_post($review_text); ?>
		</div>
	<?php endif; ?>

	<?php if ($author_name): ?>
		<div class="reviews-card__author">
			<?php echo esc_html($author_name); ?>
		</div>
	<?php endif; ?>
</div>