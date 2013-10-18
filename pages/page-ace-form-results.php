<?php
/*
	Template name: ACE Form - Form submissions
*/
?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>	
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( post_password_required( $post ) ) : ?>
				<div class="row">
					<div class="large-6 columns">
						<?php get_template_part('partials/content', get_post_format()); ?>
					</div>
				</div>
			<?php else : ?>
				<div class="row">
					<div class="large-6 columns">
					<?php get_template_part('partials/content', get_post_format()); ?>
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
							<?php if ( $user_value && $field['type'] !== '_desc' ) : ?>
								<strong><?php echo $field['data']['label']; ?>:</strong> <?php echo $user_value; ?> <br />
							<?php elseif ($field['type'] === '_desc') : ?>
								<h3><?php echo $field['data']['label']; ?></h3>
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