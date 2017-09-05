<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php if ( get_bloginfo('language') =='de-DE' ) : ?>
  <p><?php _e( 'Jemand hat angefordert, dass das Password von folgendem Konto zur&uuml;ckgesetzt werden soll:', 'woocommerce' ); ?></p>
  <p><?php printf( __( 'Benutzername: %s', 'woocommerce' ), $user_login ); ?></p>
  <p><?php _e( 'Falls das ein Versehen war, k&ouml;nnen Sie dieses E-Mail einfach ignorieren, und nichts passiert.', 'woocommerce' ); ?></p>
  <p><?php _e( 'Um Ihr Passwort zur&uuml;ckzusetzen, rufen Sie bitte folgende Adresse auf:', 'woocommerce' ); ?></p>
  <p>
    <a class="link" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>">
        <?php _e( 'Hier klicken um das Passwort zur&uuml;ckzusetzen', 'woocommerce' ); ?></a>
  </p>
<?php else: ?>
  <p><?php _e( 'Someone requested that the password be reset for the following account:', 'woocommerce' ); ?></p>
  <p><?php printf( __( 'Username: %s', 'woocommerce' ), $user_login ); ?></p>
  <p><?php _e( 'If this was a mistake, just ignore this email and nothing will happen.', 'woocommerce' ); ?></p>
  <p><?php _e( 'To reset your password, visit the following address:', 'woocommerce' ); ?></p>
  <p>
    <a class="link" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>">
        <?php _e( 'Click here to reset your password', 'woocommerce' ); ?></a>
  </p>
<?php endif; ?>

<p></p>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
