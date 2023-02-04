<?php
/**
 * Plugin Name: Devgirl Reviews Slider
 * Plugin URI: https://devgirl.co.za/category/wordpress-plugins-development/
 * Description: A slider to show your customer reviews.
 * Version: 1.0
 * Text Domain: devgirl-reviews-slider
 * Author: Devgirl
 * Author URI: https://www.devgirl.co.za
 */
 
//add admin menu
include 'admin-menu.php'; 


 
//echo $title;  
 

class DevgirlReviewsClass {
	
	
	public function __construct() {
		add_shortcode('devgirl-reviews-slider', array($this, 'shortcode'));
	} // construct
	
	


	// [devgirl_reviews-shortcode]	
	public function shortcode($atts=[], $content = null, $tag = '') {
		ob_start(); 

		
		
		
		// Retrieve reviews from the database
		$reviews = get_option( 'devgirl_reviews_option' ); 

		// Check if reviews is an array, if not set it to an empty array
		if (!is_array($reviews)) {
			$reviews = array();
		}
		?>
		
		
		
		
		
		
				
				
		<div id="devgirl-reviews-container">		
			<section id="devgirl-slider-wrapper">
				<button class="slide-arrow" id="slide-arrow-prev">
					&#8249;
				</button>
				
				<button class="slide-arrow" id="slide-arrow-next">
					&#8250;
				</button>
				
				
				
				<ul class="slides-container <?php echo esc_attr(get_option('devgirl_reviews_style_select', array() )); ?>" id="slides-container">
				
						<?php
						// loop through reviews and display them
						foreach ($reviews as $review) { ?>
												
							<li class="slide">
								<div class="slide-inner">
								<span class="quote">&ldquo;</span>
								<p class="text">&ldquo; <?php echo esc_html(stripslashes($review['review'])); ?>&ldquo;</p>
										
								<p class="author"><?php echo esc_html(stripslashes($review['author'])); ?></p>
								</div><!--slide-inner-->
							</li>
							
						<?php } // foreach
						?>


				</ul><!-- slides-container-->
				

				
			</section><!-- slider-wrapper-->
		</div><!--devgirl-reviews-container-->








		<script type="text/javascript" async>
		window.onload = function() {
			
			const slidesContainer = document.getElementById("slides-container");
			slidesContainer.scrollLeft = 0;

			
			const slide = document.querySelector(".slide");
			const prevButton = document.getElementById("slide-arrow-prev");
			const nextButton = document.getElementById("slide-arrow-next");

			nextButton.addEventListener("click", () => {
				const slideWidth = slide.clientWidth;
				if (slidesContainer.scrollLeft + slidesContainer.clientWidth >= slidesContainer.scrollWidth) {
					slidesContainer.scrollLeft = 0;
				} else {
					slidesContainer.scrollLeft += slideWidth;
				}
			});

			prevButton.addEventListener("click", () => {
				const slideWidth = slide.clientWidth;
				if (slidesContainer.scrollLeft === 0) {
					//its moving the container to show the last slide. So it sets the value of slidesContainer.scrollLeft to be the full width of the container but subtracts the last slide (so that it is visible, otherwise it would scroll too far). 
					slidesContainer.scrollLeft = slidesContainer.scrollWidth - slidesContainer.clientWidth;
				} else {
					slidesContainer.scrollLeft -= slideWidth;
				}
			});

			// pause on hover
			slidesContainer.addEventListener("mouseenter", () => {
				clearInterval(intervalId);
			});

			slidesContainer.addEventListener("mouseleave", () => {
				intervalId = setInterval(() => {
					nextButton.click();
				}, 5000);
			});

			// autoplay
			let intervalId = setInterval(() => {
					nextButton.click();
				}, 5000);
			};

		</script>






		
		<?php
		$output = ob_get_contents(); 
		ob_end_clean();
		return $output;
		
	} //shortcode
	
	
	


} // CLASS




new DevgirlReviewsClass();






class DevgirlReviewsScripts {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'my_first_plugin_scripts' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'my_first_plugin_backend_scripts' ) );
    }

    public function my_first_plugin_scripts() {
        wp_enqueue_style( 'frontend', plugins_url( '/style/frontend.css' , __FILE__ ) );
        wp_enqueue_script( 'sript', plugins_url( '/js/script.js' , __FILE__ ), false );
    }

    public function my_first_plugin_backend_scripts() {
        wp_enqueue_style( 'backend', plugins_url( '/style/backend.css' , __FILE__ ) );
    }
}

new DevgirlReviewsScripts();