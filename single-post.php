<?php get_header() ?>

<div class="main-wrapper">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php if ( in_category( array( 'ed-insights' ) ) ) : ?>
                <div class="col-xs-12 col-sm-4">
                    <?php get_template_part( 'partials/_ed_sidebar' ); ?>
                </div>

                <div class="col-xs-12 col-sm-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'partials/content_ed', 'full' ); ?>
                    <?php endwhile; ?>

                    <?php $custom_query = new WP_Query( array(
                        'post_type'      => 'post',
                        'cat'            => 562,
                        'posts_per_page' => 5,
                        'post__not_in'   => array( $post->ID )
                    ) ); ?>
                    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                        <?php get_template_part( 'partials/fragment', 'title' ); ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php else: ?>
                <div class="col-xs-12 col-sm-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'partials/content', get_post_type() ); ?>
                    <?php endwhile; ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php get_template_part( 'partials/sidebar', get_post_type() ); ?>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <h1>404 Not found</h1>
        <?php endif; ?>
    </div>
</div>

<?php get_footer() ?>
