<?php
/*
	Template name: Page Members
*/
function mainsite_members_custom_head() { 
	?>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />
	<!--[if lte IE 8]>
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.ie.css" />
	<![endif]-->
	<script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/Leaflet.markercluster/MarkerCluster.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/Leaflet.markercluster/MarkerCluster.Default.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/Leaflet.markercluster/MarkerCluster.Default.ie.css" /><![endif]-->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/plugins/Leaflet.markercluster/leaflet.markercluster-src.js"></script>

	<link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/stylesheets/map.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/javascripts/map.js"></script>

	<script type="text/javascript">
		var members_site_domain = '<?php echo MEMBERS_API_URL; ?>';
	</script>
<?
}
add_action('wp_head', 'mainsite_members_custom_head');
?>

<?php get_header(); ?>
<div class="row main-wrapper">
	<div class="large-12 columns">
		<div id="map"></div>
	</div>

	<div class="large-3 columns">
		<?php get_template_part('partials/members-sidebar'); ?>

	</div>
	<?php if ( have_posts() ) : ?>
		<div class="large-9 columns">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('partials/content', get_post_type()); ?>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>