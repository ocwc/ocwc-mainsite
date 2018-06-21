<div class="col-md-6">
    <div class="home-header">
        <h2 class="home-h2">Announcements</h2>
        <a href="/news/">View All</a>
    </div>

    <ul class="home-announcements">
        <?php $posts = get_announcements_posts(); ?>
        <?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; endif; ?>
    </ul>
</div>
