<?php
/*
	Template name: Info Center Design
*/
get_header(); 
?>

<div class="container main-wrapper">
	<div class="row">
		<div class="col-sm-8">
		<h4><i class="fa fa-angle-left"></i> <a href="/open-information-center/">Open Education Info Center</a></h4>

		<?php while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title(); ?></h2>

			<?php the_content(); ?>
		<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer();