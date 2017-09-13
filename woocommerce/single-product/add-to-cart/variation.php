<?php
/**
* Single variation display
*
* This is a javascript-based template for single variations (see https://codex.wordpress.org/Javascript_Reference/wp.template).
* The values will be dynamically replaced after selecting attributes.
*
	* @see 	https://docs.woocommerce.com/document/template-structure/
* @author  WooThemes
* @package WooCommerce/Templates
* @version 2.5.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
	$current_user = wp_get_current_user();
	$current_user_role = $current_user->roles[0];
	if( strcmp($current_user_role, "danmark_forhandler") == 0
		|| strcmp($current_user_role, "sverige_forhandler") == 0
		|| strcmp($current_user_role, "norge_forhandler") == 0) {
		$user_specific_sale_price_label = "Forhandler pris:&nbsp;";
	} elseif (strcmp($current_user_role, "danmark_helsekost") == 0) {
		$user_specific_sale_price_label = "Helsekost pris:&nbsp;";
	} else {
		$user_specific_sale_price_label = "Din pris:&nbsp;";
	}
?>
<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">
			{{{ data.variation.variation_description }}}
	</div>
	<div class="woocommerce-variation-price-label">
	<?php echo '<span class="variation-price-label">' . $user_specific_sale_price_label . '</span>'; ?>
	{{{ data.variation.price_html }}}
	<span class="clear"></span>
</div>
<div class="woocommerce-variation-availability">
	{{{ data.variation.availability_html }}}
</div>
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
<p><?php _e( 'Beklager, dette produkt er ikke tilgængeligt. Vælg venligst en anden kombination.', 'woocommerce' ); ?></p>
</script>