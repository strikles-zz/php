<?php
/**
* Eenvoud media Foundetion theme
*
* @package WordPress
* @subpackage ERoots
*/


get_header();
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		// check for subnav
		$children = 0;

		$children = wp_list_pages("title_li=&child_of=13&echo=0");

?>
<div id="content">
	<div class="container">
		<div class="row">
			<?php if($children){ ?>
			<div class="col-md-3 col-sm-4 hidden-xs">
				<div class="sub-menu green">
					<ul> <?php echo $children; ?></ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
			<?php } else { // no subnav?>
			<div class="col-md-12">
			<?php } ?>
				<h1><?php if (!is_front_page()) {the_title();} ?></h1>
				<div class="fotoboek">
					<div class="row">
						<?php
							$fotoboek = get_field('fotoboek');
							foreach ($fotoboek as $foto) {
								$right = false;
								if (rand(0,10) > 5) {
									$right = true;
								}
							?>
								<div class="col-md-6">
									<div class="foto-container <?php if ($right) {echo 'right';} else { echo 'left';}?>">
										<a href="<?php echo $foto['foto']['url'];?>" class="colorbox" rel="fotoboek">
										<img src="<?php echo $foto['foto']['sizes']['fotoboek'];?> " alt="">
										</a>
									</div>
								</div>

							<?php
							}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	} // end while
} // end if

get_footer();

?>