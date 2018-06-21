<?php
/*
	Template name: New Home
*/
?>
<?php get_header() ?>

<?php get_template_part( 'partials/_home_highlights' ); ?>

<div class="container">
    <div class="row">
        <?php get_template_part( 'partials/_home_news' ); ?>
    </div>
</div>

<?php get_footer() ?>
