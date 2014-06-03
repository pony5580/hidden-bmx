<?php
global $g7_layout;
list($image_w, $image_h) = g7_image_sizes('large' . $g7_layout);
$post_id = get_the_ID();
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
<article id="post-<?php the_ID(); ?>">

	<?php echo g7_top_meta(); ?>

	<?php if (get_post_format() == 'quote') : ?>
		<h2 class="entry-title">
			<i class="fa fa-quote-left"></i>
			<?php the_title(); ?>
			<i class="fa fa-quote-right"></i>
		</h2>
	<?php else : ?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
	<?php endif; ?>

	<?php echo g7_entry_meta(); ?>

	<?php if (get_post_format() == 'video' && !empty($video_embed)) : ?>

		<div class="post-video">
			<?php echo $video; ?>
		</div>

	<?php elseif (get_post_format() == 'audio' && !empty($audio_embed)) : ?>

		<div class="post-audio">
			<?php echo $audio; ?>
		</div>

	<?php else : ?>

		<?php if (g7_meta('blog_show_image', 1) && has_post_thumbnail()) : ?>
			<div class="entry-image">
				<?php echo g7_image($image_w, $image_h); ?>
			</div>
		<?php endif; ?>

	<?php endif; ?>

	<?php echo g7_entry_content(); ?>

</article>