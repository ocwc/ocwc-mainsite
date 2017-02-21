<?php
/*
	Template name: Announcements page
*/
?>

<?php get_header() ?>

<div class="main-wrapper container">
	<?php if ( have_posts() ) : ?>
		<div class="col-xs-12 col-sm-8">
			<?php
				$orig_query = $wp_query;

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$wp_query = new WP_Query(array(
												'post_type' => 'post',
												'posts_per_page' => 5,
												'paged' => $paged,
                                                'cat' => '-557'
											));
			?>
			<?php if ( $wp_query->have_posts() ) : ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php get_template_part( 'partials/content', get_post_type() ); ?>
				<?php endwhile; ?>

				<div class="pagination">
					<span class="previous"><?php next_posts_link('<i class="icon-chevron-sign-left"></i> Previous page'); ?></span>
					<span class="next"><?php previous_posts_link('Next page <i class="icon-chevron-sign-right"></i>'); ?></span>
				</div>

				<?php wp_reset_postdata(); ?>
				<?php $wp_query = $orig_query; ?>

			<?php endif; ?>
		</div>
		<div class="col-xs-12 col-sm-4">
			<?php get_template_part('partials/sidebar', 'post'); ?>
		</div>
	<?php else : ?>
		<h1>404 Not found</h1>
	<?php endif; ?>
</div>

<?php get_footer() ?>
