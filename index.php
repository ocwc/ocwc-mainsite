<?php get_header() ?>

<div class="row">
	<?php if ( have_posts() ) : ?>	
		<div class="large-3 columns">
			<?php dynamic_sidebar('sidebar-general'); ?>
		</div>
		<div class="large-9 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('partials/content', get_post_format()); ?>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<h1>404 Not found</h1>
	<?php endif; ?>
</div>	

<?php get_footer() ?>