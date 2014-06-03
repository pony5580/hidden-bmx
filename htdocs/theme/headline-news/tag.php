<?php
$tag_desc = '';
$tag_description = tag_description();
if (!empty($tag_description)) {
	$tag_desc = apply_filters('tag_archive_meta', '<div class="archive-meta">' . $tag_description . '</div>');
}

get_header();
?>

<header class="archive-header">
	<h1 class="page-title"><?php echo single_tag_title('', false); ?></h1>
</header>

<?php get_template_part('wrapper', 'start'); ?>

	<?php echo $tag_desc; ?>

	<?php if (have_posts()) : ?>

		<div class="posts blog-small">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'small'); ?>
			<?php endwhile; ?>
		</div>

		<?php g7_pagination(); ?>

	<?php else : ?>

		<?php get_template_part('content', 'none'); ?>

	<?php endif; ?>

<?php get_template_part('wrapper', 'end'); ?>

<?php get_footer(); ?>