<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 */

function register_elementor_widget_area( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/reviews.php' );

	$widgets_manager->register( new \Elementor_Reviews() );

}
add_action( 'elementor/widgets/register', 'register_elementor_widget_area' );

function review_plugin_assets(){
	wp_enqueue_style('OwlCarousel2', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', null , '2.3.4', 'all');

	wp_enqueue_script('OwlCarousel2', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);
	wp_enqueue_script('custom', plugins_url( '/assets/js/custom.js', __FILE__ ) , array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'review_plugin_assets');