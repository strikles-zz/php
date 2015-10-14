<?php
/*
Template Name: Single-Yacht
*/
?>

<?php
get_header();
the_post();
?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<div class="row">
	<div class="col-sm-12">
		<?php the_content(); ?>
	</div>
</div>

<div class="row top-gap">
	<div class="col-sm-12">
		<h2 class="text-center"><span class="text-bold">More Info</span> about this Yacht</h2>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<p style="text-align: center;">Send us a message or visit one of our viewing locations</p>
	</div>
</div>

<div class="container">

	<div class="row">

		<!-- gmaps -->
		<div class="col-sm-6 top-gap-sm">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="text-center">View this Yacht</h2>
				</div>
			</div>
			<div class="row top-gap-xs">
				<div class="col-sm-12">
					<?php get_template_part('parts/googlemap'); ?>
				</div>
			</div>
		</div>

		<!-- gravity contact form -->
		<div class="col-sm-6 top-gap-sm">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="text-center">Your Question / Request</h2>
				</div>
			</div>
			<div class="row top-gap-xs">
				<div class="col-sm-12">
					<?php gravity_form( 1, false, false, false, '', false ); ?>
				</div>
			</div>
		</div>

	</div>

</div>

<?php get_footer(); ?>