<?php
	$provider = get_provider_detail();
	$provider_courses = get_provider_courses();
?>
<?php get_header(); ?>
<div class="row">
	<div class="large-3 columns">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<div class="large-9 columns">
		<h1><?php echo $provider->name; ?></h1>
	
		<?php if ( count($provider_courses) ) : ?>
			<table>
				<thead>
					<th class="tableblue">Course Title</th>
					<th>Details</th>
					<th>Language</th>
				</thead>
				<?php foreach ($provider_courses as $course) : ?>
					<tr>
						<td class="tableblue"><a href="<?php echo $course->linkurl; ?>" target="_blank"><?php echo $course->title; ?></a></td>
						<td><a href="/courses/view/<?php echo $course->id; ?>/" target="_blank">Details</a></td>
						<td><?php echo $course->language; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>			
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>