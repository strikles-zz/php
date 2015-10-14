<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title('-', true, 'right'); bloginfo('name');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class();?>>
<header id="header">
	<div class="row hidden-xs navlogo">
		<div class="col-xs-12 text-center">
			<a class="logo" href="<?php bloginfo('url')?>"><img src="<?php echo bloginfo('template_url').'/assets/img/logo.png'; ?>" alt="" class="text-center"></a>
		</div>
	</div>

	<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
		<a class="navbar-brand visible-xs" href="<?php bloginfo('url')?>"><img src="<?php echo bloginfo('template_url').'/assets/img/logo.png'; ?>" alt=""></a>
	  </div>
	  <!-- Collect the nav links, forms, and other content for toggling -->
		<?php /* Primary navigation */
			wp_nav_menu( array(
				'menu'             => 'primary',
				//'theme_location' => 'primary',
				'depth'            => 2,
				'container'        => 'div',
				'container_class'  => 'collapse navbar-collapse',
				'container_id'     => 'main-nav',
				'menu_class'       => 'nav navbar-nav',
				//Process nav menu using our custom nav walker
				'walker'           => new wp_bootstrap_navwalker())
			);
		?>
	</nav>
</header>

<div class="le_content">
