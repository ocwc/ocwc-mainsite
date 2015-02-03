<?php
/*
	Template name: Page Catalog
*/
$categories = get_api_results("/categories/");
?>
<?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-xs-12 col-sm-3">
		<?php get_template_part('sidebar', 'courses'); ?>
	</div>
	<div class="col-xs-12 col-sm-9">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part('partials/content', get_post_type()); ?>
	<?php endwhile; ?>
	<?php $c = 0; ?>
	<?php foreach ($categories as $parent_category) : ?>
		<?php if ($c === 0): ?>
			<div class="col-xs-5">
		<?php elseif ($c === 4): ?>
			</div>
			<div class="col-xs-5">
		<?php endif ;?>
		<ul>
			<?php if ($parent_category->course_count > 0) : ?>
				<li><a href="/courses/category/<?php echo $parent_category->category_id ;?>/" class="category-link"><?php echo $parent_category->name ;?></a> (<?php echo $parent_category->course_count; ?>)</li>
			<?php else : ?>
				<li><?php echo $parent_category->name ;?> (<?php echo $parent_category->course_count; ?>)</li>
			<?php endif; ?>
			<ul>
			<?php foreach ($parent_category->children as $child_category) : ?>
				<?php if ($child_category->course_count > 0) : ?>
					<li><a href="/courses/category/<?php echo $child_category->category_id ;?>/" class="category-link"><?php echo $child_category->name ;?></a> (<?php echo $child_category->course_count; ?>)</li>
				<?php else : ?>
					<li><?php echo $child_category->name ;?> (<?php echo $child_category->course_count; ?>)</li>
				<?php endif; ?>
			<?php endforeach; ?>
			</ul>
		</ul>
		<?php $c += 1; ?>
	<?php endforeach; ?>
		</div> <!-- close last div ->
	</div>
</div>
<?php get_footer(); ?>