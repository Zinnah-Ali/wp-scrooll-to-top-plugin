<?php
/**
 * Plugin Name:             Scroll Click To Top
 * Description:             The Plugin is working when you Scroll show one button then you click this button then go to this page top position. scroll click to top plugin very help full and more professional. 
 * Plugin URI:              https://wordpress.org/plugins/scroll-click-to-top/
 * Version:                 1.0.0
 * Requires at leaste:      5.1
 * Min wordpress version:   5.1
 * Requires PHP:            7.1
 * Author:                  Zinnah Ali
 * Author URI:              https://github.com/Zinnah-Ali
 * Text Domain:             scroll-click-to-top
 * License:                 GPL v2 or later
 * License URI:             https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:              https://github.com/Zinnah-Ali
 * Text Domain:             sctt
 */




 //Include CSS File
 function sctt_enqueue_style() {
    wp_enqueue_style("sctt-style", plugins_url( "css/sctt-style.css", __FILE__ ) );
 }
 add_action( "wp_enqueue_scripts", "sctt_enqueue_style");


 //Include JavaScript File
 function sctt_enqueue_script() {
    wp_enqueue_script( "jquery" );
    wp_enqueue_script( "sctt-plugin", plugins_url( "js/sctt-plugin.js", __FILE__ ), array(), "1.0.0", true );
 }
 add_action( "wp_enqueue_scripts", "sctt_enqueue_script" );
 

 //Add Plugin Script Code
 function sctt_enqueue_scroll_script() {
    ?>
        <script>
            jQuery(document).ready(function () {
                jQuery.scrollUp();
            });
        </script>   
    <?php
 }
 add_action( "wp_footer", "sctt_enqueue_scroll_script" );




 //Add Plugin Daynamic Scroll Settings 
 add_action( "customize_register", "sctt_scroll_section" );
 function sctt_scroll_section($sctt_wordpress_customize) {
    $sctt_wordpress_customize-> add_section("sctt_section", array(
        "title" => __("Scroll To Top", "sctt_section"),
        "description" => "The Plugin is working when you Scroll show one button then you click this button then go to this page top position. scroll click to top plugin very help full and more professional.",
    ));

    //Add Background Color Daynamic
    $sctt_wordpress_customize-> add_setting("sctt_bg_color", array(
        "default" => "#000000",
    ));

    $sctt_wordpress_customize-> add_control("sctt_bg_color", array(
        "label" => "Background Color",
        "section" => "sctt_section",
        "type" => "color",
    ));

    
    //Add Border Daynamic
    $sctt_wordpress_customize-> add_setting("sctt_border", array(
        "default" => "10",
        "description" => "If you need scroll to top button more round just add px number by defoult default man 10px"
    ));

    $sctt_wordpress_customize-> add_control("sctt_border", array(
        "label" => "Border Raound",
        "section" => "sctt_section",
        "type" => "number",
    ));
 }



 //Add Theme Color, Border CSS
 function sctt_button_bg_color() {
    ?>
    <style>
        #scrollUp {
            background-color: <?php print get_theme_mod( "sctt_bg_color" ) ?>;
            border-radius: <?php print get_theme_mod( "sctt_border" )."px"; ?>;
        }
    </style>
    <?php
 }

 add_action( "wp_head", "sctt_button_bg_color" );


?>
