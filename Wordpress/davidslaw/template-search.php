<?php
/*
Template Name: Search Page
*/
?>

<?php
/**
 * Eenvoud media Foundetion theme
 *
 * @package WordPress
 * @subpackage Foundetion
 */

?>

<?php get_header(); ?>
<div id="page-content" class="search-page">
	<div class="container-fluid bankruptcy-nav-bg">
		<div class="row">
			<div class="container">
				<div class="bankruptcy-navigation">
					<div class="row">
						<div class="col-xs-12 col-sm-9">
							<div class="searchresults">
								<span class="title"><?php echo __('Zoekresultaten '); ?>  </span><span class="query"><?php echo __('voor '); ?> <?php echo $_REQUEST['Search']; ?></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3">
							<form role="search" class="form-group bankruptcy-searchbar pull-right" method="POST" action="<?php bloginfo('url');?>/search/">
								<input type="text" class="form-control search-input" name="Search" ><input type="submit" class="form-control search-btn" value="">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
				<div class="category-container">
					<?php
					//start counter:
					$items_per_column = 0;
					$firstLetter = '';
					$firstRow = true;




					if (isset($_REQUEST['Search'])) {
						$args = array(
							'posts_per_page' => -1,
							'orderby'        => 'meta_key',
							'order'          => 'ASC' ,
							'post_type'      => 'page',
							's'              => $_REQUEST['Search']
							);
					}
					else {
						$args = array(
							'posts_per_page'  => -1,
							'orderby'         => 'meta_key',
							'order'           => 'ASC' ,
							'post_type'       => 'page'
						);
					}
					$posts = query_posts( $args );

					?>
					<div class="category-title"><?php echo __('Pagina\'s');?> <span class="count">(<?php echo count($posts); ?>)</span></div>

					<div class="category-entries">
						<div class="row">
						<?php
						if (count($posts) == 0) :
						?>
							<div class="col-md-12">
								<div class="no-results"><?php echo __('Er zijn geen Pagina\'s gevonden voor de zoekterm'); ?><?php echo $_REQUEST['Search']; ?>.</div>
							</div>

						<?php
						endif;
						while ( have_posts() ) : the_post();
							if (get_the_excerpt() || true) :
								$excerpt = implode(' ', array_slice(explode(' ', get_the_excerpt()), 0, 15));
						?>
							<div class="col-md-3">
								<div class="page-entry">
									<a href="<?php echo get_the_permalink(); ?>">
										<div class="page-title"><?php the_title(); ?></div>
										<div class="page-excerpt"><?php echo $excerpt; ?></div>
									</a>
								</div>
							</div>
						<?php
							endif;
						endwhile;
						?>


						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 ">
				<div class="category-container">
					<?php
					//start counter:
					$items_per_column = 0;
					$firstLetter = '';
					$firstRow = true;




					if (isset($_REQUEST['Search'])) {
						$args = array(
							'posts_per_page' => -1,
							'orderby'        => 'meta_key',
							'order'          => 'ASC' ,
							'post_type'      => 'post',
							's'              => $_REQUEST['Search']
							);
					}
					else {
						$args = array(
							'posts_per_page'  => -1,
							'orderby'         => 'meta_key',
							'order'           => 'ASC' ,
							'post_type'       => 'post'
						);
					}
					$posts = query_posts( $args );

					?>
					<div class="category-title"><?php echo __('Nieuws');?> <span class="count">(<?php echo count($posts); ?>)</span></div>

					<div class="category-entries">
						<div class="row">
						<?php
						if (count($posts) == 0) :
						?>
							<div class="col-md-12">
								<div class="no-results"><?php echo __('Er zijn geen Pagina\'s gevonden voor de zoekterm'); ?><?php echo $_REQUEST['Search']; ?>.</div>
							</div>

						<?php
						endif;
						while ( have_posts() ) : the_post();
							$excerpt = implode(' ', array_slice(explode(' ', get_the_excerpt()), 0, 15));

						?>
							<div class="col-md-3">
								<div class="post-entry">
									<a href="<?php echo get_the_permalink(); ?>">
										<div class="post-title"><?php the_title(); ?></div>
										<div class="post-excerpt"><?php echo $excerpt; ?></div>
									</a>
								</div>
							</div>
						<?php
						endwhile;
						?>


						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 ">
				<div class="category-container">
					<?php
					//start counter:
					$items_per_column = 0;
					$firstLetter = '';
					$firstRow = true;


					if (isset($_REQUEST['Search'])) {
						$args = array(
							'posts_per_page' => -1,
							'orderby'        => 'meta_key',
							'order'          => 'ASC' ,
							'post_type'      => 'faillissement',
							's'              => $_REQUEST['Search']
							);
					}
					else {
						$args = array(
							'posts_per_page'  => -1,
							'orderby'         => 'meta_key',
							'order'           => 'ASC' ,
							'post_type'       => 'faillissement'
						);
					}
					$posts = query_posts( $args );
					?>

					<div class="category-title"><?php echo __('Faillissementen');?> <span class="count">(<?php echo count($posts); ?>)</span></div>

					<div class="category-entries">
						<div class="row">
						<?php
						if (count($posts) == 0) :
						?>
							<div class="col-md-12">
								<div class="no-results"><?php echo __('Er zijn geen Pagina\'s gevonden voor de zoekterm'); ?><?php echo $_REQUEST['Search']; ?>.</div>
							</div>

						<?php
						endif;
						while ( have_posts() ) : the_post();
						?>
							<div class="col-md-3">
								<div class="bankruptcy-entry">
									<a href="<?php echo get_permalink(); ?>"><div class="bankruptcy-name"><?php the_title(); ?>(<?php echo count(get_field('reports')); ?>)</div></a>
								</div>
							</div>
						<?php
						endwhile;
						?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>



<?php get_footer(); ?>