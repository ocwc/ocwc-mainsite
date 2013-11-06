<?php 
	require_once(get_template_directory() . '/lib/php/custom-color.php');
	$slideshow_posts = get_slideshow_posts(); 
?>

<div class="rslides-wrapper hide-for-small">
	<div class="rslides">
	<?php while ( $slideshow_posts->have_posts() ) : $slideshow_posts->the_post(); ?>
		<?php if ( get_field('slideshow_background') AND strlen(get_field('slideshow_description')) > 10 ) : ?>
			<div class="slideshow" style="background-color: <?php the_field('slideshow_background'); ?>;">
				<div class="row">
					<?php if ( get_field('slideshow_image') ) : ?>
						<li data-attr="1" class="slide"><div class="card" style="<?php echo get_box_background(get_field('slideshow_background'), 0.9); ?>"><h1><a href="<?php the_field('slideshow_url'); ?>"><? the_title(); ?></a></h1><p><?php the_field('slideshow_description'); ?></p></div><div class="overlay" style="<?php the_linear_gradient(get_field('slideshow_background')); ?>"></div><img src="<?php echo get_field('slideshow_image')['sizes']['slideshow-image-large']; ?>" /></li>
					<?php endif; ?>
				</div>
			</div>
		<?php elseif ( get_field('slideshow_background') ) : ?>
			<?php if ( get_field('slideshow_has_gradient') ) : ?>
				<div class="slideshow" style="background-color: <?php the_field('slideshow_background'); ?>;">
					<div class="row">
						<?php if ( get_field('slideshow_image') ) : ?>
							<li data-attr="2" class="slide"><a href="<?php the_field('slideshow_url'); ?>"><div class="overlay" style="<?php the_linear_gradient(get_field('slideshow_background')); ?>"></div></a><img src="<?php echo get_field('slideshow_image')['sizes']['slideshow-image-large']; ?>" /></li>
						<?php endif; ?>
					</div>
				</div>
			<?php else : ?>
				<div class="slideshow" style="background-color: <?php the_field('slideshow_background'); ?>;">
					<div class="row">
						<?php if ( get_field('slideshow_image') ) : ?>
							<li data-attr="2" class="slide"><a href="<?php the_field('slideshow_url'); ?>"><img src="<?php echo get_field('slideshow_image')['sizes']['slideshow-image-large']; ?>" /></a></li>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<div class="slideshow">
				<div class="row">
					<?php if ( get_field('slideshow_image') ) : ?>
						<a data-attr="3" href="<?php the_field('slideshow_url'); ?>"><img src="<?php echo get_field('slideshow_image')['sizes']['slideshow-image-large']; ?>" /></a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
	</div>
</div>
