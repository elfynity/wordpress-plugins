<?php // create admin menu 
/* This is the functionality for the Wordpress dashboard page Settings -> Cyba Advanced Search */

// add admin menu
add_action( 'admin_menu', 'cyba_advanced_search_admin_menu' );


// create options menu 
function cyba_advanced_search_admin_menu() {
	add_options_page( 
		'Cyba Advanced Search', 
		'Cyba Advanced Search', 
		'manage_options', 
		'cyba-advanced-search', 
		'cyba_advanced_search_admin_page'		
	);
	
	// add inputs function
	add_action( 'admin_init', 'cyba_advanced_search_update_inputs' );
}


//  inputs function
function cyba_advanced_search_update_inputs() {
  register_setting( 'cyba-advanced-search-settings', 'category_1' );
	register_setting( 'cyba-advanced-search-settings', 'category_2' );
	register_setting( 'cyba-advanced-search-settings', 'cyba_posts_per_page' );
	
	
}





// START the admin page
function cyba_advanced_search_admin_page() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>
	
	<?php global $wpdb; ?>
	
	
	
	<div class="wrap">
	
		<h3>Choose your first search category</h3>
		
		
			
		<form method="post" action="options.php">
			<?php // creating inputs group ?>
			<?php settings_fields( 'cyba-advanced-search-settings' ); ?>
			<?php do_settings_sections( 'cyba-advanced-search-settings' ); ?>
			
			

				<select name="category_1">
					<?php // show list of category names where the parent column does not equal 0
					foreach( $wpdb->get_results("

						SELECT *
						FROM gz_term_taxonomy
						LEFT JOIN gz_terms
						ON gz_term_taxonomy.term_id = gz_terms.term_id
						WHERE gz_term_taxonomy.taxonomy = 'category'
						AND gz_term_taxonomy.parent = 0
						;") as $key => $row) {							
						
						$parent_category_id = $row->term_id; 
						$parent_category_name = $row->name; 
						?>
						
						<option value="<?php echo esc_attr($parent_category_id); ?>" <?php if($parent_category_id == get_option( 'category_1' )){echo 'selected';}?>><?php echo esc_attr($parent_category_name); ?></options>
						
					<?php } ?>

				</select>
				

				<select name="category_2">
					<?php // show list of category names where the parent column does not equal 0
					foreach( $wpdb->get_results("

						SELECT *
						FROM gz_term_taxonomy
						LEFT JOIN gz_terms
						ON gz_term_taxonomy.term_id = gz_terms.term_id
						WHERE gz_term_taxonomy.taxonomy = 'category'
						AND gz_term_taxonomy.parent = 0
						;") as $key => $row) {							
						
						$parent_category_id = $row->term_id; 
						$parent_category_name = $row->name; 
						?>
						
						<option value="<?php echo esc_attr($parent_category_id); ?>" <?php if($parent_category_id == get_option( 'category_2' )){echo 'selected';}?>><?php echo esc_attr($parent_category_name); ?></options>
						
					<?php } ?>

				</select>		
				

				<p>Posts per page</p>
				<input type="number" name="cyba_posts_per_page" value="<?php echo esc_attr(get_option( 'cyba_posts_per_page' )); ?>"/>
				
				
				

			<?php submit_button(); ?>

			<!---
			<select name="first-category">
				<option value="category1">Category 1</option>
				<option value="category2">Category 2</option>
			</select>

			<input type="submit" name="search" value="Search" id="search">
			-->
				

		</form>

	</div><!---wrap-->

	
	
<?php } // END the admin page