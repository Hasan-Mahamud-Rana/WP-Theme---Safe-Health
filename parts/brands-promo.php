<?php
echo '<div class="row">';
  echo '<div class="small-12 columns">';
  $safeHealth   = get_field( "safe_health" );
  if( $safeHealth ) {  
    echo '<p class="section-title text-center"><b></b><span class="section-title-main">' . $safeHealth . '</span><b></b></p>';
  }
  echo '</div>';
echo '</div>';
echo '<div class="row" data-equalizer data-equalize-on="medium">';
  $args = array(
  'order' => 'desc',
  'post_type' => 'brand',
  'category_name' => 'brands-promo',
  'post_status' => 'publish'
  );
  $query = new WP_Query($args);
  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
  echo '<div class="small-12 medium-4 large-4 columns">';
    edit_post_link('[rediger]', '<em class="edit-link">', '</em>');
    echo '<div class="brands-promo" style="background-image: url(' . wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) . ')"><h5>'. get_the_title() . '</h5></div>';
    the_content();
  echo '</div>';
  endwhile;  wp_reset_postdata(); else :
  _e( 'Sorry, no posts matched your criteria.' );
  endif;
echo '</div>';
?>