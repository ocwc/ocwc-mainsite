<?php
	$members = get_country_members();
?>
<?php get_header(); ?>
	<div class="row">
		<div class="large-3 columns">
			<?php get_template_part('partials/members-sidebar'); ?>
		</div>

		<div class="large-9 columns">
			<header class="entry-header">
				<h1 class="entry-title">Members in <?php echo str_replace('%20', ' ', get_query_var('members_country_name')); ?></h1>
				<div class="entry-meta"></div>
			</header>
			<table>
			<?php foreach ($members as $member) : ?>
				<tr>
					<td class="tableblue"><a href="/members/view/<?php echo $member->id; ?>/"><?php echo $member->name; ?></a></td>
					<td><?php echo $member->membership_type; ?></td>
					<td><?php echo $member->associate_consortium; ?></td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
	</div>
<?php get_footer(); ?>