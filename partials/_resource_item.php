<?php global $resource; ?>

<?php
	$source_type = 'web';

	if ( strpos($resource['url'], 'youtube') ) {
		parse_str( parse_url( $resource['url'], PHP_URL_QUERY ), $vars );
		if ( array_key_exists('v', $vars) ) {
			$source_type = 'youtube';
			$youtube_id = $vars['v'];
		}
	}
?>

<div class="col-sm-4 infomap-resource-wrapper">
	<div
		class="infomap-resource <?php echo $source_type; ?>"
		<?php if ( $source_type === 'youtube' ) : ?>
            style="background-image: url('http://img.youtube.com/vi/<?php echo $youtube_id; ?>/0.jpg');"
        <?php else : ?>
            <?php
                $url_stripped = str_replace('https://', '', $resource['url']);
                $url_stripped = str_replace('http://', '', $url_stripped);
            ?>
            style="background-image: url('http://s.wordpress.com/mshots/v1/<?php echo $url_stripped; ?>?w=400'); background-position-y: -25px;"
        <?php endif; ?>
		>
		<a class="infomap-resource-title"
		   href="<?php echo $resource['url']; ?>"
		   title="<?php echo $resource['title']; ?>"
		   target="_blank">
		   	<?php echo $resource['title']; ?>

		   	<span class="infomap-resource-language">
		   		<i class="fa fa-language"></i> <?php echo ucwords($resource['language']); ?>
		   	</span>

			<span class="infomap-resource-source">
				<?php if ( $source_type === 'youtube' ) : ?>
					<i class="fa fa-youtube-play"></i> YouTube
				<?php else : ?>
					<i class="fa fa-external-link-square"></i> Web
				<?php endif; ?>
			</span>
		</a>
	</div>
</div>
