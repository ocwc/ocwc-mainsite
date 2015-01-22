<?php global $resource; ?>

<div class="col-sm-4 infomap-resource-wrapper">
	<div class="infomap-resource">
		<a class="infomap-resource-title" 
		   href="<?php echo $resource['url']; ?>" 
		   title="<?php echo $resource['title']; ?>"
		   target="_blank">
		   	<?php echo $resource['title']; ?>

			<span class="infomap-resource-source">
				YouTube <i class="fa fa-youtube-play"></i>
			</span>
		</a>
	</div>
</div>
