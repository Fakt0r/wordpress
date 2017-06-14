<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );



// Additional Functions
// =============================================================================

//echo "<div class='swip_login'><iframe src='http://net.swip.world/external_forms' id='login-iframe' class='swip_login_iframe' frameborder='0'></iframe</div>";
//echo "<div class='swip_login_register'>or <a href='/'>register</a></div>";


//add_filter( 'the_content', 'add_login' );
//add_filter( 'posts_results', 'add_login_posts' );

 
function add_login( $content ) {
 
    $content = "<div class='swip_login'><iframe src='http://net.swip.world/external_forms' id='login-iframe' class='swip_login_iframe' frameborder='0'></iframe</div>".$content;
    $content = "<div class='swip_login_register'>or <a href='/'>register</a></div>".$content;
 
    return $content;
}


function add_login_posts( $posts ) {
	$filtered_posts = array();
	//print_r( $posts );
	foreach ( $posts as $post ) {
 
		$post = $post."<div class='swip_login'><iframe src='http://net.swip.world/external_forms' id='login-iframe' class='swip_login_iframe' frameborder='0'></iframe</div>";
		$post = $post."<div class='swip_login_register'>or <a href='/'>register</a></div>";
		$filtered_posts[] = $post;
	}
    return $filtered_posts;
}