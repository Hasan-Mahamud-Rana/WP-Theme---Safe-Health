<?php

add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

function dkk_currency_symbol($currency_symbol, $currency) {
	if($currency == 'DKK') {
		$currency_symbol = 'Kr.';
	}
	return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'dkk_currency_symbol', 10, 2);

function new_loop_shop_per_page( $itemNumberinLoop ) {
  $itemNumberinLoop = 12;
  return $itemNumberinLoop;
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

#add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $product ) {

    // Change In Stock Text
    if ( $product->is_in_stock() ) {
        $availability['availability'] = __('Available!', 'woocommerce');
    }
    // Change Out of Stock Text
    if ( ! $product->is_in_stock() ) {
        $availability['availability'] = __('Sold Out', 'woocommerce');
    }
    return $availability;
}

function custom_variable_price( $price, $product ) {
  $current_user = wp_get_current_user();
  $current_user_role = $current_user->roles[0];  
	// Main Price
	if( strcmp($current_user_role, "danmark_forhandler") == 0
		|| strcmp($current_user_role, "danmark_helsekost") == 0
		|| strcmp($current_user_role, "sverige_forhandler") == 0
		|| strcmp($current_user_role, "norge_forhandler") == 0) {
		$variable_user_specific_price = $current_user_role . "_price";
		#get_post_meta($product->get_id(), $variable_user_specific_price, true); 
	} else {
	$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	}
  $price = $prices[0] !== $prices[1] ? sprintf( __( 'Pris fra: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
  // Sale Price
  $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
  sort( $prices );
  $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'Pris fra: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
		
		if(strcmp($current_user_role, "danmark_forhandler") == 0
				|| strcmp($current_user_role, "danmark_helsekost") == 0) {
			$userSpecificPrice = (float)get_post_meta($product->get_id(), $variable_user_specific_price, true);
			$userSpecificPrice = (float)($userSpecificPrice / 1.25);
			$userSpecificPrice = number_format($userSpecificPrice, 2);
		  $price = 'Pris fra: ' . $userSpecificPrice . ' Kr.';
		} elseif(strcmp($current_user_role, "sverige_forhandler") == 0
				|| strcmp($current_user_role, "norge_forhandler") == 0) {
			$userSpecificPrice = (float)get_post_meta($product->get_id(), $variable_user_specific_price, true);
			$userSpecificPrice = number_format($userSpecificPrice, 2);
		  $price = 'Pris fra: ' . $userSpecificPrice . ' Kr.';
		}	else {
		  $price = '' . $saleprice . '';
		}
  return $price;
}
add_filter( 'woocommerce_variable_sale_price_html', 'custom_variable_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'custom_variable_price', 10, 2 );


/**
 * Create new fields for variations
 *
*/
function variation_settings_fields( $loop, $variation_data, $variation ) {
	// Danmark forhandler price
	woocommerce_wp_text_input(
		array(
			'id'          => '_danmark_forhandler_price[' . $variation->ID . ']',
			'label'       => __( 'Dansk Forhandler pris', 'woocommerce' ),
			'desc_tip'    => 'true',
			'description' => __( 'Inkl. 25% moms', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_danmark_forhandler_price', true ),
			'custom_attributes' => array(
							'step' 	=> 'any',
							'min'	=> '0'
						)
		)
	);
	// Sverige forhandler price
	woocommerce_wp_text_input(
		array(
			'id'          => '_sverige_forhandler_price[' . $variation->ID . ']',
			'label'       => __( 'Svensk forhandler pris', 'woocommerce' ),
			'desc_tip'    => 'true',
			'description' => __( 'Eksl. 25% moms', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_sverige_forhandler_price', true ),
			'custom_attributes' => array(
							'step' 	=> 'any',
							'min'	=> '0'
						)
		)
	);
	// Norge forhandler price
	woocommerce_wp_text_input(
		array(
			'id'          => '_norge_forhandler_price[' . $variation->ID . ']',
			'label'       => __( 'Norsk forhandler pris', 'woocommerce' ),
			'desc_tip'    => 'true',
			'description' => __( 'Eksl. 25% moms', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_norge_forhandler_price', true ),
			'custom_attributes' => array(
							'step' 	=> 'any',
							'min'	=> '0'
						)
		)
	);
	// Danmark helsekost price
	woocommerce_wp_text_input(
		array(
			'id'          => '_danmark_helsekost_price[' . $variation->ID . ']',
			'label'       => __( 'Dansk Helsekost pris', 'woocommerce' ),
			'desc_tip'    => 'true',
			'description' => __( 'Inkl. 25% moms', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_danmark_helsekost_price', true ),
			'custom_attributes' => array(
							'step' 	=> 'any',
							'min'	=> '0'
						)
		)
	);
}
/**
 * Save new fields for variations
 *
*/
function save_variation_settings_fields( $post_id ) {
	// Danmark forhandler price
	$danmark_forhandler_price = $_POST['_danmark_forhandler_price'][ $post_id ];
	if( ! empty( $danmark_forhandler_price ) ) {
		update_post_meta( $post_id, '_danmark_forhandler_price', esc_attr( $danmark_forhandler_price ) );
	}
	// Sverige forhandler price
	$sverige_forhandler_price = $_POST['_sverige_forhandler_price'][ $post_id ];
	if( ! empty( $sverige_forhandler_price ) ) {
		update_post_meta( $post_id, '_sverige_forhandler_price', esc_attr( $sverige_forhandler_price ) );
	}
	// Norge forhandler price
	$norge_forhandler_price = $_POST['_norge_forhandler_price'][ $post_id ];
	if( ! empty( $norge_forhandler_price ) ) {
		update_post_meta( $post_id, '_norge_forhandler_price', esc_attr( $norge_forhandler_price ) );
	}
	// Danmark helsekost price
	$danmark_helsekost_price = $_POST['_danmark_helsekost_price'][ $post_id ];
	if( ! empty( $danmark_helsekost_price ) ) {
		update_post_meta( $post_id, '_danmark_helsekost_price', esc_attr( $danmark_helsekost_price ) );
	}
}
// Add Variation Settings
add_action( 'woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3 );

// Save Variation Settings
add_action( 'woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2 );

/**
* Add Cart icon and count to header if WC is active
*/
function my_wc_cart_count() {
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		$count = WC()->cart->cart_contents_count;
		$total = WC()->cart->get_cart_subtotal();
		echo '<a class="cart-contents count_' . $count . '" href="' . WC()->cart->get_cart_url() . '" title="Se din indkøbskurv">';
		if ( $count > 0 ) {
			if ($count > 99) {
			$count = "99+";
		} else {
			$count = $count;
		}
			echo '<span class="cart-contents-count">'. $count . '</span>' ;
		}
			echo '<span class="cart-total">'. $total . '</span>' ;
	echo '</a>';
	}
}
add_action( 'your_theme_header_top', 'my_wc_cart_count' );
/**
* Ensure cart contents update when products are added to the cart via AJAX
*/
function my_header_add_to_cart_fragment( $fragments ) {
ob_start();
	$count = WC()->cart->cart_contents_count;
	$total = WC()->cart->get_cart_subtotal();

	echo '<a class="cart-contents count_' . $count . '" href="' . WC()->cart->get_cart_url() . '" title="Se din indkøbskurv">';
	if ( $count > 0 ) {
		if ($count > 99) {
			$count = "99+";
		} else {
			$count = $count;
		}
			echo '<span class="cart-contents-count">'. $count . '</span>' ;
		}
			echo '<span class="cart-total">'. $total . '</span>' ;
	echo '</a>';
$fragments['a.cart-contents'] = ob_get_clean();
return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

// define the woocommerce_order_amount_total callback
function amount_total( $order_total ) {
	$current_user = wp_get_current_user();
	$current_user_role = $current_user->roles[0];
		if( strcmp($current_user_role, "danmark_forhandler") == 0
			|| strcmp($current_user_role, "sverige_forhandler") == 0
			|| strcmp($current_user_role, "norge_forhandler") == 0
			|| strcmp($current_user_role, "danmark_helsekost") == 0 ) {
			$order_total .= __( '', 'safehealth' );
		} else {
			$order_total .= __( '(inkl 25% moms)', 'safehealth' );
		}

	return $order_total;
};
#add_filter( 'woocommerce_cart_totals_order_total_html', 'amount_total' );

add_filter( 'woocommerce_package_rates' , 'sort_shipping_services_by_cost', 10, 2 );
function sort_shipping_services_by_cost( $rates, $package ) {
	if ( ! $rates )  return;

	$rate_cost = array();
	foreach( $rates as $rate ) {
		$rate_cost[] = $rate->cost;
	}

	// using rate_cost, sort rates.
	array_multisort( $rate_cost, $rates );
	return $rates;
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


// Remove Cross Sells From Default Position
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

// Add them back UNDER the Cart Table
add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );