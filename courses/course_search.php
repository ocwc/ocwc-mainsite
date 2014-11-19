<form method="GET" action="/courses/search/" class="course-search-form clearfix" role="form">
	<div class="form-group row">
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="Search for course material" name="search" <?php if ( get_query_var('search') ) ?>value="<?php echo get_query_var('search'); ?>">
		</div>
		<div class="col-sm-2">
			<button type="submit" class="btn btn-primary btn-block">Search</button>
		</div>
		<div class="col-sm-12">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="legacy" <?php if ( get_query_var('legacy') === 'on' ) : ?>checked<?php endif; ?> >Use legacy search
				</label>
			</div>
		</div>
	</div>
</form>