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







add_filter('woocommerce_get_availability_text', function($text, $product) {
    if (!$product->is_in_stock()) {
        $text = '<a href="/en/contact-us/"><button name="request-offer" class="request_quote button alt">Request Offer</button></a>';
    }
 
    return $text;
}, 10, 2);