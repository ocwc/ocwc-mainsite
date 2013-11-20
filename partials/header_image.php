<?php 
	require_once(get_template_directory() . '/lib/php/custom-color.php');
	$closest_header_image = mainsite_get_closest_header_image();
	if ($closest_header_image['image']) {
		$header_image = $closest_header_image['image'];
		$post_id = $closest_header_image['post_id'];
	} else {
		return;
	}
?>

<?php if ($header_image) : ?>
<div class="header-image-wrapper hide-for-small" style="background: <?php echo the_field('header_image_background_color', $post_id); ?>">
	<div class="row">
		<div class="large-12 columns">
			<span class="page-title"><?php the_title(); ?></span>
			<div class="overlay" style="<?php the_linear_gradient(get_field('header_image_background_color', $post_id), "50%", "80%", "15%"); ?>"></div>
			<img src="<?php echo $header_image['sizes']['header-image']; ?>" />
		</div>
	</div>
</div>
<?php endif;?>