<form method="GET" action="/courses/search/" class="course-search-form clearfix" role="form">
	<div class="form-group">
		<div class="col-xs-10">
			<input class="form-control" type="text" placeholder="Search for course material" name="search" <?php if ( get_query_var('search') ) ?>value="<?php echo get_query_var('search'); ?>">
		</div>
		<div class="col-xs-2">
			<button type="submit" class="btn btn-primary btn-block">Search</button>
		</div>
	</div>
</form>