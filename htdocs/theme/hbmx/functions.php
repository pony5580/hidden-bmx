<?php
/**
 * Theme name and options field name
 */
define('G7_NAME', 'Headline News');
define('G7_FOLDERNAME', 'headline-news');
define('G7_OPTIONNAME', 'headline-news_options');

/**
 * Theme directory and url
 */
define('PARENT_DIR', get_template_directory());
define('PARENT_URL', get_template_directory_uri());
define('CHILD_DIR', get_stylesheet_directory());
define('CHILD_URL', get_stylesheet_directory_uri());


/**
 * Sets up the content width
 */
if (!isset($content_width)) {
	$content_width = 680;
}


/**
 * Get options from database
 */
if (!function_exists('g7_option')) {
	$g7_option = get_option(G7_OPTIONNAME);
	function g7_option($v, $default = '') {
		global $g7_option;
		if (!empty($g7_option[$v])) {
			if (is_string($g7_option[$v])) {
				return stripslashes($g7_option[$v]);
			}
			return $g7_option[$v];
		} else {
			return $default;
		}
	}
}


require_once PARENT_DIR . '/includes/ajax_action.php';
require_once PARENT_DIR . '/includes/aq_resizer.php';
require_once PARENT_DIR . '/includes/options/options.php';
require_once PARENT_DIR . '/includes/customizer/customizer.php';
require_once PARENT_DIR . '/includes/metabox/metabox.php';
require_once PARENT_DIR . '/includes/widgets.php';
require_once PARENT_DIR . '/includes/class-tgm-plugin-activation.php';


/**
 * Theme setup
 * register various WordPress features
 */
if (!function_exists('g7_theme_setup')) {
	function g7_theme_setup() {
		// Language localization
		load_theme_textdomain('g7theme', PARENT_DIR . '/lang');
		$locale = get_locale();
		$locale_file = PARENT_DIR . "/lang/$locale.php";
		if (is_readable($locale_file)) {
			require_once $locale_file;
		}

		// Add support for custom backgrounds
		add_theme_support('custom-background');

		// Activate post thumbnails
		add_theme_support('post-thumbnails');

		// automatic feed links
		add_theme_support('automatic-feed-links');

		// Add menu location
		register_nav_menus(array(
			'mainmenu' => __('Main Menu', 'g7theme'),
			'topmenu'  => __('Top Menu', 'g7theme'),
		));

		// Add support for post formats
		add_theme_support('post-formats', array(
			'gallery',
			'image',
			'quote',
			'video',
			'audio',
			'interview',
		));
	}
	add_action('after_setup_theme', 'g7_theme_setup');
}


/**
 * Enqueue all javascript files used in public
 */
if (!function_exists('g7_scripts')) {
	function g7_scripts() {
		wp_enqueue_script('jquery', false, array(), false, true);
		wp_enqueue_script('fitvids', PARENT_URL . '/js/jquery.fitvids.js', array('jquery'), false, true);
		wp_enqueue_script('prettyPhoto', PARENT_URL . '/js/jquery.prettyPhoto.js', array('jquery'), false, true);
		if (get_theme_mod('sticky', 0)) {
			wp_enqueue_script('stickyjs', PARENT_URL . '/js/jquery.sticky.js', array('jquery'), false, true);
		}
		wp_enqueue_script('mobilemenu', PARENT_URL . '/js/jquery.mobilemenu.js', array('jquery'), false, true);
		if (g7_show_featured() || is_page_template('page-builder.php')) {
			wp_enqueue_script('flexslider', PARENT_URL . '/js/jquery.flexslider-min.js', array('jquery'), false, true);
		}
		if (get_theme_mod('ticker_show', 1)) {
			wp_enqueue_script('liscroll', PARENT_URL . '/js/jquery.liScroll.js', array('jquery'), false, true);
		}
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply', false, array(), false, true);
		}
		if (get_theme_mod('retina', 1)) {
			wp_enqueue_script('retina', PARENT_URL . '/js/retina-1.1.0.min.js', array(), false, true);
		}
		wp_enqueue_script('scripts', PARENT_URL . '/js/scripts.js', array('jquery'), false, true);
		wp_localize_script('scripts', 'g7', array(
			'ajaxurl'               => admin_url('admin-ajax.php'),
			'slider_animation'      => get_theme_mod('slider_animation', 'fade'),
			'slider_slideshowSpeed' => get_theme_mod('slider_slideshowSpeed', '7000'),
			'slider_animationSpeed' => get_theme_mod('slider_animationSpeed', '600'),
			'slider_pauseOnHover'   => get_theme_mod('slider_pauseOnHover', 1) ? true : false,
			'navigate_text'         => __('Navigate to...', 'g7theme'),
			'rtl'                   => is_rtl(),
		));
	}
	add_action('wp_enqueue_scripts', 'g7_scripts');
}


/**
 * Check show featured posts
 */
if (!function_exists('g7_show_featured')) {
	function g7_show_featured() {
		if (is_front_page() && get_theme_mod('featured_show')) {
			return true;
		}
		return false;
	}
}


/**
 * Use external CSS
 */
if (!function_exists('g7_use_external_css')) {
	function g7_use_external_css() {
		return !is_user_logged_in();
	}
}


/**
 * Enqueue all css files used in public
 */
if (!function_exists('g7_styles')) {
	function g7_styles() {
		wp_enqueue_style('bootstrap', PARENT_URL . '/css/bootstrap.min.css');
		wp_enqueue_style('font-awesome', PARENT_URL . '/css/font-awesome.min.css');
		wp_enqueue_style('font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,300italic,400italic,600italic,700italic&subset=latin,cyrillic');
		wp_enqueue_style('font-roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,cyrillic');
		wp_enqueue_style('font-roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700');
		// wp_enqueue_style('font-Oswald', '//fonts.googleapis.com/css?family=Oswald');


		wp_enqueue_style('main-style', get_stylesheet_uri());
		if (g7_show_featured() || is_page_template('page-builder.php')) {
			wp_enqueue_style('flexslider', PARENT_URL . '/css/flexslider.css');
		}
		wp_enqueue_style('prettyPhoto', PARENT_URL . '/css/prettyPhoto.css');
		if (get_theme_mod('ticker_show', 1)) {
			wp_enqueue_style('liscroll', PARENT_URL . '/css/jquery.liScroll.css');
		}
		if (g7_custom_styles() && g7_use_external_css()) {
			wp_enqueue_style('color', home_url() . '/?css=1');
		}
	}
	add_action('wp_enqueue_scripts', 'g7_styles');
}


/**
 * Custom styles
 */
if (!function_exists('g7_custom_styles')) {
	function g7_custom_styles() {
		$css = array();
		if (get_theme_mod('main_logo')) {
			$logo_height = get_theme_mod('logo_height', 80) . 'px';
			$css[] = ".logo img { max-height: $logo_height; }";
		}
		if (get_theme_mod('main_color')) {
			$kolor = get_theme_mod('main_color');
			if ($kolor != '#ea6153') {
				$col = array(
					'a',
					'.full-gallery .gallery-title',
					'.breaking-news li a:hover',
					'.header-time',
					'#topmenu a:hover',
					'.next-prev a:hover',
					'.author-link a:hover',
					'.block-title',
					'.block-heading > a:hover',
					'.posts .entry-title a:hover',
					'.block-meta a:hover',
					'.entry-meta a:hover',
					'.rating',
					'.block-meta .block-category a',
					'.entry-meta .entry-category a',
					'.widgettitle',
					'.widget li > a:hover',
					'.widget_g7_social li:hover a',
					'.twitter-account a:hover',
					'.twitter-content a:hover',
					'.not-found > h1',
					'#mainmenu ul a:hover',
					'#mainmenu ul li.current-menu-item > a',
					'#mainmenu ul li.current_page_item > a',
				);
				$bgcol = array(
					'.breaking-news h3',
					'.mainnav',
					'.review .bar > div',
					'.review-overall',
					'.pagination span.current',
					'.pagination a:hover',
					'.widget_g7_social li:hover .social-box',
					'.searchsubmit',
					'.tagcloud a:hover',
					'#wp-calendar #today',
					'.bottom',
					'.btn',
					'input[type="reset"]',
					'input[type="submit"]',
					'#submit',
					'.flexslider:hover .flex-next:hover',
					'.flexslider:hover .flex-prev:hover',
					'.flex-control-paging li a.flex-active',
					'.bypostauthor > article .fn',
				);
				$css[] = implode(',', $col) . " { color: $kolor; }";
				$css[] = implode(',', $bgcol) . " { background-color: $kolor; }";
			}
		}
		if ($css) {
			return implode("\n", $css);
		}
		return false;
	}
}


/**
 * Custom query var
 */
if (!function_exists('g7_query_vars')) {
	function g7_query_vars($vars) {
		$vars[] = 'css';
		return $vars;
	}
	add_filter('query_vars', 'g7_query_vars');
}


/**
 * Custom CSS (external)
 */
if (!function_exists('g7_external_css')) {
	function g7_external_css() {
		$var = get_query_var('css');
		if ($var == '1') {
			header('Content-Type: text/css');
			header('Pragma: cache');
			header('Cache-Control: max-age=86400, must-revalidate');
			header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
			echo g7_custom_styles();
			exit;
		}
	}
	add_action('template_redirect', 'g7_external_css');
}


/**
 * Custom CSS (embedded)
 */
if (!function_exists('g7_embedded_css')) {
	function g7_embedded_css() {
		$style = '<style type="text/css">';
		$style .= g7_custom_styles();
		$style .= '</style>';
		echo $style;
	}
	if (g7_custom_styles() && !g7_use_external_css()) {
		add_action('wp_head', 'g7_embedded_css');
	}
}


/**
 * Update notifier
 */
if (g7_option('update_notifier')) {
	include_once PARENT_DIR . '/update-notifier.php';
}


/**
 * custom excerpt more
 */
if (!function_exists('g7_excerpt_more')) {
	function g7_excerpt_more($more) {
		return '';
	}
	add_filter('excerpt_more', 'g7_excerpt_more');
}


/**
 * custom excerpt length
 */
if (!function_exists('g7_excerpt_length')) {
	function g7_excerpt_length($length) {
		return 100;
	}
	add_filter('excerpt_length', 'g7_excerpt_length');
}


/**
 * Add custom body class
 */
if (!function_exists('g7_body_class')) {
	function g7_body_class($classes) {
		if (get_theme_mod('boxed') || !empty($_GET['boxed'])) {
			$classes[] = 'boxed';
		} else {
			$classes[] = 'stretched';
		}
		return $classes;
	}
	add_filter('body_class', 'g7_body_class');
}


/**
 * Get a featured image from a post
 */
if (!function_exists('g7_image')) {
	function g7_image($w, $h, $link = true, $overlay = true) {
		if (!has_post_thumbnail()) {
			return '';
		}
		$thumb   = get_post_thumbnail_id();
		$img_url = wp_get_attachment_url($thumb, 'full');
		$image   = aq_resize($img_url, $w, $h, true, true, true);
		if (empty($image)) {
			return '';
		}

		if ($link) {
			$link_open  = '<a href="'.get_permalink().'">';
			$link_close = '</a>';
			$icon       = has_post_format() ? g7_post_format_icon() : '<i class="fa fa-plus"></i>';
			// if (get_post_format() == 'image') {
			// 	$link_open  = '<a href="'.$img_url.'" data-rel="prettyPhoto">';
			// 	$link_close = '</a>';
			// }
		} else {
			$link_open  = '';
			$link_close = '';
			$overlay    = false;
		}

		return sprintf(
			'%s<img src="%s" alt="%s" width="%s" height="%s">%s%s',
			$link_open,
			$image,
			esc_attr(get_the_title()),
			$w,
			$h,
			$overlay ? '<div class="overlay">' . $icon . '</div>' : '',
			$link_close
		);
	}
}


/**
 * Show featured image
 */
if (!function_exists('g7_show_image')) {
	function g7_show_image($size, $custom = true) {
		if ($custom) {
			list($w, $h) = g7_image_sizes($size);
			echo g7_image($w, $h, false, false);
		} else {
			the_post_thumbnail($size);
		}
	}
}


/**
 * Image sizes for featured images
 */
if (!function_exists('g7_image_sizes')) {
	function g7_image_sizes($type = 'thumb') {
		$sizes = array(
			'thumb'         => array(70, 70),
			'grid'          => array(480, 285),
			'slider'        => array(848, 563),
			'slider-full'   => array(1100, 400),
			'featured'      => array(263, 178),
			'widget'        => array(263, 170),
			'small'         => array(270, 180),
			'medium'        => array(280, 195),
			'large1'        => array(817, 350),
			'large2'        => array(914, 350),
			'large3'        => array(1140, 500),
			'large4'        => array(610, 350),
			'middle-slider' => array(1280, 600),
			'single1'       => array(817, 350), // right sidebar
			'single2'       => array(914, 350), // left sidebar
			'single3'       => array(1140, 500), // full width
			'single4'       => array(610, 350), // dual sidebar
		);
		return $sizes[$type];
	}
}


/**
 * Custom favicon
 */
if (!function_exists('g7_favicon')) {
	function g7_favicon() {
		if (get_theme_mod('favicon')) {
			echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_theme_mod('favicon') . '">';
		}
	}
	add_action('wp_head', 'g7_favicon');
}


/**
 * Custom login logo
 */
if (!function_exists('g7_login_logo')) {
	function g7_login_logo() {
		if (get_theme_mod('login_logo')) {
			echo '<style type="text/css">
			.login h1 a { background-image: url(' . get_theme_mod('login_logo') . ') !important; }
			</style>';
		}
	}
	add_action('login_head', 'g7_login_logo');
}


/**
 * Get page layout
 * 1 = right sidebar, 2 = left sidebar, 3 = full width, 4 = dual sidebar
 */
if (!function_exists('g7_page_layout')) {
	function g7_page_layout() {
		$default_layout = get_theme_mod('layout', 4);
		if (is_page() || is_single()) {
			$g7_layout = get_post_meta(get_the_ID(), '_g7_layout', true);
			if (empty($g7_layout)) {
				return $default_layout;
			}
			return $g7_layout;
		}
		return $default_layout;
	}
}


/**
 * Shows related posts
 */
if (!function_exists('g7_related_posts')) {
	function g7_related_posts($post_id, $number = 4) {
		$have_posts = false;
		$t          = array();
		$tags       = get_the_tags();
		if ($tags) {
			foreach($tags as $tag) {
				$t[] = $tag->term_id;
			}
		}
		if (!empty($t)) {
			$related = new WP_Query(array(
				'posts_per_page' => $number,
				'post__not_in'   => array($post_id),
				'tag__in'        => $t,
			));
			if ($related->have_posts()) {
				$have_posts = true;
			}
		}
		if (!$have_posts) {
			$c = array();
			foreach (get_the_category() as $cat) {
				$c[] = $cat->cat_ID;
			}
			if (!empty($c)) {
				$related = new WP_Query(array(
					'posts_per_page' => $number,
					'post__not_in'   => array($post_id),
					'category__in'   => $c,
				));
				if ($related->have_posts()) {
					$have_posts = true;
				}
			}
		}
		list($image_w, $image_h) = g7_image_sizes('small');
		?>
		<?php if ($have_posts) : ?>
			<ul class="row block">
				<?php while ($related->have_posts()) : $related->the_post(); ?>
				<li class="col-xs-3 post">
					<div class="block-top">
						<?php echo g7_image($image_w, $image_h); ?>
					</div>
					<div class="block-content">
						<h4 class="block-heading">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
		<?php else: ?>
			<span class="norelated"><?php _e('No related posts found', 'g7theme'); ?>.</span>
		<?php endif; ?>
		<?php
		wp_reset_postdata();
	}
}


if (!function_exists('g7_add_review')) {
	function g7_add_review($content) {
		if (!is_single()) {
			return $content;
		}
		$post_id  = get_the_ID();
		$review_post = get_post_meta($post_id, '_g7_review_post', true);
		if (!$review_post) {
			return $content;
		}

		$criteria     = get_post_meta($post_id, '_g7_criteria', true);
		$rating       = get_post_meta($post_id, '_g7_rating', true);
		$overall      = get_post_meta($post_id, '_g7_overall_rating', true);
		$overall_text = get_post_meta($post_id, '_g7_overall_text', true);
		$summary      = get_post_meta($post_id, '_g7_summary', true);
		$style        = get_post_meta($post_id, '_g7_rating_style', true);
		$position     = get_post_meta($post_id, '_g7_review_position', true);
		$category     = get_the_category();
		$cat_name     = $category[0]->cat_name;

		switch ($style) {
			default:
			case 1:
				$class = 'review-star';
				$ratingValue = $overall / 20;
				$ratingValue = number_format($ratingValue, 1);
				$bestRating = 5;
				break;
			case 2:
				$class = 'review-number';
				$ratingValue = $overall / 10;
				$ratingValue = number_format($ratingValue, 1);
				$bestRating = 10;
				break;
			case 3:
				$class = 'review-percent';
				$ratingValue = $overall;
				$bestRating = 100;
				break;
		}
		switch ($position) {
			default:
			case 1: $class2 = ' review-top'; break;
			case 2: $class2 = ' review-bottom'; break;
		}

		$review = '<div class="review ' . $class . $class2 . '">';
		$review .= '<h2>' . __('Review', 'g7theme') . '</h2>';
		foreach ((array)$rating as $k => $v) {
			$review .= '<div class="review-item">';
			$review .= $criteria[$k];
			$review .= '<div class="score">';
			$review .= g7_rating($v, $style);
			$review .= '</div>';
			if ($style > 1) {
				$review .= '<div class="bar"><div style="width:' . $v . '%"></div></div>';
			}
			$review .= '</div>';
		}
		$review .= '<div class="review-footer">';
		$review .= '<div class="review-overall">';
		$review .= g7_rating($overall, $style);
		if ($overall_text) {
			$review .= '<h4>' . $overall_text . '</h4>';
		}
		$review .= '</div>';
		$review .= '<div class="review-summary" itemprop="description">';
		$review .= $summary;
		$review .= '</div>';
		$review .= '</div>';
		$review .= '<meta itemprop="itemReviewed" content="' . esc_attr($cat_name) . '">';
		$review .= '<div itemtype="http://schema.org/Rating" itemscope itemprop="reviewRating">';
		$review .= '<meta content="0" itemprop="worstRating">';
		$review .= '<meta content="' . $ratingValue . '" itemprop="ratingValue">';
		$review .= '<meta content="' . $bestRating . '" itemprop="bestRating">';
		$review .= '</div>';
		$review .= '</div>';

		if ($position == 2) {
			return $content . $review;
		} else {
			return $review . $content;
		}
	}
	add_filter('the_content', 'g7_add_review');
}


/**
 * Pagination function
 *
 * @param string $pages
 * @param int $range
 * @author Kriesi
 * @link http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
 */
if (!function_exists('g7_pagination')) {
	function g7_pagination($pages = '', $range = 3, $numbered = true) {
		if (!$numbered) {
			echo '<div class="pagination">' . get_posts_nav_link() . '</div>';
			return;
		}
		$showitems = ($range * 2) + 1;
		global $paged;
		if (empty($paged)) {
			$paged = 1;
		}
		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (!$pages) {
				$pages = 1;
			}
		}
		if (1 != $pages) {
			echo '<div class="pagination">';
			if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
				echo '<a href="'.get_pagenum_link(1).'"><span class="arrows">&laquo;</span></a>';
			}
			if ($paged > 1 && $showitems < $pages) {
				echo '<a href="'.get_pagenum_link($paged - 1).'"><span class="arrows">&lsaquo;</span></a>';
			}
			for ($i = 1; $i <= $pages; $i++) {
				if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
					if ($paged == $i) {
						echo '<span class="current">'.$i.'</span>';
					} else {
						echo '<a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a>';
					}
				}
			}
			if ($paged < $pages && $showitems < $pages) {
				echo '<a href="'.get_pagenum_link($paged + 1).'"><span class="arrows">&rsaquo;</span></a>';
			}
			if ($paged < $pages-1 && $paged + $range - 1 < $pages && $showitems < $pages) {
				echo '<a href="'.get_pagenum_link($pages).'"><span class="arrows">&raquo;</span></a>';
			}
			echo "</div>\n";
		}
	}
}


/**
 * Comment List
 * called from comments.php
 */
if (!function_exists('g7_commentlist')) {
	function g7_commentlist($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e('Pingback:', 'g7theme'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'g7theme'), '<span class="edit-link">', '</span>'); ?></p>
		<?php
				break;
			default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<a class="comment-avatar" href="<?php comment_author_url(); ?>"><?php echo get_avatar($comment, 45); ?></a>
				<div class="comment-content">
					<footer>
						<span class="fn"><?php comment_author_link(); ?></span>
						<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
							<time pubdate datetime="<?php comment_time('c'); ?>">
								<?php printf(__('%1$s at %2$s', 'g7theme'), get_comment_date(), get_comment_time()); ?>
							</time>
						</a>
						<?php edit_comment_link(__('(Edit)', 'g7theme'), '<span class="edit-link">', '</span>'); ?>
					</footer>
					<?php comment_text(); ?>
					<?php if ($comment->comment_approved == '0') : ?>
						<div class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'g7theme'); ?></div>
					<?php endif; ?>
					<?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'g7theme'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				</div>
			</article><!-- #comment-## -->
		<?php
				break;
		endswitch;
	}
}


/**
 * Shows menu from a location
 */
if (!function_exists('g7_menu')) {
	function g7_menu($location) {
		if (has_nav_menu($location)) {
			wp_nav_menu(array(
				'theme_location' => $location,
				'container'      => '',
				'menu_id'        => $location,
				'menu_class'     => '',
			));
		} else {
			echo '<ul id="' . $location . '">';
			$class = '';
			if (is_front_page() && !is_paged()) {
				$class = ' class="current_page_item"';
			}
			echo '<li' . $class . '>';
			echo '<a href="' . home_url('/') . '">';
			echo __('Home', 'g7theme');
			echo '</a>';
			echo '</li>';
			wp_list_pages(array(
				'title_li' => '',
			));
			echo '</ul>';
		}
	}
}


/**
 * Insert footer scripts
 */
if (!function_exists('g7_footer_scripts')) {
	function g7_footer_scripts() {
		echo g7_option('footer_scripts');
	}
	add_action('wp_footer', 'g7_footer_scripts', 100);
}


/**
 * get post rating
 */
if (!function_exists('g7_post_rating')) {
	function g7_post_rating($before = '', $after = '') {
		$post_id     = get_the_ID();
		$review_post = get_post_meta($post_id, '_g7_review_post', true);
		if (!$review_post) {
			return;
		}
		$overall_rating = get_post_meta($post_id, '_g7_overall_rating', true);
		$rating_style = get_post_meta($post_id, '_g7_rating_style', true);
		return $before . g7_rating($overall_rating, $rating_style) . $after;
	}
}


/**
 * get star icons of rating
 */
if (!function_exists('g7_rating')) {
	function g7_rating($rating, $rating_style = 1) {
		if (empty($rating)) {
			return;
		}
		switch ($rating_style) {
			default:
			case 1:
				$style = 'star';
				$star = $rating / 20;
				$round = round(($star * 2), 0) / 2; //rounding to nearest half
				$output = '';
				for ($i = 1; $i <= 5; $i++) {
					if ($i <= $round) {
						$output .= ' <i class="fa fa-star"></i>';
					} elseif ($i - $round == 0.5) {
						$output .= ' <i class="fa fa-star-half-o"></i>';
					} else {
						$output .= ' <i class="fa fa-star-o"></i>';
					}
				}
				break;
			case 2:
				$style = 'number';
				$number = $rating / 10;
				$output = $number == 10 ? 10 : number_format($number, 1);
				break;
			case 3:
				$style = 'percent';
				$output = $rating . '%';
				break;
		}
		return sprintf('<span class="rating rating-%s">%s</span>', $style, $output);
	}
}


/**
 * get sidebar ID from the sidebar name
 */
if (!function_exists('g7_sidebar_id')) {
	function g7_sidebar_id($sidebar_name) {
		$sidebar_id = str_replace(' ', '', $sidebar_name);
		$sidebar_id = strtolower($sidebar_id);
		return $sidebar_id;
	}
}


/**
 * Get metadata
 */
if (!function_exists('g7_meta')) {
	function g7_meta($v, $default = '') {
		global $g7_meta;
		if (!empty($g7_meta)) {
			if (isset($g7_meta['_g7_' . $v][0])) {
				return $g7_meta['_g7_' . $v][0];
			} else {
				return $default;
			}
		} else {
			return get_theme_mod($v, $default);
		}
	}
}


/**
 * get post content
 * @param  string $type        excerpt or full content
 * @param  int $excerpt_length number of words for excerpt
 * @return string
 */
if (!function_exists('g7_post_content')) {
	function g7_post_content($type, $excerpt_length) {
		switch ($type) {
			case '1':
				$length = (int)$excerpt_length;
				$length = $length == 0 ? 20 : $length;
				$post_content = wp_trim_words(get_the_excerpt(), $length);
				break;
			case '2':
				$post_content = get_the_content();
				$post_content = apply_filters('the_content', $post_content);
				$post_content = str_replace(']]>', ']]&gt;', $post_content);
				break;
			default:
				$post_content = '';
				break;
		}
		return $post_content;
	}
}


/**
 * get date meta
 */
if (!function_exists('g7_date_meta')) {
	function g7_date_meta($schema = false) {
		return sprintf(
			'<span class="entry-date updated">
				<a href="%s">
					<time datetime="%s"%s>%s</time>
				</a>
			</span>',
			get_permalink(),
			get_the_time('Y/m/d H:i:s'),
			$schema ? ' itemprop="datePublished"' : '',
			get_the_time(get_option('date_format'))
		);
	}
}


/**
 * get comments meta
 */
if (!function_exists('g7_comments_meta')) {
	function g7_comments_meta() {
		return sprintf(
			'<span class="entry-comments">
				<a href="%s">
					<i class="fa fa-comments-o"></i>
					%s
				</a>
			</span>',
			get_comments_link(),
			get_comments_number()
		);
	}
}


/**
 * get author meta
 */
if (!function_exists('g7_author_meta')) {
	function g7_author_meta($schema = false) {
		return sprintf(
			'<span class="vcard">
				<a class="url fn" href="%s">
					<span%s>%s</span>
				</a>
			</span>',
			esc_url(get_author_posts_url(get_the_author_meta('ID'))),
			$schema ? ' itemprop="author"' : '',
			get_the_author()
		);
	}
}


/**
 * Logo / site title & description
 */
if (!function_exists('g7_site_title')) {
	function g7_site_title() {
		if (get_theme_mod('main_logo')) {
			$title = sprintf(
				'<img src="%s" alt="%s">',
				get_theme_mod('main_logo'),
				get_bloginfo('name')
			);
			$class = 'logo';
			$site_desc = '';
		} else {
			$title = get_bloginfo('name');
			$class = 'site-title';
			$site_desc = sprintf(
				'<h2 class="site-description">%s</h2>',
				get_bloginfo('description')
			);
		}

		$link = sprintf(
			'<a href="%s" rel="home">%s</a>',
			home_url('/'),
			$title
		);

		if (is_front_page() || is_home()) {
			$site_title = '<h1 class="' . $class . '">' . $link . '</h1>';
		} else {
			$site_title = '<div class="' . $class . '">' . $link . '</div>';
		}

		return $site_title . $site_desc;
	}
}


/**
 * Required plugins
 */
if (!function_exists('g7_register_required_plugins')) {
	function g7_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => 'G7 Shortcodes',
				'slug'               => 'g7-shortcodes',
				'source'             => PARENT_DIR . '/includes/plugins/g7-shortcodes.zip',
				'required'           => false,
				'version'            => '1.2',
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => 'WP Post Formats',
				'slug'               => 'wp-post-formats',
				'source'             => PARENT_DIR . '/includes/plugins/wp-post-formats.zip',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => 'Jetpack',
				'slug'               => 'jetpack',
				'required'           => false,
			),
		);
		$theme_text_domain = 'g7theme';
		$config = array(
			'domain'           => $theme_text_domain,
			'default_path'     => '',
			'parent_menu_slug' => 'themes.php',
			'parent_url_slug'  => 'themes.php',
			'menu'             => 'install-required-plugins',
			'has_notices'      => true,
			'is_automatic'     => false,
			'message'          => '',
			'strings'          => array(
				'page_title'                      => __('Install Required Plugins', $theme_text_domain),
				'menu_title'                      => __('Install Plugins', $theme_text_domain),
				'installing'                      => __('Installing Plugin: %s', $theme_text_domain), // %1$s = plugin name
				'oops'                            => __('Something went wrong with the plugin API.', $theme_text_domain),
				'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s)
				'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s)
				'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s)
				'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
				'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
				'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s)
				'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s)
				'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s)
				'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins'),
				'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins'),
				'return'                          => __('Return to Required Plugins Installer', $theme_text_domain),
				'plugin_activated'                => __('Plugin activated successfully.', $theme_text_domain),
				'complete'                        => __('All plugins installed and activated successfully. %s', $theme_text_domain), // %1$s = dashboard link
				'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
		tgmpa($plugins, $config);
	}
	add_action('tgmpa_register', 'g7_register_required_plugins');
}


/**
 * Social media types
 * used in widgets and user profile
 */
if (!function_exists('g7_social_icons')) {
	function g7_social_icons() {
		return array(
			// icon name   => type
			'dribbble'     => 'dribbble',
			'facebook'     => 'facebook',
			'flickr'       => 'flickr',
			'foursquare'   => 'foursquare',
			'github-alt'   => 'github',
			'google-plus'  => 'google',
			'instagram'    => 'instagram',
			'linkedin'     => 'linkedin',
			'envelope-o'   => 'mail',
			'pinterest'    => 'pinterest',
			'rss'          => 'rss',
			'skype'        => 'skype',
			'tumblr'       => 'tumblr',
			'twitter'      => 'twitter',
			'vimeo-square' => 'vimeo',
			'vk'           => 'vk',
			'youtube'      => 'youtube',
		);
	}
}


/**
 * Add social media fields in user profile
 */
if (!function_exists('g7_add_user_fields')) {
	function g7_add_user_fields($user_contact) {
		$social_types = g7_social_icons();
		unset($social_types['envelope-o']);
		unset($social_types['rss']);
		foreach ($social_types as $type) {
			$user_contact[$type] = ucfirst($type);
		}
		return $user_contact;
	}
	add_filter('user_contactmethods', 'g7_add_user_fields');
}


/**
 * Get social media fields for user profile
 */
if (!function_exists('g7_author_social_links')) {
	function g7_author_social_links() {
		$social_types = g7_social_icons();
		unset($social_types['envelope-o']);
		unset($social_types['rss']);
		$social = array();
		foreach ($social_types as $icon_name => $type) {
			$link = get_the_author_meta($type);
			if (!empty($link)) {
				$social[$type]['icon'] = $icon_name;
				$social[$type]['link'] = $link;
			}
		}
		return $social;
	}
}


if (!function_exists('g7_post_format_icon')) {
	function g7_post_format_icon() {
		switch (get_post_format()) {
			case 'image': $icon = 'fa-camera'; break;
			case 'video': $icon = 'fa-video-camera'; break;
			case 'gallery': $icon = 'fa-picture-o'; break;
			case 'audio': $icon = 'fa-volume-up'; break;
			case 'quote': $icon = 'fa-quote-left'; break;
			default: $icon = 'fa-pencil'; break;
		}
		return '<i class="fa ' . $icon . '"></i>';
	}
}


if (!function_exists('g7_current_time')) {
	function g7_current_time($format = 'd F Y') {
		$current_timestamp = current_time('timestamp', 0);
		return date($format, $current_timestamp);
	}
}


if (!function_exists('g7_tag_cloud_args')) {
	function g7_tag_cloud_args($args) {
		$args['smallest'] = 12;
		$args['largest']  = 12;
		$args['number']   = 15;
		$args['orderby']  = 'count';
		$args['order']    = 'DESC';
		$args['unit']     = 'px';
		return $args;
	}
	add_filter('widget_tag_cloud_args', 'g7_tag_cloud_args');
}


if (!function_exists('g7_entry_meta')) {
	function g7_entry_meta() {
		$entry_meta = '';
		if (get_post_type() == 'post') {
			if (g7_meta('blog_show_category', 1)) {
				$meta[] = '<span class="entry-category">' . get_the_category_list(', ') . '</span>';
			}
			if (g7_meta('blog_show_date', 0)) {
				$meta[] = g7_date_meta();
			}
			if (g7_meta('blog_show_comments', 0)) {
				$meta[] = g7_comments_meta();
			}
			if (g7_meta('blog_show_author', 1)) {
				$meta[] = __('by', 'g7theme') . ' ' . g7_author_meta();
			}
			if (isset($meta)) {
				$entry_meta = '<div class="entry-meta">' . implode(' | ', $meta) . '</div>';
			}
		}
		return $entry_meta;
	}
}


if (!function_exists('g7_top_meta')) {
	function g7_top_meta() {
		if (get_post_type() != 'post') {
			return;
		}
		$post_id        = get_the_ID();
		$review_post    = get_post_meta($post_id, '_g7_review_post', true);
		$overall_rating = get_post_meta($post_id, '_g7_overall_rating', true);
		$icon           = '';
		$rating         = '';
		$meta           = '';
		if (g7_meta('blog_show_icon', 1)) {
			$icon = '<div class="post-format">' . g7_post_format_icon() . '</div> ';
		}
		if (g7_option('enable_review') && g7_meta('blog_show_rating', 1) && $review_post && $overall_rating) {
			$rating = g7_post_rating('<div class="post-rating">', '</div>');
		}
		if ($icon || $rating) {
			$meta = '<div class="top-meta">' . $icon . $rating . '</div>';
		}
		return $meta;
	}
}


if (!function_exists('g7_entry_content')) {
	function g7_entry_content() {
		$content_type   = g7_meta('blog_content', 1);
		$excerpt_length = g7_meta('blog_excerpt', 20);
		$post_content   = g7_post_content($content_type, $excerpt_length);
		$content        = '';
		if ($post_content) {
			$content = '<div class="entry-content">' . $post_content . '</div>';
		}
		return $content;
	}
}

/**
 * force gallery link to media file
 */
if (!function_exists('g7_attachment_link')) {
	function g7_attachment_link($link, $id) {
		if (is_feed() || is_admin()) {
			return $link;
		}
		$post = get_post($id);
		if ('image/' == substr($post->post_mime_type, 0, 6)) {
			return wp_get_attachment_url( $id );
		} else {
			return $link;
		}
	}
	if (get_theme_mod('gallery_pp', 0)) {
		add_filter('attachment_link', 'g7_attachment_link', 10, 2);
	}
}


/**
 * add prettyPhoto to gallery
 */
if (!function_exists('g7_get_attachment_link')) {
	function g7_get_attachment_link($link) {
		if (strpos($link, 'a href') !== false) {
			$link = str_replace('a href', 'a data-rel="prettyPhoto[pp_gal]" href', $link);
		}
		return $link;
	}
	if (get_theme_mod('gallery_pp', 0)) {
		add_filter('wp_get_attachment_link', 'g7_get_attachment_link');
	}
}


function fb_home_image( $tags ) {
    if ( is_home() || is_front_page() ) {
        // Remove the default blank image added by Jetpack
        unset( $tags['og:image'] );
 
        $fb_home_img = $_SERVER['SERVER_NAME'] . '/shared/images/common/fb.png';
        $tags['og:image'] = esc_url( $fb_home_img );
    }
    return $tags;
}
add_filter( 'jetpack_open_graph_tags', 'fb_home_image' );