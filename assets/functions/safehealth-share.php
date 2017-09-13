<?php
function doctype_opengraph($output) {
	return $output . 'xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

function fb_opengraph() {
	global $post;
	$ogLocale = "da_DK";
	echo '<meta property="og:locale" content="' . $ogLocale . '" />';

	if( get_field('keyword') && get_field('meta_keywords')){
		$ogKeyword = get_field('meta_keywords');
		echo '<meta name="keywords" content="' . $ogKeyword . '">';
	} 
	
	$appId = 	"128794224356517";
		echo '<meta property="fb:app_id" content="' . $appId . '"/>';
		echo '<meta property="og:site_name" content="' . get_bloginfo() . '"/>';
		echo '<meta property="og:url" content="' . get_the_permalink() . '"/>';
		if( get_field('custom_video') && get_field('meta_video')){
			echo '<meta property="og:type" content="video.movie"/>';
			echo '<meta name="twitter:card" content="player" />';
		} else {
			echo '<meta property="og:type" content="article"/>';
			echo '<meta name="twitter:card" content="summary" />';
		}

	if( get_field('custom_title') && get_field('meta_title')){
		$ogTitle = get_field('meta_title');
	} else { 
		$ogTitle = get_the_title();
	}	
	echo '<meta property="og:title" content="' . $ogTitle . '"/>';
	echo '<meta name="twitter:title" content="' . $ogTitle . '"/>';

	if( get_field('custom_description') && get_field('meta_description')){
		$ogDescription = get_field('meta_description');
	} elseif($ogDescription = $post->post_excerpt) {
		$ogDescription = strip_tags($post->post_excerpt);
		$ogDescription = str_replace("", "'", $ogDescription);
	} else {
		$ogDescription = get_bloginfo('description');
	}
	echo '<meta name="description" content="' . $ogDescription . '">';	
	echo '<meta property="og:description" content="' . $ogDescription . '"/>';
	echo '<meta name="twitter:description" content="' . $ogDescription . '"/>';

	if( get_field('custom_image') && get_field('meta_image')){
		$ogImage = get_field('meta_image');
	} elseif(	$imageUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID))) {
		$ogImage = $imageUrl;
	} else {
		$ogImage = get_template_directory_uri() . '/assets/functions/default-banner.jpg';
	}
	list($width, $height) = getimagesize($ogImage);
	$imageType = image_type_to_mime_type( exif_imagetype($ogImage));
	
	echo '<meta property="og:image" content="' . $ogImage . '"/>';
	echo '<meta property="og:image:url" content="' . $ogImage . '"/>';
	echo '<meta name="twitter:image" content="' . $ogImage . '"/>';
	echo '<meta property="og:image:secure_url" content="' . $ogImage . '"/>';
	echo '<meta property="og:image:type" content="' . $imageType . '" />';
	echo '<meta property="og:image:width" content="' . $width . '" />';
	echo '<meta property="og:image:height" content="' . $height . '" />';

	if( get_field('custom_video') && get_field('meta_video')){
		$ogVideo = get_field('meta_video');
		echo '<meta property="og:video" content="' .$ogVideo. '"/>';
		echo '<meta name="twitter:player" content="' .$ogVideo. '" />';
		echo '<meta name="twitter:player:stream" content="' .$ogVideo. '" />';
		echo '<meta property="og:video:url" content="' .$ogVideo. '"/>';
		#echo '<meta property="og:video:secure_url" content="' .$ogVideo. '"/>';
		echo '<meta name="video_type" content="video/mp4">';
		echo '<meta name="twitter:player:stream:content_type" content="video/mp4" />';
		echo '<meta name="video_width" content="1920">';
		echo '<meta name="video_height" content="1080">';
		echo '<meta name="twitter:player:width" content="1920" />';
		echo '<meta name="twitter:player:height" content="1080" />';
	} 
}
add_action('wp_head', 'fb_opengraph', 5);
?>