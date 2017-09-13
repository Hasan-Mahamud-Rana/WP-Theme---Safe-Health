<?php
/*
Template Name: Tandpasta Page
*/
?>
<?php get_header(); ?>
<div id="content">
	<div id="inner-content" class="row">
		<main id="main" class="large-12 medium-12 columns" role="main">
		<?php
		get_template_part( 'parts/content', 'slider' );
		if (have_posts()) : while (have_posts()) : the_post();
		get_template_part( 'parts/loop', 'page' );
		endwhile; endif;
		query_posts('category_name=tandpasta&order=asc'); while (have_posts()) : the_post(); ?>
		<div class="small-12 medium-3 large-3 columns">
			<?php
			$image1 = get_field('image_1');
			$image2 = get_field('image_2');
			$image3 = get_field('image_3');
			$image4 = get_field('image_4');
			$image5 = get_field('image_5');
			if(($image1) || ($image2) || ($image3) || ($image4) || ($image5) ):

			echo '<div class="mini-slider tand">';
				if($image1) {
				echo '<div class="large-12 medium-12 columns fpbdslider" style="height:270px; background-image: url(' . $image1 . ')"></div>';
				}
				if($image2) {
				echo '<div class="large-12 medium-12 columns fpbdslider" style="height:270px; background-image: url(' . $image2 . ')"></div>';
				}
				if($image3) {
				echo '<div class="large-12 medium-12 columns fpbdslider" style="height:270px; background-image: url(' . $image3 . ')"></div>';
				}
				if($image4) {
				echo '<div class="large-12 medium-12 columns fpbdslider" style="height:270px; background-image: url(' . $image4 . ')"></div>';
				}
				if($image5) {
				echo '<div class="large-12 medium-12 columns fpbdslider" style="height:270px; background-image: url(' . $image5 . ')"></div>';
				}
			echo '</div>';
		endif;
		?>
		</div>
		<div class="small-12 medium-9 large-9 columns">
			<?php
			edit_post_link('[rediger]', '<em class="edit-link">', '</em>');
			the_title('<h5>', '</h5>');
			the_content();
			$link_to = get_field( "link_to" );
        	if( $link_to ) {
            echo '<a class="" href="' . site_url() . $link_to . '" rel="bookmark">KØB her </a>';
          }
          ?>
		</div>
		<div class="large-12 columns">
			&nbsp;
		</div>
		<?php
		endwhile;
		wp_reset_query(); ?>
		</main>
	</div>
</div>
<?php get_footer(); ?>