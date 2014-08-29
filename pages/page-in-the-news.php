<?php
/*
	Template name: In The News page
*/
?>
	
<?php get_header() ?>

<div class="row main-wrapper">
	<?php if ( have_posts() ) : ?>	
		<div class="col-xs-12 col-sm-3">
			<?php get_template_part('partials/sidebar', get_post_type()); ?>
		</div>
		<div class="col-xs-12 col-sm-9">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('partials/content', get_post_type()); ?>
			<?php endwhile; ?>

			<?php $latest_newslink = new WP_Query(array(
														'posts_per_page' => 30,
														'post_type' => 'newslink'
										));
			?>
			<?php while ( $latest_newslink->have_posts() ) : $latest_newslink->the_post(); ?>
				<?php get_template_part('partials/content', get_post_type()); ?>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<h1>404 Not found</h1>
	<?php endif; ?>
</div>	

<?php get_footer() ?>