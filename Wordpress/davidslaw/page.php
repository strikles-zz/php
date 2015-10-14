<?php
/**
 * Eenvoud media Foundetion theme
 *
 * @package WordPress
 * @subpackage Foundetion
 */

?>

<?php get_header(); ?>
<div id="page-content" class="page-content standard-page">
	<div class="container-fluid">
		<div class="row no-overflow">
			<div class="container page-container">
				<div class="row">
					<div class="col-sm-7 fluid-bg-neighbour">
						<?php while ( have_posts() ) : the_post();
						?>
						<div class="custom-page-content">
							<div class="h3"><?php the_title();?></div>
							<div class="the-content">
								<?php the_content();?>
							</div>
						</div>
						<?php
							endwhile;
						?>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<div class="fluid-bg top-bg">
							<div class="background-color blue"></div>
							<div class="inner">
								<div class="sidebar-widget top">

									<div class="title">	Contact opnemen?
									</div>
									<div class="content">
										<a href="/contact/">
											<div class="contact-title">Bel ons op 020 - 7147 850</div>

											<div class="contact-excerpt">
												Of stuur een bericht naar info@davidslaw.nl
											</div>
										</a>

									</div>
								</div>
							</div>
						</div>
						<div class="fluid-bg middle-bg">
							<div class="background-color red"></div>
							<div class="inner">
								<div class="sidebar-widget">

									<?php

										$args = null;
										$home_nieuws_post_id = null;
										$home_nieuws_type = get_field('home_nieuws', 'option');

										$args = array(
										    'posts_per_page' => 1,
										    'order' => 'ASC',
										    'category' => 'nieuws',
										    'post_type' => 'post',
										    'post_status' => 'publish'
									    );

										if($home_nieuws_type === 'specific')
										{
											$home_nieuws_post = get_field('home_nieuws_select', 'option');
											$home_nieuws_post_id = $home_nieuws_post->ID;

											$args['orderby']  = 'ID';
											$args['post__in'] = array($home_nieuws_post_id);
										}
										else
										{
											$args['orderby']    = 'rand';
											$args['date_query'] = array('after' => date('Y-m-d', strtotime('-180 days')));
										}

									    $posts = get_posts( $args );
										while(have_posts()) :
											the_post();
									?>

									<div class="title">	Nieuws
										<span class="date">
											<?php
											echo date_i18n('j', strtotime($post->post_date)).'/'. date_i18n('m', strtotime($post->post_date)).'/'. date_i18n('y', strtotime($post->post_date));
											?>
										</span>
									</div>
									<div class="content">
										<a href="<?php echo get_permalink($recent->ID); ?>">
											<div class="news-title"><?php the_title(); ?></div>

											<div class="news-excerpt">
												<?php the_excerpt();?>
												<div class="read-more" href="<?php echo get_permalink($recent->ID); ?>">Lees meer &raquo;</div>
											</div>
										</a>

									</div>
								<?php endwhile; ?>
								</div>
							</div>
						</div>
						<div class="fluid-bg bottom-bg">
							<div class="background-color brown"></div>
							<div class="inner">
								<div class="sidebar-widget bottom faissementsverslagen ">

									<div class="bankruptcies">
										<div class="row">
											<div class="col-md-12">
												<div class="title">
													<?php echo __('Faillissements Verslagen'); ?>
												</div>
												<div class="subtitle">
													<?php echo __('Doorzoek onze database'); ?>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-9">
												<form  class="searchbar" role="search" method="POST" action="<?php bloginfo('url');?>/faillissementen">
													<div class="form-group">
														<input type="text" class="form-control" name="s"><input type="submit" class="search-btn" value="">
													</div>
												</form>
												<div class="categories">
													<a cass="navigation-letter" href="/faillissementen/#letter-0">0-9</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-a">a</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-b">b</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-c">c</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-d">d</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-e">e</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-f">f</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-g">g</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-h">h</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-i">i</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-j">j</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-k">k</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-l">l</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-m">m</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-n">n</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-o">o</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-p">p</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-q">q</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-r">r</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-s">s</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-t">t</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-u">u</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-v">v</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-w">w</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-x">x</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-y">y</a>
													<a cass="navigation-letter" href="/faillissementen/#letter-z">z</a>
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
		</div>
	</div>
</div>



<?php get_footer(); ?>
