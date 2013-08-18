<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Metrophobic' rel='stylesheet' type='text/css'>

  	<link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/stylesheets/app.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/stylesheets/ocwc.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
  	<link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/stylesheets/style.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
  	<script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/respond.min.js"></script>

	<meta name="google-translate-customization" content="d3bf6f511902d7f2-750e02196618cb43-gadc8982319c58076-15"></meta>
  	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<div class="row" id="top-nav">
		<div class="large-2 push-9 columns">
			<div id="google_translate_element"></div><script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
			}
			</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>        
		</div>
		<div class="large-3 push-2 columns">
			<a href="#">MEMBER LOGIN</a> | <a href="#">HELP</a>
		</div>
	</div>

	<div class="row">
		<div class="large-4 columns">
			<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="OpenCourseWare Consortium logo" /></a>
		</div>
		<div class="large-4 columns">
			<form id="header-search" method="GET" action="/courses/search/">
				<input placeholder="Search for courses and site content" name="q">
			</form>
			<!-- <a href="#">ADVANCED SEARCH</a> -->
		</div>
	</div>
	<?php if (!is_page('styles') ) : ?>
	<div class="row">
		<div class="large-12 columns">
			<ul>
				<?php wp_nav_menu(array(
					'theme_location' => 'navigation-menu'
				)); ?>				
			</ul>
		</div>
	</div>
	<?php endif; ?>