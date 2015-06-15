<?php $custom_query = new WP_Query(array(
							'post_type' => 'event',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'meta_query' => array(
					            array(
					                'key' => 'event_startdate',
					                'value' => date("Y-m-d"),
					                'compare' => '>=',
					                'type' => 'NUMERIC,'
					                )
					            ),
							));
?>


<div class="voffset-30">
	<h2>Upcoming Open Education Events</h2>

	<table class="table table-striped table-bordered">
	<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
		<tr>
			<td><?php the_field('event_startdate'); ?></td>
			<td>
				<a href="<?php the_field('event_url'); ?>">
					<?php the_title(); ?>
				</a>
			</td>
			<td><?php the_field('event_city'); ?>, <?php the_field('event_country'); ?></td>
		</tr>
	<?php endwhile; ?>
	</table>
	<a class="btn btn-primary" href="/info-center/event-submit/">Submit Your Event</a>
</div>