<?php
global $g7_layout;
list($image_w, $image_h) = g7_image_sizes('single' . $g7_layout);
if (get_theme_mod('single_uncropped', 0)) {
	$image_h = null;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php edit_post_link('<i class="fa fa-pencil-square-o"></i> ' . __('Edit', 'g7theme'), '<div class="entry-meta"><span>', '</span></div>'); ?>
		<?php if (has_post_thumbnail()) : ?>
			<div class="entry-image">
				<?php echo g7_image($image_w, $image_h, false); ?>
			</div>
			<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php wp_link_pages(array(
		'before'         => '<footer class="entry-footer"><p><strong>' . __('Pages', 'g7theme') . ':</strong> ',
		'after'          => '</p></footer>',
		'next_or_number' => 'number'
	)); ?>

</article>