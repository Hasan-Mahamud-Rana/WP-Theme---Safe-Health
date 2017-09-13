<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );

		$current_user = wp_get_current_user();
		$current_user_role = $current_user->roles[0];
		if( strcmp($current_user_role, "danmark_forhandler") == 0
			|| strcmp($current_user_role, "danmark_helsekost") == 0
			|| strcmp($current_user_role, "sverige_forhandler") == 0
			|| strcmp($current_user_role, "norge_forhandler") == 0 ) {

echo "<h4>Vilkår:</h4>
			<p><u>Danmark</u></p>
			<p>Min. ordre kr. 500 <br/>Fragt kr. 50, fri fragt over kr. 1200 </p>
			<p><u>Sverige</u></p>
			<p>Min. ordre kr. 500 <br/>Fragt kr. 100, fri fragt over kr. 2000</p>
			<p><u>Norge</u></p>
			<p>Min. ordre kr. 500 <br/>Fragt kr. 170. Fragt 100kr. over kr. 3000.</p>";
		}
	?>


</div>
