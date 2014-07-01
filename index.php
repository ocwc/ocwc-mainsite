<?php get_header() ?>

<div class="main-wrapper">
	<div class="row">
		<?php if ( have_posts() ) : ?>	
			<div class="large-3 columns">
				<?php get_template_part('partials/sidebar', get_post_type()); ?>
			</div>
			<div class="large-9 columns">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('partials/content', get_post_type()); ?>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<h1>404 Not found</h1>
		<?php endif; ?>
	</div>
</div>

<?php get_footer() ?>