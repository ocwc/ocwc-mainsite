	<form method="GET" action="/courses/search/" class="">
		<input type="text" placeholder="Search for courses" name="q" <?php if ( get_query_var('q') ) ?>value="<?php echo get_query_var('q'); ?>">
		<button type="submit" class="button">Search</button>
	</form>
