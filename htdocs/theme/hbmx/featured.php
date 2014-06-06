<?php
if (!g7_show_featured()) {
	return;
}
$featured_full = get_theme_mod('featured_full', 0);
$num           = get_theme_mod('featured_num', 6);
$featured_tags = explode(',', get_theme_mod('featured_tags', 'featured'));
$tags          = array();
$have_posts    = false;

list($image_w, $image_h)   = g7_image_sizes('slider-full');
list($image_w1, $image_h1) = g7_image_sizes('slider');
list($image_w2, $image_h2) = g7_image_sizes('featured');

foreach ((array)$featured_tags as $tag) {
	$tags[] = trim($tag);
}

$featured = array();
if (!empty($tags)) {
	$custom = new WP_Query(array(
		'posts_per_page'      => $num,
		'tag_slug__in'        => $tags,
		'ignore_sticky_posts' => 1,
	));
	if ($custom->have_posts()) {
		$i = 0;
		while ($custom->have_posts()) {
			$custom->the_post();
			$featured[$i]['ID']        = get_the_ID();
			$featured[$i]['image']     = g7_image($image_w, $image_h, false);
			$featured[$i]['image1']    = g7_image($image_w1, $image_h1, false);
			$featured[$i]['image2']    = g7_image($image_w2, $image_h2, false);
			$featured[$i]['title']     = get_the_title();
			$featured[$i]['permalink'] = get_permalink();
			$featured[$i]['date']      = get_the_date();
			$featured[$i]['icon']      = g7_post_format_icon();
			$i++;
		}
		wp_reset_postdata();
	}

	$count = count($featured);
	if (!$featured_full && $count > 3) {
		$pop[] = array_pop($featured);
		$pop[] = array_pop($featured);
		$pop[] = array_pop($featured);
		$featured2 = array_reverse($pop);
	}
}
?>

<?php if ($featured) : ?>

	<div class="featured">
		<div class="container">

			<?php if (!$featured_full && $count > 3) : ?>

				<div class="row">
					<div class="col-md-9 col-sm-12 featured1">
						<div class="flexslider slider1">
							<ul class="slides">
								<?php foreach ((array)$featured as $post) : ?>
									<li class="post">
										<a href="<?php echo $post['permalink']; ?>">
											<?php echo $post['image1']; ?>
										</a>
										<div class="caption">
											<?php if (get_theme_mod('featured_format')) : ?>
												<div class="entry-format"><?php echo $post['icon']; ?></div>
											<?php endif; ?>
											<?php if (get_theme_mod('featured_date')) : ?>
												<div class="entry-date"><?php echo $post['date']; ?></div>
											<?php endif; ?>
											<h2 class="entry-title">
												<a href="<?php echo $post['permalink']; ?>"><?php echo $post['title']; ?></a>
											</h2>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="featured2">
						<?php foreach ((array)$featured2 as $post) : ?>
							<div class="col-md-3 col-xs-4">
								<div class="post">
									<a href="<?php echo $post['permalink']; ?>">
										<?php echo $post['image2']; ?>
										<h2 class="entry-title"><?php echo $post['title']; ?></h2>
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

			<?php else: ?>

				<div class="flexslider slider1">
					<ul class="slides">
						<?php foreach ((array)$featured as $post) : ?>
							<li class="post">
								<a href="<?php echo $post['permalink']; ?>">
									<?php echo $post['image']; ?>
								</a>
								<div class="caption">
									<?php if (get_theme_mod('featured_format')) : ?>
										<div class="entry-format"><?php echo $post['icon']; ?></div>
									<?php endif; ?>
									<?php if (get_theme_mod('featured_date')) : ?>
										<div class="entry-date"><?php echo $post['date']; ?></div>
									<?php endif; ?>
									<h2 class="entry-title">
										<a href="<?php echo $post['permalink']; ?>"><?php echo $post['title']; ?></a>
									</h2>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

			<?php endif; ?>

		</div>
	</div>

<?php endif; ?>
