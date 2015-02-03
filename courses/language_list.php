<?php
/*
	Template name: Page Courses - Language List
*/

	$languages = get_api_results("/languages/");
?>
<?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-xs-12 col-sm-3">
		<?php get_template_part('sidebar', 'courses'); ?>
	</div>
	<?php if ( have_posts() ) : ?>	
		<div class="col-xs-12 col-sm-9">
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
