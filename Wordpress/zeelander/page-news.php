<?php
/*
Template Name: News
*/
?>

<?php

get_header();
the_post();

global $wp_query;

// get the news articles
$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$args = array(
	'post_type'   => 'post',
	'posts_per_page' => 4,
	'category' => 'news'
);

$articles = get_posts( $args );

?>

<div class="container news">

			<div class="row top-gap-xs">

				<div class="row-sm-height">
					<div class="col-sm-8 col-sm-height news-sidebar">

						<div class="inside">
							<div class="row">
								<div class="col-sm-12">

									<h2 class="text-center">Zeelander Stories</h2>

									<div class="row">

										<?php foreach ( $articles as $article ): setup_postdata( $article ); ?>
											<div class="col-sm-6 the_article">
												<div class="row top-gap-sm text-center">
													<div class="col-xs-12 post-thumb">

														<?php if(has_post_thumbnail($article->ID)) { echo get_the_post_thumbnail($article->ID, 'post-size'); } else { ?>
															<img src="<?php echo get_bloginfo('url').'/wp-content/themes/foundetion/assets/img/no-image.png' ?>" alt="">
														<?php }; ?>

													</div>

													<div class="col-xs-12 text-center single-date"><?php echo get_the_date(); ?></div>

													<div class="col-xs-12 article-title">
														<a href="<?php echo post_permalink($article->ID); ?>" class="article-title"><?php echo get_the_title($article->ID); ?></a>
													</div>
													<div class="col-xs-12 article-content">
														<?php
															//echo apply_filters('the_content', $article->post_content);
															echo the_excerpt();
														?>
													</div>
													<div class="col-xs-12">
														<a href="<?php echo post_permalink($article->ID); ?>" class="article-link">Learn More &gt;</a>
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
					</div>

					<?php get_template_part('parts/news', 'sidebar'); ?>

				</div>
			</div>

</div>

<?php get_footer(); ?>