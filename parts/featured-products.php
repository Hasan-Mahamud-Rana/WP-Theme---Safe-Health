<?php
echo '<div class="row">';
	echo '<div class="small-12 columns">';
	$ppHeadlineStyle = get_field( "pp_headline_style" );
	if ($ppHeadlineStyle) {
    $ppHeadlineStyle = $ppHeadlineStyle;
  } else {
    $ppHeadlineStyle = "p";
  }
	$ppHeadlineSize	= get_field( "pp_headline_size" );
	if ($ppHeadlineSize) {
    $ppHeadlineSize = $ppHeadlineSize;
  } else {
    $ppHeadlineSize = "15";
  }
	$ppheadlineColor = get_field( "pp_headline_color" );
	if ($ppheadlineColor) {
    $ppheadlineColor = $ppheadlineColor;
  } else {
    $ppheadlineColor = "#000";
  }
	$ppStyle = ' style="font-size:'.$ppHeadlineSize.'px; color:'.$ppheadlineColor.'"';
	$professionalProducts	 = get_field( "professional_products" );
	if( $professionalProducts ) {  
		echo '<'. $ppHeadlineStyle . $ppStyle .' class="section-title text-center"><b></b><span class="section-title-main">' . $professionalProducts . '</span><b></b></'. $ppHeadlineStyle .'>';
	}
	echo '</div>';
echo '</div>';
echo '<div class="row">';
	echo '<div class="small-up-1 medium-up-3 large-up-4" data-equalizer data-equalize-on="medium" id="homeProductGrid" style="display: none;">';
		$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		'orderby' => 'rand',
		'tax_query' => array(
			array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'featured',
			),
		),
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		global $product;
		$post_class = implode(" ", get_post_class( ));
		echo '<div class="gridItem column column-block text-center ' . $post_class . '">';
			echo '<div data-equalizer-watch>';
				edit_post_link('[rediger]', '<em class="edit-link">', '</em>');
				$productLink = get_permalink( $loop->post->ID );
				$productTitle = esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID);
				$productImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				echo '<a class="product-image crossFade" href="' . $productLink .'" title="' . $productTitle . '" style="background-image: url(' . $productImage . ')">';
					woocommerce_show_product_sale_flash( $post, $product );
					#woocommerce_get_availability( $post, $product );
					echo '<div style="background-image: url(' . wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) .' )"></div>';
					$attachment_ids = $product->get_gallery_attachment_ids();
					foreach( $attachment_ids as $attachment_id ) {
						$image_link = wp_get_attachment_url( $attachment_id );
						echo '<div style="background-image: url(' . $image_link .' )"></div>';
					}
				echo '</a>';
				echo '<a href="' . $productLink .'" title="' . $productTitle . '">';
					the_title('<h2 class="woocommerce-loop-product__title">', '</h2>');
				echo '</a>';
				echo '<div class="front-grid-price">';
					get_template_part( 'parts/content', 'price' );
				echo '</div>';
			echo '</div>';
			woocommerce_template_loop_add_to_cart( $loop->post, $product );
		echo '</div>';
		endwhile;
		wp_reset_query();
	echo '</div>';
echo '</div>';
?>