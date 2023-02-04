<?php
/**
 * Plugin Name: Cyba Advanced Search
 * Plugin URI: https://www.devgirl.co.za
 * Description: Display content using this shortcode [cyba-advanced-search] to insert in a page or post
 * Version: 2.0
 * Text Domain: cyba-advanced-search
 * Author: Dev Girl
 * Author URI: https://www.devgirl.co.za
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */
 
 
/*Sanitize early
Escape Late
Always Validate 
*/

/*
Cyba Advanced Search is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Cyba Advanced Search. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// shortcode : [cyba-advanced-search]

//add admin menu
include 'includes/admin-menu.php'; 


// add front end functioning
function cyba_advanced_search_plugin($atts) {
	include 'includes/directory-page.php'; 
}
add_shortcode('cyba-advanced-search', 'cyba_advanced_search_plugin');






// front end  admin stylesheet
function cyba_advanced_search_style_frontend() {
    wp_enqueue_style( 'front-end', plugins_url( '/style/front-end.css' , __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'cyba_advanced_search_style_frontend' );



// backend  admin stylesheet
function cyba_advanced_search_style_backend() {
    wp_enqueue_style( 'back-end', plugins_url( '/style/back-end.css' , __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'cyba_advanced_search_style_backend' );


