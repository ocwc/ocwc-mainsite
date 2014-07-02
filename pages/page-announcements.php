<?php
/*
	Template name: Announcements page
*/
?>
	
<?php get_header() ?>

<div class="row main-wrapper">
	<?php if ( have_posts() ) : ?>	
		<div class="small-12 medium-8 columns">
			<?php 
				$orig_query = $wp_query;

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$wp_query = new WP_Query(array(
												'post_type' => 'post',
												'posts_per_page' => 5,
												'paged' => $paged	
											));
			?>
			<?php if ( $wp_query->have_posts() ) : ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php get_template_part( 'partials/content', get_post_type() ); ?>
				<?php endwhile; ?>

				<?php
					$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages
					) );
				?>
				<?php wp_reset_postdata(); ?>
				<?php $wp_query = $orig_query; ?>

			<?php endif; ?>
		</div>
		<div class="small-12 medium-4 columns">
			<?php get_template_part('partials/sidebar', 'post'); ?>
		</div>
	<?php else : ?>
		<h1>404 Not found</h1>
	<?php endif; ?>
</div>	

<?php get_footer() ?>