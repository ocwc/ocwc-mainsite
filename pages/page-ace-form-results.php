<?php
/*
	Template name: ACE Form - Form submissions
*/
?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>	
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( post_password_required( $post ) ) : ?>
				<div class="row main-wrapper">
					<div class="large-6 columns">
						<?php get_template_part('partials/content', get_post_type()); ?>
					</div>
				</div>
			<?php else : ?>
				<div class="row main-wrapper">
					<div class="large-6 columns">
					<?php get_template_part('partials/content', get_post_type()); ?>
					</div>
				</div>
				<div class="row">
					<?php
						$subs = ninja_forms_get_all_subs( 1 );
						$fields = ninja_forms_get_fields_by_form_id( 1 );
					?>
					<?php foreach ($subs as $sub_id => $sub) : ?>
						<div class="large-6 columns">
						
						<h2>Submission #<?php echo $sub['id']; ?></h2>
						<?php
							$data = unserialize($sub['data']);
							$user_values = array();

							foreach ($data as $key => $value) :
								$user_values[$value['field_id']] = $value['user_value'];
							endforeach;
						?>
						<p>

						<?php foreach ($fields as $field_id => $field) : ?>
							<?php $user_value = $user_values[$field['id']]; ?>
							<?php if ($user_value AND $field['type'] === '_upload') : ?>
								<?php $user_value = reset($user_value); ?>
								<strong><?php echo $field['data']['label']; ?>:</strong> <a href="<?php echo $user_value['file_url']; ?>" target="_blank"><?php echo $user_value['user_file_name']; ?></a> <br />
							<?php elseif ($field['type'] === '_desc') : ?>
								<h3><?php echo $field['data']['label']; ?></h3>
							<?php elseif ($field['type'] === '_submit' ) :  ?>
								<?php // do nothing ?>
							<?php else : ?>
								<strong><?php echo $field['data']['label']; ?>:</strong> <?php echo $user_value; ?> <br />
							<?php endif; ?>
						<?php endforeach; ?>
						</p>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php else : ?>
		<h1>404 Not found</h1>
	<?php endif; ?>
<?php get_footer(); ?>