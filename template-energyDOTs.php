<?php
/*
Template Name: energyDOTs Page
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
		endwhile; endif;?>
		</main>
	</div>
</div>
<?php get_footer(); ?>