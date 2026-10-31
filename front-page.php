<?php
/*
Template Name: Главная страница (home)
*/
?>
<?php get_header();
get_template_part('partials/home/home-hero');
get_template_part('partials/home/home-about');
get_template_part('partials/home/home-services');
get_template_part('partials/home/home-why-us');
get_template_part('partials/home/home-projects');
get_template_part('partials/home/how-we-work');
get_template_part('partials/section-form');
get_template_part('partials/reviews');
get_template_part('partials/faq');
get_template_part('partials/home/home-contacts');
get_footer(); ?>