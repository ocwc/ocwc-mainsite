<?php
/*
	Template name: Page Info Center
*/
get_header(); ?>

<div class="main-wrapper">
	<div class="container">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part('partials/content', get_post_type()); ?>
	<?php endwhile; ?>

	<?php $custom_query = new WP_Query(array(
								'post_type' => 'info_audience',
								'posts_per_page' => -1
							));
	?>

	<div class="row">
		<div class="col-sm-12">
		<h1 class="entry-title">Information Map</h1>
		</div>
		<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<?php get_template_part('partials/card', get_post_type()); ?>
		<?php endwhile; ?>
	</div>
	<?php wp_reset_postdata(); ?>

	</div>
</div>

<?php get_footer(); ?>