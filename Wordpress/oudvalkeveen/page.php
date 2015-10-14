<?php
/**
* Eenvoud media Foundetion theme
*
* @package WordPress
* @subpackage ERoots
*/



get_header();
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
?>
<div id="content">
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 col-sm-4 hidden-xs">
				<?php echo get_template_part('parts/subnav'); ?>
			</div>
			<div class="col-md-9 col-sm-8">
			
			<div class="col-md-12">
			
				<h1><?php if (!is_front_page()) {the_title();} ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php
	} // end while
} // end if

get_footer();

?>