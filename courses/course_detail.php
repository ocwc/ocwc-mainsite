<?php
	$course = get_course_detail();
	global $custom_title;
	$custom_title = $course->title . ' | ' . $course->provider_name;
?>
<?php get_header(); ?>
<div class="container main-wrapper">
	<div class="col-xs-12 col-sm-3">
		<?php get_template_part('sidebar', 'courses'); ?>
	</div>
	<div class="col-xs-12 col-sm-9">
		<h1><?php echo $course->title; ?></h1>
		<p><?php echo $course->description; ?></p>

		<p>
			<strong>Author:</strong> <?php echo $course->author; ?><br />			
			<strong>Organization:</strong> <a href="/providers/<?php echo $course->provider; ?>/"><?php echo $course->provider_name; ?></a>
		</p>

		<?php if ( $course->categories ) : ?>
			<strong>Categories:</strong>
			<ul>
				<?php foreach ($course->categories as $cat) : ?>
					<li><?php echo str_replace('/', ' / ', str_replace('All/', '', $cat)); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( $course->merlot_id ) : ?>
		<p>
			<a href="http://www.merlot.org/merlot/viewMaterial.htm?id=<?php echo $course->merlot_id; ?>" target="_blank">
				View More Information about the Course on MERLOT
			</a>
		</p>
		<?php endif; ?>
		<p>
			<a href="<?php echo $course->linkurl; ?>" class="btn btn-lg btn-primary" target="_blank">View Course</a>
		</p>
	</div>
</div>

<?php get_template_part('partials/_search_footer'); ?>
<?php get_footer(); ?>