<ul class="country-list sidebar">
	<?php $country_list = get_member_country_list(); ?>
	<li class="all-members"><a href="/members/all/">All Members</a></li>
	<li><h4>Countries/Regions</h4></li>
	<?php foreach ($country_list as $country) : ?>
		<li><a href="/members/country/<?php echo $country; ?>/"><?php echo $country; ?></a></li>
	<?php endforeach; ?>
</ul>