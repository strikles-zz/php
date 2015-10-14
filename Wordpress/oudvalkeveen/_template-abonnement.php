<?php
/*
Template Name: Abonnement
*/

get_header();
the_post();
?>

<div id="content">
	<div class="container">
		<div class="row">

			<div class="col-md-3 col-sm-4 hidden-xs">
				<?php echo get_template_part('parts/subnav'); ?>
			</div>

			<div class="<?php echo $children ? 'col-md-9 col-sm-8' : 'col-md-12'; ?>">

			<?php echo get_template_part('includes/afrekenen/e-ticket.php'); ?>

			</div>
		</div>
	</div>
</div>

<?php 

get_footer(); 

?>