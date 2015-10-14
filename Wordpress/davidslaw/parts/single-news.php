<div class="col-sm-6 col-md-4">
	<!-- Main component for a primary marketing message or call to action -->
	<div class="text-left news-item text-center">
		<div class="img-container">
			<a  href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('featured-image'); ?>
			</a>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="pull-left text-left title">
					<a href="<?php the_permalink(); ?>"><h3><?php the_title();?></h3></a>
				</div>
				<div class="pull-right text-right date">
					<div class="date-text">
					<?php
						echo date_i18n('j', strtotime($post->post_date)).'/'. date_i18n('m', strtotime($post->post_date)).'/'. date_i18n('y', strtotime($post->post_date));
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="single_content_summary text-left">
			<?php the_excerpt();?>
		</div>
	</div>
</div>
