<?php get_header() ?>

<?php if ( have_posts() ) : ?>
<div class="main-wrapper">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="row collapse">
			<div class="small-4 columns">
				<?php get_template_part('partials/sidebar', get_post_type()); ?>
			</div>
			<div class="small-8 columns">
					<?php get_template_part('partials/content', get_post_type()); ?>
			</div>
		</div>
	<?php endwhile; ?>
</div>
<?php else : ?>
	<h1>404 Not found</h1>
<?php endif; ?>

<?php get_footer() ?>