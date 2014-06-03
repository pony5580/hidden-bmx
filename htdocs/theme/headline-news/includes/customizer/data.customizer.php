<?php
$customizer_colors = array(
	'#ea6153',
	'#e1443f',
	'#ff963a',
	'#ebc85e',
	'#88c462',
	'#1db79b',
	'#4490c1',
	'#3dbfd9',
	'#9457b6',
);

$customizer_data = array(
	'general' => array(
		'title'  => __('General', 'g7theme'),
		'fields' => array(
			'boxed' => array(
				'type'    => 'checkbox',
				'label'   => __('Enable boxed layout', ' g7theme'),
				'default' => 0,
			),
			'layout' => array(
				'type'    => 'select',
				'label'   => __('Default sidebar alignment', ' g7theme'),
				'default' => '4',
				'choices' => array(
					'1' => __('Right sidebar', 'g7theme'),
					'2' => __('Left sidebar', 'g7theme'),
					'3' => __('Full width (no sidebar)', 'g7theme'),
					'4' => __('Dual sidebar', 'g7theme'),
				),
			),
			'retina' => array(
				'type'    => 'checkbox',
				'label'   => __('Enable retina display support', ' g7theme'),
				'default' => 1,
			),
			'main_logo' => array(
				'type'  => 'image',
				'label' => __('Main logo', ' g7theme'),
			),
			'logo_height' => array(
				'type'    => 'text',
				'label'   => __('Main logo height (in pixels)', ' g7theme'),
				'default' => 80,
			),
			'login_logo' => array(
				'type'  => 'image',
				'label' => __('Login logo', ' g7theme'),
			),
			'favicon' => array(
				'type'  => 'image',
				'label' => __('Favicon', ' g7theme'),
			),
			'gallery_pp' => array(
				'type'    => 'checkbox',
				'label'   => __('Enable prettyPhoto for gallery', 'g7theme'),
				'default' => 0,
			),
		),
	),
	'ticker' => array(
		'title'  => __('News Ticker', 'g7theme'),
		'fields' => array(
			'ticker_show' => array(
				'type'    => 'checkbox',
				'label'   => __('Enable news ticker', 'g7theme'),
				'default' => 1,
			),
			'ticker_title' => array(
				'type'    => 'text',
				'label'   => __('Title', 'g7theme'),
				'default' => __('Breaking News', 'g7theme'),
			),
			'ticker_tags' => array(
				'type'    => 'text',
				'label'   => __('Tag(s)', 'g7theme'),
				'default' => 'ticker',
			),
			'ticker_limit' => array(
				'type'    => 'text',
				'label'   => __('Number of items displayed', 'g7theme'),
				'default' => 5,
				'size'    => 5,
			),
		),
	),
	'header' => array(
		'title'  => __('Header', 'g7theme'),
		'fields' => array(
			'header_date' => array(
				'type'    => 'text',
				'label'   => __('Header date format', 'g7theme'),
				'default' => 'd F Y',
			),
			'header_time' => array(
				'type'    => 'text',
				'label'   => __('Header time format', 'g7theme'),
				'default' => 'h:i a',
			),
			'header_search' => array(
				'type'    => 'checkbox',
				'label'   => __('Show header search form', 'g7theme'),
				'default' => 1,
			),
			'top_menu' => array(
				'type'    => 'checkbox',
				'label'   => __('Show top menu', 'g7theme'),
				'default' => 1,
			),
			'sticky' => array(
				'type'    => 'checkbox',
				'label'   => __('Enable sticky menu', ' g7theme'),
				'default' => 0,
			),
		),
	),
	'featured' => array(
		'title'  => __('Featured Posts', 'g7theme'),
		'fields' => array(
			'featured_show' => array(
				'type'    => 'checkbox',
				'label'   => __('Enable featured posts', 'g7theme'),
				'default' => 1,
			),
			'featured_tags' => array(
				'type'    => 'text',
				'label'   => __('Tag(s)', 'g7theme'),
				'default' => 'featured',
			),
			'featured_num' => array(
				'type'    => 'text',
				'label'   => __('Number of featured posts', 'g7theme'),
				'default' => '6',
				'size'    => '5',
			),
			'featured_format' => array(
				'type'    => 'checkbox',
				'label'   => __('Show post format icon', 'g7theme'),
				'default' => 1,
			),
			'featured_date' => array(
				'type'    => 'checkbox',
				'label'   => __('Show date', 'g7theme'),
				'default' => 1,
			),
			'featured_full' => array(
				'type'    => 'checkbox',
				'label'   => __('Enable full width slider', 'g7theme'),
				'default' => 0,
			),
		),
	),
	'slide' => array(
		'title'       => __('Slider', 'g7theme'),
		'description' => __('Slider settings', 'g7theme'),
		'fields'      => array(
			'slider_animation' => array(
				'type'    => 'select',
				'label'   => __('Animation', 'g7theme'),
				'default' => 'fade',
				'choices' => array(
					'slide' => 'slide',
					'fade'  => 'fade',
				),
			),
			'slider_slideshowSpeed' => array(
				'type'    => 'text',
				'label'   => __('Slideshow Speed', 'g7theme'),
				'default' => '7000',
				'size'    => '5',
				'desc'    => __('speed of the slideshow cycling, in milliseconds', 'g7theme'),
			),
			'slider_animationSpeed' => array(
				'type'    => 'text',
				'label'   => __('Animation Speed', 'g7theme'),
				'default' => '600',
				'size'    => '5',
				'desc'    => __('speed of animations, in milliseconds', 'g7theme'),
			),
			'slider_pauseOnHover' => array(
				'type'    => 'checkbox',
				'label'   => __('Pause on Hover', 'g7theme'),
				'default' => 1,
			),
		),
	),
	'blog' => array(
		'title'       => __('Blog', 'g7theme'),
		'description' => __('Settings for default blog, category, tag, search result, author and archive pages. <br>For page templates, please use the settings on page edit screen)', 'g7theme'),
		'fields'      => array(
			'blog_show_icon' => array(
				'type'    => 'checkbox',
				'label'   => __('Show post format icon', 'g7theme'),
				'default' => 1,
			),
			'blog_show_rating' => array(
				'type'    => 'checkbox',
				'label'   => __('Show rating', 'g7theme'),
				'default' => 1,
			),
			'blog_show_image' => array(
				'type'    => 'checkbox',
				'label'   => __('Show featured image', 'g7theme'),
				'default' => 1,
			),
			'blog_show_category' => array(
				'type'    => 'checkbox',
				'label'   => __('Show category', 'g7theme'),
				'default' => 1,
			),
			'blog_show_date' => array(
				'type'    => 'checkbox',
				'label'   => __('Show date', 'g7theme'),
				'default' => 0,
			),
			'blog_show_comments' => array(
				'type'    => 'checkbox',
				'label'   => __('Show comments number', 'g7theme'),
				'default' => 0,
			),
			'blog_show_author' => array(
				'type'    => 'checkbox',
				'label'   => __('Show author', 'g7theme'),
				'default' => 1,
			),
			'blog_content' => array(
				'type'    => 'select',
				'label'   => __('Show post content', 'g7theme'),
				'default' => 1,
				'choices' => array(
					'0' => __('No', 'g7theme'),
					'1' => __('Excerpt', 'g7theme'),
					'2' => __('Full Content', 'g7theme'),
				),
			),
			'blog_excerpt' => array(
				'type'    => 'text',
				'label'   => __('Excerpt length', 'g7theme'),
				'default' => '40',
			),
		),
	),
	'single' => array(
		'title'  => __('Single Post', 'g7theme'),
		'fields' => array(
			'single_category' => array(
				'type'    => 'checkbox',
				'label'   => __('Show category', 'g7theme'),
				'default' => 1,
			),
			'single_date' => array(
				'type'    => 'checkbox',
				'label'   => __('Show date', 'g7theme'),
				'default' => 1,
			),
			'single_author' => array(
				'type'    => 'checkbox',
				'label'   => __('Show author name', 'g7theme'),
				'default' => 1,
			),
			'single_featured_image' => array(
				'type'    => 'checkbox',
				'label'   => __('Show featured image', 'g7theme'),
				'default' => 1,
			),
			'single_uncropped' => array(
				'type'    => 'checkbox',
				'label'   => __('Use full height featured image', 'g7theme'),
				'default' => 0,
			),
			'single_tags' => array(
				'type'    => 'checkbox',
				'label'   => __('Show tags', 'g7theme'),
				'default' => 1,
			),
			'single_author_info' => array(
				'type'    => 'checkbox',
				'label'   => __('Show author info', 'g7theme'),
				'default' => 1,
			),
			'single_related' => array(
				'type'    => 'checkbox',
				'label'   => __('Show related posts', 'g7theme'),
				'default' => 1,
			),
		),
	),
	'footer' => array(
		'title'  => __('Footer', 'g7theme'),
		'fields' => array(
			'footer_widget' => array(
				'type'    => 'checkbox',
				'label'   => __('Show footer widget area', 'g7theme'),
				'default' => 1,
			),
			'footer_text' => array(
				'type'    => 'text',
				'label'   => __('Footer text', 'g7theme'),
				'default' => '',
			),
		),
	),
	'main_color' => array(
		'title'  => __('Color scheme', 'g7theme'),
		'fields' => array(
			'main_color' => array(
				'type'    => 'color',
				'label'   => __('Color scheme', 'g7theme'),
			),
		),
	),
);
