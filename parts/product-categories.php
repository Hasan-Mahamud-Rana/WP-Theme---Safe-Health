<div class="row">
<div class="small-12 columns">
  <h3 class="section-title text-center"><b></b><span class="section-title-main">Se vores kategorier</span><b></b></h3>
</div>
</div>
<div class="row" data-equalizer data-equalize-on="medium" id="productCategoryGrid" style="display: none;">
<?php
  $taxonomy     = 'product_cat';
  $orderby      = 'name';
  $show_count   = 1;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no
  $title        = '';
  $empty        = 0;
  $thumbnail = 1;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty,
         'thumbnail_id'   => $thumbnail
);
 $all_categories = get_categories( $args );
//var_dump($all_categories);
 foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {

        $category_id = $cat->term_id;
        $showCount = $cat->category_count;
        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        if ($showCount) {
          if ($showCount == 1) {
            $Products = "produkt";
          } else {
            $Products = "Produkter";
          }

        echo '<div class="categoryGridItem small-12 columns text-center">';
        echo '<div style="height:320px; width:100%; background-image: url(' . $image . ')">';
        echo '<div class="box-text" data-equalizer-watch><a class="categoryWrapper" href="'. get_term_link($cat->slug, 'product_cat') .'" ><span class="categoryName">'. $cat->name . '</span><span class="totalProduct">' . $showCount . ' ' . $Products . '</span></a></div>';
        echo '</div></div>';
        }

        $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
            foreach($sub_cats as $sub_category) {
                echo  $sub_category->name ;
            }
        }
    }
}
?>
  </div>
</div>