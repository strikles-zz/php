<div class="col-sm-6 the_article">

	<div class="row top-gap-sm text-center">
		<div class="col-xs-12 post-thumb">

			<?php if(has_post_thumbnail()) { the_post_thumbnail('post-size'); } else { ?>
				<img src="<?php echo get_bloginfo('url').'/wp-content/themes/foundetion/assets/img/no-image.png' ?>" alt="">
			<?php }; ?>

		</div>

		<div class="col-xs-12 article-title top-gap-sm">
			<a href="<?php the_permalink(); ?>" class="article-title"><?php the_title();?></a>
		</div>

		<div class="col-xs-12 article-content">
			<?php echo the_excerpt(); ?>
		</div>

		<div class="col-xs-12">
			<a href="<?php the_permalink(); ?>" class="article-link">Learn More &gt;</a>
		</div>

	</div>
</div>
