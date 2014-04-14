<?php
	$member = get_member_detail();
?>

<?php get_header(); ?>
	<div class="row">
		<div class="large-3 columns">
			<?php get_template_part('partials/members-sidebar'); ?>
		</div>

		<div class="large-9 columns">
			<h1><?php echo $member->name; ?></h1>
			<p class="large-8 columns"><?php echo nl2br($member->description); ?></p>
			<?php if ( $member->logo_small ) : ?>
				<p class="large-4 columns"><img src="<?php echo MEMBERS_MEDIA . $member->logo_small; ?>" /></p>
			<?php endif; ?>

			<p class="large-12 columns">
			<?php if ( $member->main_website ) : ?>
				<strong>Main Website:</strong> <a href="<?php echo $member->main_website; ?>" target="_blank"><?php echo $member->main_website ?></a><br />
			<?php endif;?>
			<?php if ( $member->ocw_website ) : ?>
				<strong>OCW Website:</strong> <a href="<?php echo $member->ocw_website; ?>" target="_blank"><?php echo $member->ocw_website ?></a><br />
			<?php endif;?>
			</p>
		</div>
	</div>
<?php get_footer(); ?>