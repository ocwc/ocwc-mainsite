<div class="col-sm-3 infomap-card infomap-color-blue">
	<div class="infomap-card-title text-center">
		<span class="infomap-card-icon"><i class="fa <?php the_field('audience_icon'); ?>"></i></span>
		<div class="infomap-card-title"><?php the_title(); ?></div>
		<div class="infomap-card-subtitle"><?php get_field('audience_subtitle'); ?></div>
	</div>

	<?php $custom_query = new WP_Query(array(
								'post_type' => 'info_topic',
								'meta_query' => array(
									array(
										'key' => 'audience',
										'type' => 'NUMERIC',
										'value' => get_the_ID(),
										'compare' => '='
									)
								)
							));
	?>

	<div class="infomap-card-itemList">
		<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
		<div class="infomap-card-item">
			<a href="<?php the_permalink(); ?>">
				<i class="fa fa-chevron-right"></i>
				<?php the_title(); ?>
			</a>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>