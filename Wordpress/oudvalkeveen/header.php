<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title('-', true, 'right'); bloginfo('name');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-30611928-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class();?>>

<header>
	<!-- navbar -->
	<nav class="navbar custom-navbar navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="container">


			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu.png" alt="">
				</button>

			</div>
			<div class="normal-menu">
			<?php
				$logo = '
					<div class="logo-wifi">
						<div class="logo-container">
							<div class="logo logo-normal"></div>
							<div class="ballen ballen-normal"></div>
						</div>
					</div>';

				$defaults = array(
					'theme_location'  => 'header_navigation',
					'menu'            => 'header_navigation',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
					'container_id'    => 'navwrap',
					'menu_class'      => 'dropdown',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-left">%3$s</ul>'.$logo,
					'depth'           => 0,
					'walker'          => new wp_bootstrap_navwalker()
				);
				wp_nav_menu($defaults);
			?>
			</div>
			<div class="row mobile-menu">
			<?php
				$defaults = array(
					'theme_location'  => 'header_mobile_navigation',
					'menu'            => 'header_mobile_navigation',
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
					'container_id'    => 'navwrap',
					'menu_class'      => 'dropdown',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-left">%3$s</ul>',
					'depth'           => 0,
					'walker'          => new wp_bootstrap_navwalker()
				);
				wp_nav_menu($defaults);
			?>

				<div class="logo-wifi" style="margin-top: 50px; z-index: -1;">
					<div class="logo-container">
						<div class="logo logo-mobile"></div>
						<div class="ballen ballen-mobile"></div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<!--
	<svg class="clip-svg" width="0" height="0">
	  <defs>
		<clipPath id="clip-shape" clipPathUnits="objectBoundingBox">
		  <polygon points="0 0, 1 0, 1 1, 0.05 1" />
		</clipPath>
	  </defs>
	</svg>
	-->

</header>
