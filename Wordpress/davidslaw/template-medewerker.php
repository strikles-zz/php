<?php
/*
Template Name: Medewerker
*/

get_header();

$helperclass = ABSPATH.'wp-content/themes/foundetion/includes/MedewerkersHelper.class.php';
require_once $helperclass;

while ( have_posts() ) : the_post();
	$naam         = get_the_title();
	$functie      = get_field('functie');
	$content      = get_field('content');
	$contact_info = get_field('contact_info');
	$afbeelding   = get_field('afbeelding');

	$groot_afbeelding   = get_field('groot_afbeelding');

	$identifier = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $naam));
endwhile;

//echo apply_filters( 'wpml_object_id', $post->ID, 'page', TRUE);
?>

<div id="page-content" class="wie-zijn-we" >
	<div class="container-fluid">
		<div class="row no-overflow">
			<div class="container">
				<div class="row">

					<div class="col-sm-12 fluid-bg-neighbour">

						<div class="employees-container">
							<div class="employee-background">
								<div class="employee visible" id="container-<?php echo $identifier; ?>">

									<div class="row">
										<div class="row-same-height">

											<div class="col-sm-3 col-sm-push-6 col-sm-height employee-thumb-container"> <!-- image and contact container -->
												<div class="row">

													<!-- user picture -->
													<div class="col-xs-12 employee-thumb">
														<div class="row">
															<div class="col-xs-4 col-sm-12">
																<?php $identifier = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $naam)); ?>
																<img src="<?php echo $groot_afbeelding['sizes']['large'];?>" alt="" class="img-responsive" id="picture-<?php echo $identifier; ?>">
															</div>

															<div class="col-xs-8 col-sm-12 employee-thumb-contact">

																<div class="row">
																	<div class="col-xs-12 thumb-contact-pad">
																		<?php echo $contact_info; ?>
																	</div>
																</div>

															</div>
														</div>
													</div>

												</div>
											</div>

											<div class="col-sm-6 col-sm-pull-3 col-sm-height col-top">
												<div class="row">

													<!-- user background -->
													<div class="col-sm-12 pad-right-3">
														<div class="employee-content">

															<div class="employee-name">
																<?php echo $naam; ?>
															</div>
															<div class="employee-function">
																<?php echo $functie; ?>
															</div>
															<div class="employee-description">
																<?php echo $content; ?>
															</div>

														</div>
													</div>

												</div>
											</div>


											<div class="col-sm-3 employee-list-container col-sm-height col-top" style="position: relative">
												<div class="list-background"></div>
												<div class="fluid-bg top-bg bottom-bg">
													<div class="employee-list">
														<?php echo MedewerkersHelper::getSidebarMenu(); ?>
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
</div>

<?php get_footer(); ?>
