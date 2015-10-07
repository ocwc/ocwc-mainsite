<?php
	$results = get_search_results();
?><?php get_header(); ?>
<?php global $course; ?>
<div class="container main-wrapper">
	<div class="col-sm-12">
		<h1>Open Educational Resources about <i>
            <?php echo filter_var( $results['query'], FILTER_SANITIZE_STRING ); ?></i>
        </h1>

		<?php get_template_part('courses/course_search'); ?>

		<?php if ( ! $results['results'] ) : ?>
			<div class="col-sm-10 col-sm-offset-1">
				No results. Please check spelling and try a more general query. You can also browse <a href="http://www.merlot.org/merlot/index.htm" target="_blank">MERLOT</a> database.
			</div>
		<?php else : ?>

			<?php foreach ($results['results'] as $course) : ?>
				<?php get_template_part('partials/_course'); ?>
			<?php endforeach; ?>

			<div class="pagination col-sm-12">
				<?php if ( array_key_exists ( 'next_page', $results ) ) : ?>
					<a class="btn btn-primary next-page pull-right" href="/courses/search/?<?php echo $results['next_page']; ?>" >Next Page »</a>
				<?php endif; ?>

				<?php if ( array_key_exists ( 'previous_page', $results ) ) : ?>
					<a class="btn btn-primary previous-page pull-left" href="?<?php echo $results['previous_page']; ?>">« Previous Page</a>
				<?php endif; ?>
			</div>

		<?php endif; ?>
	</div>
</div>

<?php get_template_part('partials/_search_footer'); ?>
<?php get_footer(); ?>
