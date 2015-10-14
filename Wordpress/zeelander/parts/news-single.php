<div class="col-sm-8 col-sm-height news-sidebar">
	<div class="inside">
		<div class="row">
			<div class="col-sm-12">

				<div class="row">

					<div class="col-xs-12 text-center">
						<h2><?php the_title(); ?></h2>
					</div>

					<div class="col-xs-12 text-center single-date"><?php the_date(); ?></div>


					<div class="col-xs-12 single-thumb text-center bottom-gap-xs">
						<?php if(has_post_thumbnail()) { the_post_thumbnail('single'); } ?>
					</div>

					<div class="col-xs-12 text-center">
						<?php the_content(); ?>
					</div>

					<div class="col-xs-12 text-center top-gap-sm">
						<a href="/news" class="back-overview">&lt; back to overview</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>