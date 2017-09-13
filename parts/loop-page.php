<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
	<header class="article-header">
		<?php edit_post_link('[rediger]', '<em class="edit-link">', '</em>'); ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header>
	<section class="entry-content" itemprop="articleBody">
		<?php
		the_content();
		wp_link_pages();
		?>
	</section>
</article>