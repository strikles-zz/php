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
				<a href="#" id="test" data-toggle="modal" data-target="#myModal"><img src="<?php echo get_template_directory_uri();?>/assets/img/foundetion-logo.png" alt=""></a>
			</div>
			<div class="col-md-12 text-center">
				<p>404: Something went wrong, the page you were looking for does not exist.</p>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>