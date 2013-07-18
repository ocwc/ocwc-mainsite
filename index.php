<?php get_header() ?>


<div class="row">
	<div class="large-3 columns">
		<?php dynamic_sidebar('general-sidebar'); ?>
	</div>

	<div class="large-9 columns">
		<?php 
			while ( have_posts() ) {
				the_post();
				get_template_part('content', get_post_format());
			}
		?>
	</div>
</div>	

<?php get_footer() ?>