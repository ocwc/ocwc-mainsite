<?php get_header() ?>

<div id="slideshow">
	<div class="row">
		<?php
			$slideshow_posts = get_slideshow_posts();
			while ($slideshow_posts->have_posts()) {
				$slideshow_posts->the_post();

				$image_list = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slideshow-image-large' );
				if (count($image_list) > 0) {
					$image_src = $image_list[0];
				}
				echo '<li class="slide"><div class="overlay"></div><img src="'.$image_src.'" /></li>';

			}
		?>
	</div>
</div>

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
			<a class="read-more" href="#">+ read more</a>
		</div>
		<ul>
			<li><span class="date">Tue 02 Jul 2013</span> <a class="link" href="#">3rd party blog</a>
				<p>Lorem ipsum something or other</p>
			</li>
			<li><span class="date">Tue 02 Jul 2013</span> <a class="link" href="#">3rd party blog</a>
				<p>Lorem ipsum something or other</p>
			</li>
			<li><span class="date">Tue 02 Jul 2013</span> <a class="link" href="#">3rd party blog</a>
				<p>Lorem ipsum something or other</p>
			</li>
			<li><span class="date">Tue 02 Jul 2013</span> <a class="link" href="#">3rd party blog</a>
				<p>Lorem ipsum something or other</p>
			</li>
		</ul>
	</div>

	<div class="large-4 columns widget-listing">
		<div class="header">
			<h1>Announcements</h1>
			<a class="read-more" href="#">+ read more</a>
		</div>
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