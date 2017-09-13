<?php
// Adding WP Functions & Theme Support
function joints_theme_support() {
	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );
	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);
	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	// Add HTML5 Support
	add_theme_support( 'html5',
		array(
			'comment-list',
			'comment-form',
			'search-form',
		)
	);
	// Adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);
	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );
}
add_action( 'after_setup_theme', 'joints_theme_support' );
// numbered pagination
function pagination($pages = '', $range = 1) {
	$showitems = ($range * 2)+1;
	global $paged;

	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
	echo "<div class=\"pagination\">";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&laquo; Forrige</a>";

		for ($i=1; $i <= $pages; $i++) 	{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) 	{
			echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Næste &raquo;</a>";
		echo "</div>\n";
	}
}