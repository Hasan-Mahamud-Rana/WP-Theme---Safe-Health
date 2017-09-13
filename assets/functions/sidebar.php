<?php
// SIDEBARS AND WIDGETIZED AREAS
function joints_register_sidebars() {

	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'jointswp'),
		'description' => __('The offcanvas sidebar.', 'jointswp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'secondaryheader',
		'name' => __('Secondary Header', 'jointswp'),
		'description' => __('Secondary header.', 'jointswp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 style="display: none;">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'logobar',
		'name' => __('Logo Bar', 'jointswp'),
		'description' => __('Secondary header.', 'jointswp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 style="display: none;">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footerwidget1',
		'name' => __('Footer 1', 'jointswp'),
		'description' => __('Footer widget area.', 'jointswp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s small-12 ">',
		'after_widget' => '</div>&nbsp;',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	));
	register_sidebar(array(
		'id' => 'footerwidget2',
		'name' => __('Footer 2', 'jointswp'),
		'description' => __('Footer widget area.', 'jointswp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s small-12">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'footerwidget3',
		'name' => __('Footer 3', 'jointswp'),
		'description' => __('Footer widget area.', 'jointswp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s small-12">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'footerwidget4',
		'name' => __('Footer 4', 'jointswp'),
		'description' => __('Footer widget area.', 'jointswp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s small-12">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'jointswp'),
		'description' => __('The second (secondary) sidebar.', 'jointswp'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!