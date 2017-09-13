<div class="blog-article">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="row">
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="small-12 medium-12 large-12 columns">
        <?php edit_post_link('[rediger]', '<em class="edit-link">', '</em>'); ?>
        <h2 class="PageHdline"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
      </div>
      <div class="small-12 medium-12 large-12 columns blog-artilce-text">
        <?php the_content(); ?>
      </div>
    </article>
    <?php endwhile;?>
  </div>
</div>
<div class="blog-panel blogs-page">
  <?php $query = new WP_Query( 'order=asc&post_type=testimonial&posts_per_page=10&post_status=publish&paged='. get_query_var('paged')); ?>
  <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
  <div class="row" >
    <div class="small-12 medium-12 large-12 columns" data-equalizer="blog">
      <div class="small-12 medium-4 large-3 columns blog-box" data-equalizer-watch="blog">
        <div class="panel text-left blog-image">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( array(320,242) ); ?></a>
        </div>
      </div>
      <div class="small-12 medium-8 large-9 columns blog-box" data-equalizer-watch="blog">
        <div class="panel text-left blog-text">
          <?php edit_post_link('[rediger]', '<em class="edit-link">', '</em>'); ?>
          <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
          <p class="time"><?php the_time('F j, Y'); ?></p>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Læs mere her</a>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile;?>
  <div class="navigation text-center">
    <?php if (function_exists("pagination"))
    {
    pagination($query->max_num_pages);
    }
    ?>
  </div>
  <?php  wp_reset_postdata(); else : ?>
  <?php _e( 'Beklager, ingen indlæg matchede dine kriterier.' ); ?>
  <?php endif; ?>
</div>