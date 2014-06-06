<?php
/* Template Name: Content Builder */

$g7_meta = get_post_custom();

$g7_layout = g7_page_layout();
$post_id   = get_the_ID();
$cat_meta  = get_post_meta($post_id, '_g7_cat', true);
$count     = count($cat_meta['cat']);

$show_slider = false;
if (g7_meta('slider', 0)) {
	$show_slider = true;
	$slider_cat = g7_meta('slider_cat', 0);
	$slider_title = '';
	if ($slider_cat) {
		$slider_title = sprintf(
			'<a href="%s">%s</a>',
			esc_url(get_category_link($slider_cat)),
			get_the_category_by_ID($slider_cat)
		);
	}
	$middle_slider = new WP_Query(array(
		'posts_per_page'      => g7_meta('slider_num', 5),
		'cat'                 => $slider_cat,
		'ignore_sticky_posts' => 1,
	));
	list($slider_w, $slider_h) = g7_image_sizes('middle-slider');
}


$show_recent = false;
if (g7_meta('recent', 0)) {
	$show_recent = true;
	$recent = new WP_Query(array(
		'posts_per_page'      => g7_meta('recent_num', 5),
		'ignore_sticky_posts' => 1,
	));
}

$sidebar_lb = g7_meta('sidebar_lb', '');
$sidebar_rb = g7_meta('sidebar_rb', '');
get_header();
?>

<?php get_template_part('wrapper', 'start'); ?>

	<?php if ($count) : ?>
		<?php for ($i = 0; $i < $count - 1; $i++) : ?>
			<?php
			$num    = $cat_meta['num'][$i];
			$style  = $cat_meta['style'][$i];
			$g7_cat = $cat_meta['cat'][$i];
			$g7_builder_query = new WP_Query(array(
				'posts_per_page'      => $num,
				'cat'                 => $g7_cat,
				'style'               => $style,
				'orderby'             => 'date',
				'order'               => 'DESC',
				'ignore_sticky_posts' => 1,
			));
			$g7_block_title = $cat_meta['title'][$i];
			$style_prev     = $i == 0 ? 0 : $cat_meta['style'][$i - 1];
			$style_next     = $cat_meta['style'][$i + 1];

			$j = 1;
			?>

			<?php if ($style == 4 && $style_prev != 4) : ?>
				<div class="row block block-4">
			<?php endif; ?>

			<?php get_template_part('block', $style); ?>

			<?php if (($style == 4 && $i == $count - 2) || ($style == 4 && $style_next != 4)) : ?>
				</div>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>
		<?php endfor; ?>
	<?php endif; ?>

<?php get_template_part('wrapper', 'end'); ?>

<?php if ($show_slider) : ?>
	<?php if ($middle_slider->have_posts()) : ?>
		<div class="middle-slider">
			<div class="flexslider slider2">
				<ul class="slides">
					<?php while ($middle_slider->have_posts()) : $middle_slider->the_post(); ?>
						<li class="post">
							<a href="<?php the_permalink(); ?>">
								<?php echo g7_image($slider_w, $slider_h, false); ?>
							</a>
							<div class="caption">
								<h2 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="entry-meta">
									<span class="entry-date">
										<?php echo g7_date_meta(); ?>
									</span>
									| <?php _e('by', 'g7theme'); ?> <?php echo g7_author_meta(); ?>
								</div>
							</div>
						</li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php if ($slider_title) : ?>
				<div class="slider-title"><?php echo $slider_title; ?></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if ($show_recent) : ?>
	<div class="container dual-sidebar">
		<div class="row content-row">
			<div class="col-md-7 col-md-push-2 col-xs-12">
				<?php if ($recent->have_posts()) : ?>
					<div class="content block">
						<header>
							<h2 class="block-title"><?php _e('Recent Posts', 'g7theme'); ?></h2>
						</header>
						<div class="posts blog-small">
							<?php while ($recent->have_posts()) : $recent->the_post(); ?>
								<?php get_template_part('content', 'small'); ?>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-md-2 col-md-pull-7 col-xs-6 sidebar">
				<?php if ($sidebar_lb) : ?>
					<?php dynamic_sidebar($sidebar_lb); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-3 col-xs-6 sidebar">
				<?php if ($sidebar_rb) : ?>
					<?php dynamic_sidebar($sidebar_rb); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>