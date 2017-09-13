<?php

function change_flat_rates_cost( $rates, $package ) {
	$current_user = wp_get_current_user();
	$current_user_role = $current_user->roles[0];
		if( strcmp($current_user_role, "danmark_forhandler") == 0
		|| strcmp($current_user_role, "danmark_helsekost") == 0) {
			$userSpecificShippingCost = 50;
		} elseif ( strcmp($current_user_role, "sverige_forhandler") == 0) {
			$userSpecificShippingCost = 100;
		} elseif ( strcmp($current_user_role, "norge_forhandler") == 0) {
			$userSpecificShippingCost = 170;
		} else {
			$userSpecificShippingCost = 70;
		}
		
		if ( isset( $rates['flat_rate:4'] ) ) {
			$rates['flat_rate:4']->cost = $userSpecificShippingCost;
		}
	return $rates;
}
add_filter( 'woocommerce_package_rates', 'change_flat_rates_cost', 10, 2 );

add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );
 
function wc_minimum_order_amount() {
  	$current_user = wp_get_current_user();
	$current_user_role = $current_user->roles[0];
		if( strcmp($current_user_role, "danmark_forhandler") == 0
		|| strcmp($current_user_role, "danmark_helsekost") == 0) {
			$minimum = 500;
		} elseif ( strcmp($current_user_role, "sverige_forhandler") == 0) {
			$minimum = 500;
		} elseif ( strcmp($current_user_role, "norge_forhandler") == 0) {
			$minimum = 500;
		} else {
			$minimum = 0;
		}

	if ( WC()->cart->total < $minimum ) {
		if( is_cart() ) {
				wc_print_notice(
				sprintf( 'Min. ordre %s , din nåværende ordre total er %s.' ,
				wc_price( $minimum ),
				wc_price( WC()->cart->total )
				), 'error'
			);
		} else {
				wc_add_notice(
				sprintf( 'Min. ordre %s , din nåværende ordre total er %s.' ,
				wc_price( $minimum ),
				wc_price( WC()->cart->total )
				), 'error'
			);
		}
	}
}


function free_shipping_cart_notice_zones_static() {
	$current_user = wp_get_current_user();
	$current_user_role = $current_user->roles[0];
		if( strcmp($current_user_role, "danmark_forhandler") == 0
		|| strcmp($current_user_role, "danmark_helsekost") == 0) {
			$userSpecificShippingCost = 50;
			$min_amount = 1200;
			$free = "fri ";
		} elseif ( strcmp($current_user_role, "sverige_forhandler") == 0) {
			$userSpecificShippingCost = 100;
			$min_amount = 2000;
			$free = "fri ";
		} elseif ( strcmp($current_user_role, "norge_forhandler") == 0) {
			$userSpecificShippingCost = 170;
			$min_amount = 3000;
			$eText = " 100kr.";
			$discount = "rabat ";
		} else {
			$userSpecificShippingCost = 70;
			$min_amount = 200;
			$free = "fri ";
		}
		

	$current = WC()->cart->subtotal;
	if ( $current < $min_amount ) {		
		$added_text = esc_html__('Fragt kr. '. $userSpecificShippingCost .', '. $free .' fragt'. $eText  .' over kr. '. $min_amount .'. Du mangler at handler for ', 'woocommerce' ) . wc_price( $min_amount - $current) . esc_html__(' for at få '. $free . $discount .'fragt', 'woocommerce' );
		
		$return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
		$notice = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), esc_html__( 'Fortsætte med at handle', 'woocommerce' ), $added_text );
		wc_print_notice( $notice, 'notice' );
	}
}
add_action( 'woocommerce_before_cart', 'free_shipping_cart_notice_zones_static' );