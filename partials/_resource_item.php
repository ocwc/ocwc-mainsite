<?php global $resource; ?>

<?php 
	if ( strpos($resource['url'], 'youtube') ) {
		$source_type = 'youtube';

		parse_str( parse_url( $resource['url'], PHP_URL_QUERY ), $vars );
		$youtube_id = $vars['v'];
	} else {
		$source_type = 'web';
	}
?>

<div class="col-sm-4 infomap-resource-wrapper">
	<div 
		class="infomap-resource <?php echo $source_type; ?>"
		<?php if ( $source_type === 'youtube' ) : ?>style="background-image: url('http://img.youtube.com/vi/<?php echo $youtube_id; ?>/0.jpg');" <?php endif; ?>
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
