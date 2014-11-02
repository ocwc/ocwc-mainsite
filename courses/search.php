<?php
	$results = get_search_results();
?><?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-xs-12 col-sm-3">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<div class="col-xs-12 col-sm-9">
		<h1>Search results for <?php echo $results['query']; ?></h1>

		<?php get_template_part('courses/course_search'); ?>	
		
		<?php if ( $results['count'] === 0 ) : ?>
			No results. Please try again with a more general query.
		<?php else : ?>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th class="tableblue">Course Title</th>
					<th>Language</th>
					<th>Source</th>
					<th>Details</th>
				</thead>
			<?php foreach ($results['results'] as $course) : ?>
				<tr>
					<td class="tableblue"><a href="<?php echo $course->link; ?>" target="_blank"><?php echo $course->title; ?></a></td>
					<td><?php echo implode(', ', $course->language); ?></td>
					<td><?php echo $course->source; ?></td>
					<td><a href="/courses/view/<?php echo $course->id; ?>/" target="_blank">Details</a></td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>

<?php get_template_part('partials/_search_footer'); ?>
<?php get_footer(); ?>