<?php
/*
    Template name: Page Members All
*/

function mainsite_members_custom_head() {
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.6.4/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.6.4/leaflet.js"></script>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/Leaflet.markercluster/MarkerCluster.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/Leaflet.markercluster/MarkerCluster.Default.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/Leaflet.markercluster/MarkerCluster.Default.ie.css" /><![endif]-->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/Leaflet.markercluster/leaflet.markercluster-src.js"></script>

    <link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/stylesheets/map.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/map.js"></script>

    <script type="text/javascript">
        var members_site_domain = '<?php echo MEMBERS_API_URL; ?>';
    </script>
    <?php
}
add_action('wp_head', 'mainsite_members_custom_head');

$member_list = get_member_list();
?>
<?php get_header(); ?>
    <div class="container main-wrapper">
        <div class="show-for-sm-up col-sm-12">
            <div id="map"></div>
        </div>

        <div class="col-sm-3">
            <?php get_template_part('partials/members-sidebar'); ?>
        </div>
        <div class="col-sm-9">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part('partials/content', get_post_type()); ?>
            <?php endwhile; ?>

            <p><i class="fa fa-star"></i> = Sustaining Member</p>

            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled">
                        <h2>Higher Education</h2>
                    <?php foreach ($member_list->{'Institutions of Higher Education'} as $member) : ?>
                        <li>
                            <a href="/members/view/<?php echo $member->id; ?>/">
                                <?php if ($member->membership_status === 'Sustaining' ) : ?><i class="fa fa-star"></i><?php endif; ?>
                                <?php echo $member->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <?php foreach (array('Sustaining Members', 'Associate Consortia', 'Organizational Members', 'Corporate Members') as $key) : ?>
                        <ul class="list-unstyled">
                        <h2><?php echo $key; ?></h2>
                        <?php foreach ($member_list->$key as $member) : ?>
                            <li>
                                <a href="/members/view/<?php echo $member->id; ?>/">
                                    <?php if ($member->membership_status === 'Sustaining' ) : ?><i class="fa fa-star"></i><?php endif; ?>
                                    <?php echo $member->name; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
