<?php
/*
Template Name: Contact
*/
?>

<?php

get_header();
the_post();

?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<div class="row">
	<div class="col-sm-12 no-padding">
		<?php get_template_part('parts/googlemap'); ?>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php the_content(); ?>
	</div>
</div>


<?php get_footer(); ?>