<?php get_header() ?>

<?php get_template_part( 'partials/_home_highlights' ); ?>

<div class="container">
    <div class="row">
        <?php get_template_part( 'partials/_home_news' ); ?>
        <?php get_template_part( 'partials/_home_projects' ); ?>
    </div>

    <div class="row">
        <?php get_template_part( 'partials/_home_newsletter' ); ?>
        <?php get_template_part( 'partials/_home_social' ); ?>
    </div>
</div>

<div class="home-about">
    <div class="container">
        <div class="row">
            <?php get_template_part( 'partials/_home_about' ); ?>
            <?php get_template_part( 'partials/_home_map' ); ?>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <?php get_template_part( 'partials/_home_members' ); ?>
    </div>
</div>

<?php get_footer() ?>
