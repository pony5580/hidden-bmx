<?php
$sidebars = array();
foreach ((array)g7_option('sidebar') as $v) {
	if (trim($v) == '') {
		continue;
	}
	$sidebars[$v] = $v;
}
$sidebar1['sidebar1'] = __('Default Sidebar 1', 'g7theme');
$sidebars1 = $sidebar1 + $sidebars;
$sidebar2['sidebar2'] = __('Default Sidebar 2', 'g7theme');
$sidebars2 = $sidebar2 + $sidebars;

$more_sidebars = array('' => '') + $sidebars;


$meta_boxes['layout_metabox'] = array(
	'title'    => __('Layout Options', 'g7theme'),
	'pages'    => array('page', 'post'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		'layout' => array(
			'type'    => 'select',
			'name'    => __('Page layout', 'g7theme'),
			'options' => array(
				'0' => __('Default', 'g7theme'),
				'1' => __('Right sidebar', 'g7theme'),
				'2' => __('Left sidebar', 'g7theme'),
				'3' => __('Full width (no sidebar)', 'g7theme'),
				'4' => __('Dual sidebar', 'g7theme'),
			),
		),
		'sidebar1' => array(
			'type'    => 'select',
			'name'    => __('Left sidebar', 'g7theme'),
			'options' => $sidebars1,
		),
		'sidebar2' => array(
			'type'    => 'select',
			'name'    => __('Right sidebar', 'g7theme'),
			'options' => $sidebars2,
		),
	)
);

$meta_boxes['page_metabox'] = array(
	'title'     => __('Page Options', 'g7theme'),
	'pages'     => array('page'),
	'templates' => array('page-blog.php'),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(
		'page_show_title' => array(
			'type'    => 'checkbox',
			'name'    => __('Show page title', 'g7theme'),
			'default' => 0,
		),
		'page_show_content' => array(
			'type'    => 'checkbox',
			'name'    => __('Show page content', 'g7theme'),
			'default' => 0,
		),
	)
);

$meta_boxes['blog_metabox'] = array(
	'title'     => __('Blog Options', 'g7theme'),
	'pages'     => array('page'),
	'templates' => array('page-blog.php'),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(
		'blog_style' => array(
			'type'    => 'select',
			'name'    => __('Blog style', 'g7theme'),
			'default' => '1',
			'options' => array(
				'1' => __('Small Image', 'g7theme'),
				'2' => __('Large Image', 'g7theme'),
				'3' => __('Grid', 'g7theme'),
			),
		),
		'blog_category' => array(
			'type' => 'category',
			'name' => __('Filter by category', 'g7theme'),
		),
		'blog_num' => array(
			'type' => 'text',
			'name' => __('Number of posts per page', 'g7theme'),
			'size' => 2,
			'desc' => __('Leave this blank to use default setting', 'g7theme') . ' (<a href="' . admin_url('options-reading.php') . '" target="_blank">Reading Settings</a>)',
		),
		'blog_post_options' => array(
			'type'  => 'title',
			'label' => __('Post Options:', 'g7theme'),
		),
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
			'name'    => __('Show post content', 'g7theme'),
			'default' => 1,
			'options' => array(
				'0' => 'No',
				'1' => 'Excerpt',
				'2' => 'Full Content',
			),
		),
		'blog_excerpt' => array(
			'type'    => 'text',
			'name'    => __('Excerpt length', 'g7theme'),
			'size'    => 2,
			'default' => '20',
			'desc'    => __('The number of words for excerpt', 'g7theme'),
		),
	)
);

$meta_boxes['pagebuilder_metabox'] = array(
	'title'     => 'Content Builder',
	'pages'     => array('page'),
	'templates' => array('page-builder.php'),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(
		'cat' => array(
			'type'        => 'builder',
			'name'        => __('Content Blocks', 'g7theme'),
			'default_num' => 4,
			'desc'        => __("<p>Click on the <b>Add Block</b> button to add a new block to your page.</p>
<p>You can move blocks by dragging up/down on each block.</p>
<p>Click the down arrow in the upper right corner of each block to expand the block's interface and customize the settings.</p>
<p>To delete the block, click <b>Delete</b>.</p>", 'g7theme')
		),
		'slider' => array(
			'type'    => 'checkbox',
			'name'    => __('Show slider', 'g7theme'),
			'default' => 0,
		),
		'slider_cat' => array(
			'type' => 'category',
			'name' => __('Slider category', 'g7theme'),
		),
		'slider_num' => array(
			'type'    => 'text',
			'name'    => __('Number of slider posts', 'g7theme'),
			'default' => 5,
			'size'    => 2,
		),
		'recent' => array(
			'type'    => 'checkbox',
			'name'    => __('Show recent posts', 'g7theme'),
			'default' => 0,
		),
		'recent_num' => array(
			'type'    => 'text',
			'name'    => __('Number of recent posts', 'g7theme'),
			'default' => 5,
			'size'    => 2,
		),
		'sidebar_lb' => array(
			'type'    => 'select',
			'name'    => __('Left bottom sidebar', 'g7theme'),
			'default' => '',
			'options' => $more_sidebars,
		),
		'sidebar_rb' => array(
			'type'    => 'select',
			'name'    => __('Right bottom sidebar', 'g7theme'),
			'default' => '',
			'options' => $more_sidebars,
		),
	)
);

if (g7_option('enable_review')) {
	$meta_boxes['review_metabox'] = array(
		'title'    => 'Review',
		'pages'    => array('post'),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			'review_post' => array(
				'type'  => 'checkbox',
				'label' => __('Enable review on this post', 'g7theme'),
			),
			'criteria' => array(
				'type' => 'rating',
				'id2'  => 'rating',
				'id3'  => 'overall_rating',
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'overall_text' => array(
				'type'    => 'text',
				'name'    => __('Overall text', 'g7theme'),
				'default' => __('Good!', 'g7theme'),
			),
			'summary' => array(
				'type' => 'textarea',
				'name' => __('Summary', 'g7theme'),
				'cols' => 80,
				'rows' => 4,
			),
			'rating_style' => array(
				'type'    => 'select',
				'name'    => __('Rating style', 'g7theme'),
				'default' => 1,
				'options' => array(
					'1' => 'Star',
					'2' => 'Number',
					'3' => 'Percent',
				),
			),
			'review_position' => array(
				'type'    => 'select',
				'name'    => __('Review position', 'g7theme'),
				'default' => 1,
				'options' => array(
					'1' => 'Top',
					'2' => 'Bottom',
				),
			),
		)
	);
}
