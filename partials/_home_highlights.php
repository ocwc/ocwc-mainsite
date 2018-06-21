<div class="container home-highlights">
    <div class="row">
        <?php while ( have_rows( 'home_highlights', 'option' ) ) : the_row(); ?>
            <div class="col-sm-6 col-md-3">
                <?php $image = get_sub_field( 'image' ); ?>
                <?php if ( $image ) : ?>
                    <a href="<?= get_sub_field( 'url' ); ?>">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                    </a>
                <?php endif; ?>
                <a href="<?= get_sub_field( 'url' ); ?>" class="home-highlights__title">
                    <?= get_sub_field( 'title' ); ?>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

