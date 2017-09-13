<!-- content goes here Slide-->
<div class="wrapper-width">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="row">
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="small-12 columns">
        <div class="wrapper-width-banner " style="height:300px; background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>); background-repeat: no-repeat; background-size: contain; background-position: center center;"></div>
        <?php edit_post_link('[rediger]', '<em class="edit-link">', '</em>'); ?>
        <h2 class="PageHdline"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
      </div>
      <div class="small-12 columns full-width-text">
        <?php the_content(); ?>
      </div>
    </article>
    <?php endwhile;?>
  </div>
</div>