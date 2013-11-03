<?php
	$language_courses = get_language_courses();
?>
<?php get_header(); ?>
<div class="row main-wrapper">
	<div class="large-3 columns">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<div class="large-9 columns">
		<h1><?php echo $provider->name; ?></h1>

		<?php if ( $language_courses->count ) : ?>
			<table>
				<thead>
					<th class="tableblue">Course Title</th>
					<th>Language</th>
					<th>Details</th>
				</thead>
				<?php foreach ($language_courses->results as $course) : ?>
					<tr>
						<td class="tableblue"><a href="<?php echo $course->linkurl; ?>" target="_blank"><?php echo $course->title; ?></a></td>
						<td><?php echo $course->language; ?></td>
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