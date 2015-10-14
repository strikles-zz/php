<?php
/*
Template Name: Nieuws
*/

get_header();

global $wp_query;


?>

<div id="page-content" class="page-content page-news-overview">
	<div class="container big-margin-top nieuws-container">

		<div class="row">

			<?php
			while(have_posts())
			{
				the_post();
		       	// Loop output goes here
				get_template_part('parts/single', 'news');

			}

			?>
		</div>
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

<?php get_footer(); ?>