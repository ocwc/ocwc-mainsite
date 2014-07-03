<?php
/*
	Template name: Page with News sidebar
*/
?>
<?php get_header() ?>

<div class="main-wrapper">
	<div class="row">
		<?php if ( have_posts() ) : ?>	
			<div class="small-12 medium-8 columns">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('partials/content', get_post_type()); ?>
				<?php endwhile; ?>
			</div>
			<div class="small-12 medium-4 columns">
				<?php get_template_part('partials/sidebar', 'post'); ?>
			</div>
		<?php else : ?>
			<h1>404 Not found</h1>
		<?php endif; ?>
	</div>
</div>

<?php get_footer() ?>