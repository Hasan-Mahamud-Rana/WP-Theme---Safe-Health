<?php
/*
Template Name: Home
*/
get_header(); ?>
<div id="content">
	<div id="inner-content" class="row">
		<main id="main" class="small-12 columns" role="main">
		<?php
		get_template_part( 'parts/content', 'slider' );
		if (have_posts()) : while (have_posts()) : the_post();
			get_template_part( 'parts/content', 'home' );
		endwhile;
			joints_page_navi();
		else :
			get_template_part( 'parts/content', 'missing' );
		endif;
		get_template_part( 'parts/bestselling', 'products' );
		get_template_part( 'parts/featured', 'products' );
		get_template_part( 'parts/brands', 'promo' );
		get_template_part( 'parts/our', 'brands' );
		//get_template_part( 'parts/product', 'categories' );
		?>
		</main>
	</div>
</div>
<?php get_footer(); ?>