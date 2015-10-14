<?php
/*
Template Name: Nieuws
*/

get_header();
global $wp_query;

?>
<?php get_header(); ?>
<div id="page-content">
	<div class="container-fluid">
		<div class="row no-overflow">
			<div class="container nieuws-container">
				<div class="row">

					<div class="row-same-height">
						<div class="col-sm-8 fluid-bg-neighbour archive-news-content col-sm-height">
							<?php
								while(have_posts())
								{
									the_post();
							       	// Loop output goes here
									get_template_part('parts/archive', 'list');
								}
							?>
						</div>
						<div class="col-sm-4 archive-sidebar col-sm-height col-top">

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

							<div class="">
								<div class=""></div>
								<div class="inner">
									<div class="sidebar-widget archive">

										<div class="archive-title">	<?php echo __('Archief'); ?></div>
										<div class="archive-content">
											<?php echo do_shortcode('[jQuery Archive List showcount=1 expand=current_post con_sym="" ex_sym=""]') ?>
										</div>

										<div class="fluid-bg"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>


