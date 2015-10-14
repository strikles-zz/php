<?php
	global $post;
	$slides = get_field('slides');
	//print_r($slides);
?>
<div class="slider-container">
	<div class="arrow left">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-leftarrow.png" alt=""></a>
	</div>
	<div class="arrow right">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-rightarrow.png" alt=""></a>
	</div>
	<div class="dots-bottom">
		<?php $first_dot = true; ?>
		<?php foreach ($slides as $slide):?>
			<div class="dot <?php if ($first_dot) echo 'active';?>"></div>
		<?php $first_dot = false; ?>
		<?php endforeach; ?>
	</div>
	<?php foreach ($slides as $slide): ?>
	<div class="slide" data-background="<?php echo $slide['achtergrond']['sizes']['full-width-slider'];?>">
		<div class="slide-container">
			<div class="containerz">
				<div class="row">
					<div class="col-md-12">
						<div class="h1 titel"><?php echo $slide['titel'];?></div>
						<div class="h2 ondertitel"><?php echo $slide['ondertitel'];?></div>

						<?php if(!empty($slide['action'])) : ?>
						<a class="slide-action"><?php echo $slide['action'];?></a>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
