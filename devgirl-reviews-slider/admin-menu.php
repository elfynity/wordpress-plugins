<?php
// create admin menu
class DevgirlReviewsAdminClass {
   


	
	
		
		
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'devgirl_reviews_admin_menu' ) );
		$this->displayError();
	} // construct
	
	

	public function devgirl_reviews_admin_menu() {
		if ( is_admin() ) {
			add_options_page( 
				'Devgirl Reviews Slider', 
				'Devgirl Reviews Slider', 
				'manage_options', 
				'devgirl-reviews-slider', 
				array( $this, 'devgirl_reviews_admin_page' )
			);
			add_action( 'admin_init', array( $this, 'update_devgirl_reviews_inputs'));
			add_action( 'admin_init', array( $this, 'update_devgirl_reviews_style_inputs'));
		}
	} //function
	
	

	public function update_devgirl_reviews_inputs() {
		register_setting( 'devgirl-reviews-settings', 'devgirl_reviews_option' );
		
	}
	
	public function update_devgirl_reviews_style_inputs() {
		register_setting( 'devgirl-reviews-settings2', 'devgirl_reviews_style_select' );
	}
	
	
	
	//error
	public $error_message = '';

	public function displayError() {
		$this->error_message = 'Please fill in all the fields.';
		return;
	}
	
	// END error


		
	

	public function devgirl_reviews_admin_page() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		?>
		
			


		<div class="wrap">
			<div id="devgirl-reviews">
			
				 
			
				<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
				
				
				
				<hr />
				<h3>How to use me</h3>
				<p>Paste this shortcode where you would like to use your reviews : <code>[devgirl-reviews-slider]</code>
				</p>
				
				<div class="clear-margin"></div>
				
				

				
				
				
				
				<hr />
				<h3>Create a new review : </h3>




				<?php
				if (isset($_POST['add-review'])) {

						
					if(!empty($_POST['devgirl-reviews-textarea'] && !empty($_POST['devgirl-review-author']))){
						
						
						$new_review = array(
							'review' => sanitize_text_field($_POST['devgirl-reviews-textarea']),
							'author' => sanitize_text_field($_POST['devgirl-review-author'])
						);
						
						
						// retrieves devgirl_reviews_option from the database and if it is empty, it assigns an empty array to it. 
						$reviews = get_option( 'devgirl_reviews_option', array() );

						// before any reviews are made and the table row is empty, you got to let it know that $reviews is coming in as an array, so we first check to see if the row is empty and if it is we set $reviews to an empty array.
						if( !get_option( 'devgirl_reviews_option' ) ) {
							add_option( 'devgirl_reviews_option', array() );
							$reviews = array();
						}	
						

						// array_push adds a value to the end of an array. Can also be written like $array[] = $var;
						$reviews[] = $new_review;
						
						update_option( 'devgirl_reviews_option', $reviews ); ?>
						
						<script>
							alert('Review Added. ');
						</script>
					<?php	
					} else {
						
						$errorShow = $this->error_message; 
						
						
					}
						
				} //isset ad-review
				?>


				<?php
					if(!empty($errorShow)){ ?>
						<p class="error-message"><?php echo esc_html($errorShow); ?></p>
					<?php
					}
				?>	
				

				<form method="post" action="">
				
					<input type="text" name="devgirl-review-author" placeholder="Review Author"/>
					<div class="clear-margin"></div>
					
					<textarea name="devgirl-reviews-textarea" rows="8" cols="50" placeholder="Review Here"></textarea>
					
					<?php submit_button('Add Review', '', 'add-review'); ?>
					
				</form>

				
				
		
		
				
				
				<hr />
				<h3>Choose your options : </h3>
				
				
				<?php 
				if(isset($_POST['update-style'])) {
					$reviews_style = sanitize_text_field($_POST['devgirl_reviews_style_select']);
					update_option( 'devgirl_reviews_style_select', $reviews_style );
				}
				
				$devgirl_review_style_selected =  get_option('devgirl_reviews_style_select');
				?>
				
				<form method="post" action="">
					<label>Select your style</label>
					<select name="devgirl_reviews_style_select">
						<option value="plain" <?php if ($devgirl_review_style_selected == 'plain'){echo 'selected';} ?> selected>Plain</option> 
						<option value="shadow" <?php if ($devgirl_review_style_selected == 'shadow'){echo 'selected';} ?>>Shadow</option>
						<option value="outline" <?php if ($devgirl_review_style_selected == 'outline'){echo 'selected';} ?>>Outline</option>
						<option value="dark" <?php if ($devgirl_review_style_selected == 'dark'){echo 'selected';} ?> >Dark</option>
					</select>
					
					<?php submit_button('Update Style', '', 'update-style'); ?>
				</form>
				
				
				
				
				
				

				
				<hr />
				<h3>Your current reviews : </h3>
				<div id="devgirl-reviews-container">
					<?php
					
					$reviews = get_option( 'devgirl_reviews_option', array() );
					
					if(!empty($reviews)) {
						
						foreach ( $reviews as $key => $review ) { 
							if(is_array($review)) {
							?>
						
						
							<div class="review">
								<span class="quote">&ldquo;</span>
								
								
								<p class="text">&ldquo; <?php echo esc_html(stripslashes($review['review'])); ?>&ldquo;</p>
								
								<p class="author"><?php echo esc_html(stripslashes($review['author'])); ?></p>
								
								
								
								
								<?php 
								if (isset($_POST['delete_'.$key])){
									
									//$review_index = array_search($key, $reviews);
									unset($reviews[$key]);
									update_option('devgirl_reviews_option', $reviews); ?>
									
									<script>
										alert('Delete Successful. ');
										location.reload();
									</script>
									
									
								<?php	
								}
								?>
								<form id="delete-button" method="post" action="">
									<input type="submit" name="delete_<?php echo esc_html($key); ?>" value="x" title="Delete this review">
								</form>
								
								
							</div><!--review-->	
						

							
							
						<?php 
							} //  if is array
						}
					}
					?>
				</div><!--reviews-container-->
				

				



			</div><!---devgirl-reviews-->
		</div><!--wrap-->



			
			
			
	<?php
	
	

	
	
	} // function




	
} // CLASS



$devgirl_display_admin_reviews = new DevgirlReviewsAdminClass();


