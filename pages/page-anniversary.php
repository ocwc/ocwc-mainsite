<?php
/*
	Template name: 10th Anniversary
*/
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Education Consortium Celebrates 10th Anniversary</title>
    <link rel="stylesheet" href="/ann10-static/css/app.css">
</head>
<body>

<div class="grid-container">
    <div class="grid-x grid-margin-x header-desktop show-for-medium">
        <div class="medium-4 cell">
            <img src="/ann10-static/img/oec-logo.svg"/>
        </div>
        <div class="medium-4 cell header-desktop__logo2 text-center">
            <img src="/ann10-static/img/oec-logo2.svg"/>
        </div>
    </div>

    <div class="grid-x grid-margin-x show-for-small-only header-mobile">
        <div class="auto cell text-center">
            <img src="/ann10-static/img/oec-logo2.svg"/>
        </div>
    </div>
</div>

<div class="grid-container">
    <div class="grid-x grid-margin-x align-center">
        <div class="medium-7 cell text-center header__intro">
            <?php the_field( 'ann_description', 'option' ); ?>
        </div>
    </div>
</div>

<?php if ( have_rows( 'ann_years', 'option' ) ) : ?>
    <?php $first_pass = true; ?>
    <?php while ( have_rows( 'ann_years', 'option' ) ) : the_row(); ?>
        <?php $year = intval( get_sub_field( 'year' ) ); ?>

        <div class="background year-<?= $year; ?>">
            <div class="grid-container stories">

                <?php if ( $first_pass ) : ?>
                    <div class="grid-x">
                        <div class="medium-6 cell">
                            <div class="text-start">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <?php $first_pass = false; ?>
                <?php endif; ?>

                <?php $c = 1; ?>
                <?php $entries_count = count( get_sub_field( 'entries' ) ); ?>
                <?php while ( have_rows( 'entries' ) ) : the_row(); ?>
                    <div class="grid-x">
                        <div class="
                                <?php if ( $c % 2 ) : ?>
                                medium-6
                                <?php else : ?>
                                medium-offset-6 medium-3
                                <?php endif; ?>
                                cell">
                            <div class="bullet
                                        <?= $c % 2 ? 'left' : ''; ?>
                                        <?= $c === $entries_count ? 'last' : ''; ?>
                                        <?= $c === $entries_count && $year === 2008 ? 'text-end' : ''; ?>
                                        ">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php $url = get_sub_field( 'url' ); ?>

                                <?php if ( $image && $url ) : ?>
                                    <a href="<?= $url; ?>" target="_blank"><img src="<?= $image['url']; ?>"
                                                                                alt="<?= $image['alt']; ?>"/></a>
                                <?php elseif ( $image ) : ?>
                                    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>"/>
                                <?php endif; ?>

                                <?php if ( $url ) : ?>
                                    <a href="<?= $url; ?>" target="_blank"><?php the_sub_field( 'text' ); ?></a>
                                <?php else : ?>
                                    <?php the_sub_field( 'text' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $c ++; ?>
                <?php endwhile; ?>

                <?php if ( $year > 2008 ) : ?>
                    <div class="grid-x grid-year">
                        <div class="medium-12 cell white-circle">
                            <span class="text-center"><?= $year - 1; ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>

<?php else : ?>
    <?php // no rows found ?>
<?php endif; ?>

<div class="grid-container">
    <div class="grid-x">
        <div class="cell auto">
            <p class="copyright text-center">Except where otherwise noted, content on this site is licensed under a
                Creative Commons
                Attribution 4.0 International License.</p>
        </div>
    </div>
</div>

<script src="/script/ann10-static/js/app.js"></script>
</body>
</html>
