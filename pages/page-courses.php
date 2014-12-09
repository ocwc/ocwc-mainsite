<?php
/*
	Template name: Page Course
*/

	$stats = get_api_results("/courses/stats/");
?>
<?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-sm-3">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<?php if ( have_posts() ) : ?>	
		<div class="col-sm-9">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('partials/content', get_post_type()); ?>
			<?php endwhile; ?>

			<?php /*
			<p>We are currently tracking <strong><?php echo $stats->courses ?> courses</strong> from <strong><?php echo $stats->providers; ?> providers</strong>.</p>
			*/ ?>
			<?php get_template_part('courses/course_search'); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_template_part('partials/_search_footer'); ?>
<?php get_footer(); ?>