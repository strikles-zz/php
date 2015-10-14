<?php
/**
 * Eenvoud media Foundetion theme
 *
 * @package WordPress
 * @subpackage Foundetion
 */

?>

<?php get_header(); ?>
<div id="page-content" class="bankruptcy-single">
	<div class="container-fluid bankruptcy-nav-bg">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="bankruptcy-navigation">
							<span class="title"><a href="/faillissementen/">Faillissementsverslagen</a> &raquo; <a href="/faillissementen/#<?php echo substr(get_field('name'),0,1);?>"><?php echo substr(get_field('name'),0,1);?></a> &raquo;</span><span class="title white"> <?php the_title(); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row no-overflow">
			<div class="container bankruptcy-container">
				<div class="row">
					<div class="col-sm-8 fluid-bg-neighbour">
						<?php while ( have_posts() ) : the_post();
						?>
						<div class="text-left bankruptcy-item-single">
							<div class="h3"><?php the_title();?></div>
							<div class="summary">
								<?php the_content();?>
							</div>
							<div class="data">
								<table class="datatable">
									<?php if ( get_field('name')): ?>
									<tr class="name">
										<td class="field_label"><?php echo __('Naam:'); ?></td>
										<td class="value"><?php echo get_field('name');?></td>
									</tr>
									<?php endif; if ( get_field('business_address')): ?>
									<tr class="business_address">
										<td class="field_label"><?php echo __('Vestigingsadres:');?></td>
										<td class="value"><?php echo get_field('business_address');?></td>
									</tr>
									<?php endif; if ( get_field('kvk-number')): ?>
									<tr class="kvk-number">
										<td class="field_label"><?php echo __('KvK-nummer:');?></td>
										<td class="value"><?php echo get_field('kvk-number');?></td>
									</tr>
									<?php endif; if ( get_field('curator')): ?>
									<tr class="curator">
										<td class="field_label"><?php echo __('Curator:');?></td>
										<td class="value"><?php echo get_field('curator');?></td>
									</tr>
									<?php endif; if ( get_field('address')): ?>
									<tr class="address">
										<td class="field_label"><?php echo __('Adres:');?></td>
										<td class="value"><?php echo get_field('address');?></td>
									</tr>
									<?php endif; if ( get_field('court')): ?>
									<tr class="court">
										<td class="field_label"><?php echo __('Rechtbank:');?></td>
										<td class="value"><?php echo get_field('court');?></td>
									</tr>
									<?php endif; if ( get_field('magistrate')): ?>
									<tr class="magistrate">
										<td class="field_label"><?php echo __('Rechter-commissaris:');?></td>
										<td class="value"><?php echo get_field('magistrate');?></td>
									</tr>
									<?php endif; if ( get_field('insolvency_number')): ?>
									<tr class="insolvency_number">
										<td class="field_label"><?php echo __('Insolventienummer:');?></td>
										<td class="value"><?php echo get_field('insolvency_number');?></td>
									</tr>
								<?php endif; ?>
								</table>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<div class="col-sm-4">
						<div class="fluid-bg top-bg bottom-bg">
							<div class="background-color brown"></div>
							<div class="inner">
								<div class="reports">
									<div class="reports-title"> Verslagen </div>

									<?php
										$reports = get_field('reports');
										foreach ($reports as $report) :
									 ?>

										<div class="reports-content">
											<a class="file" href="<?php echo $report['report']['url']; ?>" target="_blank">
												<div class="report">
													<div class="title"><?php echo $report['name']; ?></div>
													<div class="date"> <?php echo date_i18n('j/m/y', strtotime($report['date'])); ?></div>
												</div>
											</a>
										</div>

									<?php
										endforeach;
									?>
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