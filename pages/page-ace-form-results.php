<?php
/*
	Template name: ACE Form - Form submissions
*/
?>
<?php get_header(); ?>
	<style type="text/css">
		.field_id-21, 
		.field_id-22, 
		.field_id-23 { 
			display: none; 
		}

	</style>
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
						<ul>
						<?php foreach ($fields as $field_id => $field) : ?>
							<span class="field_id-<?php echo $field_id ?>">
							<?php $user_value = $user_values[$field['id']]; ?>
							<?php if ($user_value == '') : ?>
								<?php continue; ?>
							<?php endif; ?>
							<?php if ($user_value AND $field['type'] === '_upload') : ?>
								<?php $user_value = reset($user_value); ?>
								<strong><?php echo $field['data']['label']; ?>:</strong> <a href="<?php echo $user_value['file_url']; ?>" target="_blank"><?php echo $user_value['user_file_name']; ?></a> <br />
							<?php elseif ($field['type'] === '_desc') : ?>
								<h3><?php echo $field['data']['label']; ?></h3>
							<?php elseif ($field['type'] === '_submit' ) :  ?>
								<?php // do nothing ?>
							<?php else : ?>
								<strong><?php echo $field['data']['label']; ?>:</strong> 
									<?php if (substr($user_value, 0, 4) === 'http') : ?>
										<?php if (strlen($user_value) > 69) : ?>
											<br /><a href="<?php echo $user_value; ?>"><?php echo (substr($user_value, 0, 65)); ?>[..]</a><br />
										<?php else : ?>	
											<br /><a href="<?php echo $user_value; ?>"><?php echo $user_value; ?></a><br />
										<?php endif ;?>
									<?php else : ?>
										<?php if (is_string($user_value)) : ?>
											<?php echo nl2br($user_value); ?> <br />
										<?php else : ?>
											<br />
										<?php endif; ?>
									<?php endif; ?>
							<?php endif; ?>
							</span>
						<?php endforeach; ?>
						</ul>
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