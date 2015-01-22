<header class="entry-header">
	<h1 class="entry-title"><?php the_title(); ?></h1>
</header>
<div class="entry-content">
	<?php the_content(); ?>

	<?php foreach (get_field('topic_questions') as $post) : ?>
		<?php setup_postdata($post); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>

		<?php if ( get_field('question_resources') ) : ?>
			<div class="row">
			<?php foreach (get_field('question_resources') as $resource) : ?>
				<div class="col-sm-4 infomap-resource-wrapper">
					<div class="infomap-resource">
						<a class="infomap-resource-title" 
						   href="<?php echo $resource['url']; ?>" 
						   title="<?php echo $resource['title']; ?>"
						   target="_blank">
						   	<?php echo $resource['title']; ?>

							<span class="infomap-resource-source">
								YouTube <i class="fa fa-youtube-play"></i>
							</span>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>

	<?php endforeach; ?>
	<?php wp_reset_postdata(); ?>

</div>