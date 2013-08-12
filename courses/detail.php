<?php
	$course = get_course_detail();
?>
<?php get_header(); ?>
<div class="row">
	<div class="large-9 columns">
		<h1><?php echo $course->title; ?></h1>
		<p><?php echo $course->description; ?></p>
	</div>
</div>
<?php get_footer(); ?>