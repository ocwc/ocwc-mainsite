<?php
/*
	Template name: API - Header
*/
?>
<div class="header-container-wrapper">
		<div class="header-row">
			<div class="container">
				<div class="show-for-xs-up col-sm-3 col-md-2 pull-right text-center tab members">
					<a href="https://members.oeconsortium.org" class="member-portal">Members Portal</a>
				</div>

				<div class="show-for-xs-up col-sm-3 col-md-2 pull-right tab translation">
					<?php get_template_part('partials/translate_widget'); ?>
				</div>
			</div>
		</div>

	<div class="container">
		<div class="col-xs-12 col-sm-4 pull-left">
			<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="The Open Education Consortium" class="logo" /></a>
		</div>
	</div>

	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header visible-xs-block">
				<form class="header-search" method="GET" action="/courses/search/">
					<input placeholder="Search for open courses ..." name="search">
				</form>

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
