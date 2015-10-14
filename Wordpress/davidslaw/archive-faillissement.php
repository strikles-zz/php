<?php
/**
 * Eenvoud media Foundetion theme
 *
 * @package WordPress
 * @subpackage Foundetion
 */


global $post;
if (isset($_REQUEST['s'])) {
	$args = array(
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC' ,
		'post_type'      => 'faillissement',
		's'              => $_REQUEST['s']
		);
	$refreshurl = '/faillissementen/';
}
else {
	$args = array(
		'posts_per_page'  => -1,
		'orderby'         => 'title',
		'order'           => 'ASC' ,
		'post_type'       => 'faillissement'
	);
}
$posts = get_posts ( $args );
?>

<?php get_header(); ?>
<div id="page-content" class="bankruptcy-archive">
	<div class="container-fluid bankruptcy-nav-bg">
		<div class="row">
			<div class="container">
				<div class="bankruptcy-navigation">
					<div class="row">
						<div class="col-xs-12 col-sm-3">
							<form role="search" class="form-group bankruptcy-searchbar" method="GET" action="<?php bloginfo('url');?>faillissementen">
								<input type="text" class="form-control search-input" name="s" value="<?php echo $_REQUEST['s']; ?>" ><input type="submit" class="form-control search-btn" value="">
							</form>
						</div>
						<div class="col-xs-12 col-sm-9">
							<div class="navigation-letters">
								<a href="<?php echo $refreshurl; ?>#letter-0" class="navigation-letter">0-9</a>
								<a href="<?php echo $refreshurl; ?>#letter-a" class="navigation-letter">a</a>
								<a href="<?php echo $refreshurl; ?>#letter-b" class="navigation-letter">b</a>
								<a href="<?php echo $refreshurl; ?>#letter-c" class="navigation-letter">c</a>
								<a href="<?php echo $refreshurl; ?>#letter-d" class="navigation-letter">d</a>
								<a href="<?php echo $refreshurl; ?>#letter-e" class="navigation-letter">e</a>
								<a href="<?php echo $refreshurl; ?>#letter-f" class="navigation-letter">f</a>
								<a href="<?php echo $refreshurl; ?>#letter-g" class="navigation-letter">g</a>
								<a href="<?php echo $refreshurl; ?>#letter-h" class="navigation-letter">h</a>
								<a href="<?php echo $refreshurl; ?>#letter-i" class="navigation-letter">i</a>
								<a href="<?php echo $refreshurl; ?>#letter-j" class="navigation-letter">j</a>
								<a href="<?php echo $refreshurl; ?>#letter-k" class="navigation-letter">k</a>
								<a href="<?php echo $refreshurl; ?>#letter-l" class="navigation-letter">l</a>
								<a href="<?php echo $refreshurl; ?>#letter-m" class="navigation-letter">m</a>
								<a href="<?php echo $refreshurl; ?>#letter-n" class="navigation-letter">n</a>
								<a href="<?php echo $refreshurl; ?>#letter-o" class="navigation-letter">o</a>
								<a href="<?php echo $refreshurl; ?>#letter-p" class="navigation-letter">p</a>
								<a href="<?php echo $refreshurl; ?>#letter-q" class="navigation-letter">q</a>
								<a href="<?php echo $refreshurl; ?>#letter-r" class="navigation-letter">r</a>
								<a href="<?php echo $refreshurl; ?>#letter-s" class="navigation-letter">s</a>
								<a href="<?php echo $refreshurl; ?>#letter-t" class="navigation-letter">t</a>
								<a href="<?php echo $refreshurl; ?>#letter-u" class="navigation-letter">u</a>
								<a href="<?php echo $refreshurl; ?>#letter-v" class="navigation-letter">v</a>
								<a href="<?php echo $refreshurl; ?>#letter-w" class="navigation-letter">w</a>
								<a href="<?php echo $refreshurl; ?>#letter-x" class="navigation-letter">x</a>
								<a href="<?php echo $refreshurl; ?>#letter-y" class="navigation-letter">y</a>
								<a href="<?php echo $refreshurl; ?>#letter-z" class="navigation-letter">z</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
				<div class="alphabet-container">
						<?php
						if (count($posts) == 0) :
						?>
							<div class="no-results text-center"> <?php echo __('Er zijn helaas geen resultaten gevonden voor de zoekterm:'); echo $_REQUEST['s']; ?>.</div>
						<?php
						endif;
						?>
						<?php
						//start counter:
						$items_per_column = 1;
						$firstLetter = '';
						$firstRow = true;

						foreach ($posts as $post) :
							$items_per_column ++;
							$extractedLetter = strtolower(substr(get_the_title(),0,1));
							if (is_numeric ($extractedLetter)) {
								$extractedLetter = '#';
							}
							if ($firstLetter != $extractedLetter) :
								// reset count
								$items_per_column = 1;

								$firstLetter = $extractedLetter;
								if ($extractedLetter == '#'){
									$referenceLetter = '0';
								}
								else {
									$referenceLetter = $extractedLetter;
								}

								if ($firstRow) {
									$firstRow = false;
								}
								else {
									?>

									</div>
								</div>
							</div>
						</div>
					</div>

									<?php
								}
						?>

					<div class="alphabet-entry" id="letter-<?php echo $referenceLetter; ?>" >
						<div class="row">
							<div class="col-xs-2 col-md-1 col-lg-1">
								<div class="alphabet-letter"><?php echo strtoupper($firstLetter); ?></div>
							</div>
							<div class="col-xs-10 col-md-11  col-lg-11">
								<div class="row">
									<div class="col-md-6 col-lg-4">

								<?php
								endif;
								?>
										<div class="alphabet-post">
											<a class="post-link" href="<?php echo the_permalink(); ?>"><?php the_title(); ?>(<?php echo count(get_field('reports')); ?>)</a>
										</div>
							<?php
								if ($items_per_column == 3) {
										// make new column
									echo '</div><div class="col-md-6 col-lg-4">';
										// reset count
									$items_per_column = 1;
								}
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

</div>



<?php get_footer(); ?>