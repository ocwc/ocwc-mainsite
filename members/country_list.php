<?php
	$members = get_country_members();
?>
<?php get_header(); ?>
	<div class="container">
		<div class="col-xs-12 col-sm-3">
			<?php get_template_part('partials/members-sidebar'); ?>
		</div>

		<div class="col-xs-12 col-sm-9">
			<header class="entry-header">
				<h1 class="entry-title">Members in <?php echo str_replace('%20', ' ', get_query_var('members_country_name')); ?></h1>
				<div class="entry-meta"></div>
			</header>
			<table class="table table-striped table-bordered table-hover">
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