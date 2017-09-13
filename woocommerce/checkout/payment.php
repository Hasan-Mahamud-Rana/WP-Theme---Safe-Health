<?php
/**
* Checkout Payment Section
*
* This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
*
* HOWEVER, on occasion WooCommerce will need to update template files and you
* (the theme developer) will need to copy the new files to your theme to
* maintain compatibility. We try to do this as little as possible, but it does
* happen. When this occurs the version of the template file will be bumped and
* the readme will list any important changes.
*
	* @see 	    https://docs.woocommerce.com/document/template-structure/
		* @author 		WooThemes
	* @package 	WooCommerce/Templates
* @version     2.5.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>
<div id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>
	<ul class="wc_payment_methods payment_methods methods">
		<?php
			if ( ! empty( $available_gateways ) ) {
				foreach ( $available_gateways as $gateway ) {
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
				}
			} else {
				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? __( 'Beklager, det ser ud til, at der ikke findes tilgængelige betalingsmetoder til din stat. Kontakt os venligst, hvis du har brug for hjælp eller ønsker at lave alternative arrangementer.', 'woocommerce' ) : __( 'Udfyld venligst dine oplysninger ovenfor for at se tilgængelige betalingsmetoder.', 'woocommerce' ) ) . '</li>';
			}
		?>
	</ul>
	<?php endif; ?>
	<div class="form-row place-order">
		<noscript>
		<?php _e( 'Da din browser ikke understøtter JavaScript, eller det er deaktiveret, skal du sørge for at klikke på knappen <em> Opdater totaler </ em>, inden du bestiller. Du kan blive opkrævet mere end ovennævnte beløb, hvis du undlader at gøre det.', 'woocommerce' ); ?>
		<br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Opdater totals', 'woocommerce' ); ?>" />
		</noscript>
		<?php wc_get_template( 'checkout/terms.php' ); ?>
		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>
		<?php echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' ); ?>
		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>
		<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
	</div>
</div>
<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}