<?php
/**
 * Eenvoud media Foundetion theme
 *
 * @package WordPress
 * @subpackage Foundetion
 */

?>

<?php get_header(); ?>
<div id="page-content">
	<div class="container-fluid">
		<div class="row no-overflow">
			<div class="container nieuws-container">
				<div class="row">
					<div class="col-sm-8 fluid-bg-neighbour">
					<?php while ( have_posts() ) : the_post();
					?>
					<div class="text-left news-item-single">
						<div class="img-container" style="float:left;'">
							<?php the_post_thumbnail('nieuws-single'); ?>
						</div>
						<h3><?php the_title();?></h3>
						<div class="date-author">
							<span class="date">
								<?php
								echo date_i18n('j/m/y', strtotime($post->post_date));
								?>
							</span>
							<span class="author">
								- <?php echo get_field('author');?>
							</span>
						</div>


					<?php the_content();?>
					</div>
					<?php
						endwhile;
					?>
					</div>
					<div class="col-sm-4">
						<div class="fluid-bg top-bg">
							<div class="background-color brown"></div>
							<div class="inner">
								<div class="sidebar-widget author-info">

									<?php $author_name = get_field('author'); $identifier = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $author_name)); $author_profile = get_bloginfo('url').'wie-zijn-wij/'.$identifier; ?>
									<div class="author-name">  <a href="<?php echo $author_profile ?>" target="_blank"><?php echo $author_name ?></a>	</div>
									<div class="author-content">
										<div class="row">
											<div class="col-sm-12 col-md-10">

												<div class="author-picture pull-left">
													<img src="<?php print_r(get_field('author_picture')['sizes']['author-picture']); ?>" alt="">
												</div>

												<div class="author-description">
													<?php echo get_field('author_description'); ?>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="fluid-bg bottom-bg">
							<div class="background-color red"></div>
							<div class="inner">
								<div class="sidebar-widget archive">

									<div class="archive-title">	<?php echo __('Archief'); ?></div>
									<div class="archive-content">
										<?php echo do_shortcode('[jQuery Archive List showcount=1 expand=current_post con_sym="" ex_sym=""]') ?>
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
