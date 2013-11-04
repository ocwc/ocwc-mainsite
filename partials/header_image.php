<?php $header_image = mainsite_get_closest_header_image(); ?>
<?php if ($header_image) : ?>
<div class="header-image-wrapper" style="background: <?php echo the_field('header_image_background_color'); ?>">
	<div class="row">
		<div class="large-12 columns">
			<img src="<?php echo $header_image['sizes']['header-image']; ?>" />
		</div>
	</div>
</div>
<?php endif;?>