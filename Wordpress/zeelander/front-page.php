<?php

get_header();
the_post();

?>


<div class="row slider-bottom-gap">
	<div class="col-sm-12">
		<?php get_template_part('parts/header', 'slider'); ?>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<?php the_content(); ?>
	</div>
</div>


<?php get_footer(); ?>