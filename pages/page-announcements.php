<?php
/*
	Template name: News page
*/
?>
	
<?php get_header() ?>

<div class="row main-wrapper">
	<?php if ( have_posts() ) : ?>	
		<?php get_template_part('partials/header_image', get_post_type()); ?>
		<div class="large-3 columns">
			<?php get_template_part('partials/sidebar', get_post_type()); ?>
		</div>
		<div class="large-9 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php //get_template_part('partials/content', get_post_type()); ?>
			<?php endwhile; ?>

			<?php $latest_announcments = new WP_Query(array(
														'posts_per_page' => 5,
														'post_type' => 'post'
										));
			?>
			<?php while ( $latest_announcments->have_posts() ) : $latest_announcments->the_post(); ?>
				<?php get_template_part('partials/content', get_post_type()); ?>
			<?php endwhile; ?>

			<h1>Announcements Archives</h1>
			<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 3 ) ); ?>
		</div>
	<?php else : ?>
		<h1>404 Not found</h1>
	<?php endif; ?>
</div>	

<?php get_footer() ?>