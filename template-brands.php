<?php
/*
Template Name: Brands
*/
get_header(); ?>
<div id="content">
	<div id="inner-content" class="row">
		<main id="main" class="small-12 columns" role="main">
		<?php
		if (have_posts()) : while (have_posts()) : the_post();
			get_template_part( 'parts/content', 'brands' );
		endwhile;
			joints_page_navi();
		else :
			get_template_part( 'parts/content', 'missing' );
		endif;
		get_template_part( 'parts/our', 'brands' );
		//get_template_part( 'parts/product', 'categories' );
		?>
		</main>
	</div>
</div>
<?php get_footer(); ?>