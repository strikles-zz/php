<?php

	global $post;

	if ($post->post_parent) {
		$slides = get_field('slides', $post->post_parent);
	} else {
		$slides = get_field('slides');
	}
	//print_r($slides);
?>


<div class="header-slider-container">

	<div class="arrow left hidden-xs">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-leftarrow.png" alt=""></a>
	</div>
	<div class="arrow right hidden-xs">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-rightarrow.png" alt=""></a>
	</div>
	<?php foreach ($slides as $slide): //print_r($slide['achtergrond']['sizes']);?>
		<?php

			$color = $slide['textcolor'];

			if ($color == 'white'){
				$color = 'color:#fff; border-color: #fff;';
			}
			else {
				$color = 'color:#005380; border-color: #005380;';
			}
		 ?>
	<div class="slide" data-background="<?php echo $slide['achtergrond']['sizes']['homepage-slide'];?>">
		<noscript><img src="<?php echo $slide['achtergrond']['sizes']['homepage-slide'];?>" alt="<?php echo $slide['titel'];?>" title="<?php echo $slide['ondertitel'];?>" /></noscript>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="h1 titel" style="<?php echo $color;?>" ><?php echo $slide['titel'];?></div>
					<div class="h2 ondertitel" style="<?php echo $color;?>" ><?php echo $slide['ondertitel'];?></div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="container relative">
	</div>

</div>
