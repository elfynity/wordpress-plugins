<!--- frontend directory page -->
<div id="cyba-page-content">


	<div id="cyba-page-sidebar">
			<?php include 'form.php'; ?>	
	</div><!---page-sidebar-->

	
	
	

	<div id="cyba-page-right-content">
		<div class="cyba-page-wrapper">



					
			<?php 
			if(isset($_POST['search'])) 
			{ ?>


				
				<!--- main categories -->
				<?php
				$main_cat_id = sanitize_text_field($_POST['main_cat_id']); ?>

				<!--- location categories -->
				<?php 
				$main_loc_id = sanitize_text_field($_POST['main_loc_id']); ?>
					
					
				<!---- tag categories -->	

				
				

				<?php 
				/* it took me a day to work out this tiny piece of code below! omg! 
				To save the value from the input checkbox (tagSlugs[]) so I can use it as an array in the $args below, all I had to do was just assign a variable to the $_POST['tagslugs'] value, and then 'tag_slug__and' => $tagSlugs, automatically spits out all the tags I selected in the checkbox
				 */
				// $tagSlugs = $_POST['tagSlugs'];	
				$tagSlugs = isset( $_POST['tagSlugs'] ) ? (array) $_POST['tagSlugs'] : array();
				$tagSlugs = array_map( 'esc_attr', $tagSlugs );
				// print_r($tagSlugs);
				?>



				<?php
				$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'category__and' => array($main_cat_id, $main_loc_id),
						'tag_slug__and' => $tagSlugs,
						'posts_per_page' => $cyba_posts_per_page,
				);
				$arr_posts = new WP_Query( $args );
					
				if ( $arr_posts->have_posts() ) : ?>

					<div id="cyba-listings">
						<?php while ( $arr_posts->have_posts() ) :
						$arr_posts->the_post();
						?>
						
						<div class="cyba-listing" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php
							if ( has_post_thumbnail() ) :
								the_post_thumbnail('medium');
							endif;
							?>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
							
							<div class="cyba-search-meta">
								<span class="cyba-search-meta-title"><b>Tags:</b></span> 
								
								<span class="cyba-search-meta-cats">
									<?php
										$posttags = get_the_tags();
										if ($posttags) {
											foreach($posttags as $tag) {
												echo esc_attr($tag->name . ', '); 
											}
										}
									?>
								</span><!---search-meta-cats-->
							<div class="cyba-clear"></div>	
							</div><!---search-meta-->
							

							<div class="cyba-search-meta">
								<span class="cyba-search-meta-title"><b>Categories:</b></span>
								<span class="cyba-search-meta-cats">
									<?php
									foreach((get_the_category()) as $childcat) {
									if (cat_is_ancestor_of($category_1, $childcat)) {
										echo esc_attr($childcat->cat_name);
									}}
									?>, 

									<?php
									foreach((get_the_category()) as $childcat) {
									if (cat_is_ancestor_of($category_2, $childcat)) {
										echo esc_attr($childcat->cat_name);
									}}
									?>
								</span><!---search-meta-cats-->
							<div class="cyba-clear"></div>	
							</div><!---search-meta-->
							
							<hr />
							
							<?php the_excerpt(); ?>
						</div><!---listing-->
						
						<?php	endwhile; ?>
					</div><!---listings-->
					
					
					
						<?php include 'cyba-pagination.php'; ?>

				<?php else : ?>
						<p>Nothing to show</p>
				<?php endif; ?>

				<?php wp_reset_postdata();	?>

				
				
			<?php 
			} else { 
			
				if ( get_query_var('paged') ) {
						$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
						$paged = get_query_var('page');
				} else {
						$paged = 1;
				}
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								
				
				$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'category__and' => array($category_1, $category_2),
						'posts_per_page' => $cyba_posts_per_page,
						'paged' => $paged,
				);
				$arr_posts = new WP_Query( $args );
					
				if ( $arr_posts->have_posts() ) : ?>

					<div id="cyba-listings">
						<?php while ( $arr_posts->have_posts() ) :
						$arr_posts->the_post();
						?>
						
						<div class="cyba-listing" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php
							if ( has_post_thumbnail() ) :
								the_post_thumbnail('medium');
							endif;
							?>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
							
							<div class="cyba-search-meta">
								<span class="cyba-search-meta-title"><b>Tags:</b></span> 
								
								<span class="cyba-search-meta-cats">
									<?php
										$posttags = get_the_tags();
										if ($posttags) {
											foreach($posttags as $tag) {
												echo esc_attr($tag->name . ', '); 
											}
										}
									?>
								</span><!---search-meta-cats-->
							<div class="cyba-clear"></div>	
							</div><!---search-meta-->
							

							<div class="cyba-search-meta">
								<span class="cyba-search-meta-title"><b>Categories:</b></span>
								<span class="cyba-search-meta-cats">
									<?php
									foreach((get_the_category()) as $childcat) {
									if (cat_is_ancestor_of($category_1, $childcat)) {
										echo esc_attr($childcat->cat_name);
									}}
									?>, 

									<?php
									foreach((get_the_category()) as $childcat) {
									if (cat_is_ancestor_of($category_2, $childcat)) {
										echo esc_attr($childcat->cat_name);
									}}
									?>
								</span><!---search-meta-cats-->
							<div class="cyba-clear"></div>	
							</div><!---search-meta-->
							
							<hr />
							
							<?php the_excerpt(); ?>
						</div><!---listing-->
						
						<?php	endwhile; ?>
					</div><!---listings-->
					
					
					<?php include 'cyba-pagination.php'; ?>


				<?php else : ?>
						<p>Nothing to show</p>
				<?php endif; ?>

	



				<?php wp_reset_postdata();	?>
				
				
				
			<?php }// isset ?>

	
		
			

		</div><!---page-wrapper-->
	</div><!---page-right-content-->

<div class="cyba-clear"></div>
</div><!---page-content-->