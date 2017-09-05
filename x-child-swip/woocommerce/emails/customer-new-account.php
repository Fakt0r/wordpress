<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

  <?php if ( get_bloginfo('language') =='de-DE' ) : ?>
    <p><?php printf( __( 'Vielen Dank, dass Sie auf %1$s ein Konto er&ouml;ffnet haben. Ihr Benutzername ist %2$s', 'woocommerce' ), esc_html( $blogname ), '<strong>' . esc_html( $user_login ) . '</strong>' ); ?></p>
  <?php else: ?>
    <p><?php printf( __( 'Thanks for creating an account on %1$s. Your username is %2$s', 'woocommerce' ), esc_html( $blogname ), '<strong>' . esc_html( $user_login ) . '</strong>' ); ?></p>
  <?php endif; ?>

<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>

  <?php if ( get_bloginfo('language') =='de-DE' ) : ?>
    <p><?php printf( __( 'Ihr Password wurde automatisch generiert: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?></p>
  <?php else: ?>
    <p><?php printf( __( 'Your password has been automatically generated: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?></p>
  <?php endif; ?>

<?php endif; ?>

<?php if ( get_bloginfo('language') =='de-DE' ) : ?>
	<p><?php printf( __( 'Auf Ihrem Konto k&ouml;nnen Sie Ihre Bestellungen sehen und Ihr Passwort &auml;ndern: %s.', 'woocommerce' ), make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) ); ?></p>
<?php else: ?>
	<p><?php printf( __( 'You can access your account area to view your orders and change your password here: %s.', 'woocommerce' ), make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) ); ?></p>
<?php endif; ?>

<?php do_action( 'woocommerce_email_footer', $email );
