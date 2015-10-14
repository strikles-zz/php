<?php
/**
* Eenvoud media Foundetion theme
*
* @package WordPress
* @subpackage ERoots
*/


get_header();

$featured = get_posts([
	'post_type' => 'review',
	'posts_per_page' => 1,
	'order_by' => 'rand',
	'tax_query' => [
		[
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => 'uitgelicht'
		]
	]
]);

$banner = get_field('banner');
$banner_link = get_field('link');


if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		// check for subnav
		$children = 0;
		if(!$post->post_parent){
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
		}
		else{
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
		}
?>
<div id="content">
	<div class="container">
		<div class="row">
			<?php if($children){ ?>
			<div class="col-md-3 col-sm-4 hidden-xs">
				<div class="sub-menu green">
					<ul> <?php echo $children; ?></ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
			<?php } else { // no subnav?>
			<div class="col-md-12">
			<?php } ?>
				<h1><?php if (!is_front_page()) {the_title();} ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
 	            <div class="twitter">
	                <h2><a href="https://twitter.com/#!/Oud_Valkeveen" target="_blank">&nbsp;</a></h2>
	                <blockquote id="tweet">
	                    <noscript>JavaScript required to display latest Tweets.</noscript>
	                </blockquote>
	            </div>
			</div>
		</div>

		<div class="row grote-afbeelding-container">
			<div class="col-xs-12 col-sm-10">
				<div class="call-to-action top-gap-xs">
					<?php if ($banner_link): ?><a href="<?php echo $banner_link;?>"><?php endif;?>
					<?php if ($banner):?>
					<img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
					<?php endif;?>
					<?php if ($banner_link): ?></a><?php endif;?>
				</div>
			</div>
			<div class="weather-container hidden-xs">
				<div class="weather">
					<h2>Weer in Naarden</h2>

					<div class="forecast"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="custom-review">
					<div class="review-img">
						<?php echo get_the_post_thumbnail($featured[0]->ID,'medium'); ?>
						<!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/test.jpg" alt=""> -->
					</div>
					<a href="/fotomuur/" class="review-excerpt custom-well green">
						<div class="heading"><?php echo $featured[0]->post_title; ?>, <?php echo get_field('leeftijd', $featured[0]->ID); ?> jaar</div>
						<p>"<?php echo $featured[0]->post_excerpt; ?>"</p>
						<div class="footer">Bekijk fotomuur</div>
					</a>

					<div class="review-title">
						Wat was het leuk hè?!
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="youtube-container">
							<iframe width="224" height="126" src="https://www.youtube.com/embed/videoseries?list=PL1xVkyq3pgUEOGMFyeTBNxmegr1QLrK4W&autoplay=1&modestbranding=1&autohide=1&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
							<!--<iframe width="224" height="126" src="https://www.youtube.com/embed/1wrlxxzZhy8?autoplay=1" frameborder="0" allowfullscreen></iframe>-->
						</div>
					</div>
				</div>
				<div class="row">
					<?php if (0): ?>
					<div class="col-xs-6 text-center">
						<div class="nieuwsbrief-container text-right">
							<h3 class=" nieuwsbrief-titel">Nieuwsbrief</h3>
							<?php gravity_form(2, false, false, false, '', true);?>
						</div>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-sm-12 text-center frontpage-contact">
				<div class="visible-xs">Oud Huizerweg 2 | 1411 GZ Naarden<br>Tel: <a href="tel://0356944223">035-6944223</a> | Email: info@oudvalkeveen.nl</div>
				<div class="hidden-xs">
					<div class="wifi"></div>
					<div style="display: inline; vertical-align: 20px; padding-left: 10px;">Oud Huizerweg 2 | 1411 GZ Naarden | Tel: <a href="tel://0356944223">035-6944223</a> | Email: info@oudvalkeveen.nl</div>
				</div>

			</div>
		</div>

		<div class="visible-xs">
			<div class="row">
				<div class="col-xs-4 col-xs-offset-8 top-gap">
					<div class="wifi"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="spacing">

				</div>
			</div>
		</div>
	</div>
</div>

<?php
	} // end while
} // end if

get_footer();

?>