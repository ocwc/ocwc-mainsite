<?php get_header() ?>

<?php get_template_part('partials/home_slideshow'); ?>

<div class="row collapsed">
	<div class="cta-row">
		<div class="cta-box show-for-medium-up clearfix">
			<a href="/courses/" class="wrapper">
				<h1>Courses</h1>
				<h3>Study</h3>
				<p>Discover Courses from Institutions around the world</p>
				<span class="more">+ search courses</span>
			</a>
		</div>
		
		<div class="cta-box show-for-medium-up clearfix">
			<a href="/about-oec/" class="wrapper">
				<h1>About</h1>
				<h3>Open Education</h3>
				<p>What is OpenCourseWare and how it empowers Open Education movement</p>
				<span class="more">+ learn more</span>
			</a>
		</div>

		<div class="cta-box show-for-medium-up">
			<a href="/resources/webinars/" class="wrapper">
				<h1>Learn</h1>
				<h3>Our Webinars</h3>
				<p>We host and organize online webinars featuring leaders in the open education movement.</p>
				<span class="more">+ watch and learn</span>
			</a>
		</div>
		
		<div class="cta-box show-for-medium-up">
			<a href="http://conference.oeconsortium.org/" class="wrapper">
				<h1>OCWC Global</h1>
				<h3>Our Annual Event</h3>
				<p>Join scholars and practioners.</p>
				<span class="more">+ join us</span>
			</a>
		</div>
	</div>
</div>

<div class="row collapsed">
	<div class="small-12 medium-4 columns widget-listing">
		<h1>
			<a href="/news/">Announcements</a>
		</h1>
		<ul>
			<?php $posts = get_announcements_posts(); ?>
			<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; endif; ?>
		</ul>
		<a href="/news/newsletter/" class="newsletter"><i class="icon-envelope"></i> Subscribe to our Newsletter</a>
		<br />
		<a href="/news/" class="more"><i class="icon-angle-down"></i> more announcements</a>
	</div>
	
	<div class="small-12 medium-4 columns widget-listing">
		<h1>
			<a href="/courses/">Twitter Feed</a>
			<iframe allowtransparency="true" frameborder="0" scrolling="no"
  					src="//platform.twitter.com/widgets/follow_button.html?screen_name=oeconsortium&show_count=false"
  					style="width:150px; height:20px;"></iframe>			
		</h1>
		<?php echo do_shortcode('[really_simple_twitter username="oeconsortium" consumer_key="'.TW_CONSUMER_KEY.'" consumer_secret="'.TW_CONSUMER_SECRET.'" access_token="'.TW_ACCESS_TOKEN.'" access_token_secret="'.TW_ACCESS_TOKEN_SECRET.'"'.' skip_replies=true date_link=true date_format="l, jS F"]'); ?>
		<a href="http://twitter.com/oeconsortium" class="more"><i class="icon-angle-down"></i> more tweets</a>
	</div>

	<div class="small-12 medium-4 columns widget-listing">
		<h1><a href="/courses/">Latest courses from our members</a></h1>
		<ul>
			<?php $course_list = get_latest_courses(); ?>
			<?php foreach ($course_list as $course) : ?>
				<li><a href="/courses/view/<?php echo $course->linkhash; ?>/"><?php echo $course->title; ?></a></li>
			<?php endforeach; ?>
		</ul>
		<a href="/courses/" class="more"><i class="icon-angle-down"></i> more courses</a>
	</div>
</div>

<div class="row">
	<div class="small-12 columns text-center home-stats">
		<span><i class="icon-file-text"></i> 30&nbsp;000+ Modules</span>
		<span><i class="icon-bookmark"></i> 280+ Organizations</span>
		<span><i class="icon-globe"></i> 40 Countries</span>
		<span><i class="icon-comments-alt"></i> 29 Languages</span>
	</div>
</div>

<?php get_footer() ?>