<?php get_header() ?>

<?php get_template_part('partials/home_slideshow'); ?>

<div id="call-to-action" class="hide-for-small">
	<div class="row">
		<div class="large-3 columns">
			<div class="cta-header">
				<a href="/courses/">
					<i class="icon-book"></i>
					<h1>Courses</h1>
					<h2>Learn</h2>
				</a>
			</div>
			<p>Discover Courses from Institutions around the world</p>
			<a href="/courses/">+ search courses</a>
		</div>
		<div class="large-3 columns">
			<div class="cta-header">
				<a href="/about-ocw/">
					<i class="icon-question-sign"></i>
					<h1>About</h1>
					<h2>Open Education</h2>
				</a>
			</div>
			<p>What is OpenCourseWare and how it empowers Open Education movement</p>
			<a href="/about-ocw/">+ learn more</a>
		</div>
		<div class="large-3 columns">
			<div class="cta-header">
				<a href="/projects/">
					<i class="icon-group"></i>
					<h1>Learn</h1>
					<h2>Our Webinars</h2>
				</a>
			</div>
			<p>We host and organize online webinars featuring leaders in the open education movement.</p>
			<a href="/resources/webinars/">+ watch and learn</a>			
		</div>
		
		<div class="large-3 columns">
			<div class="cta-header">
				<a href="http://conference.ocwconsortium.org/">
					<i class="icon-globe"></i>
					<h1>OCWC Global</h1>
					<h2>Our Annual Event</h2>
				</a>
			</div>
			<p>Join scholars and practioners as we discuss this years theme - Open Education for a Multicultural World.</p>
			<a href="http://conference.ocwconsortium.org/">+ join us</a>			
		</div>
		
		<div class="large-12 columns ocwc-statistics">
			<i class="icon-file-text"></i> 30&nbsp;000+ Modules <i class="icon-bookmark"></i> 280+ Organizations <i class="icon-globe"></i> 40 Countries <i class="icon-comments-alt"></i> 29 Languages
		</div>
	</div>
</div>

<div class="row">
	<div class="large-4 columns widget-listing">
		<div class="header">
			<h1><a href="/courses/">Latest courses</a></h1>
		</div>
		<ul>
			<?php $course_list = get_latest_courses(); ?>
			<?php foreach ($course_list as $course) : ?>
				<li><a href="/courses/view/<?php echo $course->linkhash; ?>/"><?php echo $course->title; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="large-4 columns widget-listing in-the-news">
		<div class="header">
			<h1>In the News</h1>
		</div>
		<ul>
			<?php $posts = get_newslink_posts(); ?>
			<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<li>
					<a href="<?php the_field('newslink_url'); ?>" target="_blank"><?php echo $post->post_title; ?></a>
				</li>
			<?php endwhile; endif; ?>
		</ul>
	</div>

	<div class="large-4 columns widget-listing">
		<div class="header">
			<h1><a href="/news/">Announcements</a></h1>
		</div>
		<ul>
			<?php $posts = get_announcements_posts(); ?>
			<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; endif; ?>
		</ul>
	</div>
</div>

<?php /* ?>
<div class="row">
	<div class="large-12 columns home-courses">
		<h1>Featured courses</h1>
		<a class="readmore" href="#">+ read more</a>
	</div>
	<div class="large-12 columns courses-image-listing">
		<div class="large-3 columns">
			<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/course.png" /></a>
			<a class="title" href="#">Course title</a>
		</div>
		<div class="large-3 columns">
			<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/course.png" /></a>
			<a class="title" href="#">Course title</a>
		</div>
		<div class="large-3 columns">
			<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/course.png" /></a>
			<a class="title" href="#">Course title</a>
		</div>
		<div class="large-3 columns">
			<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/course.png" /></a>
			<a class="title" href="#">Course title</a>
		</div>	
		<div class="large-3 columns">
			<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/course.png" /></a>
			<a class="title" href="#">Course title</a>
		</div>
		<div class="large-3 columns">
			<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/course.png" /></a>
			<a class="title" href="#">Course title</a>
		</div>
		<div class="large-3 columns">
			<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/course.png" /></a>
			<a class="title" href="#">Course title</a>
		</div>
		<div class="large-3 columns">
			<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/course.png" /></a>
			<a class="title" href="#">Course title</a>
		</div>
	</div>
</div>
*/ ?>

<?php get_footer() ?>