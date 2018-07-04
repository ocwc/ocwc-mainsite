<?php
/*
	Template name: Page Members
*/

?>

<?php get_header(); ?>
<div class="container main-wrapper">
	<div class="show-for-sm-up col-sm-12">
		<div id="map"></div>
	</div>
	<div class="show-for-sm-up col-sm-3">
		<p><a class="btn btn-primary btn-square btn-lg btn-block button_how-to-join" href="/about-ocw/membership/how-to-join/">How To Join</a></p>
		<?php get_template_part('partials/members-sidebar'); ?>
	</div>
	<?php if ( have_posts() ) : ?>
		<div class="col-xs-12 col-sm-9">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('partials/content', get_post_type()); ?>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
