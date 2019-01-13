<div class="col-sm-12">
    <div class="home-header">
        <h2 class="home-h2">Sustaining Members</h2>
    </div>

    <p class="text-justify">
    <?php while ( have_rows( 'home_supporters', 'option' ) ) : the_row(); ?>
        <?php $image = get_sub_field( 'image' )['sizes']['medium']; ?>
        <?php if (get_sub_field('link')) : ?>
            <a href="<?= get_sub_Field('link'); ?>"><img src="<?= $image ?>" alt="" class="home-members__logo" /></a>
        <?php else : ?>
            <img src="<?= $image ?>" alt="" class="home-members__logo" />
        <?php endif; ?>

    <?php endwhile; ?>
    </p>
</div>
