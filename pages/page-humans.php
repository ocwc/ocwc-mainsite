<?php
/*
	Template name: Humans of OER
*/
?>
<?php get_header(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=445815192105894&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<style>
    .humans-story {
        margin-bottom: 30px;
    }
</style>

<div class="container main-wrapper">
    <?php if ( have_posts() ) : ?>
        <div class="col-xs-12">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part('partials/content', get_post_type()); ?>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <h1>404 Not found</h1>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
