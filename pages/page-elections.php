<?php
/*
	Template name: Elections
*/
?>
<?php get_header(); ?>
<div class="main-wrapper">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="col-xs-12 col-sm-4">
				<?php get_template_part('partials/sidebar', get_post_type()); ?>
			</div>
			<div class="col-xs-12 col-sm-8">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('partials/content', get_post_type()); ?>
				<?php endwhile; ?>

				<h2>Candidates for Board of Directors</h2>
				<?php $candidates = get_election_candidates(); ?>

				<ul>
				<?php foreach ($candidates as $candidate) : ?>
					<li><strong><?php echo $candidate->candidate_first_name ?> <?php echo $candidate->candidate_last_name ?></strong>, <?php echo $candidate->organization ?> <a href="#" class="show_more">(more information)</a>
						<ul style="display:none;">
							<li><strong>Job Title</strong><br /><?php echo $candidate->candidate_job_title; ?></li>
							<?php if ( $candidate->biography ) : ?>
								<li><strong>Biography</strong><br /><?php echo nl2br($candidate->biography); ?></li>
								<li><strong>Vision</strong><br /><?php echo nl2br($candidate->vision); ?></li>
								<li><strong>Ideas</strong><br /><?php echo nl2br($candidate->ideas); ?></li>
								<li><strong>Expertise</strong><br /><?php echo nl2br($candidate->expertise); ?></li>
                                <?php if ( $candidate->expertise_other ) : ?>
                                    <li><strong>Other Expertise</strong><br /><?php echo nl2br($candidate->expertise_other); ?></li>
                                <?php endif; >
							<?php else : ?>
								<li><?php echo nl2br($candidate->reason); ?></li>
							<?php endif; ?>
						</ul>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php else : ?>
			<h1>404 Not found</h1>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
