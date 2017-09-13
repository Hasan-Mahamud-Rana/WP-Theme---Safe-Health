<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
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
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
#var_dump($product);
$productType = $product->product_type;
#var_dump($productType);
$current_user = wp_get_current_user();
$current_user_role = $current_user->roles[0];
	if( strcmp($productType, "simple") == 0
			&& ( strcmp($current_user_role, "danmark_forhandler") == 0
			|| strcmp($current_user_role, "sverige_forhandler") == 0
			|| strcmp($current_user_role, "norge_forhandler") == 0)) {
		$user_specific_sale_price_label = "Forhandler pris:&nbsp;";
	} elseif (strcmp($current_user_role, "danmark_helsekost") == 0) {
		$user_specific_sale_price_label = "Helsekost pris:&nbsp;";
	} else {
		$user_specific_sale_price_label = "Din pris:&nbsp;";
	}
	if( strcmp($productType, "simple") == 0
			&& ( strcmp($current_user_role, "danmark_forhandler") == 0
			|| strcmp($current_user_role, "sverige_forhandler") == 0
			|| strcmp($current_user_role, "norge_forhandler") == 0
			|| strcmp($current_user_role, "danmark_helsekost") == 0)) {
		$regular_price = $product->regular_price;
		$regular_price = number_format($regular_price, 2);
		$sale_price = $product->sale_price;
		if(!$sale_price){
			echo '<p class="trickyprice"><span class="tricky-price-label"> Normal pris:&nbsp;' . $regular_price . ' Kr.</span></p>';
		}
	}

if ( $price_html = $product->get_price_html() ) :
echo '<p class="price">';
	$sale_price = $product->sale_price;
	//echo $sale_price;
	if(!$sale_price && strcmp($productType, "variable") !== 0 ) {
		echo '<span class="simple-price-label">' . $user_specific_sale_price_label . '</span>';
	}
	echo $price_html;
	echo '<span class="clear"></span>';
echo '</p>';
endif;