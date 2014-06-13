<?php
global $g7_layout;

$post_id      = get_the_ID();

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
	case 'video':
		$video_embed = get_post_meta($post_id, '_format_video_embed', true);
		$video = strpos($video_embed, 'http') === 0 ? wp_oembed_get($video_embed) : $video_embed;
		break;
}
?>

	<?php if (get_post_format() == 'video' && !empty($video_embed)) : ?>
	<div class="container" id="video-header">
	<div class="row">
	<div class="col-md-12">
		<header class="entry-header">
			<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
			<div class="entry-meta">
				<?php echo $entry_meta; ?>
				<?php edit_post_link(' | <i class="fa fa-pencil-square-o"></i> ' . __('Edit', 'g7theme'), '<span>', '</span>'); ?>
			</div>
		</header>
		<div class="post-video">
			<?php echo $video; ?>
		</div>
	</div>
	</div>
	</div>
	<?php endif ?>