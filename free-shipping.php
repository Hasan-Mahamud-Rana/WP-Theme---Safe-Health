<?php
/*
Template Name: Free Shipping
*/
 global $woocommerce;
	$items = $woocommerce->cart->get_cart();
	$totalAmount = (float)0;
	foreach($items as $item => $values) {
		$_product =  wc_get_product( $values['data']->get_id());
		$quantity = (float)$values['quantity'];
		$price = (float)get_post_meta($values['product_id'] , '_price', true);
		$amount = (float)$quantity * (float)$price;
		$totalAmount = $totalAmount + $amount;
	}
if ($totalAmount < 199) {
	$freeShippingamount = (float) 199 - $totalAmount;
	$display = 'style="display:block;"';
} else {
	$display = 'style="display:none;"';
}
echo '<div data-closable class="freeShippingNotice callout alert-callout-subtle primary radius" ' . $display . '>';
	echo 'Du mangler at handler for <strong class="freeShipping">' . $freeShippingamount . '</strong> Kr. for at få fri fragt';
	echo '<button class="close-button" aria-label="Dismiss alert" type="button" data-close>';
	echo '<span aria-hidden="true">⊗</span>';
	echo '</button>';
echo '</div>';