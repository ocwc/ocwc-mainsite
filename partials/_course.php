<?php global $course; ?>

<div class="row">
	<div class="course-short clearfix">
		<div class="col-sm-1">
			<h2><a class="btn btn-primary" href="<?php echo $course->link; ?>">
				View
			</a></h2>
		</div>

		<h2 class="course-title col-sm-10">
			<a href="<?php echo $course->link; ?>" target="_blank">
				<?php echo $course->title; ?>
			</a>
		</h2>

		<div class="course-meta col-sm-12">
			<dl>
				<dt>Language:</dt>
				<dd>
					<?php if ( is_string($course->language) ) : ?>
						<?php echo $course->language; ?>
					<?php else : ?>
						<?php echo implode(', ', $course->language); ?>
					<?php endif; ?>
				</dd>

				<?php if ( $course->author ) : ?>
					<dt>Author:</dt>
					<dd><?php echo $course->author; ?></dd>
				<?php endif; ?>

				<dt>Institution:</dt>
				<?php if ( $course->oec_provider_id ) : ?>
					<dd>
						<a href="/providers/<?php echo $course->oec_provider_id; ?>/" >
							<?php echo $course->source; ?>
						</a>

						<span class="label label-info">OEC Member</span>
					</dd>
				<?php else : ?>
					<dd><?php echo $course->source; ?></dd>
				<?php endif; ?>

				<?php if ( $course->merlot_id ) : ?>
					<dt>MERLOT</dt>
					<dd>
						<a href="https://www.merlot.org/merlot/viewMaterial.htm?id=<?php echo $course->merlot_id; ?>" target="_blank">
							View More Information about the Course in MERLOT
						</a>
					</dd>
				<?php endif; ?>

				<?php if ( $course->categories ) : ?>
					<dt>Categories:</dt>
					<dd>
						<ul class="course-categories">
							<?php foreach ($course->categories as $cat) : ?>
								<li><?php echo str_replace('/', ' / ', str_replace('All/', '', $cat)); ?></li>
							<?php endforeach; ?>
						</ul>
					</dd>
				<?php endif; ?>

			</dl>
		</div>

		<div class="course-description-short js-course-description-short col-sm-10">
			<?php echo truncate( $course->description, 300, '', false, true ); ?>
			<a href="#" class="js-course-show-full-description">.. show the rest of description</a>.
		</div>
		<div class="course-description-full js-course-description-full col-sm-10" style="display:none;">
			<?php echo $course->description; ?>
		</div>
	</div>
</div>
