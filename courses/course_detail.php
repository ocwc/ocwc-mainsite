<?php
	$course = get_course_detail();
?>
<?php get_header(); ?>
<div class="row main-wrapper">
	<div class="large-3 columns">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<div class="large-9 columns">
		<h1><?php echo $course->title; ?></h1>
		<p><?php echo $course->description; ?></p>

		<p>
			<strong>Author:</strong> <?php echo $course->author; ?><br />
			<strong>Link:</strong> <a href="<?php echo $course->linkurl; ?>"><?php echo $course->linkurl; ?></a><br />
			<strong>Provider:</strong> <a href="/providers/<?php echo $course->provider; ?>/"><?php echo $course->provider_name; ?></a>
		</p>
	</div>
</div>
<?php get_footer(); ?>