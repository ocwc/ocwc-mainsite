<div class="sidebar">
	<ul class="side-nav">
		<?php $walker = new PageTitleWalker(); ?>
		<?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
		<?php wp_list_pages( array('title_li'=>'','depth'=>2,'child_of'=>get_post_top_ancestor_id(),'walker' => $walker) ); ?>				
	</ul>
</div>