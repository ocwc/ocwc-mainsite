<header class="entry-header">
	<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<div class="entry-meta">
		<p>Posted by <?php echo get_the_author(); ?> on <?php the_time('l, F jS, Y') ?></p>
	</div>
</header>
<div class="entry-content">
	<?php the_content(); ?>
</div>