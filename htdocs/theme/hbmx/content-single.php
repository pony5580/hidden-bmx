<?php
global $g7_layout;
list($image_w, $image_h) = g7_image_sizes('single' . $g7_layout);
if (get_theme_mod('single_uncropped', 0)) {
	$image_h = null;
}

$post_id      = get_the_ID();
$review_post  = get_post_meta($post_id, '_g7_review_post', true);
$schema       = $review_post ? 'Review' : 'Article';
$social_links = g7_author_social_links();

if (get_theme_mod('single_category', 1)) {
	$meta[] = '<span class="entry-category">' . get_the_category_list(', ') . '</span>';
}
if (get_theme_mod('single_date', 1)) {
	$meta[] = g7_date_meta(true);
}
// $meta[] = g7_comments_meta(true);
if (get_theme_mod('single_author', 1)) {
	$meta[] = __('by', 'g7theme') . g7_author_meta(true);
}
$entry_meta = implode(' | ', $meta);

switch (get_post_format()) {
	case 'quote':
		$source_name = get_post_meta($post_id, '_format_quote_source_name', true);
		$source_url = get_post_meta($post_id, '_format_quote_source_url', true);
		break;
	case 'video':
		$video_embed = get_post_meta($post_id, '_format_video_embed', true);
		$video = strpos($video_embed, 'http') === 0 ? wp_oembed_get($video_embed) : $video_embed;
		break;
	case 'audio':
		$audio_embed = get_post_meta($post_id, '_format_audio_embed', true);
		$audio = strpos($audio_embed, 'http') === 0 ? wp_oembed_get($audio_embed) : $audio_embed;
		break;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/<?php echo $schema; ?>">

	<?php if (get_post_format() == 'video' && !empty($video_embed)) : ?>

	<?php else : ?>

		<header class="entry-header">
			<?php if (get_post_format() == 'quote') : ?>
				<h1 class="entry-title">
					<i class="fa fa-quote-left"></i>
					<?php the_title(); ?>
					<i class="fa fa-quote-right"></i>
				</h1>
			<?php else : ?>
				<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
			<?php endif; ?>

			<div class="entry-meta">
				<?php echo $entry_meta; ?>
				<?php edit_post_link(' | <i class="fa fa-pencil-square-o"></i> ' . __('Edit', 'g7theme'), '<span>', '</span>'); ?>
			</div>

			<?php if (get_post_format() == 'video' && !empty($video_embed)) : ?>

			<?php elseif (get_post_format() == 'audio' && !empty($audio_embed)) : ?>

				<div class="post-audio">
					<?php echo $audio; ?>
				</div>

			<?php else : ?>

				<?php if (get_theme_mod('single_featured_image', 1) && (has_post_thumbnail())) : ?>
					<div class="entry-image">
						<?php echo g7_image($image_w, null, false); ?>
					</div>
				<?php endif; ?>

			<?php endif; ?>

		</header>

	<?php endif; ?>

	<div class="entry-content" itemprop="<?php echo strtolower($schema); ?>Body">
		<?php the_content(); ?>
	</div>

	<footer class="entry-footer">
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		<?php if (get_theme_mod('single_tags', 1)) : ?>
			<div class="tagcloud">
				<?php the_tags('', ''); ?>
			</div>
		<?php endif; ?>

		<?php if (get_theme_mod('single_author_info', 1)) : ?>
		<div class="author-info block">
			<header>
				<h2 class="block-title"><?php _e('About the Author', 'g7theme'); ?></h2>
			</header>
			<div class="author-avatar">
				<?php echo get_avatar(get_the_author_meta('email'), 80); ?>
			</div>
			<div class="author-link">
				<h4><?php the_author_link(); ?></h4>
				<?php if ($social_links) : ?>
					<div class="widget_g7_social">
						<ul class="horizontal square">
							<?php foreach ($social_links as $k => $v) : ?>
								<li class="social-<?php echo $k; ?>">
									<a href="<?php echo $v['link']; ?>" title="<?php echo ucfirst($k); ?>" target="_blank">
										<span class="social-box">
											<i class="fa fa-<?php echo $v['icon']; ?>"></i>
										</span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="clear"></div>
					</div>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
			<div class="author-description">
				<?php the_author_meta('description'); ?>
			</div>
			<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author" class="author-posts">
				<?php printf(__('View all posts by %s', 'g7theme'), get_the_author()); ?>
				<span class="meta-nav">&rarr;</span>
			</a>
		</div>
		<?php endif; ?>

		<nav class="next-prev clearfix">
			<?php previous_post_link('<div class="nav-previous"><div>' . __('Previous', 'g7theme') . '</div>%link<i class="fa fa-angle-left"></i></div>'); ?>
			<?php next_post_link('<div class="nav-next"><div>' . __('Next', 'g7theme') . '</div>%link<i class="fa fa-angle-right"></i></div>'); ?>
		</nav>

		<?php if (get_theme_mod('single_related', 1)) : ?>
		<div class="related-posts block">
			<header>
				<h2 class="block-title"><?php _e('Related Posts', 'g7theme'); ?></h2>
			</header>
			<?php g7_related_posts($post->ID); ?>
		</div>
		<?php endif; ?>
	</footer>

</article>
