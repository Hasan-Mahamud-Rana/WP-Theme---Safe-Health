<?php
echo '<article id="post-' . get_the_ID() . '" role="article">';
	edit_post_link('[rediger]', '<em class="edit-link">', '</em>');
	echo '<header class="shop-page-header">';
		echo '<h1><a href="' . get_the_permalink() . '" rel="bookmark" title="' . get_the_title() . '"> ' . get_the_title() . '</a></h1>';
	echo '</header>';
echo '</article>';
the_content();
