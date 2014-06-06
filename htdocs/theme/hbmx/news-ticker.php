<?php
if (!get_theme_mod('ticker_show', 1)) {
	return;
}
$limit       = get_theme_mod('ticker_limit', 5);
$ticker_tags = explode(',', get_theme_mod('ticker_tags', 'ticker'));
$tags        = array();
$have_posts  = false;

if (!empty($_GET['slider'])) {
	$flayout = 2;
}

foreach ((array)$ticker_tags as $tag) {
	$tags[] = trim($tag);
}

if (!empty($tags)) {
	$ticker = new WP_Query(array(
		'posts_per_page'      => $limit,
		'tag_slug__in'        => $tags,
		'ignore_sticky_posts' => 1,
	));
	if ($ticker->have_posts()) {
		$have_posts = true;
	}
}

?>

<?php if ($have_posts) : ?>
	<div class="breaking-news">
		<h3><?php echo get_theme_mod('ticker_title', __('Breaking News', 'g7theme')); ?></h3>
		<ul class="ticker">
			<?php while ($ticker->have_posts()) : $ticker->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span><?php the_date(); ?></span></a></li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
<?php endif; ?>
