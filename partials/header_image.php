<?php $header_image = mainsite_get_closest_header_image(); ?>
<?php if ($header_image) : ?>

	<img src="<?php echo $header_image['sizes']['large']; ?>" />

<?php endif;?>