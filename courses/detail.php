<?php
	$course = get_course_detail();
?>
<?php get_header(); ?>
<div class="row">
	<div class="large-3 columns">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<div class="large-9 columns">
		<h1><?php echo $course->title; ?></h1>
		<p><?php echo $course->description; ?></p>

		<p>
			<strong>Author:</strong> <?php echo $course->author; ?><br />
			<strong>Link:</strong> <a href="<?php echo $course->linkurl; ?>"><?php echo $course->linkurl; ?></a><br />
			<strong>Source:</strong> <?php echo $course->source; ?>
		</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>