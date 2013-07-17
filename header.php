<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  	<link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/stylesheets/app.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
  	<link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/stylesheets/style.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
  	<script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/respond.min.js"></script>

  	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<div class="row" id="top-nav">
		<div class="large-2 push-7 columns">
			<form>
				<select>
					<option value="en">English</option>
					<option value="fr">French</option>
				</select>
			</form>
		</div>
		<div class="large-4 columns">
			<a href="#">MEMBER LOGIN</a> | <a href="#">HELP</a>
		</div>
	</div>

	<div class="row">
		<div class="large-4 columns">
			<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="OpenCourseWare Consortium logo" /></a>
		</div>
		<div class="large-4 columns">
			<form>
				<input placeholder="Search for courses and site content">
			</form>
			<a href="#">ADVANCED SEARCH</a>
		</div>
	</div>

	<div class="row">
		<div class="large-12 columns">
			<ul>
				<?php wp_nav_menu(array(
					'theme_location' => 'navigation-menu'
				)); ?>				
			</ul>
		</div>
	</div>