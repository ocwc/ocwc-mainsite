<div class="col-sm-12">
    <div class="home-header">
        <h2 class="home-h2">Supporting Members</h2>
    </div>

    <p class="text-justify">
    <?php while ( have_rows( 'home_supporters', 'option' ) ) : the_row(); ?>
        <?php $image = get_sub_field( 'image' )['sizes']['medium']; ?>
        <img src="<?= $image ?>" alt="" class="home-members__logo" />
    <?php endwhile; ?>
    </p>
</div>
