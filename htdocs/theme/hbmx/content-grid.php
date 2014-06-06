<?php
global $g7_layout, $g7_blog_style;
list($image_w, $image_h) = g7_image_sizes('grid');
switch ($g7_layout) {
	case 1:
	case 2:
		// 1 sidebar: 3 columns
		$class = 'col-lg-4 col-sm-6';
		break;
	case 3:
		// no sidebar: 4 columns
		$class = 'col-lg-3 col-md-4 col-xs-6';
		break;
	case 4:
	default:
		// 2 sidebars: 2 columns
		$class = 'col-sm-6';
		break;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>

	<?php echo g7_top_meta(); ?>
	<?php if (g7_meta('blog_show_image', 1) && has_post_thumbnail()) : ?>
		<div class="entry-image">
			<?php echo g7_image($image_w, $image_h); ?>
		</div>
	<?php endif; ?>

	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>

	<?php echo g7_entry_meta(); ?>

	<?php echo g7_entry_content(); ?>

</article>