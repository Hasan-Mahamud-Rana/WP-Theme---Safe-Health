<div class="logo-bar">
  <div class="row">
    <div class="small-12 medium-2 large-2 columns">
      <ul class="menu">
        <li>
          <a class="logo" href="<?php echo home_url(); ?>">
            <?php //bloginfo( 'name'); ?>
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Safe-Health-logo.png" alt="Indsæt alt-tekst her med relevante fokusord" width="0" height="0">
           </a>
        </li>
      </ul>
    </div>
    <div class="small-12 medium-10 large-10 columns">
      <div class="row">
        <div class="small-12 columns">
          <div class="row">
            <div class="small-12 medium-8 large-8 columns">
              <?php 
                if ( is_active_sidebar( 'logobar' ) && is_front_page()) :
                  dynamic_sidebar( 'logobar' );
                endif; 
              ?> &nbsp;
            </div>
            <div class="small-12 medium-4 large-4 columns">
              <form role="search" method="get" class="logobar search-form woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                <div class="input-group">
                  <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Søg produkter&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Søg for:', 'label', 'woocommerce' ); ?>" style="margin: 0;" />
                  <div class="input-group-button">
                    <input type="submit" class="button" value="<?php echo esc_attr_x( 'Søg', 'submit button', 'woocommerce' ) ?>">
                    <input type="hidden" name="post_type" value="product" />
                  </div>
                </div>
              </form>
            </div>
            <div>
              <div class="small-12 columns">
                <ul class="usermenu dropdown menu" data-dropdown-menu>
                  <li>
                    <?php
if ( is_user_logged_in() ) {
	global $current_user;
	get_currentuserinfo();
	echo '<a href="' . site_url() . '/min-konto/">' . $current_user->display_name . '</a>';
	echo '<ul class="menu">
	<li><a href="' . site_url() . '/min-konto/orders">Ordre</a></li>
	<li><a href="' . site_url() . '/min-konto/redigere-adresse/">Adresser</a></li>
	<li><a href="' . site_url() . '/min-konto/redigere-konto/">Konto detaljer</a></li>
	<li><a href="' . site_url() . '/min-konto/kunde-logud/">Log ud</a></li>
	</ul>';
} else {
	echo '<a href="' . site_url() . '/min-konto/">Log ind</a>';
}
                    ?>
                  </li>
                  <li class="header-divider"></li>
                  <li>
<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	$count= WC()->cart->cart_contents_count; $total = WC()->cart->get_cart_subtotal(); echo '<a class="cart-contents count_' . $count . '" href="' . WC()->cart->get_cart_url() . '" title="Se din indkøbskurv">';
	if ($count > 0) {
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
?>
                  </li>
                  <li class="kurv">
                    <a href="#">Kurv</a>
                    <ul class="menu">
                      <?php echo '<li>' . the_widget( 'WC_Widget_Cart' ) . '</li>'; ?>
                    </ul>
                  </li>
                </ul>
                <span class="clear"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>