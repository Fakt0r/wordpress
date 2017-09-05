<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';

$bx=get_post_meta( $order->id, '_payment_method', true );
if ( 'on-hold' == $order->status && 'bacs'==$bx ) :?>

<section class="woocommerce-bacs-bank-details New" style="color: #636363;">


<?php if ( get_bloginfo('language') =='de-DE' ) : ?>

<h2 class="wc-bacs-bank-details-heading" style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Zahlungsanweisungen</h2>
<p>Bitte bezahlen Sie den gesamten Betrag innert 30 Tagen auf folgendes Bankkonto:</p>
<ul class="wc-bacs-bank-details order_details bacs_details">
<li class="bank_name">Bank: <strong>Z&uuml;rcher
Kantonalbank,Switzerland</strong>
</li>
<li class="bank_name">Konto lautend auf: <strong>Swiss Innovation Pool
AG, 8887 Mels, Switzerland</strong>
</li>
<li class="account_number">Konto:
<strong>1100-6033.247</strong>
</li>
<li class="iban">IBAN: <strong>CH64 0070 0110 0060 3324
7</strong>
</li>
<li class="bic">BIC: <strong>ZKBKCHZZ80A</strong>
</li>
</ul>
 
 <?php else: ?>
 
<h2 class="wc-bacs-bank-details-heading" style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">Payment Instructions</h2>
<p>Please pay the total amount within 30 days to the following bank account:</p>
<ul class="wc-bacs-bank-details order_details bacs_details">
<li class="bank_name">Bank: <strong>Z&uuml;rcher
Kantonalbank,Switzerland</strong>
</li>
<li class="bank_name">Account Owner: <strong>Swiss Innovation Pool
AG, 8887 Mels, Switzerland</strong>
</li>
<li class="account_number">Account number:
<strong>1100-6033.247</strong>
</li>
<li class="iban">IBAN: <strong>CH64 0070 0110 0060 3324
7</strong>
</li>
<li class="bic">BIC: <strong>ZKBKCHZZ80A</strong>
</li>
</ul>
 
 <?php endif; ?>









</section>

<?php


        
    else:
    

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); 

endif; ?>


<?php if ( ! $sent_to_admin ) : ?>
	<h2><?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?></h2>
<?php else : ?>
	<h2><a class="link" href="<?php echo esc_url( admin_url( 'post.php?post=' . $order->get_id() . '&action=edit' ) ); ?>"><?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?></a> (<?php printf( '<time datetime="%s">%s</time>', $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ); ?>)</h2>
<?php endif; ?>


<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" border="1">
	<thead>
		<tr>
			<th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th class="td" scope="col" style="text-align:<?php echo $text_align; ?>;"><?php _e( 'Price', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo wc_get_email_order_items( $order, array(
			'show_sku'      => $sent_to_admin,
			'show_image'    => false,
			'image_size'    => array( 32, 32 ),
			'plain_text'    => $plain_text,
			'sent_to_admin' => $sent_to_admin,
		) ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
					<?php $fulllabel= $total['label'];
					if($fulllabel=="Tax (8% VAT):"){ ?>
					<th class="td" scope="row" colspan="2" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo $fulllabel; ?></th>
					<?php }
					else
					{
						$result = preg_replace("/[^a-zA-Z [:^print:] :]+/", "", $fulllabel);?> 
						<th class="td" scope="row" colspan="2" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo $result; ?></th>
						<?php } ?>
						
						<td class="td" style="text-align:<?php echo $text_align; ?>; <?php echo ( 1 === $i ) ? 'border-top-width: 4px;' : ''; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
