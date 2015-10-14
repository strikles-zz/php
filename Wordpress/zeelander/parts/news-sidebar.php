<?php

global $wp_query;

$args = array(
	'post_type'   => 'page',
	'post_parent' => 262,
	'posts_per_page' => 4
);

// the query
$events = get_posts( $args );

?>

<div class="col-sm-4 col-sm-height">

	<div class="inside">

		<div class="row">
			<div class="col-xs-offset-1 col-xs-10"><h2 class="text-center">events</h2></div>
		</div>

		<div class="row">
			<div class="col-sm-12">

				<?php if ( $events ) : foreach ( $events as $event ): ?>

					<div class="row top-gap-sm">

						<div class="col-sm-12 the_event">

							<?php
								setup_postdata( $event );
								$event_date_str = get_field('event_date', $event->ID);
								$event_date = DateTime::createFromFormat('Ymd', $event_date_str);
							?>

							<div class="row">
								<div class="col-xs-3">
									<div class="text-center event-date">
										<span class="event-day"><?php echo $event_date->format('d'); ?></span>
										<span class="event-month"><?php echo $event_date->format('M'); ?></span>
									</div>
								</div>
								<div class="col-xs-9">
									<div class="row">
										<div class="col-xs-12 event-title"><a href="<?php echo post_permalink($event->ID); ?>" class="event-title-link"><?php echo get_the_title($event->ID); ?></a></div>
										<div class="col-xs-12 event-excerpt"><?php echo get_the_excerpt(); ?></div>
										<div class="col-xs-12">
											<a href="<?php echo get_the_permalink($event->ID); ?>" class="event-link">Learn More &gt;</a>
										</div>
									</div>
								</div>
							</div>

							<?php wp_reset_postdata(); ?>

						</div>


					</div>

				<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="row top-gap-sm">
			<div class="col-xs-offset-1 col-xs-10">

				<div class="row archive-sidebar">
					<div class="col-sm-12 top-gap-sm">

						<h2 class="text-center bottom-gap-sm">archive</h2>
						<div class="the_archive">
							<?php wp_get_archives(array('type' => 'monthly', 'show_post_count' => true)); ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>