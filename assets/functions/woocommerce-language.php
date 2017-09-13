<?php

function custom_select_options_text() {
  global $product;
  $product_type = $product->product_type;
  switch ( $product_type ) {
	  case 'subscription':
	  	return __( 'Vælg variant', 'woocommerce' );
	  case 'variable-subscription':
	  	return __( 'Vælg variant', 'woocommerce' );
	  case 'variable':
	  	return __( 'Vælg variant', 'woocommerce' );
	  case 'simple':
	  	return __( 'Tilføj til kurv', 'woocommerce' );
	  break;
  }
}
add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_select_options_text' );

function cartUpdatedMessage($translation, $text, $domain) {
	if ($domain == 'woocommerce') {
		if ($text == 'Cart updated.') {
			$translation = 'Indkøbskurv opdateret.';
		}
		if ($text == 'View cart') {
			$translation = 'Se indkøbsvogn';
		}
		if ($text == 'Add to cart') {
			$translation = 'Tilføj til kurv';
		}
		if ($text == 'has been added to your cart.') {
			$translation = 'er blevet tilføjet til din indkøbsvogn.';
		}
}
return $translation;
}
add_filter('gettext', 'cartUpdatedMessage', 10, 3);


function theme_sort_change( $translated_text, $text, $domain ) {
if ( is_woocommerce() ) {
	switch ( $translated_text ) {
		case 'Default sorting' :
			$translated_text = __( 'Standard sortering', 'theme_text_domain' );
		break;
		case 'Sort by popularity' :
			$translated_text = __( 'Sorter efter popularitet', 'theme_text_domain' );
		break;
		case 'Sort by average rating' :
			$translated_text = __( 'Sorter efter gennemsnitlig bedømmelse', 'theme_text_domain' );
		break;
		case 'Sort by newness' :
			$translated_text = __( 'Sorter efter nyhed', 'theme_text_domain' );
		break;
		case 'Sort by price: low to high' :
			$translated_text = __( 'Sorter efter pris: lav til høj', 'theme_text_domain' );
		break;
		case 'Sort by price: high to low' :
			$translated_text = __( 'Sorter efter pris: høj til lav', 'theme_text_domain' );
		break;
	}
}
return $translated_text;
}

add_filter( 'gettext', 'theme_sort_change', 20, 3 );


function woo_custom_order_button_text() {
	return __( 'Angiv bestilling', 'woocommerce' );
}
add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' );

add_filter('woocommerce_sale_flash', 'woocommerce_custom_sale_text', 10, 3);
function woocommerce_custom_sale_text($text, $post, $_product)
{
    return '<span class="onsale">Tilbud</span>';
}

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	$fields['billing']['billing_first_name']['placeholder'] = 'fornavn';
	$fields['billing']['billing_first_name']['label'] = 'Fornavn';

	$fields['billing']['billing_last_name']['placeholder'] = 'efternavn';
	$fields['billing']['billing_last_name']['label'] = 'Efternavn';

	$fields['billing']['billing_company']['placeholder'] = 'firmanavn';
	$fields['billing']['billing_company']['label'] = 'Firmanavn';

	$fields['billing']['billing_country']['label'] = 'Adresse';

	$fields['billing']['billing_address_1']['label'] = 'Adresse';
	$fields['billing']['billing_address_1']['placeholder'] = 'vejnavn';
	$fields['billing']['billing_address_2']['placeholder'] = 'lejlighed, suite, enhed osv. (Valgfrit)';

	$fields['billing']['billing_postcode']['placeholder'] = 'postnummer';
	$fields['billing']['billing_postcode']['label'] = 'Postnummer';

	$fields['billing']['billing_city']['placeholder'] = 'by';
	$fields['billing']['billing_city']['label'] = 'By';

	$fields['billing']['billing_email']['placeholder'] = 'email adresse';
	$fields['billing']['billing_email']['label'] = 'Email adresse';

	$fields['billing']['billing_phone']['placeholder'] = 'telefon';
	$fields['billing']['billing_phone']['label'] = 'Telefon';

	$fields['order']['order_comments']['placeholder'] = 'Noter om din ordre, f.eks. Særlige noter til levering.';
	$fields['order']['order_comments']['label'] = 'Ordreanvisninger';
	return $fields;
}
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

