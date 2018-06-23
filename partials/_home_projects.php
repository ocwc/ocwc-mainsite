<div class="col-md-6">
    <div class="home-header">
        <h2 class="home-h2">Highlighted Projects</h2>
    </div>

    <?php while ( have_rows( 'home_projects', 'option' ) ) : the_row(); ?>
        <?php $image = get_sub_field( 'image' ); ?>
        <a href="<?php the_sub_field( 'url' ); ?>"
           class="home-project"
           style="background-image: url('<?= $image['url']; ?>'); ?>">
            <span class="home-project__title"><?php the_sub_field( 'title' ); ?></span>
        </a>
    <?php endwhile; ?>
</div>
