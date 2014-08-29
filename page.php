<?php get_header() ?>

<?php if ( have_posts() ) : ?>
<div class="main-wrapper">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="col-xs-12 col-sm-4">
				<?php get_template_part('partials/sidebar', get_post_type()); ?>
			</div>
			<div class="col-xs-12 col-sm-8">
					<?php get_template_part('partials/content', get_post_type()); ?>
			</div>
		</div>
	<?php endwhile; ?>
</div>
<?php else : ?>
	<h1>404 Not found</h1>
<?php endif; ?>

<?php get_footer() ?>