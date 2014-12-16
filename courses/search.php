<?php
	$results = get_search_results();
?><?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-sm-12">
		<h1>Open Educational Resources about <i><?php echo $results['query']; ?></i></h1>

		<?php get_template_part('courses/course_search'); ?>	
		
		<?php if ( ! $results['results'] ) : ?>
			<div class="col-sm-10 col-sm-offset-1">
				No results. Please check spelling and try a more general query. You can also browse <a href="http://www.merlot.org/merlot/index.htm" target="_blank">MERLOT</a> database.
			</div>
		<?php else : ?>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th class="tableblue">Course Title</th>
					<th>Language</th>
					<th>Author</th>
					<th>Details</th>
				</thead>
			<?php foreach ($results['results'] as $course) : ?>
				<tr>
					<td class="tableblue"><a href="<?php echo $course->link; ?>" target="_blank"><?php echo $course->title; ?></a></td>
					<?php if ( is_string($course->language) ) : ?>
						<td><?php echo $course->language; ?></td>
					<?php else : ?>
						<td><?php echo implode(', ', $course->language); ?></td>
					<?php endif; ?>

					<td><?php echo $course->source; ?></td>
					<td><a href="/courses/view/<?php echo $course->id; ?>/" target="_blank">Details</a></td>
				</tr>
			<?php endforeach; ?>
			</table>

			<div class="pagination col-sm-12">
				<?php if ( array_key_exists ( 'next_page', $results ) ) : ?>
					<a href="/courses/search/?<?php echo $results['next_page']; ?>" class="next-page pull-right">Next Page »</a>
				<?php endif; ?>

				<?php if ( array_key_exists ( 'previous_page', $results ) ) : ?>
					<a href="?<?php echo $results['previous_page']; ?>" class="previous-page pull-left">« Previous Page</a>
				<?php endif; ?>
			</div>			

		<?php endif; ?>
	</div>
</div>

<?php get_template_part('partials/_search_footer'); ?>
<?php get_footer(); ?>