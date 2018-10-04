<?php global $wp_query, $paged; ?>
<header class="entry-header clearfix">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	<?php endif; ?>
	
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="entry-meta">
		<span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?></span>
		<p>Posted by <b><?php echo get_the_author(); ?></b> on <b><?php the_time('l, F jS, Y') ?></b></p>
	</div>
</header>
<div class="entry-content">
	<?php if ( is_single() || ( $wp_query->current_post === 0 && $paged === 1) ) : ?>
		<?php the_content(); ?>
		<?php if ( is_single() ) : ?>
			<div class="pagination">
				<span class="previous"><?php next_post_link('%link', '<i class="icon-chevron-sign-left"></i> Previous'); ?></span>
				<span class="next"><?php previous_post_link('%link', 'Next <i class="icon-chevron-sign-right"></i>'); ?></span>
			</div>
		<?php endif; ?>
	<?php else : ?>
		<?php the_excerpt(); ?>
	<?php endif; ?>
</div>
