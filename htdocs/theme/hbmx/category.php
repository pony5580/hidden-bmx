<?php
$category_desc = '';
$category_description = category_description();
if (!empty($category_description)) {
	$category_desc = apply_filters('category_archive_meta', '<div class="archive-meta">' . $category_description . '</div>');
}

get_header();
?>

<header class="archive-header">
	<h1 class="page-title"><?php echo single_cat_title('', false); ?></h1>
</header>

<?php get_template_part('wrapper', 'start'); ?>

	<?php echo $category_desc; ?>

	<?php if (have_posts()) : ?>

		
			<?php if ($category_name != 'news') : ?>
			<div class="posts blog-grid">
				<header class="category-header">
					<h1 class="category-title" itemprop="name"><?php echo $category_name ?></h1>
					<div class="category-discription">
						<?php echo $category_description ?>
					</div>
				</header>
				<div class="row">
				<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'grid'); ?>
				<?php endwhile; ?>
				</div>
			<?php else : ?>
			<div class="posts blog-small">
				<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'small'); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			
		</div>

		<?php g7_pagination(); ?>

	<?php else : ?>

		<?php get_template_part('content', 'none'); ?>

	<?php endif; ?>

<?php get_template_part('wrapper', 'end'); ?>

<?php get_footer(); ?>