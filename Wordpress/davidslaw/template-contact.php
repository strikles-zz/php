<?php
/*
Template Name: Contact
*/

get_header();

?>

<div id="page-content" class="page-content page-contact">
	<?php

	$locations = get_field('googlemaps');


	if( !empty($locations) ):
	?>
		<div class="acf-map">
			<?php foreach ($locations as $location_obj) {
				$location = $location_obj['location'];
				$icon = $location_obj['marker']['url'];
				$iconx = $location_obj['width_diff'];
				$icony = $location_obj['height_diff'];
				$redirect_url = $location_obj['redirect_url'];
				$address = urlencode($location_obj['address']);
			?>
				<div class="marker"
					data-lat="<?php echo $location['lat']; ?>"
					data-lng="<?php echo $location['lng']; ?>"
					data-icon="<?php echo $icon; ?>"
					data-iconx="<?php echo $iconx; ?>"
					data-icony="<?php echo $icony; ?>"
					data-redirecturl="<?php echo $redirect_url; ?>"
					data-address="<?php echo $address ?>"></div>
			<?php
			}
			?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
