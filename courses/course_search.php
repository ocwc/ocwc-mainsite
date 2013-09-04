	<form method="GET" action="/courses/search/" class="">
		<input type="text" placeholder="Search for courses" name="search" <?php if ( get_query_var('search') ) ?>value="<?php echo get_query_var('search'); ?>">
		<button type="submit" class="button">Search</button>
	</form>
