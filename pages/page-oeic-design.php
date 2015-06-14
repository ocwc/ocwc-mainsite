<?php
/*
	Template name: Info Center Design
*/
get_header(); 
?>

<div class="container main-wrapper">
	<div class="row">
		<div class="col-sm-8">
			<?php get_template_part('partials/_oeic_header'); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title(); ?></h2>

				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer();