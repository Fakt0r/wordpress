<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php printf( __( "Hi there. Your recent order on %s has been completed. Your order details are shown below for your reference:", 'woocommerce' ), get_option( 'blogname' ) ); ?></p>

<?php

/**
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
?>

<?php foreach($order->get_items() as $item) {
    $product_name = $item['name'];

} ?>


<div style="color: #636363" class="">
<h2 style="color:#96588a;display:block;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Delivery</h2>

<?php if ($product_name =='Self-Service Brainstorming') : ?>

Please <a style="color: #15c; font-weight: 700" href="https://www.swip.world/projects/challenges/new" target="_blank">create your own Challenge</a> project now.<br>
It is important that you specify your problem and what you need as clearly as possible. If you need assistance, please get in touch with us to offer our services.<br>
Once you’re ready, click on “Publish” to get your challenge going!<br>
You may also <a style="color: #15c;" href="https://www.swip.world/companies/new" target="_blank">create a company</a> profile page.


<?php endif; ?>

<?php if ($product_name =='Managed Brainstorming') : ?>

We will get in touch with you shortly to help prepare the challenge. You may already want to start ahead by <a style="color: #15c; font-weight: 700" href="https://www.swip.world/projects/challenges/new" target="_blank">creating a first draft</a>. <br>
In the meantime, <strong>please sign up on <a style="color: #15c;" href="https://www.swip.world/companies/new" target="_blank">swip.world</a></strong> using your full name if you haven’t already done so. Optionally, you may also <a style="color: #15c;" href="https://www.swip.world/companies/new" target="_blank">create a company</a> profile page.


<?php endif; ?>


</div>
<?php

do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
