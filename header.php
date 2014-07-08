<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<!-- <link href='http://fonts.googleapis.com/css?family=Oxygen:300,400,700|Metrophobic:400' rel='stylesheet' type='text/css'> -->

	<meta name="google-translate-customization" content="d3bf6f511902d7f2-750e02196618cb43-gadc8982319c58076-15">
  	<?php wp_head(); ?>

  	<!--[if lte IE 8]>
  		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/build/css/ie8.css">
  		<script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/html5shiv/dist/html5shiv.min.js"></script>
  		<script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/selectivizr/selectivizr.js"></script>
  		<script src="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/respond/dest/respond.min.js"></script>
	<![endif]-->

</head>
<body <?php body_class(); ?> >
	<div class="header">
		<div class="row header-row">
			<div class="show-for-medium-up medium-2 columns right text-center tab members">
				<a href="http://members.oeconsortium.org" class="member-portal">Members Portal</a>
			</div>
			<div class="show-for-medium-up medium-3 large-2 columns tab right translation">
				<div id="google_translate_element"></div><script type="text/javascript">
				function googleTranslateElementInit() {
				  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true, autoDisplay: false}, 'google_translate_element');
				}
				</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>        
			</div>
		</div>

		<div class="row">
			<div class="small-12 medium-4 left columns">
				<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="The Open Education Consortium" class="logo" /></a>
			</div>
			<div class="small-12 medium-3 right columns search-form-row">
				<form class="header-search" method="GET" action="/courses/search/">
					<input placeholder="Search for open courses ..." name="search">
					<i class="icon-search header-search-icon"></i>
				</form>
			</div>
		</div>

		<?php if (!is_page('styles') ) : ?>
		<div class="row collapse">
			<div class="small-12 columns navigation">
				<a class="toggle-menu" href="#">Menu</a>
				<?php wp_nav_menu(array(
					'theme_location' => 'navigation-menu',
				)); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>