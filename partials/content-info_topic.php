<?php $audience = get_field('audience'); ?>

<header class="entry-header audience-<?php the_field('audience_color', $audience); ?>">
	<?php get_template_part('partials/_oeic_header'); ?>

	<div class="row">
		<div class="col-sm-12">
			<h1 class="entry-title audience-color">
				<span class="infomap-card-icon audience-background"><i class="fa <?php the_field('audience_icon', $audience); ?>"></i></span>
				<?php echo $audience->post_title; ?>: <?php the_title(); ?>
			</h1>
		</div>
	</div>
</header>
<div class="entry-content topic-content audience-<?php the_field('audience_color', $audience); ?>">
	<?php if ( get_field('audience_image', $audience ) ) : ?>
		<div class="row">
			<div class="col-sm-9">
				<?php the_content(); ?>
			</div>
			<div class="col-sm-3">
				<img class="img-responsive img-circle" src="<?php echo get_field('audience_image', $audience )['sizes']['medium-square']; ?>" />
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-10">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( have_rows('topic_content') ) : ?>
		<div class="topic-answer-list">
			<?php while ( have_rows('topic_content') ) : the_row(); ?>
				<div class="topic-answer">
					<?php if ( get_row_layout() === 'question' ) : ?>
						<div class="row">
							<div class="col-md-10">
								<h3 class="audience-color"><?php the_sub_field('question_title') ?></h3>
								<?php the_sub_field('question_answer'); ?>
							</div>
						</div>

						<?php if ( get_sub_field('external_resources') ) : ?>
							<div class="row">
							<?php global $resource; ?>
							<?php foreach ( get_sub_field('external_resources') as $resource ) : ?>
								<?php get_template_part('partials/_resource_item'); ?>
							<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<div class="topic-design-lineend"></div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<?php if ( get_field('topic_related_resources') ) : ?>
		<div class="row relatedResources-wrapper">
			<div class="col-sm-12">
				<h2>Related resources</h2>
			</div>
			<?php global $resource; ?>
			<?php foreach (get_field('topic_related_resources') as $resource) : ?>
				<?php get_template_part('partials/_resource_item'); ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>


	<h2 class="discourse-title">Join discussion on <?php the_title(); ?></h2>
	<div id="discourse-comments"></div>

	<script type="text/javascript">
	  var discourseUrl = "http://community.oeconsortium.org/",
	      discourseEmbedUrl = '<?php the_permalink(); ?>';

	  (function() {
	    var d = document.createElement('script'); d.type = 'text/javascript'; d.async = true;
	      d.src = discourseUrl + 'javascripts/embed.js';
	    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(d);
	  })();
	</script>

</div>