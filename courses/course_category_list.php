<?php
	$courses = get_category_courses();
?>
<?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-xs-12 col-sm-3">
		<?php get_template_part('sidebar', 'courses'); ?>
	</div>
	<div class="col-xs-12 col-sm-9">
		<?php if ( $courses->count ) : ?>
			<h1><?php echo $courses->title; ?></h1>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th class="tableblue">Course Title</th>
					<th>Language</th>
					<th>Details</th>
				</thead>
				<?php foreach ($courses->results as $course) : ?>
					<tr>
						<td class="tableblue"><a href="<?php echo $course->linkurl; ?>" target="_blank"><?php echo $course->title; ?></a></td>
						<td>

						<?php echo implode(', ', $course->language); ?></td>
						<td><a href="/courses/view/<?php echo $course->linkhash; ?>/" target="_blank"><i class="icon-search"></i> Details</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php $page = (get_query_var('page')) ? get_query_var('page') : 1; ?>
			<div class="pagination">
				<?php if ( $courses->previous ) : ?>
					<a href="?page=<?php echo $page-1; ?>" class="previous-page">« Previous Page</a>
				<?php endif; ?>
				<?php if ( $courses->next ) : ?>
					<a href="?page=<?php echo $page+1; ?>" class="next-page">Next Page »</a>
				<?php endif; ?>			
			</div>			
		<?php endif; ?>
	</div>
</div>

<?php get_template_part('partials/_search_footer'); ?>
<?php get_footer(); ?>