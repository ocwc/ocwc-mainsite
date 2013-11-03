<?php
/*
	Template name: Page Courses - Language List
*/

	$languages = get_api_results("/languages/");
?>
<?php get_header(); ?>
<div class="row main-wrapper">
	<div class="large-3 columns">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<?php if ( have_posts() ) : ?>	
		<div class="large-9 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('partials/content', get_post_format()); ?>
			<?php endwhile; ?>

			<ul>
			<?php foreach ($languages as $language) : ?>
				<li><a href="/courses/language/<?php echo $language; ?>/"><?php echo $language; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>	
<?php get_footer(); ?>
