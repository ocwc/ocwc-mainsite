<?php
	$member_list = get_member_list(); 
	// var_dump($member_list);
?>
<?php get_header(); ?>
	<div class="container">
		<div class="col-xs-12 col-sm-3">
			<?php get_template_part('partials/members-sidebar'); ?>
		</div>

		<div class="col-xs-12 col-sm-9">
			<?php foreach ($member_list as $group_name => $members) : ?>
				<h2><?php echo $group_name ?></h2>
				<table>
				<?php foreach ($members as $member) : ?>
					<tr>
						<td class="tableblue"><a href="/members/view/<?php echo $member->id; ?>/"><?php echo $member->name; ?></a></td>
						<td><?php echo $member->membership_type; ?></td>
						<td><?php echo $member->associate_consortium; ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
			<?php endforeach; ?>			
		</div>
	</div>
<?php get_footer(); ?>