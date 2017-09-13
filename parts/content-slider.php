<?php
echo '<div class="row showcase">';
  echo '<div class="small-12 columns">';
    echo '<div class="home-slider">';
      $args = array(
      'order' => 'asc',
      'post_type' => 'slider',
      'category_name' => 'hjem-slider',
      'post_status' => 'publish'
      );
      if ( is_page( 887 ) ) {
      $args = array(
      'order' => 'asc',
      'post_type' => 'slider',
      'category_name' => 'tandpasta-slider',
      'post_status' => 'publish'
      );}
      if ( is_page( 167 ) ) {
      $args = array(
      'order' => 'asc',
      'post_type' => 'slider',
      'category_name' => 'energydots-slider',
      'post_status' => 'publish'
      );}
      if ( is_page( 1945 ) ) {
      $args = array(
      'order' => 'asc',
      'post_type' => 'slider',
      'category_name' => 'smartdot-slider',
      'post_status' => 'publish'
      );}
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
      $imageUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
      echo '<div class="large-12 medium-12 columns fpbdslider" style="height:490px;background-size: contain;background-repeat: no-repeat; background-image: url(' . $imageUrl . ')">';
        edit_post_link('[rediger]', '<em class="edit-link">', '</em>');
        $link_to = get_field( "link_to" );
        if( $link_to ) {
        echo '<a class="sSlideLink" href="' . site_url() . $link_to . '" rel="bookmark"></a>';
        }
      echo '</div>';
      endwhile;  wp_reset_postdata(); else :
      _e( 'Sorry, no posts matched your criteria.' );
      endif;
    echo '</div>';
  echo '</div>';
echo '</div>';
?>