<div id="cyba-pagination">
<?php if ($arr_posts->max_num_pages > 1) : // custom pagination  ?>
	<?php
		$orig_query = $wp_query; // fix for pagination to work
		$wp_query = $arr_posts;
		$big = 999999999;
		echo paginate_links(array(
				'base' => str_replace($big, '%#%', get_pagenum_link($big)),
				'format' => '?paged=%#%',
				'current' => max(1, get_query_var('paged')),
				'total' => $wp_query->max_num_pages
		));                  
		$wp_query = $orig_query; // fix for pagination to work
	?>
	<?php endif; ?>
</div><!---pagination-->