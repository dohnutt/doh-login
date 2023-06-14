<?php
/**
 * Plugin Name:			@dohnutt Login
 * Description:			Adds a few sprinkles to the WordPress login page.
 * Requires at least:	5.6
 * Requires PHP:		7.4
 * Version:				0.1.0
 * Author:				Eric Moss
 * Author URI:			https://dohnutt.com
 * Text Domain:			doh-login
 *
 * @package				doh
 */


if ( ! defined('ABSPATH') ) {
	exit;
}


// Modify login screen to be Doh-branded.
if ( ! function_exists('doh_login_styles') || ! function_exists('doh_login_scripts') ) {

	add_action('login_enqueue_scripts', 'doh_login_scripts');
	function doh_login_scripts() {

		wp_enqueue_style(
			'doh-login-style',
			plugin_dir_url( __FILE__ ) . '/login-style.css',
			array('login', 'doh-login-fonts')
		);

	}
	
}


// Change "href" attribute on logo to link to Eric's website.
if ( ! function_exists('doh_login_custom_link') ) {
	//add_filter('login_headerurl', 'doh_login_custom_link');
	function doh_login_custom_link() {
		return 'https://dohnutt.com';
	}
}


// Change "title" attribute on logo to be branded properly.
if ( ! function_exists('doh_change_title_on_logo') ) {
	//add_filter('login_headertext', 'doh_change_title_on_logo');
	function doh_change_title_on_logo() {
		return __('@dohnutt', 'dohtheme');
	}
}