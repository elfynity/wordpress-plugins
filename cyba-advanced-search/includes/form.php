<?php global $wpdb; 
// this is the sidebar form for the directory page.
?>


<?php 

$category_1 = get_option('category_1');
$category_2 = get_option('category_2');
$cyba_posts_per_page = get_option('cyba_posts_per_page');

?>



<form method="post" action="<?php the_permalink(); ?>">
	

	
	<!--- first search drop down menu -->
	<?php
		foreach( $wpdb->get_results("

		SELECT name
		FROM gz_terms
		WHERE term_id = '$category_1'
		;

		") as $key => $row) {
		// each column in your row will be accessible like this
		$category_1_name = $row->name; 
		}
	?>

	<select name="main_cat_id">
		<option value="<?php echo esc_attr($category_1); ?>"><?php echo esc_attr($category_1_name); ?></option>

	
			<?php
			foreach( $wpdb->get_results("

			SELECT *
			FROM gz_term_taxonomy
			LEFT JOIN gz_terms
			ON gz_term_taxonomy.parent = gz_terms.term_id
			WHERE gz_terms.term_id = '$category_1'
			;

			") as $key => $row) {
			// each column in your row will be accessible like this
			$cat_id = $row->term_taxonomy_id; 
			?>


					<?php
					foreach( $wpdb->get_results("

					SELECT *
					FROM gz_terms
					WHERE term_id = '$cat_id'
					;

					") as $key => $row) {
					// each column in your row will be accessible like this
					$cat_name = $row->name;
					$cat_slug = $row->slug;
					$cat_id = $row->term_id;
					?>

					<option value="<?php echo esc_attr($cat_id); ?>" <?php if($cat_id == $_POST['main_cat_id']){echo 'selected';}?>><?php echo esc_attr($cat_name); ?></option>
					

					<?php } ?>


			<?php } ?>
	</select>



		<!--- Second search drop down menu -->
	<?php
		foreach( $wpdb->get_results("

		SELECT name
		FROM gz_terms
		WHERE term_id = '$category_2'
		;

		") as $key => $row) {
		// each column in your row will be accessible like this
		$category_2_name = $row->name; 
		}
	?>


	<select name="main_loc_id">
		<option value="<?php echo esc_attr($category_2); ?>"><?php echo esc_attr($category_2_name); ?></option>
			<?php
			foreach( $wpdb->get_results("

			SELECT *
			FROM gz_term_taxonomy
			LEFT JOIN gz_terms
			ON gz_term_taxonomy.parent = gz_terms.term_id
			WHERE gz_terms.term_id = '$category_2'
			;

			") as $key => $row) {
			// each column in your row will be accessible like this
			$loc_id = $row->term_taxonomy_id; 
			?>


					<?php
					foreach( $wpdb->get_results("

					SELECT *
					FROM gz_terms
					WHERE term_id = '$loc_id'
					;

					") as $key => $row) {
					// each column in your row will be accessible like this
					$loc_name = $row->name;
					$loc_slug = $row->slug;
					$loc_id = $row->term_id;
					?>

					
					<option value="<?php echo esc_attr($loc_id); ?>" <?php if($loc_id == $_POST['main_loc_id']){echo 'selected';}?>><?php echo esc_attr($loc_name); ?></option>
					

					<?php } ?>


			<?php } ?>
	</select>	






	
<hr />



	<!--- tag categories -->
	<?php
	
	$array1 = array();
	
	foreach( $wpdb->get_results("

		SELECT *
		FROM gz_term_taxonomy
		LEFT JOIN gz_terms
		ON gz_term_taxonomy.term_id = gz_terms.term_id
		WHERE gz_term_taxonomy.taxonomy = 'post_tag'
		;") as $key => $row) {
		// each column in your row will be accessible like this
		$tag_name = $row->name; 
		$tag_slug = $row->slug;
		$array1 = array_merge($array1, array_map('trim', explode(",", $row->name)));
		?>
	




		<input <?php
			if(!empty($_POST['tagSlugs'])) {
				if(in_array($tag_slug, $_POST['tagSlugs'])) {
					echo "checked='checked'";
				} }?> type="checkbox" id="tags" name="tagSlugs[]" value="<?php echo esc_attr($tag_slug); ?>">
		<label for="<?php echo esc_attr($tag_slug); ?>"><?php echo esc_attr($tag_name); ?></label><br />
		
		
	<?php } // foreach ?>


	
<hr />	
	
	
	<input type="submit" name="search" value="Search" id="search">

</form>






