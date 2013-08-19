<?php get_header() ?>

<div class="row">
	<?php if ( have_posts() ) : ?>	
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="large-3 columns">
			<ul id="toplevel">
			    <?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
			    <?php wp_list_pages( array('title_li'=>'','depth'=>3,'child_of'=>get_post_top_ancestor_id()) ); ?>
			</ul>
		</div>
		<div class="large-9 columns">
				<?php get_template_part('partials/content', get_post_format()); ?>
		</div>
		<?php endwhile; ?>
	<?php else : ?>
		<h1>404 Not found</h1>
	<?php endif; ?>
</div>	

<?php get_footer() ?>