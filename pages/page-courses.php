<?php
/*
	Template name: Page Course
*/
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

			<?php get_template_part('courses/course_search'); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_template_part('partials/_search_footer'); ?>
<?php get_footer(); ?>