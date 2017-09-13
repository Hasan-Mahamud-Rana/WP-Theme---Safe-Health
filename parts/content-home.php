<?php
echo '<article id="post-' . get_the_ID() . '" role="article">';
echo '<header class="article-header text-center">';
echo '<h1><a href="' . get_the_permalink() . '" rel="bookmark" title="' . get_the_title() . '"> ' . get_the_title() . '</a></h1>';
echo '</header></article>';