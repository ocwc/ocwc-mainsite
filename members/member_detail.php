<?php
	$member = get_member_detail();
?>

<?php get_header(); ?>
	<div class="container">
		<div class="col-sm-3">
			<?php get_template_part('partials/members-sidebar'); ?>
		</div>

		<div class="col-sm-9">
			<h1><?php echo $member->name; ?></h1>
			<p class="col-sm-8"><?php echo nl2br($member->description); ?></p>
			<?php if ( $member->logo_small ) : ?>
				<p class="col-sm-4"><img src="<?php echo $member->logo_small; ?>" class="responsive-image" /></p>
			<?php endif; ?>

			<p class="col-sm-12">
                <?php if ( $member->ocw_website ) : ?>
                    <strong>OER/OCW Website:</strong> <a href="<?php echo $member->ocw_website; ?>" target="_blank"><?php echo $member->ocw_website ?></a><br />
                <?php endif;?>
                <?php if ( $member->main_website ) : ?>
                    <strong>Institution Website:</strong> <a href="<?php echo $member->main_website; ?>" target="_blank"><?php echo $member->main_website ?></a><br />
                <?php endif;?>
			</p>

            <?php if ( $member->initiative_description1 ) : ?>
                <h2 class="col-sm-10">Initiative(s)</h2>
                <h3><?= $member->initiative_title1 ?></h3>
                <p class="col-sm-10">
                    <?= $member->initiative_description1 ?>
                    <?php if ( $member->initiative_url1 ) : ?>
                    <br /><a class="btn btn-primary" href="<?= $member->initiative_url1; ?>">View Initiative</a>
                    <?php endif; ?>
                    <br /><br />
                </p>
            <?php endif; ?>

            <?php if ( $member->initiative_description2 ) : ?>
                <h3><?= $member->initiative_title2 ?></h3>
                <p class="col-sm-10">
                    <?= $member->initiative_description2 ?>
                    <?php if ( $member->initiative_url2 ) : ?>
                        <br /><a class="btn btn-primary" href="<?= $member->initiative_url2; ?>">View Initiative</a>
                    <?php endif; ?>
                    <br /><br />
                </p>
            <?php endif; ?>

            <?php if ( $member->initiative_description3 ) : ?>
                <h3><?= $member->initiative_title3 ?></h3>
                <p class="col-sm-10">
                    <?= $member->initiative_description3 ?>
                    <?php if ( $member->initiative_url3 ) : ?>
                        <br /><a class="btn btn-primary" href="<?= $member->initiative_url3; ?>">View Initiative</a>
                        <br /><br />
                    <?php endif; ?>
                </p>
            <?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
