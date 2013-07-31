<?php get_header() ?>

<?php get_template_part('partials/home_slideshow'); ?>

<div id="call-to-action">
	<div class="row">
		<div class="large-3 columns">
			<div class="cta-header">
				<i class="icon-book"></i>
				<h1>Learn</h1>
				<h2>Free courses</h2>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit..</p>
			<a href="#">+ read more</a>
		</div>
		<div class="large-3 columns">
			<div class="cta-header">
				<i class="icon-download-alt"></i>
				<h1>Create</h1>
				<h2>Your OER resources</h2>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit..</p>
			<a href="#">+ read more</a>			
		</div>
		<div class="large-3 columns">
			<div class="cta-header">
				<i class="icon-group"></i>
				<h1>Collaborate</h1>
				<h2>Be a member</h2>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit..</p>
			<a href="#">+ read more</a>			
		</div>
		<div class="large-3 columns">
			<div class="cta-header">
				<i class="icon-list-alt"></i>
				<h1>Donate</h1>
				<h2>For a couse</h2>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit..</p>
			<a href="#">+ read more</a>			
		</div>
		<div class="large-12 columns ocwc-statistics">
			<i class="icon-file-text"></i> 256 Modules <i class="icon-bookmark"></i> 200 Universities <i class="icon-user"></i> 5 Billion students <i class="icon-globe"></i> 100 Countries <i class="icon-comments-alt"></i> 22 Languages
		</div>
	</div>
</div>

<div class="row">
	<div class="large-4 columns widget-listing">
		<div class="header">
			<h1>Upcoming Events</h1>
			<a class="read-more" href="#">+ read more</a>
		</div>
	</div>

	<div class="large-4 columns widget-listing in-the-news">
		<div class="header">
			<h1>In the News</h1>
		</div>
		<ul>
			<?php $posts = get_newslink_posts(); ?>
			<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<li><span class="date"><?php the_time('F j, Y'); ?></span> <a class="link" href="<?php the_field('newslink_url'); ?>" target="_blank"><?php the_field('newslink_alias'); ?></a>
				<p><?php echo $post->post_title; ?></p>
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

<?php get_footer() ?>