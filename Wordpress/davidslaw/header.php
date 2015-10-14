<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title('-', true, 'right'); bloginfo('name');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="<?php bloginfo('template_url');?>/assets/img/davids-advocaten.png" />
<?php wp_head(); ?>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.slide.js"></script>
</head>



<body <?php body_class();?>>
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- navbar -->
					<nav class="navbar navbar-default" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="/"><img class="logo" src="<?php echo get_field('header_logo','options')['url']; ?>" alt="EFD Online"></a>
						</div>


						<?php

							$search_form = '<li id="nav_searchform" class="hidden-xs">
												<form  class="navbar-form navbar-left" role="search" method="POST" action="'. get_site_url() .'/search/">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Search" name="Search">
													</div>
												</form>
											</li>
											<li class="hidden-xs"><a href="#" id="nav_searchbtn"><i class="fa fa-search"></i></a></li>
											<li class="hidden-xs">';

							// ob_start();
							// do_action('icl_language_selector');
							// $lang_switcher = ob_get_contents();
							// ob_end_clean();

							// $lang_switcher = str_replace(['English', 'Nederlands'], ['EN', 'NL'], $lang_switcher);
							$lang_switcher = '';
							$search_form .= $lang_switcher .' </li>';

							$defaults = array(
								'theme_location'  => '',
								'menu'            => 'mainmenu',
								'container'       => 'div',
								'container_class' => 'collapse navbar-collapse navbar-ex1-collapse ',
								'container_id'    => 'navwrap',
								'menu_class'      => 'dropdown',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-right">%3$s'. $search_form .'</ul>',
								'depth'           => 0,
								'walker'          => new wp_bootstrap_navwalker()
							);
							wp_nav_menu($defaults);
						?>

					</nav>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<?php
					if (is_front_page()) {
						get_template_part('parts/header', 'slider');
					}
					else {
						get_template_part('parts/header', 'single');
					}
				?>
			</div>
		</div>
	</header>