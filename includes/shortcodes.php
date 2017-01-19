<?php

function shortcode_cat_list( $atts ){
    ob_start();
    ?>
    <?php $custom_query = new WP_Query(array(
                                            'post_status' => 'publish',
                                            'category_name' => 'press-releases')
                                        );
    ?>

    <ul>
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
            <li>(<?php echo get_the_date(); ?>) <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>
    <?php
    return ob_get_clean();
}
add_shortcode( 'catlist', 'shortcode_cat_list' );
