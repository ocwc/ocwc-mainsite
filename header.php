<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<meta name="google-translate-customization" content="d3bf6f511902d7f2-750e02196618cb43-gadc8982319c58076-15">
  	<?php wp_head(); ?>

  	<!--[if lte IE 8]>
  		<script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/html5shiv/dist/html5shiv.min.js"></script>
  		<script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/selectivizr/selectivizr.js"></script>
  		<script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/respond/dest/respond.min.js"></script>
	<![endif]-->

</head>
<body <?php body_class(); ?> >
	<div class="header-container-wrapper">
			<div class="header-row">
				<div class="container">
					<div class="show-for-xs-up col-sm-2 pull-right text-center tab members">
						<a href="http://members.oeconsortium.org" class="member-portal">Members Portal</a>
					</div>

					<div class="show-for-xs-up col-sm-2 pull-right tab translation">
						<?php get_template_part('partials/translate_widget'); ?>
					</div>
				</div>
			</div>
		
		<div class="container">
			<div class="col-xs-12 col-sm-4 pull-left">
				<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="The Open Education Consortium" class="logo" /></a>
			</div>
			<div class="col-xs-12 col-sm-3 pull-right search-form-row">
				<form class="header-search" method="GET" action="/courses/search/">
					<input placeholder="Search for open courses ..." name="search">
					<i class="icon-search header-search-icon"></i>
				</form>
			</div>
		</div>
	
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header visible-xs-block">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-menu">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<?php 
		            wp_nav_menu( array(
		                'menu'              => 'navigation-menu',
		                'theme_location'    => 'navigation-menu',
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		        		'container_id'      => 'navigation-menu',
		                'menu_class'        => 'nav navbar-nav',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
		        ?>
			</nav>
		</div>
	</div>
