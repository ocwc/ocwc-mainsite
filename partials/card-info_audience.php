<?php $custom_query = new WP_Query(array(
							'post_type' => 'info_topic',
							'meta_query' => array(
								array(
									'key' => 'audience',
									'type' => 'NUMERIC',
									'value' => get_the_ID(),
									'compare' => '='
								)
							),
							
							// 'meta_key' => 'object_order',
							'orderby' => 'meta_value title',
							'order' => 'DESC'
						));
?>

<?php if ( $custom_query->have_posts() ) : ?>
	<div class="col-sm-4 infomap-card audience-<?php the_field('audience_color'); ?>">
		<div class="infomap-card-title text-center">
			<span class="infomap-card-icon audience-background"><i class="fa <?php the_field('audience_icon'); ?>"></i></span>
			<div class="infomap-card-title audience-color"><?php the_title(); ?></div>
			<div class="infomap-card-subtitle"><?php get_field('audience_subtitle'); ?></div>
		</div>



		<div class="infomap-card-itemList">
			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<div class="infomap-card-item audience-backgroundHover">
				<a href="<?php the_permalink(); ?>">
					<span class="infomap-card-itemBullet"><i class="fa fa-chevron-right"></i></span>
					<span class="infomap-card-itemTitle"><?php the_title(); ?></span>
				</a>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>