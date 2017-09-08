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

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 5);



// Show "Request Offer" button instead of "Out of stock".

add_filter('woocommerce_get_availability_text', function($text, $product) {
    if (!$product->is_in_stock()) {
        $text = '<a href="/en/contact-us/"><button name="request-offer" class="request_quote button alt">Request Offer</button></a>';
    }
 
    return $text;
}, 10, 2);



// Don't show price range for variable products

add_filter( 'woocommerce_variable_price_html', function( $price, $product ) {
	//$min_price = $product->get_variation_price( 'min', true );
	//return "From $min_price";
	return "";
}, 10, 2 );



// Override theme default specification for product # per row
/*
function loop_columns() {
return 5; // 5 products per row
}
add_filter('loop_shop_columns', 'loop_columns', 999);
*/
/* Add CSS:
.woocommerce ul.products li.product, .woocommerce-page ul.products li.product { width: 16.8%; }
*/


// Show banner on Shop
/*
//WooCommerce Category Banner
add_action ('woocommerce_archive_description' , 'promotional_banner',99);
function promotional_banner() {
  echo  '<img src="http://wp-staging.swip.world/wp-content/uploads/2017/08/Process.png" style="width: 100%; margin:0 0 20px 10px;">';
}
*/

// Don't show products in Shop
/*
function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );

    $tax_query[] = array(
           'taxonomy' => 'product_cat',
           'field' => 'slug',
           'terms' => array( 'clothing' ), // Don't display products in the clothing category on the shop page.
           'operator' => 'IN'
    );

    $q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );
*/
add_action('woocommerce_email_header', 'bbloomer_add_css_to_emails');
  
function bbloomer_add_css_to_emails() {
?>
<style type="text/css">
ul > li:first-child > p {
  text-indent: -34px;
    overflow: hidden;
    word-spacing: 5px;
}
</style>
<?php
}

function theme_styles()  
{ 


if (get_bloginfo('language')=='de-DE-formal'):

	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/custom.css' );
	else:
	    wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/custom-en.css' );
endif;

}
add_action('wp_enqueue_scripts', 'theme_styles');