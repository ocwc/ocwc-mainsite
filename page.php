<?php get_header() ?>

<?php if ( have_posts() ) : ?>	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part('partials/header_image', get_post_type()); ?>
		<div class="row main-wrapper">
			<div class="large-3 columns">
				<?php get_template_part('partials/sidebar', get_post_type()); ?>
			</div>
			<div class="large-9 columns">
					<?php get_template_part('partials/content', get_post_type()); ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<h1>404 Not found</h1>
<?php endif; ?>

<?php get_footer() ?>