<?php
	$course = get_course_detail();
	global $custom_title;
	$custom_title = $course->title . ' | ' . $course->provider_name;
?>
<?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-xs-12 col-sm-3">
		<?php dynamic_sidebar('sidebar-courses'); ?>
	</div>
	<div class="col-xs-12 col-sm-9">
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