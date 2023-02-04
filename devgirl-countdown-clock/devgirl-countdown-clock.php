<?php

/**
 * Plugin Name: Devgirl Countdown Clock
 * Plugin URI: https://devgirl.co.za/devgirl-countdown-clock/
 * Description: The simple countdown clock is used to countdown to a date and time of your choosing using a Wordpress shortcode. 
 * Version: 2.0
 * Text Domain: devgirl-countdown-clock
 * Domain Path: /languages
 * Author: dev girl
 * Author URI: https://www.devgirl.co.za
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
 


/*
Devgirl Countdown Clock is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Devgirl Countdown Clock is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Devgirl Countdown Clock. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/




include 'includes/admin-menu.php'; 




// shortcode : [devgirl-countdown-clock time="10 Jan 2023 08:00:00"]
// [devgirl-countdown-clock time="29 April 2023 00:00:00" end-notice="The Ultra Tri has started!" clock-colour="linear-gradient(blue, aqua)" text-colour="white"]

function devgirl_countdown_clock_function($atts = '', $content = null) { 
		ob_start(); 
		
		
		$value = shortcode_atts( array(
			'name' => "First Countdown Clock",
			'time' => "5 December 2023 8:00",
			'clock-colour' => "#011c25",
			'text-colour' => "DarkTurquoise",
			'style' => 'default'
		), $atts, 'devgirl_countdown_clock_function' );
		
		$name = strtolower(str_replace(' ', '-', sanitize_text_field($value['name'])));	
		$time = sanitize_text_field($value['time']);	
		$clock_colour = sanitize_text_field($value['clock-colour']);
		$text_colour = sanitize_text_field($value['text-colour']);
		$style = sanitize_text_field($value['style']);


		?>
	


			<div class="devgirl-countdown-clock <?php echo $style; ?>" id="<?php echo $name; ?>">
				
				
			<?php _e( '', 'devgirl-countdown-clock' ); ?>

				
				<div class="box" style="background:<?php echo esc_html($clock_colour); ?>; color:<?php echo esc_html($text_colour); ?>">
					<div class="clock days-clock-value"></div>
					<div class="text"><?php _e( 'days', 'devgirl-countdown-clock' ); ?></div>
				</div><!--countdown-block-->
				
				<div class="box" style="background:<?php echo esc_html($clock_colour); ?>; color:<?php echo esc_html($text_colour); ?>">
					<div class="clock hours-clock-value"></div>
					<div class="text"><?php _e( 'hours', 'devgirl-countdown-clock' ); ?></div>
				</div><!--countdown-block-->
				
				<div class="box" style="background:<?php echo esc_html($clock_colour); ?>; color:<?php echo esc_html($text_colour); ?>">
					<div class="clock mins-clock-value"></div>
					<div class="text"><?php _e( 'mins', 'devgirl-countdown-clock' ); ?></div>
				</div><!--countdown-block-->
				
				<div class="box" style="background:<?php echo esc_html($clock_colour); ?>; color:<?php echo esc_html($text_colour); ?>">
					<div class="clock secs-clock-value"></div>
					<div class="text"><?php _e( 'secs', 'devgirl-countdown-clock' ); ?></div>
				</div><!--countdown-block-->
			
				
				
				
			</div><!--devgirl-countdown-clock-->

		
			
			<script type="text/javascript">
				new DevgirlCountdownClock('<?php echo $name; ?>', '<?php echo $time; ?>').start();
			</script>		

				
			
	<?php 
	
	$output = ob_get_contents(); 
	ob_end_clean();
	return $output;
	

} //END devgirl_countdown_clock_function

add_shortcode('devgirl-countdown-clock', 'devgirl_countdown_clock_function');







// front end stylesheet
function devgirl_countdown_clock_frontend() {
    wp_enqueue_style( 'countdown-clock-frontend', plugins_url( '/style/countdown-clock-frontend.css' , __FILE__ ) );
		
	
		wp_enqueue_script( 'countdown-clock', plugins_url( '/script/countdown-clock.js' , __FILE__ ), array(), '', false );
}
add_action( 'wp_enqueue_scripts', 'devgirl_countdown_clock_frontend' );



// backend admin stylesheet
function devgirl_countdown_clock_backend_style() {
    wp_enqueue_style( 'countdown-clock-backend', plugins_url( '/style/countdown-clock-backend.css' , __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'devgirl_countdown_clock_backend_style' );




// load translations
function devgirl_countdown_clock_load_textdomain() {
	load_plugin_textdomain( 'devgirl-countdown-clock', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'devgirl_countdown_clock_load_textdomain' );


$font_url = plugins_url( 'includes/fonts/MoonDance-Regular.ttf', __FILE__ );




