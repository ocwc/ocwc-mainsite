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
			<h2 class="entry-title">Quick Guides</h2>
			</div>
			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
				<?php get_template_part('partials/card', get_post_type()); ?>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>

		<?php get_template_part('partials/_event', 'latest'); ?>

		<?php get_template_part('partials/_community', 'latest'); ?>
	</div>
</div>

<?php get_footer(); ?>