<?php
/**
 * Plugin Name: React
 */
defined( 'ABSPATH' ) || die();

add_shortcode( 'example_react_app', 'example_react_app' );
/**
 * Registers a shortcode that simply displays a placeholder for our React App.
 */
function example_react_app( $atts = array(), $content = null , $tag = 'example_react_app' ){
    ob_start();
    ?>
    <div id="app">App goes here</div>
    <?php
    return ob_get_clean();
}