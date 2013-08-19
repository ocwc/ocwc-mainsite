<?php 
	require_once(get_template_directory() . '/lib/php/custom-color.php');
	$slideshow_posts = get_slideshow_posts(); 
?>

<div class="rslides">
<?php while ( $slideshow_posts->have_posts() ) : $slideshow_posts->the_post(); ?>
	<div class="slideshow" style="background-color: <?php the_field('slideshow_background'); ?>;">
		<div class="row">
			<?php if ( get_field('slideshow_image') ) : ?>
				<li class="slide"><div class="card" style="<?php echo get_box_background(get_field('slideshow_background'), 0.9); ?>"><h1><a href="<?php the_field('slideshow_url'); ?>"><? the_title(); ?></a></h1><p><?php the_field('slideshow_description'); ?></p></div><div class="overlay" style="<?php the_linear_gradient(get_field('slideshow_background')); ?>"></div><img src="<?php echo get_field('slideshow_image')['sizes']['slideshow-image-large']; ?>" /></li>
			<?php endif; ?>
		</div>
	</div>
<?php endwhile; ?>
</div>
