<?php
/*
Template Name: Single-Event
*/
?>

<?php

get_header();
the_post();

global $wp_query;
$args = array(
	'post_type'   => 'page',
	'post_parent' => 262,
	'posts_per_page' => 3
);

// the query
$events = get_posts( $args );
?>

<div class="container single">

	<div class="row top-gap-xs">
		<?php get_template_part('parts/news', 'single'); ?>
		<?php get_template_part('parts/news', 'sidebar'); ?>
	</div>

</div>

<?php get_footer(); ?>