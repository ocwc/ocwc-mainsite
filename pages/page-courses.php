<?php
/*
	Template name: Page Course
*/

	$stats = get_api_results("/courses/stats/");
?>
<?php get_header(); ?>
<div class="row main-wrapper">
	<?php get_template_part('partials/header_image', get_post_type()); ?>
	<div class="large-3 columns">
		<p class="sidebar-title">Navigation</p>
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<?php if ( have_posts() ) : ?>	
		<div class="large-9 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('partials/content', get_post_type()); ?>
			<?php endwhile; ?>

			<p>We are currently tracking <strong><?php echo $stats->courses ?> courses</strong> from <strong><?php echo $stats->providers; ?> providers</strong>.</p>
			<?php get_template_part('courses/course_search'); ?>
		</div>
	<?php endif; ?>
</div>	
<?php get_footer(); ?>