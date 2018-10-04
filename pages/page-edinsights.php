<?php
/*
	Template name: Ed Insights
*/
?>
<?php get_header(); ?>

<div class="container main-wrapper">
    <div class="col-xs-12 col-sm-4">
        <?php get_template_part( 'partials/_ed_sidebar' ); ?>
    </div>

    <?php $custom_query = new WP_Query( array(
        'post_type'      => 'post',
        'cat'            => 562,
        'posts_per_page' => 6
    ) ); ?>

    <div class="col-xs-12 col-sm-8">
        <?php $counter = 1; ?>
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
            <?php if ( $counter === 1 ) : ?>
                <?php get_template_part( 'partials/content_ed', 'full' ); ?>
            <?php else: ?>
                <?php get_template_part( 'partials/fragment', 'title' ); ?>
            <?php endif; ?>

            <?php $counter ++; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>

