<?php global $wp_query, $paged; ?>
<header class="ed-entry-header clearfix">
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    <?php endif; ?>

    <h2 class="ed-entry-heading">Executive Director Insights</h2>
    <div class="entry-meta">
        <p class="text-uppercase"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-calendar.svg"/><?php the_time('j M Y') ?></b></p>
    </div>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</header>
<div class="entry-content">
    <?php the_content(); ?>
</div>
<div class="entry-sharing"></div>
