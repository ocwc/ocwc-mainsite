<?php get_header(); ?>

<div class="container main-wrapper">
	<div class="row">
		<div class="col-sm-10">
			<?php get_template_part('partials/_oeic_header'); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<h2>Event: <?php the_title(); ?></h2>

				<dl>
					<dt>Dates</dt>
					<dd><?php the_field('event_startdate'); ?> - <?php the_field('event_enddate'); ?></dd>
				</dl>

				<dl>
					<dt>Location</dt>
					<dd><?php the_field('event_city'); ?>, <?php the_field('event_country'); ?></dd>
				</dl>

				<dl>
					<dt>Website</dt>
					<dd><a href="<?php the_field('event_url'); ?>"><?php the_field('event_url'); ?></a></dd>

				</dl>

				<?php the_content(); ?>

				<small>Submitted by <?php the_field('event_contact_name'); ?></small>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer();