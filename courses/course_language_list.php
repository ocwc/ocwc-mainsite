<?php
	$language_courses = get_language_courses();
?>
<?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-xs-12 col-sm-3">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<div class="col-xs-12 col-sm-9">
		<h1>Open Courses in <?php echo $language_courses->language; ?></h1>

		<?php if ( $language_courses->count ) : ?>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th class="tableblue">Course Title</th>
					<th>Author</th>
					<th>Details</th>
				</thead>
				<?php foreach ($language_courses->results as $course) : ?>
					<tr>
						<td class="tableblue"><a href="<?php echo $course->linkurl; ?>" target="_blank"><?php echo $course->title; ?></a></td>
						<td><?php echo $course->author; ?></td>
						<td><a href="/courses/view/<?php echo $course->linkhash; ?>/" target="_blank"><i class="icon-search"></i> Details</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php $page = (get_query_var('page')) ? get_query_var('page') : 1; ?>
			<div class="pagination">
				<?php if ( $language_courses->previous ) : ?>
					<a href="?page=<?php echo $page-1; ?>" class="previous-page">« Previous Page</a>
				<?php endif; ?>
				<?php if ( $language_courses->next ) : ?>
					<a href="?page=<?php echo $page+1; ?>" class="next-page">Next Page »</a>
				<?php endif; ?>			
			</div>			
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>