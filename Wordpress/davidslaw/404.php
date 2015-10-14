<?php
/**
* Eenvoud media Foundetion theme
*
* @package WordPress
* @subpackage ERoots
*/

/*======================================
=            404 error page            =
======================================*/


get_header();

?>

<div class="foundetion">
	<div class="container">
		<div class="row">

			<div class="col-md-12 text-center">
				<h2><?php echo _('Excuses! De pagina die u op probeert te vragen is helaas niet beschikbaar.');?></h2>
				<h4><?php echo _('Foutcode: 404');?></h4>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>