<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<div id="content">
	<div id="inner-content" class="row">
		<main id="main" class="large-12 medium-12 columns" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div style="height:400px;background-repeat: no-repeat; background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>)">
		</div>
		</main>
		<div class="large-12">&nbsp;</div>
		<div class="large-9 medium-8 small-12 columns">
			<?php
						if(get_field('contact_form'))	{
				echo do_shortcode( get_field('contact_form') );
			}
			?>
		</div>
		<div class="large-3 medium-4 small-12 columns">
			<?php
			edit_post_link('[rediger]', '<em class="edit-link">', '</em>');
			the_content();
			endwhile; endif;
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>