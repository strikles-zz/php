<?php
/*
Template Name: Wie Zijn We
*/

get_header();

$helperclass = ABSPATH.'wp-content/themes/foundetion/includes/MedewerkersHelper.class.php';
require_once $helperclass;

$employees = MedewerkersHelper::getMedewerkers();
?>

<div id="page-content" class="wie-zijn-we" >
	<div class="container-fluid">
		<div class="row no-overflow">
			<div class="container">

				<div class="row">
					<div class="row-same-height">

						<div class="col-sm-8 fluid-bg-neighbour col-sm-height">

							<div class="employees-container">
								<div class="employee-thumbnails">
									<div class="row">

										<?php
											$first = true;
											foreach ($employees as $employee) {

												$naam         = get_the_title();
												$functie      = get_field('functie', $employee->ID);
												$content      = get_field('content', $employee->ID);
												$contact_info = get_field('contact_info', $employee->ID);
												$afbeelding   = get_field('afbeelding', $employee->ID);
												$identifier = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $naam));

												$path = get_permalink($employee->ID);

										?>
												<div class="col-sm-3 col-xs-2">
													<div class="employee-thumbnail-container" id="thumbnail-<?php echo $employee->post_name; ?>" style="background:url(<?php echo $afbeelding['sizes']['thumbnail'];?>);">
														<a href="<?php echo $path; ?>">
															<img class="img-responsive" src="<?php echo $afbeelding['sizes']['thumbnail'];?>" alt="" style="opacity: 0;">
														</a>
													</div>
												</div>
										<?php
												$first = false;
											}
										?>

									</div>
								</div>
							</div>

						</div>

						<div class="col-sm-4 employee-list-container col-sm-height col-top"  style="position: relative">
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

<?php get_footer(); ?>
