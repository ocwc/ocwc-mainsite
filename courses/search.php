<?php
	$results = get_search_results();
?><?php get_header(); ?>
<div class="row">
	<div class="large-3 columns">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<div class="large-9 columns">
		<p>Search results for <strong><?php echo $results['query']; ?></strong></p>

		<?php if ( $results['count'] === 0 ) : ?>
			No results. Please try again with a more general query.
		<?php else : ?>
			<table>
				<thead>
					<th>Course Title</th>
					<th>Details</th>
					<th>Source</th>
					<th>Language</th>
				</thead>
			<?php foreach ($results['results'] as $course) : ?>
				<tr>
					<td><a href="<?php echo $course->link; ?>" target="_blank"><?php echo $course->title; ?></a></td>
					<td><a href="/courses/view/<?php echo $course->id; ?>/" target="_blank">Details</a></td>
					<td><?php echo $course->source; ?></td>
					<td><?php echo $course->language; ?></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>