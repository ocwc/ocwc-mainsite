<?php
/*
	Template name: ACE Form - Form submissions
*/
?>
<?php get_header(); ?>
	<style type="text/css">
		p {
			font-size: 1em;
			white-space: pre-wrap;
		}

		li { 
			list-style: none;
			margin-left: -1.2em;
		}
		.field-type-desc {
			/*list-style: none;*/
			
			color: #436c89;
			margin-top: 10px;
		}

		.form-entry a {
			max-width: 550px; 
			overflow: hidden; 
    		text-overflow: ellipsis; 
    		white-space: nowrap; 
			display: inline-block;
			vertical-align: bottom;    		
		}

		.category-list {
			float: left;
			margin-left: 15px;
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

				<div ng-app="ninjaResultApp" ng-controller="NinjaResultController">
					<?php
						$subs = ninja_forms_get_all_subs( 1 );
						$fields = ninja_forms_get_fields_by_form_id( 1 );

						$json_data = [];
						foreach ($subs as $sub_id => $sub) {
							$submission_data = array(); 
							$data = unserialize($sub['data']);
							$user_values = array();
							foreach ($data as $key => $value) {
								$user_values[$value['field_id']] = $value['user_value'];
							}

							foreach ( $fields as $field_id => $field ) {
								$user_value = $user_values[$field['id']];
								if ($user_value == '') { 
									continue;
								}

								// if ( $field['type'] === '_upload' ) {
								// 	$submission_data[] = array(
								// 		"label" => $field['data']['label'],
								// 		"file_url" => $field['file_url'],
								// 		"filename" => $user_value['user_file_name'],
								// 		"type" => $field['type']
								// 	);
								// } else {
								$submission_data[] = array(
									"label" => $field['data']['label'],
									"value" => $user_value,
									"type" => $field['type']
								);
								// }
							}

							$json_data[] = array(
									"id" => $sub['id'],
									"items" => array_values($submission_data)
								);
						}

						echo '<script>';
						echo 'var ninja_form_entries = '.json_encode(array_values($json_data), JSON_PRETTY_PRINT).';';
						echo '</script>';
						?>

						<div class="row">
							<div class="small-12 columns">
								<label ng-repeat="category in categories" class="category-list">
									<input 
										type="checkbox" 
										name="category[]" 
										value="selectedCategory.indexOf(category)"
										ng-click="toggleCategory(category)"> {{ category }}
								</label>
							</div>
						</div>

						<div class="row" ng-repeat="entry in ( entries | filter:hasSelectedCategory )" ng-cloak>
							<div class="small-8 columns form-entry">
								<h2>Entry #{{ entry.id }}</h2>
								<ul>
									<li ng-repeat="field in entry.items" ng-class="getHeaderType(field)">
										<span ng-if="showDesc(field)">
											{{ field.label }}
										</span>
										<span ng-if="showText(field) || showList(field)">
											<strong>{{ field.label}}:</strong>
											<span ng-bind-html="field.value | to_trusted "></span>
										</span>
										<span ng-if="showTextArea(field)">
											<p ng-bind-html="field.value | to_trusted "></p>
										</span>
										<span ng-if="showUpload(field) && field.value">
											<strong>{{ field.label }}:</strong><br />
											<span ng-repeat="(key, file) in field.value">
												<a href="{{ file.file_url }}" target="_blank">{{ file.user_file_name }}</a>
											</span>
										</span>
									</li>
								</ul>
							</div>
						</div>
				</div>

				<script type="text/javascript" src="<?php echo get_template_directory_uri().'/lib/javascripts/angular/ninjaresult-script.js'; ?>"></script>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php else : ?>
		<h1>404 Not found</h1>
	<?php endif; ?>
<?php get_footer(); ?>