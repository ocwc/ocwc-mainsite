<?php get_header() ?>

<div class="main-wrapper">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php if ( 'info_topic' === get_post_type() ) : ?>
				<div class="col-sm-12">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'partials/content', get_post_type() ); ?>
					<?php endwhile; ?>
				</div>
			<?php else: ?>
				<div class="col-sm-3">
					<?php get_template_part( 'partials/sidebar', get_post_type() ); ?>
				</div>
				<div class="col-sm-9">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'partials/content', get_post_type() ); ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<h1>404 Not found</h1>
		<?php endif; ?>
	</div>
</div>

<?php get_footer() ?>