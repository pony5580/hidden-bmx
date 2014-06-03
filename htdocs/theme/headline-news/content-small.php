<?php
list($image_w, $image_h) = g7_image_sizes('small');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (g7_meta('blog_show_image', 1) && has_post_thumbnail()) : ?>
		<div class="entry-image">
			<?php echo g7_image($image_w, $image_h); ?>
		</div>
	<?php endif; ?>

	<div class="entry-main">
		<?php echo g7_top_meta(); ?>

		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>

		<?php echo g7_entry_meta(); ?>

		<?php echo g7_entry_content(); ?>
	</div>
	<div class="clear"></div>

</article>