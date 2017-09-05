<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
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

<?php if ( get_bloginfo('language') =='de-DE' ) : ?>
  <p><?php _e( "Wir haben Ihre Bestellung erhalten. Sie ist nun in Bearbeitung. Unten finden Sie die Bestelldaten zu Ihrer Information.", 'woocommerce' ); ?></p>
<?php else: ?>
  <p><?php _e( "Your order has been received and is now being processed. Your order details are shown below for your reference.", 'woocommerce' ); ?></p>
<?php endif; ?>


<?php foreach($order->get_items() as $item) {
    $product_name = $item['name'];

} ?>


<div style="color: #636363" class="">

<?php if ($product_name =='Managed Brainstorming') : ?>

  <?php if ( get_bloginfo('language') =='de-DE' ) : ?>
  <h2 style="color:#96588a;display:block;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Ausf&uuml;hrung</h2>
  Wir nehmen in K&uuml;rze Kontakt mit Ihnen auf, um Sie bei dem Aufsetzen der Challenge zu unterst&uuml;tzen. Falls Sie m&ouml;chten, k&ouml;nnen Sie in der Zwischenzeit schon einen <a style="color: #15c; font-weight: 700" href="https://www.swip.world/projects/challenges/new" target="_blank">ersten Entwurf erstellen</a>.<br>
  Bitte stellen Sie sicher, dass Sie sich auf <a style="color: #15c;" href="https://www.swip.world/" target="_blank">swip.world</a> schon mit Ihrem vollständigen Namen registriert haben. Sie k&ouml;nnen nach Bedarf auch eine <a style="color: #15c;" href="https://www.swip.world/companies/new" target="_blank">Firmenseite erstelen</a>.

  <?php else: ?>
  <h2 style="color:#96588a;display:block;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Delivery</h2>
  We will get in touch with you shortly to help prepare the challenge. You may already want to start ahead by <a style="color: #15c; font-weight: 700" href="https://www.swip.world/projects/challenges/new" target="_blank">creating a first draft</a>. <br>
  In the meantime, <strong>please sign up on <a style="color: #15c;" href="https://www.swip.world/" target="_blank">swip.world</a></strong> using your full name if you haven’t already done so. Optionally, you may also <a style="color: #15c;" href="https://www.swip.world/companies/new" target="_blank">create a company</a> profile page.

  <?php endif; ?>


<?php else: ?>

<?php if ( get_bloginfo('language') =='de-DE' ) : ?>
<?php #if ($product_name =='Self-Service Brainstorming') : ?>
  <h2 style="color:#96588a;display:block;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Ausf&uuml;hrung</h2>
    Bitte <a style="color: #15c; font-weight: 700" href="https://www.swip.world/projects/challenges/new" target="_blank">erstellen Sie nun Ihr Challenge-Projekt</a>.≈
    Es ist wichtig, dass Sie Ihr Problem und was genau Sie suchen m&ouml;glichst pr&auml;zise beschreiben. Falls Sie Unterst&uuml;tzung w&uuml;nschen, nehmen Sie bitte mit uns <a style="color: #15c;" href="mailto:orders@swip.world" target="_blank">Kontakt auf</a>, damit wir Ihnen unsere Dienstleistungen anbieten k&ouml;nnen.<br>
    Wenn Ihre Challenge bereit ist, klicken Sie auf "Submit", um es zu starten. Nachdem wir es gepr&uuml;ft haben, werden wir es ver&ouml;ffentlichen.<br>
    Sie k&ouml;nnen gerne auch ein <a style="color: #15c;" href="https://www.swip.world/companies/new" target="_blank">Firmenprofil erstellen</a>.

 <?php else: ?>
   <h2 style="color:#96588a;display:block;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Delivery</h2>
    Please <a style="color: #15c; font-weight: 700" href="https://www.swip.world/projects/challenges/new" target="_blank">create your own Challenge</a> project now.<br>
    It is important that you specify your problem and what you need as clearly as possible. If you need assistance, please <a style="color: #15c;" href="mailto:orders@swip.world" target="_blank">get in touch</a> with us to offer our services.<br>
    Once you’re ready, click on “Submit” to get your challenge going! After our review, we will publish it.<br>
    You may also <a style="color: #15c;" href="https://www.swip.world/companies/new" target="_blank">create a company</a> profile page.
 
 <?php endif; ?>

<?php endif; ?>



</div>

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
 
 
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
