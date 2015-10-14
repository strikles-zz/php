<?php
	global $post;
	$queried_post_type = get_query_var('post_type');


	if ($post->post_parent) {
		$post_id = $post->post_parent;
	} else {
		$post_id = $post->ID;
	}
	//print_r($slides);

	$url = get_field('background',$post_id);

	$color = get_field('textcolor',$post_id);

	if ($color == 'white'){
		$color = 'color:#fff; border-color: #fff;';
	}
	else {
		$color = 'color:#005380; border-color: #005380;';
	}

	$title    = get_field('title', $post_id);
	$subtitle = get_field('subtitle', $post_id);
	if ( (is_single() ||is_archive())&&  'faillissement' ==  $queried_post_type ) {
		$title = get_field('faillissements_title','options');
		$subtitle = get_field('faillissements_subtitle','options');
		$url = get_field('faillissements_background','options');

	}
	else if (is_category() || is_single() ) {
		$title = get_field('news_title','options');
		$subtitle = get_field('news_subtitle','options');
		$url = get_field('news_background','options');
	}
	if ($url) {
		$url = $url['sizes']['homepage-slide'];
	}
	else {
		$url = get_template_directory_uri().'/assets/img/header-bg.png';
	}
?>
<div class="header-single-image-container" style="background: url('<?php echo $url;?>');">
	<noscript><img src="<?php echo $url;?>" alt="<?php echo $title; ?>" title="<?php echo $subtitle;?>" /></noscript>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="h1" style="<?php echo $color;?>"><?php echo $title; ?></div>
				<div class="h2" style="<?php echo $color;?>"><?php echo $subtitle;?></div>
			</div>
		</div>
	</div>

</div>
