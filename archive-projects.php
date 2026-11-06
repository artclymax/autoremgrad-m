<?php

/**
 * Template Name: Наши работы
 */

get_header();
get_template_part('partials/components/hero-page');
get_template_part('partials/projects/projects-page');
get_template_part('partials/prices-form', null, ['page' => get_page_by_path( 'projects', OBJECT, 'page' )]);
get_footer();
?>