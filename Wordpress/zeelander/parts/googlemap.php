<?php if( have_rows('locations', 'option') ): ?>
	<div class="acf-map">
		<?php while ( have_rows('locations', 'option') ) : the_row();

			$location = get_sub_field('location', 'option');

			?>
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				<h4 class="text-center"><?php the_sub_field('title', 'option'); ?></h4>
				<!-- <p class="address text-center"><?php //echo $location['address']; ?></p> -->
				<p class="text-center"><?php the_sub_field('description', 'option'); ?></p>
			</div>
	<?php endwhile; ?>
	</div>
<?php endif; ?>