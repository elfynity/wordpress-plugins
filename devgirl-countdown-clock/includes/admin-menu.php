<?php // create admin menu

// create options menu 
function devgirl_countdown_clock_menu() {
	add_options_page( 
		'Devgirl Countdown Clock', //name of the title in admin menu
		'Devgirl Countdown Clock', 
		'manage_options', 
		'devgirl-countdown-clock', // name of the plugin
		'devgirl_countdown_clock_page'	// name of function used to display contents of page	
	);
	
} 



// add admin menu
add_action( 'admin_menu', 'devgirl_countdown_clock_menu' );





// START the admin page
function devgirl_countdown_clock_page() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>
	

			
	<div class="wrap clock-countdown-wrap">
			
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>		
			
	
		<h3>Description</h3>

		<p>The simple countdown clock is used to countdown to a date and time of your choosing using a WordPress shortcode.</p>

    <ul>
		<li>Use the shortcode on more than one page or post.</li>
    <li>The shortcode comes with different options you can set.</li>
    <li>Choose your date to countdown to.</li>
    <li>Choose your background colour.</li>
    <li>Choose your text colour.</li>
    <li>Choose from available styles.</li>
    <li>Clock also displays text in Afrikaans, Dutch, Spanish, French, German and Portuguese.</li>
		</ul>

		
		
		
		
		<hr />		
		<h3>Installation</h3>
		
		<ul>
			<li>Install the plugin and click Activate.</li>
			<li>Use the following shortcode to display in your post, page, text widget or Elementor shortode: <b>[devgirl-countdown-clock time="31 Dec 2023 8:00"]</b></li>
			<li>Put your own date and time in here: time="31 Dec 2023 8:00".</li>
		</ul>
		
		
		
		
		
		<hr />
		<h3>All Parameters</h3>
		
		<ul>
			<li>name=" " eg: name="My Countdown clock"</li>
			<li>time=" " eg: time="30 Nov 2023 9:00"</li>
			<li>style=" " eg: style="wedding"</li>
			<li>clock-colour=" " eg: clock-colour = "orange"</li>
			<li>text-colour=" " eg: text-colour = "#000000"</li>	
		</ul>
		
		
		
		
		
		<hr />
		<h3>Full shortcode example with all parameters used:</h3>
		
		<p><b>[devgirl-countdown-clock name="My Sports Event" time="31 Dec 2023 8:00" style="sport" clock-colour="red" text-colour="#000000"]</b></p>
		

		
		
		
		<hr />
		<h3>Colour inputs you can use for clock-colour and text-colour:</h3>
		<ul>
			<li>A word eg: red</li>
			<li>A hex value eg: #0011aa</li>

		</ul>	
		
		
		
		
		
		<hr />
		<h3>Clock-color only: any CSS value for the clock-colour parameter. It is a background shorthand property.</h3>
			<ul>
			<li>eg: rgba(0, 0, 0, 0.5)</li>
			<li>eg: linear-gradient(to left, darkTurquoise, aqua, blue)</li>
		</ul>	
		
		
		
		

		<hr />
		<h3>Styles you can choose from</h3>
			<ul>
			<li>wedding or sport eg: style="wedding"</li>
			<li>Default – leave the style paramater out</li>
		</ul>	

		
		
		
		
		<hr />
		<h3>USe in another language (Afrikaans, Dutch, Spanish, French, German or Portuguese)</h3>
			<ul>
			<li>Go to Settings->General->Site Language and change it to Afrikaans, Dutch, Spanish, French, German or Portuguese.</li>
			<li>The text on the clock will now be in the language you chose.</li>
			<li>Basic instructions in Settings->Devgirl Countdown clock are in the language you chose.</li>

		</ul>	

		

	</div><!---wrap-->



	
	
	
<?php } // END the admin page