<?php
/*
Plugin Name: Swip World Custom Login
Plugin URI: https://about.swip.world/en/
Description: Custom plugin for Login in header
Version: 1.0
Author: Saeed Mughal
Author URI: http://saeedmughal.com/
*/

function custom_login_css(){
  wp_register_style('custom-css', plugins_url() . '/swip-world/sw-custom-css.css' );
  wp_enqueue_style('custom-css');
}
add_action('wp_enqueue_scripts', 'custom_login_css');
?>
