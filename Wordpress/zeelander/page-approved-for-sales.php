<?php
/*
Template Name: Approved For Sale
*/
?>

<?php

get_header();
the_post();

global $wp_query;


$args = array(
	'post_type'   => 'page',
	'post_parent' => 821,
	'posts_per_page' => 4,
	'order'	=> 'ASC',
	'orderby' => 'menu_order'
);

// the query
$yachts = get_posts( $args );
$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

$approvedforsale_post = get_post(821);

?>

<div class="container yachts">

	<div class="row">

		<div class="col-xs-12">
			<h2 class="text-center top-gap-sm">Approved for Sale</h2>

			<p class="top-gap-xs text-center contained-content"><?php echo $approvedforsale_post->post_content; ?></p>

				<div class="row yachts-container">
				<?php foreach ( $yachts as $yacht ): setup_postdata( $yacht ); //print_r($yacht);?>

					<div class="col-sm-6 the_yacht">
						<div class="row top-gap-sm text-center">
							<div class="col-xs-12 post-thumb">
								<?php echo get_the_post_thumbnail($yacht->ID, 'concept'); ?>
							</div>
							<div class="col-xs-12 yacht-title top-gap-xs">
								<a href="<?php echo post_permalink($yacht->ID); ?>"><?php echo get_the_title($yacht->ID); ?></a>
							</div>
							<div class="col-xs-12 yacht-content"><?php echo $yacht->post_excerpt; ?></div>
							<div class="col-xs-12">
								<a href="<?php echo post_permalink($yacht->ID); ?>" class="yacht-link">Learn More &gt;</a>
							</div>
						</div>
					</div>


				<?php wp_reset_postdata(); endforeach; ?>
			</div>
		</div>

	</div>

	<div class="row">
	<?php
		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	?>
	</div>

</div>

<?php get_footer(); ?>