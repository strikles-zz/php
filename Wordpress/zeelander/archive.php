<?php
/*
Template Name: Archived News
*/

get_header();
global $wp_query;

$args = array(
	'post_type'   => 'page',
	'post_parent' => 262,
	'posts_per_page' => 4
);

// the query
$events = get_posts( $args );
?>

<div class="container news">

	<div class="row top-gap-xs">

				<div class="row-sm-height">
					<div class="col-sm-8 col-sm-height news-sidebar">

						<div class="inside">
							<div class="row">

									<h2 class="text-center">Zeelander Stories</h2>

									<?php
										while(have_posts())
										{
											the_post();
									       	// Loop output goes here
											get_template_part('parts/archive', 'list');
										}
									?>
							</div>
							<div class="row">
								<div class="col-sm-4 col-sm-height col-top">

									<div class="row text-center space-bottom1">
										<div class="col-md-12 link-btns">
											<?php
											// Custom query loop pagination
											$big = 999999999; // need an unlikely integer

											echo paginate_links( array(
												'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
												'format' => '?paged=%#%',
												'current' => max( 1, get_query_var('paged') ),
												'prev_text'    => '«',
												'next_text'    => '»',
												'total' => $wp_query->max_num_pages
											) );
											?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php get_template_part('parts/news', 'sidebar'); ?>

				</div>
	</div>
</div>

<?php get_footer(); ?>
