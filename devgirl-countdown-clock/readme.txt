=== Devgirl Countdown Clock ===
Contributors: elfynity5
Donate link: https://devgirl.co.za/plugins-donations/
Tags: countdown clock, countdown timer, wedding, sporting event, launches, time limit
Requires at least: 5.8.1
Tested up to: 6.1.1
Requires PHP: 5.2
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple countdown timer/clock you can place in a page, post or widget using a shortcode. Elementor-friendly.





== Description ==
The simple countdown clock is used to countdown to a date and time of your choosing using a Wordpress shortcode. 

* Use the shortcode on more than one page or post.
* The shortcode comes with different options you can set.
* Choose your date to countdown to.
* Choose your background colour.
* Choose your text colour.
* Choose from available styles.
* Clock also displays text in Afrikaans, Dutch, Spanish, French, German and Portuguese.








== Installation ==
1. Install the plugin and click Activate.
2. Use the following shortcode to display in your post, page, text widget or Elementor shortode: **[devgirl-countdown-clock time=&#34;31 Dec 2023 8:00&#34;]**
3. Put your own date and time in here: time=&#34;31 Dec 2023 8:00&#34;. 
4. Navigate to Settings->Devgirl Countdown Clock for all instructions.

### All Parameters
* name=&#34; &#34; eg: name=&#34;My Countdown clock&#34;
* time=&#34; &#34; eg: time=&#34;30 Nov 2023 9:00&#34;
* style=&#34; &#34; eg: style=&#34;wedding&#34; 
* clock-colour=&#34; &#34; eg: clock-colour = &#34;orange&#34;
* text-colour=&#34; &#34; eg: text-colour = &#34;#000000&#34;

### Full shortcode example with all parameters used:
* [devgirl-countdown-clock name=&#34;My Sports Event&#34; time=&#34;31 Dec 2023 8:00&#34; style=&#34;sport&#34; clock-colour=&#34;red&#34; text-colour=&#34;#000000&#34;]

### Colour inputs you can use:
* A word eg: red
* A hex value eg: #0011aa
* Clock-color only: For those who are CSS savvy, any CSS value for the clock-colour parameter. It is a background shorthand property.

	eg: rgba(0, 0, 0, 0.5)
	eg: linear-gradient(to left, darkTurquoise, aqua, blue)

### Styles you can choose from
* wedding or sport eg: style=&#34;wedding&#34;
* Default - leave the style paramater out

### Use in another language (**Afrikaans, Dutch, Spanish, French, German or Portuguese**)
* Go to Settings->General->Site Language and change it to Afrikaans, Dutch, Spanish, French, German or Portuguese.
* The text on the clock will now be in the language you chose.
* Basic instructions in Settings->Devgirl Countdown clock are in the language you chose.  



== Frequently Asked Questions ==
= Can I use this countdown clock more than once on a page or post? =
Yes, just make sure that you set a unique name in the name=&#34; &#34; shortcode property.

= What can we expect to see in future releases? =
* An admin area with global options.
* Clock styles. 
* Plugin widget. 



= Can I make suggestions to improve your plugin? =
Yes, please do, your feedback would be totally appreciated!





== Screenshots ==
1. The default countdown clock.
2. Add the shortcode in a page or post.
3. Add the shortcode in the Elementor shortcode widget.
4. Use options in the shortcode to customise your countdown clock.
5. Usage in Afrikaans is also an option.






== Changelog ==
= 2.0 =
* This was a major coding update so therefore I moved it up to a new version. *
* This version you can now use the clock more than once on a page or post. *
* I moved the javascript code to an external file and called it using enqueue. I instantiated the class within the plugin shortcode loop.*
* I removed the end notice and the hiding of the clock once the countdown has completed and instead set the clock to display 0 on all it's values.*
* I removed the php function in the shortcode as it was causing errors and added ob_start so that the clock code will be buffered and appear in the correct place in the content, not just output at the top.*
* Added language support for the following languages: Afrikaans, Dutch, Spanish, French, German or Portuguese support.

= 1.0 =
* This is the first release of this plugin. *


== Upgrade Notice ==
No upgrades at present.